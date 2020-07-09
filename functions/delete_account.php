<?php
	require_once 'functions.php';
	connecting_session();
	require_once 'database_connexion.php';

	if (array_key_exists('login', $_SESSION)) {
		$sql = "SELECT * FROM users WHERE login=?";
		$request = $pdo->prepare($sql);
		$request->execute(array(htmlspecialchars($_SESSION['login'])));
		$val = $request->fetch();
	
		if ($val != null) {
			$sql = "DELETE FROM users WHERE id=?;
					DELETE FROM pictures WHERE id_author=?;
					DELETE FROM comments WHERE id_author=?;
					DELETE FROM likes WHERE id_author=?";
			$request = $pdo->prepare($sql);
			$request->execute(array($val['id'], $val['id'], $val['id'], $val['id']));
			session_destroy();
			header("Location: ../delete_account_done.php");
			exit ; 
		}
	}
?>