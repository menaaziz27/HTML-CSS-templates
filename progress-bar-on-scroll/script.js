const PROGRESS_BAR = document.querySelector('#progress-bar');

function onScrollHandler() {
	const { scrollTop, scrollHeight } = document.documentElement;

	const heightPercent = (scrollTop / (scrollHeight - window.innerHeight)) * 100 + '%';

	PROGRESS_BAR.style.setProperty('--progress', heightPercent);
}

document.addEventListener('scroll', onScrollHandler);
