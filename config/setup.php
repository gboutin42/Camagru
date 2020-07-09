<?php
	require_once 'database.php';
	
	//CREATE DB
	try {
		require_once 'drop_db.php';
		$sql = $DB_CREATE . "IF NOT EXISTS " . $DB_NAME;
		$pdo->exec($sql);
		echo "Database CREATED successfully<br/>";
		}
	catch (PDOException $error) {
		die("ERROR CREATING DB: " . $error->getMessage() . "Aborting process");
		}

	//CREATE TABLE
	try {
		require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'database_connexion.php';
		$sql = $DB_TABLE_USERS;
		$pdo->exec($sql);
		echo "Table Users CREATED successfully.<br/>";
		$sql = $DB_TABLE_PICTURE;
		$pdo->exec($sql);
		echo "Table Pictures CREATED successfully.<br/>";
		$sql = $DB_TABLE_COMMENTS;
		$pdo->exec($sql);
		echo "Table Comments CREATED successfully.<br/>";
		$sql = $DB_TABLE_LIKES;
		$pdo->exec($sql);
		echo "Table Likes CREATED successfully.";
		header("Refresh: 5;URL=../index.php");
	}
	catch (PDOException $error) {
		die("ERROR CREATING TABLES: " . $error->getMessage() . "Aborting process");
		}
?>
