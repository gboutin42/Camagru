<?php
	require_once 'functions' . DIRECTORY_SEPARATOR . 'functions.php';
	connecting_session();
	$title = "Log In";
	require_once 'elements' . DIRECTORY_SEPARATOR . 'header.php';
?>

<form action="functions/auth.php" method="POST">
	<p class="error text"><?php display_error();?> </p>
	<div>
		<input type="text" name="username" placeholder="Username" pattern=".{3,}" required autofocus>
	</div>
	<div>
		<input type="password" name="pwd" placeholder="Password" pattern=".{8,}" required>
	</div>
	<div><a href="forgot_password.php">forgot password</a></div>
	<button type="submit">Connection</button>
</form>
	
<?php require_once 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>