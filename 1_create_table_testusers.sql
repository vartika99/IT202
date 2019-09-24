create table if not exists `TestUsers`(
		`id` int auto_increment not null,
		`username` varchar(30) not null unique,
		`pin` int default 0,
		PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci;

foreach(glob("sql/*.sql") as $filename){
		//echo $filename;
		$sql[$filename] = file_get_contents($filename);
		//echo $sql[$filename];
	}
