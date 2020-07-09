var button = document.querySelector('#send_picture');

button.addEventListener('click', function(e) {
	e.preventDefault();
	var pingu = document.querySelector('#pingu').value,
		xhr = new XMLHttpRequest(),
		url = window.location.href.replace(/upload_pictures/, 'functions\/post_picture'),
		form = new FormData();
		
	form.append('pingu', pingu);
	xhr.open('POST', url);
	xhr.addEventListener('readystatechange', function() {
		if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
			var result = xhr.responseText;
			if (result != "") {
				document.querySelector('#error_alert').innerHTML = result;
			} else {
				document.querySelector('#error_alert').innerHTML = '';
				location.reload(true);
			}
		}
	}, false);
	xhr.send(form);
}, false);