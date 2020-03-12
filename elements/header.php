<?php
	session_start();
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'auth.php';
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'debug.php';
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'functions.php';
	$log = "Log Out";
	if (!is_connected()) {
		$log = "Log In";
	}
	$page = logOrNot((string)$log);
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/elements.css">
		<title> <?= isset($title) ? "Camagru - $title" : "Camagru"?> </title>
	</head>

	<div>
		<header class="fixed top">
		<h1><a href="index.php">Camagru</a></h1>
			<div>
				<ul>
					<li><a href=<?=$page;?>><?= $log; ?></a></li>
					<?php if (!is_connected($log)): ?><li><a href="sign_in.php">Sign In</a></li><?php endif; ?>
					<?php if (is_connected($log)): ?><li><a href="settings.php"><?= your_name_is() ?></a></li>
					<li><a href="upload_pictures.php">Pictures</a></li><?php endif; ?>
				</ul>
			</div>
		</header>
	</div>
</html>
