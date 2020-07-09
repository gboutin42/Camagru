<?php 
	require_once 'database_connexion.php';

	if (array_key_exists('login', $_SESSION)) {
		$sql = "SELECT id FROM users WHERE login=?";
		$request = $pdo->prepare($sql);
		$request->execute(array($_SESSION['login']));
		$result =  $request->fetch();

		$sql = "SELECT id_picture AS id, picture_type AS `type` FROM pictures WHERE id_author=?";
		$request = $pdo->prepare($sql);
		$request->execute(array($result['id']));
		$img = $request->fetchAll();
	
		if ($img != NULL) {
			echo "<div id='overlay'></div>\n";
			echo "<aside id='miniature'>\n";
	
			$sql = "SELECT COUNT(id_picture) AS number_pictures FROM pictures WHERE id_author=?";
			$request = $pdo->prepare($sql);
			$request->execute(array($result['id']));
			$number_pictures = $request->fetch();
			for ($i = 0; $i < $number_pictures['number_pictures']; $i++) {
				$id = $img[$i]['id'];
				echo "<div>
						<a href='functions/shows_pictures.php?id=".$id."' name='original-picture'>
							<img id='".$img[$i]['type']."/".$id."' name='".$img[$i]['type']."/".$id."' alt='image".$id."' title='image".$id."' src='functions/shows_pictures.php?id=".$id."' class='miniature'>
						</a>
							<img id='".$id."'name='redcross' src='img/delete.png' alt='redcross' title='redcross' class='icon' value='".$id."'>
					</div>\n";
			}
			echo "</aside>\n
			<script type='text/javascript' src='js/delete_picture.js'></script>";
		}
	}
?>