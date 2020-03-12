<?php
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'functions.php';
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'debug.php';
	$title = "Upload Pictures";
	$log = "Log Out";
	$value = pictures($_POST);
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'header.php';
?>

<form action="" class="main" method="POST">
	<input type="file" name="upload" value="<?= $value ?>"><br>Actual picture: <?= $value ?><br>
	<button type="submit">click here Mother Fucker</button><br>
</form>

<?php dump("_GET", $_GET, 3) ?>
<?php dump("_POST", $_POST, 1) ?>

<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>