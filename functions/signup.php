<?php
	require_once 'functions.php';
	connecting_session();
	function signup($username, $email, $password, $url): void {
		require_once 'mail.php';
		require_once 'database_connexion.php';

		$email = strtolower(htmlspecialchars($email));
		$sql = "SELECT id FROM users WHERE login=? OR mail=?";
		$request = $pdo->prepare($sql);
		$request->execute(array($username, $email));
		
		$val = $request->fetch();
		if ($val == NULL) {
			$password = hash('whirlpool', $password);
			$token = uniqid(rand(), true);
			$sql = "INSERT INTO users (login, mail, password, token) VALUES (?, ?, ?, ?)";
			$request = $pdo->prepare($sql);
			$request->execute(array($username, $email, $password, $token));
			send_mail_verify_account($email, $username, $token, $url);
			$request->closeCursor();
		}
		else {
			$_SESSION['error'] = "Sorry, this user or email already exist, please choose another one !";
			header("Location: ../sign_up.php");
			exit ;
		}
		return ;
	}
	
	$username = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$check_password = htmlspecialchars($_POST['confirm_password']);

	if ($email === null || $username === null || $password === null || $check_password === null
		|| $email === "" || $username === "" || $password === "" || $check_password === "") {
		$_SESSION['error'] = "You need to fill all fields";
		header("Location: ../sign_up.php");
		return ;
	}

	if (strlen($username) < 3 || strlen($username) > 25) {
		$_SESSION['error'] = "Username should be between 3 and 25 characters";
		header("Location: ../sign_up.php");
		return ;
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['error'] = "You need a valid email";
		header("Location: ../sign_up.php");
		return ;
	}
	
	if (strlen($password) < 8 || strlen($password) > 50) {
		$_SESSION['error'] = "Your password must be between 8 and 50 characters";
		header("Location: ../sign_up.php");
		return ;
	}
	if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password)) {
		$_SESSION['error'] = "Your password must contain at least one special character, lowercase, uppercase and a number";
		header("Location: ../sign_up.php");
		return ;
	}

	if ($check_password != $password) {
		$_SESSION['error'] = "Retype the same password please !";
		header("Location: ../sign_up.php");
		return ;
	}
	$url = $_SERVER['HTTP_HOST'] . str_replace("/functions/signup.php", "", $_SERVER['REQUEST_URI']);
	signup($username, $email, $password, $url);
	$_SESSION['succes_connection'] = "For complete this inscription, thanks to validate it in your mailbox";
	header("Location: ../sign_up.php");
?>