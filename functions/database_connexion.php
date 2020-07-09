<?php
	require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'database.php';
	try {
		$pdo = new PDO($DB_DSN, $DB_USER, $DB_PWD);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $error) {
		die("Error query " . $error->getMessage());
	}
?>