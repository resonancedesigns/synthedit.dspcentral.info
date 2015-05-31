$(document).ready(function() {
	$('.logo').on('webkitAnimationEnd', function(e) {
		$(this).addClass('visible');
	});
	$('.logo').on('animationend', function(e) {
		$(this).addClass('visible');
	});
});