<?php
	require_once 'functions' . DIRECTORY_SEPARATOR . 'functions.php';
	connecting_session();
	if (!array_key_exists('login', $_SESSION))
		header('location: index.php');
	require_once 'elements' . DIRECTORY_SEPARATOR . 'header.php';
	require_once 'functions' . DIRECTORY_SEPARATOR . 'database_connexion.php';

	if (array_key_exists('id', $_GET)) {
		$id = $_GET['id'];
		$sql = "SELECT * FROM pictures WHERE id_picture=?";
		$request = $pdo->prepare($sql);
		$request->execute(array($id));
		$result = $request->fetch();

		$sql = "SELECT login FROM users WHERE id=?";
		$request = $pdo->prepare($sql);
		$request->execute(array($result['id_author']));
		$author_picture = $request->fetch();

		if ($result != NULL) {
			echo "<section class='full-comments'>
					<div class='img_galery' style='display:grid' >
						<img name='".$result['picture_type']."/".$id."' alt='image".$id."' title='image".$id."' src='functions/shows_pictures.php?id=" . $id . "' class='img_size'>
						<p>".$author_picture['login']." ".$result['time_post_picture']."
					</div>";
			
			$sql = "SELECT * FROM comments WHERE id_picture=?";
			$request = $pdo->prepare($sql);
			$request->execute(array($id));
			$result = $request->fetchAll();

			if ($result != NULL) {
				echo	"<aside style='width: 23em'>";
				$sql = "SELECT COUNT(comment) as number_comments FROM comments WHERE id_picture=?";
				$request = $pdo->prepare($sql);
				$request->execute(array($id));
				$number = $request->fetch();
				
				for ($i = 0; $i < $number['number_comments']; $i++) {
					$sql = "SELECT login FROM users WHERE id=?";
					$request = $pdo->prepare($sql);
					$request->execute(array($result[$i]['id_author']));
					$author_comment = $request->fetch();
					echo "<div class='last-comment'>
							<div class='author-time'>
								<span>".$author_comment['login']."</span>
								<span>".$result[$i]['time_comment']."</span>
							</div>
							<span>".$result[$i]['comment']."</span>
						</div>";
				}
				echo "</aside>";
			}
			echo "</section>";
		}
	}
?>

<?php require_once 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>