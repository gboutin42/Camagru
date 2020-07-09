<?php
	$title = "Verify Account";
	require_once 'functions' . DIRECTORY_SEPARATOR . 'verify.php';
	require_once 'elements' . DIRECTORY_SEPARATOR . 'header.php';
?>

<div class="under_the_header">
	<?php if (verify($_GET['token']) == 0) {?>
		<strong>Your Account is verified, you can start using the site !</strong>
	<?php } else { ?>
		<strong class="error text">Your Account is not verified, please check the informations provided !</strong>
	<?php } ?>
</div>

<?php
	require_once 'elements' . DIRECTORY_SEPARATOR . 'footer.php';
	header("Refresh: 5;URL=log_in.php");
?>