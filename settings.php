<?php
	$title	= "Settings";
	$log	= "Log Out";
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'debug.php';
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'auth.php';
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'functions.php';
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'header.php';
?>

<body>
	<form action="" class="main" method="POST">
		<p>Change your settings !</p>
		<input type="email" name="mail" placeholder="xyz@mail.com"><br>
		<input type="text" name="login" placeholder="your login" value=""><br>
		<input type="password" name="old_pwd" placeholder="old password" value=""><br>
		<input type="password" name="new_pwd" placeholder="new password" value=""><br>
		<input type="password" name="checkin_pwd" placeholder="confirm password" value=""><br>
		<input type="checkbox" name="notif[]" id="likes" value="1" <?= checkbox(1, 'notif', $_POST) ?>><label for="likes">Receive notification for Likes</label><br>
		<input type="checkbox" name="notif[]" id="comments" value="2" <?= checkbox(2, 'notif', $_POST) ?>><label for="comments">Receive notification for Comments</label><br>
		<button type="submit">click here Mother Fucker</button><br>
	</form>
</body>
<?php dump("Connected", is_connected(), 7) ?>
<?php dump("_GET", $_GET, 0) ?>
<?php dump("_POST", $_POST, 0) ?>

<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>
