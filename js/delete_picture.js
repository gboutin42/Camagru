var img = document.getElementsByName('redcross'),
	imgLength = img.length;

for (var i = 0; i < imgLength; i++) {
	img[i].addEventListener('click', function(e) {
		var idElement = this.getAttribute('id'),
			url = window.location.href.replace(/upload_pictures/, 'functions\/delete_pictures'),
			xhr = new XMLHttpRequest(),
			form = new FormData();

		form.append('id', idElement);
		xhr.open('POST', url);
		xhr.addEventListener('readystatechange', function(e) {
			if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
				var result = xhr.responseText;
				if (result) {
					document.getElementById(idElement).parentNode.remove();;
				} else {
					alert("Failed to delete picture.");
				}
			}
		}, false);
		xhr.send(form);
	}, false);
}