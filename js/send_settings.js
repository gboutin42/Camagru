var send = document.querySelector('#submit_settings'),
	notifLike = document.querySelector('#notif_like'),
	notifComments = document.querySelector('#notif_comments');

notifLike.addEventListener('click', function(e) {
	changeStateNotif(this, "notif_like");
}, false);

notifComments.addEventListener('click', function(e) {
	changeStateNotif(this, "notif_comments");
}, false);

function changeStateNotif(element, key) {
	var notif,
		url = window.location.href.replace(/settings/, 'functions\/notif'),
		xhr = new XMLHttpRequest(),
		form = new FormData();
		
	if (element.value == 1) {
		notif = "";
		element.value = 0;
	} else {
		notif = 1;
		element.value = 1;
	}
	xhr.open('POST', url);
	form.append(key, notif);
	xhr.send(form);
}

send.addEventListener('click', function(e) {
	e.preventDefault();
	sendSettings();
}, );

send.addEventListener('keyup', function(e) {
	e.preventDefault();
	if (e.keyCode == 13) {
		sendSettings();
	}
}, );

function sendSettings() {
	var url = window.location.href.replace(/settings/, 'functions\/modify_settings'),
		login = document.querySelector('#login').value,
		xhr = new XMLHttpRequest(),
		form = new FormData();

	var old_pwd = document.querySelector('#old_pwd').value,
		new_pwd = document.querySelector('#new_pwd').value,
		checkin_pwd = document.querySelector('#checkin_pwd').value;

	xhr.open('POST', url);
	xhr.addEventListener('readystatechange', function() {
		if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
			var result = xhr.responseText;
			if (result != "") {
				document.querySelector('#error').innerHTML = result;
			} else {
				location.reload(true);
			}
		}
	}, false);
	form.append("mail", document.querySelector('#mail').value);
	form.append("login", login);
	form.append("old_pwd", old_pwd);
	form.append("new_pwd", new_pwd);
	form.append("checkin_pwd", checkin_pwd);
	xhr.send(form);
}