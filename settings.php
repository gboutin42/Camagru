<?php
	require_once 'functions' . DIRECTORY_SEPARATOR . 'functions.php';
	connecting_session();
	if (!array_key_exists('login', $_SESSION))
		header('location: index.php');
	$title	= "Settings";
	require_once 'elements' . DIRECTORY_SEPARATOR . 'header.php';
?>

<form>
	<p>You can change your settings here !</p>
	<div id='error' class="error text"></div>
	<input type="email" id="mail" name="mail" placeholder="xyz@mail.com" value="<?= $_SESSION['mail'] ?>"><br>
	<input type="text" id="login" name="login" placeholder="your login" value="<?= $_SESSION['login'] ?>"><br>
	<input type="password" id="old_pwd" name="old_pwd" placeholder="old password" value="" autofocus><br>
	<input type="password" id="new_pwd" name="new_pwd" placeholder="new password" value=""><br>
	<input type="password" id="checkin_pwd" name="checkin_pwd" placeholder="confirm password" value=""><br>
	<button id="submit_settings" type="submit">Settings Changes</button><br>
	<input type="checkbox" id="notif_like" name="notif_like" value="<?= $_SESSION['notif_like'] ?>" <?= checkbox('notif_like') ?>><label for="notif_like">Receive notification for Likes</label><br>
	<input type="checkbox" id="notif_comments" name="notif_comments" value="<?= $_SESSION['notif_comments'] ?>"<?= checkbox('notif_comments') ?>><label for="notif_comments">Receive notification for Comments</label><br>
	<div class=" delete">
		<a href="functions/delete_account.php" class="error"><img src="img/delete.png" alt="trash" titlte="trash" class="icon">Delete Account</a>
	</div>
</form>
<script type="text/javascript" src="js/send_settings.js"></script>

<?php require_once 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>
