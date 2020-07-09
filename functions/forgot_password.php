<?php
	require_once 'functions.php';
	connecting_session();
	require_once 'mail.php';
	require_once 'database_connexion.php';

	if (array_key_exists('login', $_POST) && array_key_exists('mail', $_POST)) {
		$sql = "SELECT * FROM users WHERE login=? AND mail=?";
		$request = $pdo->prepare($sql);
		$request->execute(array(htmlspecialchars($_POST['login']), htmlspecialchars($_POST['mail'])));

		$val = $request->fetch();
		if ($val != NULL) {
			$url = $_SERVER['HTTP_HOST'] . str_replace("/functions/forgot_password.php", "", $_SERVER['REQUEST_URI']);
			$new_password = uniqid(rand(), true);
			$sql = "UPDATE users SET password=? WHERE id=?";
			$request = $pdo->prepare($sql);
			$password_hash = hash("whirlpool", $new_password);
			$request->execute(array($password_hash, $val['id']));
			send_mail_forgot_password($val['mail'], $val['login'], $new_password, $url);
			$_SESSION['error'] = "An email is going, please check your mailbox ^^";
			header("Location: ../log_in.php");
			exit ;
		} else {
			$_SESSION['error'] = "Information invalid, please check username or mailbox name !";
			header("Location: ../forgot_password.php");
			exit ;
		}
	}
?>