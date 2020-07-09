<?php
	require_once 'functions' . DIRECTORY_SEPARATOR . 'functions.php';
	connecting_session();
	if (!array_key_exists('login', $_SESSION))
		header('location: index.php');
	$title = "Upload Pictures";
	require_once 'elements' . DIRECTORY_SEPARATOR . 'header.php';
?>

<section>
	<form enctype="multipart/form-data" action="functions/post_picture.php" method="POST">
		<div>
			<p id='start'>Start by select an emoji ;)</p>
			<strong id="error_alert" class="error text"><?php display_error(); ?></strong>
		</div>
		<div class="select_emoji">
			<div>
				<input id="frame1" type="radio" name="emoji" value="./img/frame1.png">
				<label for="frame1"><img src="img/frame1.png" name="frame1" title="frame1" alt="frame1 emoji" class="emoji" ></label>
			</div>
			<div>
				<input id="frame2" type="radio" name="emoji" value="./img/frame2.png">
				<label for="frame2"><img src="img/frame2.png" name="frame2" title="frame2" alt="frame2 emoji" class="emoji"></label>
			</div>
			<div>
				<input id="frame3" type="radio" name="emoji" value="./img/frame3.png">
				<label for="frame3"><img src="img/frame3.png" name="frame3" title="frame3" alt="frame3 emoji" class="emoji"></label>
			</div>
		</div>	
		<div id="truc">
			<video id="cam_video">webcam here</video>
			<img id="insert_emoji" name="insert_emoji" src="" class="emoji" style="display:none;border-radius:1em;" ></img> 
			<canvas id="canvas" name="canvas" src=""></canvas>
			<input type="hidden" id="pingu" name="pingu" value="">
		</div>
			<img id="capture" src="img/camera.png" title="take a picture" alt="take a picture" style="display: none;"></img>
		<div>
			<input id="inputfile" type="file" name="upload" accept="image/*" onchange="handleFiles(this.files)" style="display: none;">
		</div>
		<button id="send_picture" name="send_picture" type="submit" style="display: none;">Send the pictures mounting !</button>
	</form>
	<?php require_once 'functions' . DIRECTORY_SEPARATOR . 'miniatures.php'; ?>
</section>


<script type="text/javascript" src="js/webcam.js"></script>
<script type="text/javascript" src="js/miniature.js"></script>
<script type="text/javascript" src="js/send_pictures.js"></script>

<?php require_once 'elements' . DIRECTORY_SEPARATOR . 'footer.php'; ?>