var video			= document.querySelector('#cam_video'),
	canvas			= document.querySelector('#canvas'),
	ctx				= canvas.getContext('2d'),
	capture			= document.querySelector('#capture'),
	frame1			= document.querySelector('#frame1'),
	frame2			= document.querySelector('#frame2'),
	frame3			= document.querySelector('#frame3'),
	insertEmoji		= document.querySelector('#insert_emoji'),
	inputFile		= document.querySelector('#inputfile');

var img				= new Image(),
	streaming		= false,
	height			= 0,
	width			= 140,
	picture			= new Image(),
	constraints		= {video: {width: 200, height: 200}},
	pingu			= document.querySelector('#pingu');

insertEmoji.style.width = "40%";
insertEmoji.style.height = "89%";
insertEmoji.style.top = "5%";
insertEmoji.style.left = "5%";
insertEmoji.style.position = "absolute";

navigator.mediaDevices.getUserMedia(constraints)
		.then( function(mediaStream) {
			video.style.transform = "rotateY(180deg)";
			video.srcObject = mediaStream;
			video.onloadedmetadata = function(e) {
				video.play();
			};
		}).catch( function(error) {
			console.log(error.name + ': ' + error.message);
		});

video.addEventListener('canplay', function() {
	if (!streaming) {
		height = video.videoHeight / (video.videoWidth/width);
		video.width = width;
		video.height = video.videoHeight;
		streaming = true;
	}
}, false);

capture.addEventListener('click', function(ev) {
	if (video) {
		canvas.style.transform = "rotateY(180deg)";
		setPictureData(video, width, height);
		inputFile.value = "";
	} else {
		alert('you need activate your webcam');
	}
}, false);

function emojiChecked() {
	img.src = document.querySelector('input[name="emoji"]:checked').value;
	insertEmoji.src = img.src;
	insertEmoji.style.display = "block";
	inputFile.style = 'no-style';
	document.querySelector('#send_picture').style = 'no-style';
	document.querySelector('#start').style.display = 'none';
	if (streaming == true) {
		capture.style = 'no-style';
	}
}

frame1.addEventListener('click', function(e) {
	emojiChecked();
}, false);

frame2.addEventListener('click', function(e) {
	emojiChecked();
}, false);

frame3.addEventListener('click', function(e) {
	emojiChecked();
}, false);

function handleFiles() {
	canvas.style.transform = "rotateY(0deg)";
	picture.addEventListener('load', function() {
		setPictureData(picture, picture.width, picture.height);
	}, false);
	if (event.target.files[0]) {
		picture.src = URL.createObjectURL(event.target.files[0]);
	}
}

function setPictureData(element, width, height) {
	var alert = document.querySelector('#error_alert');
	
	if (frame1.checked != true && frame2.checked != true && frame3.checked != true) {
		alert.innerHTML = "<strong class='error text'>Please, you must select an emoji " +
						"<br>before download a picture or to take one !</strong>";
		inputFile.value = "";
	} else {
		canvas.width = width;
		canvas.height = height;
		alert.innerHTML = "<strong class='error text'></strong>";
		ctx.clearRect(0, 0, canvas.width, canvas.height);
		ctx.drawImage(element, 0, 0, width, height);
		ctx.drawImage(insertEmoji, 0, 0, canvas.width, canvas.height);
		var data = canvas.toDataURL('image/png');
		canvas.src = data;
		pingu.value = data;
	}
}