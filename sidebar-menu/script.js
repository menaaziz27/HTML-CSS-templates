const toggleBtn = document.getElementById('toggle-btn');

function toggleMenu() {
	document.getElementById('sidebar').classList.toggle('active');
}

toggleBtn.addEventListener('click', toggleMenu);
