<?php
	$DB_NAME		= "camagru";
	$DB_DSN_LIGHT	= "mysql:host=localhost";
	$DB_DSN			= $DB_DSN_LIGHT . ";dbname=" . $DB_NAME;
	$DB_USER		= "root";
	$DB_PWD			= "root";
	$DB_CREATE		= "CREATE DATABASE ";
	$DB_DROP		= "DROP DATABASE ";

	$DB_TABLE_USERS	=
		"CREATE TABLE IF NOT EXISTS users
		(
			id					INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
			login				VARCHAR(50) NOT NULL,
			mail				VARCHAR(255) NOT NULL,
			password			VARCHAR(255) NOT NULL,
			validate_account	BOOLEAN NOT NULL DEFAULT '0',
			token				VARCHAR(255) NOT NULL,
			notif_like			BOOLEAN NOT NULL DEFAULT '1',
			notif_comments		BOOLEAN NOT NULL DEFAULT '1'
		);";

	$DB_TABLE_PICTURE	= 
		"CREATE TABLE IF NOT EXISTS pictures (
			id_picture			INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
			id_author			INT NOT NULL,
			picture_type		VARCHAR(25) NOT NULL,
			picture_blob		LONGBLOB NOT NULL,
			time_post_picture	DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
			love				INT NOT NULL DEFAULT 0
		);";

	$DB_TABLE_COMMENTS	=
		"CREATE TABLE IF NOT EXISTS comments
		(
			id					INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
			id_author			INT NOT NULL,
			id_picture			INT NOT NULL,
			comment				TEXT COLLATE utf8mb4_general_ci NOT NULL,
			time_comment		DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
		);";

	$DB_TABLE_LIKES	=
		"CREATE TABLE IF NOT EXISTS likes
		(
			id					INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
			id_author			INT NOT NULL,
			id_picture			INT NOT NULL
		);";
?>
