<?php
	if (array_key_exists('id', $_POST)) {
		require_once 'database_connexion.php';
		$sql = "SELECT id_picture AS id FROM pictures WHERE id_picture=?";
		$request = $pdo->prepare($sql);
		$request->execute(array($_POST['id']));
		$val = $request->fetch();
		if ($val != null) {
			$sql = "DELETE FROM pictures WHERE id_picture=?;
					DELETE FROM comments WHERE id_picture=?;
					DELETE FROM likes WHERE id_picture=?";
			$request = $pdo->prepare($sql);
			$request->execute(array($val['id'],$val['id'],$val['id']));
			echo "suppression effectuer";
			exit ; 
		}
	}
?>