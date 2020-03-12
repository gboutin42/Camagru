<?php
	session_start();
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'debug.php';
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'auth.php';
	$title	= "Page d'accueil";
	if ($_SESSION['log'] === 1);
		$log = "Log Out";
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'header.php';
?>

<?php dump("Connected", is_connected(), 7) ?>
<?php dump("LOG", $log, 1) ?>
<?php dump("_GET", $_GET, 1) ?>
<?php dump("_POST", $_POST, 1) ?>

<?php require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>