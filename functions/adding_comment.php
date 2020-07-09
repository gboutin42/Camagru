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

		if (array_key_exists('id_picture', $_POST) && array_key_exists('textarea', $_POST)) {
			$id_picture = $_POST['id_picture'];
			$textarea = htmlspecialchars($_POST['textarea']);
			$sql = "INSERT INTO comments (id_author, comment, id_picture) VALUES (?, ?, ?)";
			$request = $pdo->prepare($sql);
			$request->execute(array($id_author, $textarea, $id_picture));

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
					if ($result['notif_comments'] == 1)
						send_mail_comment($result['mail'], $result['login']);
				}
			}
			$sql = "SELECT `id_author`, `comment`, `time_comment` FROM `comments` WHERE 1 ORDER BY `time_comment` DESC";
			$request = $pdo->prepare($sql);
			$request->execute();
			$result = $request->fetchAll();

			if ($result != NULL) {
				$sql = "SELECT login FROM users WHERE id=?";
				$request = $pdo->prepare($sql);
				$request->execute(array($result[0]['id_author']));
				$comment_author = $request->fetch();

				echo 	"<div class='author-time'>
							<span>".$comment_author['login']."</span>
							<span>".$result[0]['time_comment']."</span>
						</div>
						<span>".$result[0]['comment']."</span>";
			}
		}
	}
?>