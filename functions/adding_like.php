<?php
	require_once 'functions.php';
	connecting_session();
	require_once "database_connexion.php";
	require_once 'mail.php';


	if (array_key_exists('login', $_SESSION)) {
		$sql = "SELECT id FROM users WHERE login=?";
		$request = $pdo->prepare($sql);
		$request->execute(array(htmlspecialchars($_SESSION['login'])));
		$result = $request->fetch();
		if ($result != NULL)
			$id_author = $result['id'];

		if (array_key_exists('id_picture', $_POST)) {
			$id_picture = $_POST['id_picture'];
			$sql = "SELECT id
					FROM likes
					WHERE id_author=? AND id_picture=?";
			$request = $pdo->prepare($sql);
			$request->execute(array($id_author, $id_picture));

			$result = $request->fetch();
			if ($result != NULL) {
				$sql = "DELETE FROM likes
						WHERE likes.id=?";
				$request = $pdo->prepare($sql);
				$request->execute(array($result['id']));
			} else {
				$sql = "INSERT INTO likes (id_author, id_picture) VALUES (?, ?)";
				$request = $pdo->prepare($sql);
				$request->execute(array($id_author, $id_picture));

				$sql = "SELECT id_author FROM pictures WHERE id_picture=?";
				$request = $pdo->prepare($sql);
				$request->execute(array($id_picture));
				$result = $request->fetch();

				if ($result != NULL) {
					$sql = "SELECT * FROM users WHERE id=?";
					$request = $pdo->prepare($sql);
					$request->execute(array($result['id_author']));
					$result = $request->fetch();
					if ($result != NULL) {
						if ($result['notif_like'] == 1)
							send_mail_like($result['mail'], $result['login']);
					}
				}
			}
			$sql = "SELECT COUNT('id_picture') count_likes FROM likes WHERE id_picture=?";
			$request = $pdo->prepare($sql);
			$request->execute(array($id_picture));
			$result = $request->fetch();

			if ($result != NULL) {
				$sql = "UPDATE pictures SET love=? WHERE id_picture=?";
				$request = $pdo->prepare($sql);
				$request->execute(array($result['count_likes'], $id_picture));
				echo $result['count_likes'];
			}
		}
	}
?>