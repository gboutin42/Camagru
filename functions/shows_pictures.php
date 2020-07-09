<?php
	require_once 'functions.php';
	connecting_session();
	if (array_key_exists('id', $_GET)) {
    	$id = intval($_GET['id']);
		require_once 'database_connexion.php';
		$sql = "SELECT picture_blob, picture_type AS `type` FROM pictures WHERE id_picture=?";
		$request = $pdo->prepare($sql);
		$request->execute(array($id));
		$picture = $request->fetch();
		if ($picture == NULL) {
			$_SESSION['error'] = "ID=" . $id . "unknown";
			exit;
		} else {
			header("Content-Type: " . $picture['type']);
			$image = imagecreatefromstring($picture['picture_blob']);
			if ($image) {
				imagepng($image);
			}
		}
	}

?>