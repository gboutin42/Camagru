<?php
	$title = "Log In";
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'header.php';
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'auth.php';
	log_in();
?>


<form action="" method="POST" class="main">
	<?php if ($_SESSION['error']): ?>
	<div>
		<?= $_SESSION['error'] ?>
	</div>
	<?php endif; ?><div>
		<input type="text" name="username" placeholder="User Name">
	</div>
	<div>
		<input type="password" name="pwd" placeholder="Password">
	</div>
	<button type="submit">Connection</button>
</form>

<?php dump("Connected ?", is_connected(), 7) ?>

<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Camagru' . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>