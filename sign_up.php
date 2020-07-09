<?php
	require_once 'functions' . DIRECTORY_SEPARATOR . 'functions.php';
	connecting_session();
	$title = "Sign In";
	require_once 'elements' . DIRECTORY_SEPARATOR . 'header.php';
?>

<form action="functions/signup.php" method="POST">
	<p class="error text"><?php display_error(); ?> </p>
	<div>
		<input type="text" pattern=".{3,}" name="username" placeholder="username" required autofocus>	
	</div>
	<div>
		<input type="mail" name="email" placeholder="your@mail.com" required>	
	</div>
	<div>
		<input type="password" pattern=".{8,}" name="password" placeholder="password" required>	
	</div>
	<div>
		<input type="password" pattern=".{8,}" name="confirm_password" placeholder="confirm password" required>	
	</div>
	<button type="submit">Validate your account</button>
	<p class="success text"><?php if (array_key_exists('succes_connection', $_SESSION)): echo $_SESSION['succes_connection']; $_SESSION['succes_connection'] = NULL; endif; ?></p>
</form>

<?php require_once 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>
