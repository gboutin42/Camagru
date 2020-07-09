<?php
	require_once 'functions.php';
	connecting_session();
	require_once 'database_connexion.php';

	if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
		$sql = "SELECT * FROM users WHERE mail=?";
		$request = $pdo->prepare($sql);
		$request->execute(array($_POST['mail']));

		$val = $request->fetch();
		if ($val['id'] != NULL && $val['login'] != $_SESSION['login']) {
			echo "Sorry, this email already exist, please choose another one !";
			exit ;
		}
		$sql = "UPDATE users SET mail=? WHERE login=?";
		$request = $pdo->prepare($sql);
		$request->execute(array($_POST['mail'], $_SESSION['login']));
		$_SESSION['mail'] = $_POST['mail'];
	}
	else {
		echo "You need an correct address mail for receive the notif !";
	}

	if (array_key_exists('login', $_POST) && $_POST['login'] != "" && !(strlen($_POST['login']) < 3 || strlen($_POST['login']) > 25)) {
		$sql = "SELECT * FROM users WHERE login=?";
		$request = $pdo->prepare($sql);
		$request->execute(array(htmlspecialchars($_POST['login'])));

		$val = $request->fetch();
		if ($val['id'] != NULL && $val['login'] != $_SESSION['login']) {
			echo "Sorry, this user already exist, please choose another one !";
		} else {
			$sql = "UPDATE users SET login=? WHERE login=?";
			$request = $pdo->prepare($sql);
			$request->execute(array($_POST['login'], $_SESSION['login']));
			$_SESSION['login'] = htmlspecialchars($_POST['login']);
		}
	}
	else {
		echo "Username should be between 3 and 25 characters";
	}

	if ((array_key_exists('old_pwd', $_POST) && $_POST['old_pwd'] != null) || (array_key_exists('new_pwd', $_POST) && $_POST['new_pwd'] != null) || (array_key_exists('checkin_pwd', $_POST) && $_POST['checkin_pwd'] != null)) {
		if (array_key_exists('old_pwd', $_POST) && $_POST['old_pwd'] != null && array_key_exists('new_pwd', $_POST) && $_POST['new_pwd'] != null && array_key_exists('checkin_pwd', $_POST) && $_POST['checkin_pwd'] != null ) {
			$sql = "SELECT * FROM users WHERE login=?";
			$request = $pdo->prepare($sql);
			$request->execute(array($_SESSION['login']));
			$val = $request->fetch();
			$old_pwd = hash("whirlpool", $_POST['old_pwd']);
			$new_pwd = htmlspecialchars($_POST['new_pwd']);
			if ($old_pwd == $val['password']) {
				if ($new_pwd == htmlspecialchars($_POST['checkin_pwd'])) {
					if (!(strlen($new_pwd) < 8 || strlen($new_pwd) > 50) && preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $new_pwd)) {
						$sql = "UPDATE users SET password=? WHERE login=?";
						$request = $pdo->prepare($sql);
						$new_pwd = hash("whirlpool", $new_pwd);
						$request->execute(array($new_pwd, $_SESSION['login']));
						$_SESSION['password'] = $new_pwd;
					} else
						echo "Your new password must be between 8 and 50 characters, contain at least one lowercase, uppercase, special character and a number";
				} else
					echo "Please retype the same new password and confirm password";
			} else
				echo "Your old password is not correct !";
		} else
			echo "You need fill all field password !";
	}
?>