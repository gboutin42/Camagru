var links = document.getElementsByName('original-picture'),
	linksLen = links.length;

for (var i = 0; i < linksLen; i++) {
	links[i].addEventListener('click', function(e) {
		e.preventDefault();
		displayImg(e.currentTarget);
	});
}

function displayImg(link) {
	var img = new Image(),
		overlay = document.querySelector('#overlay');

	img.addEventListener('load', function(e) {
		overlay.innerHTML = '';
		overlay.appendChild(img);
	},false);
	img.src = link.href;
	overlay.style.display = 'flex';
	overlay.innerHTML = '<span>Chargement en cours...</span>';
}

var overlay = document.getElementById('overlay');
if (overlay) {
	overlay.addEventListener('click', function(e) {
		e.currentTarget.style.display = 'none';
	});
}