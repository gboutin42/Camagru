<?php
	function is_connected(): bool {
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}
		return (!empty($_SESSION['log']));
	}

	function redirect_if_not_connected(): void {
		if (!is_connected()) {
			header('Location: log_in.php');
			exit();
		}
	}

	function your_name_is(): string {
		if (isset($_SESSION['login']) && $_SESSION['log'] === 1): {
			return ($_SESSION['login']);
		}
		endif ;
	}

	function log_in(): void {
		require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'database.php';

		try {
			$pdo = new PDO($DB_DSN, $DB_USER, $DB_PWD);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $error) {
			die("Error query " . $error->getMessage());
		}
		$_SESSION['error'] = null;
		if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
			$request = $pdo->prepare('SELECT * FROM users WHERE login= ?');
			$request->execute(array($_POST['username']));
			$data_user = $request->fetch();
			if ($data_user['login'] === $_POST['username'] && $data_user['password'] === $_POST['pwd'] && $data_user['validate_account'] != 0) {
				session_start();
				$_SESSION['log'] = 1;
				$_SESSION['login'] = $_POST['username'];
				$_SESSION['password'] = $_POST['pwd'];
				$request->closeCursor();
				header('Location: index.php');
				exit();
			} else {
				$_SESSION['error'] = "Identifiants incorrect";
				$request->closeCursor();
			}
		}
	}
?>