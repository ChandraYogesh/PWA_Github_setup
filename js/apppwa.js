// Initialize deferredPrompt for use later to show browser install prompt.
let deferredPrompt;
console.log('window listener')
window.addEventListener('beforeinstallprompt', (e) => {
	e.preventDefault();
	deferredPrompt = e;
	// showInstallPromotion();
	console.log(`'beforeinstallprompt' event was fired.`);
});
window.onload=function(){
	var el = document.getElementById('installApp');
	if(el) {
const btnAdd = document.getElementById("installApp");
	btnAdd.addEventListener('click', (e) => {
		// hide our user interface that shows our A2HS button
		// btnAdd.style.display = 'none';
		// Show the prompt
		console.log(deferredPrompt)
		deferredPrompt.prompt();
		// Wait for the user to respond to the prompt
		deferredPrompt.userChoice
			.then((choiceResult) => {
				if (choiceResult.outcome === 'accepted') {
					console.log('User accepted the A2HS prompt');
				} else {
					console.log('User dismissed the A2HS prompt');
				}
				deferredPrompt = null;
			});
	});
}
}	