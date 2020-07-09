<?php
	require_once 'functions' . DIRECTORY_SEPARATOR . 'functions.php';
	connecting_session();
	$title = "Page d'accueil";
	require_once 'elements' . DIRECTORY_SEPARATOR . 'header.php';
	require_once 'functions' . DIRECTORY_SEPARATOR . 'database_connexion.php';

	$sql = "SELECT id_picture, id_author, picture_type, time_post_picture, love
			FROM pictures ORDER BY time_post_picture";
	$request = $pdo->prepare($sql);
	$request->execute();
	$img = $request->fetchAll();
	
	if ($img != NULL) {
		echo "<div class='img_galery' >";
		$sql = "SELECT COUNT(id_picture) AS number_pictures FROM pictures";
		$request = $pdo->prepare($sql);
		$request->execute();
		$number_pictures = $request->fetch();

		for ($i = 0; $i < $number_pictures['number_pictures']; $i++) {
			$id = $img[$i]['id_picture'];
			$sql = "SELECT comment, time_comment, id_author FROM comments WHERE id_picture=? ORDER BY time_comment DESC";
			$request = $pdo->prepare($sql);
			$request->execute(array($id));
			$comments = $request->fetchAll();

			$sql = "SELECT login FROM users WHERE id=?";
			$request = $pdo->prepare($sql);
			$request->execute(array($img[$i]['id_author']));
			$author = $request->fetch();

			echo "<div id='picture".$id."' name='picture' >
						<a href='show_comments.php?id=".$id."' >
							<img id='".$id."' name='".$img[$i]['picture_type']."/".$id."' alt='image".$id."' title='image".$id."' src='functions/shows_pictures.php?id=" . $id . "' class='img_size' ><br>
						</a>
						<p>".$author['login']." ".$img[$i]['time_post_picture'];
					if (array_key_exists('login', $_SESSION)) {
						echo "<span>	
								<img id='".$id."' name='like' src='img/like.png' alt='like' title='like' class='icon_index'>
								<span id='like".$id."'>".$img[$i]['love']."</span>
								<img id='".$id."' name='comment' src='img/comment.png' alt='comment' title='comment' class='icon_index'>
								<div id='box-comments".$id."' class='no-display'>
									<textarea id='text".$id."' name='text' rows='3' cols='40' autofocus placeholder='Write here your comments...'></textarea>
									<img id='send".$id."' src='img/send_comment.png' class='icon_index'/>
								</div>
							</span>";
					}
					if ($comments != NULL) {
						$sql = "SELECT login FROM users WHERE id=?";
						$request = $pdo->prepare($sql);
						$request->execute(array($comments[0]['id_author']));
						$comment_author = $request->fetch();
						echo "<div id='last-comment".$id."' class='last-comment'>
								<div class='author-time'>
									<span>".$comment_author['login']."</span>
									<span>".$comments[0]['time_comment']."</span>
								</div>
								<span>".$comments[0]['comment']."</span>
							</div>";
					}
				echo	"</div>";
			}
		echo "</div>";
	} else {
		echo "<div class='no-galery' >NO pictures in the Galery .</div>";
	}
	if (array_key_exists('login', $_SESSION)) {
?>

	<script type='text/javascript' src='js/like_comments.js'></script>
<?php } require 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>