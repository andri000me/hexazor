(function(){
	document.body.appendChild(document.getElementById('debugger-bs'));

	for (var i = 0, styles = []; i < document.styleSheets.length; i++) {
		var style = document.styleSheets[i];
		if (!style.ownerNode.classList.contains('debugger-debug')) {
			style.oldDisabled = style.disabled;
			style.disabled = true;
			styles.push(style);
		}
	}

	document.getElementById('debugger-bs-toggle').addEventListener('click', function() {
		var collapsed = this.classList.contains('debugger-collapsed');
		for (i = 0; i < styles.length; i++) {
			styles[i].disabled = collapsed ? true : styles[i].oldDisabled;
		}
	});

	document.addEventListener('keyup', function(e) {
		if (e.keyCode === 27 && !e.shiftKey && !e.altKey && !e.ctrlKey && !e.metaKey) { // ESC
			document.getElementById('debugger-bs-toggle').click();
		}
	});
})();
