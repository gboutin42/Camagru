<?php
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'functions.php';
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'auth.php';
	connecting_session();
	if (!array_key_exists('login', $_SESSION)) {
		$log = "Log In";
	}
	else {
		$log = "Log Out";
	}
	$page = logOrNot($log);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/elements.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<title> <?= isset($title) ? "Camagru - $title" : "Camagru"?> </title>
	</head>

	<body>
		<div class="container">
			<header>
				<h1><a href="index.php">Camagru</a></h1>
				<nav>
					<ul>
						<li><a href=<?=$page;?>><?= $log; ?></a></li>
					<?php if ($log == "Log In"): ?>
						<li><a href="sign_up.php">Sign In</a></li>
					<?php endif; ?>
					<?php if (isset($_SESSION['connexion_start']) && array_key_exists('login', $_SESSION)): ?>
						<li><a id="settings" href="settings.php"><?= $_SESSION['login'] ?></a></li>
						<li><a href="upload_pictures.php">Pictures</a></li>
					<?php endif; ?>
					</ul>
				</nav>
			</header>
