<?php
	require_once 'functions.php';
	connecting_session();
	$ret =	false;
	$img_blob = '';
	$img_size = 0;
	$img_type = '';
	$max_size = 250000;
	$canvas = NULL;
	if (array_key_exists('pingu', $_POST)) {
		$canvas = $_POST['pingu'];
		$ret = $canvas;
	} else {
		echo "Please, select an emoji.";
	}
	if (!$ret) {
		echo "<br>No file to transfert.";
		echo "<br>Please take a picture or download one.";
		exit;
	} else {
		if ($canvas != NULL) {
			$img_blob = @file_get_contents($canvas);
			$img_type = "image/png";
		} elseif ($_FILES != NULL && $_FILES['upload'] != NULL) {
			$img_blob = @file_get_contents($_FILES['upload']['tmp_name']);
			$img_size = $_FILES['upload']['size'];
			if ($img_size > $max_size) {
				echo "the file is bigger";
				exit;
			}
			$img_type = $_FILES['upload']['type'];
		}
	}

	require_once 'database_connexion.php';
	$sql = "SELECT id FROM users WHERE login=?";
	$request = $pdo->prepare($sql);
	$request->execute(array($_SESSION['login']));
	$result = $request->fetch();
	if ($result != NULL) {
		$id_author = $result['id'];
		$sql = "INSERT INTO pictures (id_author, picture_type, picture_blob) VALUES (?, ?, ?)";
		$request = $pdo->prepare($sql);
		$request->execute(array($id_author, $img_type, $img_blob));
	}
?>