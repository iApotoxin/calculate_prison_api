<?php require_once("index.html");?>
<?php
	/**
	*Database config variables
	*/
	define("DB_HOST","605309c4-e07e-4c43-995a-a8140093a394.mysql.sequelizer.com");
	define("DB_USER","bucvgnslopvtkrfh");
	define("DB_PASSWORD","2mdxLMDW5ZdtdVbxJVvDjizAYkqMtiqtvPYm7Joxrr5xBwxWJBkJuRhSTKFzwYBV");
	define("DB_DATABASE","db605309c4e07e4c43995aa8140093a394");

	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	mysqli_set_charset($connection, "utf8");  //Show Thai Lang

	if(mysqli_connect_errno()){
		die("Database connnection failed " . "(" .
			mysqli_connect_error() . " - " . mysqli_connect_errno() . ")"
				);
	}
	
?>