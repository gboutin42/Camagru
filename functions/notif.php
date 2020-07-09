<?php
	require_once 'functions.php';
	connecting_session();
	require_once 'database_connexion.php';

	if (array_key_exists('login', $_SESSION)) {
		$sql = "SELECT * FROM users WHERE login=?";
		$request = $pdo->prepare($sql);
		$request->execute(array($_SESSION['login']));
		$val = $request->fetch();
		
		if (array_key_exists('notif_like', $_POST)) {
			if ($_POST['notif_like'] != null) {
				if ($val != null) {
					$sql = "UPDATE users SET notif_like=1 WHERE login=?";
					$request = $pdo->prepare($sql);
					$request->execute(array($_SESSION['login']));
					$_SESSION['notif_like'] = 1;
				}
			} else {
				if ($val != null) {
					$sql = "UPDATE users SET notif_like=0 WHERE login=?";
					$request = $pdo->prepare($sql);
					$request->execute(array($_SESSION['login']));
					$_SESSION['notif_like'] = 0;
				}	
			}
		}
		if (array_key_exists('notif_comments', $_POST)) {
			if ($_POST['notif_comments'] != null) {
				if ($val != null) {
					$sql = "UPDATE users SET notif_comments=1 WHERE login=?";
					$request = $pdo->prepare($sql);
					$request->execute(array($_SESSION['login']));
					$_SESSION['notif_comments'] = 1;
				}
			} else {
				if ($val != null) {
					$sql = "UPDATE users SET notif_comments=0 WHERE login=?";
					$request = $pdo->prepare($sql);
					$request->execute(array($_SESSION['login']));
					$_SESSION['notif_comments'] = 0;
				}	
			}
		}
	}
?>