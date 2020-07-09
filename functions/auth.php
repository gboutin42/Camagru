<?php
	require_once 'functions.php';
	connecting_session();
	require_once 'database_connexion.php';

	if (array_key_exists('username', $_POST) && array_key_exists('pwd', $_POST)) {
		$sql = "SELECT * FROM users WHERE login=?";
		$request = $pdo->prepare($sql);
		$request->execute(array(htmlspecialchars($_POST['username'])));
		$data_user = $request->fetch();
		$pwd = hash('whirlpool', htmlspecialchars($_POST['pwd']));
		if ($data_user['login'] == $_POST['username'] 
		&& $data_user['password'] == $pwd
		&& $data_user['validate_account'] != 0) {
			$_SESSION['login'] = $data_user['login'];
			$_SESSION['password'] = $data_user['password'];
			$_SESSION['mail'] = $data_user['mail'];
			$_SESSION['notif_like'] = $data_user['notif_like'];
			$_SESSION['notif_comments'] = $data_user['notif_comments'];
			$request->closeCursor();
			header('Location: ../index.php');
		} else {
			if ($data_user['login'] == null) {
				$_SESSION['error'] = "Your login is not correct !";
				$_SESSION['error'] .= "<br>Maybe you need to create a new account ^^";
			} elseif ($data_user['password'] != $pwd) {
				$_SESSION['error'] = "Your password is not correct !";
			}
			if ($data_user['login'] == $_POST['username'] && $data_user['validate_account'] == 0) {
				$_SESSION['error'] = "Your need to validate your account.";
				$_SESSION['error'] .= "<br>Please check your mailbox !";
			}
			$request->closeCursor();
			header('Location: ../log_in.php');
		}
	}
?>