<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function view_item ($id) {
    require ("config.php");
    $conn_string = "mysql:host=sql1.njit.edu;dbname=vbp42";
    $db = new PDO($conn_string, $username, $password);
    //lookup item by id
    $query = "select id, title, bio from Portfolio where id = :id";
    $stmt = $db->prepare($query);
    $r = $stmt->execute(array(":id"=>$id));
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}

function update_item ($id, $title, $bio) {
    require ("config.php");
    $conn_string = "mysql:host=sql1.njit.edu;dbname=vbp42";
    $db = new PDO($conn_string, $username, $password);
    $query = "UPDATE Portfolio set title = :1, bio = :2 where id=:id";
    $stmt = $db->prepare($query);
    $r = $stmt->execute(array(
        ":id"=>$id,
        ":1"=>$title,
        ":2"=>$bio));
    return $r > 0;
}
?>

<?php $row = view_item($_GET['id']);?>

<?php if($row): ?>

	<!-- create a form to edit our item; pass in the current data to the respective values-->

	<form method="POST">
		<input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
		<input type="text" name="title" value="<?php echo $row['title'];?>" />
		<input type="text" name="bio" value="<?php echo $row['bio'];?>" />
		<input type="submit" name="submit_button" value="Update"/>
	</form>
<?php endif; ?>

<?php
	//we form was submitted update table
	if(isset($_POST['submit_button'])){
		if( update_item($_POST['id'], $_POST['title'], $_POST['bio'])) {
            		header("Location: createnew.html?id=" . $_POST['id']);
	    		echo var_export($_POST['title'],  true);
            		echo var_export($_POST['bio'], true);
        }
        else {
            echo "error updating information";
        }
	}
?>
