<?php 
	$title = "Password forgotten";
	require_once 'elements' . DIRECTORY_SEPARATOR . 'header.php';
?>

<form action="functions/forgot_password.php" method="POST">
	<div>
		<strong class="error text"><?php display_error(); ?></strong>
	</div>
	<div>
		<input type="text" name="login" placeholder="username" required autofocus>
	</div>
	<div>
		<input type="mail" name="mail" placeholder="your@mail.com" required>
	</div>
	<button type="submit" name="btn">Send</button>
</form>

<?php require_once 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>