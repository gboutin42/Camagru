<?php
	$DB_NAME = "camagru";
	$DB_DSN_LIGHT = "mysql:host=localhost";
	$DB_DSN = $DB_DSN_LIGHT . ";dbname=" . $DB_NAME;
	$DB_USER = "root";
	$DB_PWD = "root";
	$DB_TABLE_USERS =
	"CREATE TABLE IF NOT EXISTS users
	(
		id					INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
		login				VARCHAR(50) NOT NULL,
		mail				VARCHAR(255) NOT NULL,
		password			VARCHAR(255) NOT NULL,
		validate_account	BOOLEAN NOT NULL,
		notif_like			BOOLEAN NOT NULL,
		notif_comments		BOOLEAN NOT NULL
	);";
	$DB_TABLE_COMMENTS =
	"CREATE TABLE IF NOT EXISTS comments
	(
		comment				TEXT NOT NULL,
		time				TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
		love				BOOLEAN NOT NULL
	);";
	$DB_DROP = "DROP DATABASE ";
	$DB_CREATE = "CREATE DATABASE ";
?>
