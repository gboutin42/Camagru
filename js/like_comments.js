var length = document.getElementsByName('picture').length,
	likes = document.getElementsByName('like'),
	comments = document.getElementsByName('comment');

for (var i = 0; i < length; i++) {
	likes[i].addEventListener('click', function(e) {
		e.preventDefault();
		sendEventLike(this.id);
	}, false);
}

function sendEventLike(id_picture) {
	var url = window.location.href.replace(/index/, 'functions/adding_like'),
		xhr = new XMLHttpRequest(),
		form = new FormData();

	form.append('id_picture', id_picture);
	xhr.open('POST', url);
	xhr.addEventListener('readystatechange', function(e) {
		e.preventDefault();
		if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
			var result = xhr.responseText;
			if (result != "") {
				document.getElementById(`like${id_picture}`).innerHTML = result;
			} else {
				alert('A problème has occurred please try again.\nIf the problem persists, contact the technical support !');
			}
		}
	}, false);
	xhr.send(form);
}

for (var i = 0; i < length; i++) {
	comments[i].addEventListener('click', function(e) {
		e.preventDefault();
		var id = this.id;
		var zoneText = document.getElementById(`box-comments${id}`);
		zoneText.classList.add('display-textarea');
		var text = document.getElementById(`text${id}`);
		text.focus();
		document.getElementById(`send${id}`).addEventListener('click', function(e) {
			e.preventDefault();
			zoneText.classList.remove('display-textarea');
			if (text.value != ""){
				sendEventComments(id, text.value);
			}
		}, {once: true});
	}, false);
}

function sendEventComments(id_picture, textarea) {
	var url = window.location.href.replace(/index/, 'functions/adding_comment'),
		xhr = new XMLHttpRequest(),
		form = new FormData();

	form.append('id_picture', id_picture);
	form.append('textarea', textarea);
	xhr.open('POST', url);
	xhr.addEventListener('readystatechange', function(e) {
		e.preventDefault();
		if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
			var result = xhr.responseText;
			if (result != "") {
				var lastComment = document.getElementById(`last-comment${id_picture}`);
				if (lastComment) {
					lastComment.innerHTML = result;
				} else {
					lastComment = document.createElement("div");
					lastComment.classList.add('last-comment'),
					lastComment.id = `last-comment${id_picture}`;
					lastComment.innerHTML = result;
					document.getElementById(`picture${id_picture}`).appendChild(lastComment);
				}
			} else {
				alert('A problème has occurred please try again.\nIf the problem persists, contact the technical support !');
			}
		}
	}, false);
	xhr.send(form);
}