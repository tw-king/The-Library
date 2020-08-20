function showHide(id) {
	let e = document.getElementById(id);
	let s = document.getElementById(id+'CTRL');
	if (e.classList.contains('w3-hide')) {
		e.classList.remove('w3-hide');
		s.innerHTML = '<img src="https://img.icons8.com/metro/26/000000/collapse-arrow.png"/>';
	}
	else
	{
		e.classList.add('w3-hide');
		s.innerHTML = '<img src="https://img.icons8.com/metro/26/000000/expand-arrow.png"/>';
	}
}
function hideElement(id) {
	document.getElementById(id).style.display='none';
}