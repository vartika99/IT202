<?php
function get_portfolio($user_id) {
    require("config.php");
    //$username, $password, $host, $database
    $conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
    $db = new PDO($conn_string, $username, $password);
    $query = "SELECT * from Portfolio as P LEFT JOIN Portfolio_Images as PI ON P.id = PI.portfolio_id WHERE P.user_id = :user_id";
    echo var_export($user_id);
    $stmt = $db->prepare($query);
    $stmt->bindValue(":user_id", $user_id);
    $r = $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo var_export($result, true);
    return $result;
}

function increment_visits($user_id) {
    //user_id is the portfolio
    $query = "UPDATE Portfolio as P SET visits = visits + 1 WHERE P.user_id = :user_id";
}
?>

<?php
//happens on page load
increment_visits($_GET['user_id']);
?>
<?php $results = get_portfolio($_GET['user_id']);
    if($results):?>
	<grid>
	<?php foreach($results as $index=>$row):?>
		<!--HTML template code-->
		<img src="<?php echo $row['image'];?>"/>
	<?php endforeach;?>
    </grid>
    <?php echo var_export($_GET);?>
<?php endif;?>
