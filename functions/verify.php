<?php
	function verify($token) {
		require 'database_connexion.php';
		$sql = "SELECT id FROM users WHERE token=?";
		$request = $pdo->prepare($sql);
		$request->execute(array($token));
		
		$val = $request->fetch();
		if ($val == NULL) {
			return (-1);
		}
		$request->closeCursor();
		
		$sql = "UPDATE users SET validate_account=1 WHERE id=?";
		$request = $pdo->prepare($sql);
		$request->execute(array($val['id']));
		$request->closeCursor();
		return (0);
	}
?>