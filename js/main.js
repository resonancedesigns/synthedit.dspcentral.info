$(document).ready(function() {
	$('.logo').on('webkitAnimationEnd', function(e) {
		$(this).addClass('visible');
	});
	$('.logo').on('animationend', function(e) {
		$(this).addClass('visible');
	});

	// Ajax form validation
    // Username
    $('#uname_status').load('app/functions/check.php').show();
    $('#username_input').keyup(function () {
        $.post('app/functions/check.php', 
        { username: register_form.username.value }, 
        function (result) {
            $('#uname_status').html(result).show();
        });
    });
    
    // Password
    $('#pw_status').load('app/functions/check.php').show();
    $('#password_input').keyup(function () {
        $.post('app/functions/check.php', 
        { password: register_form.password.value }, 
        function (result) {
            $('#pw_status').html(result).show();
        });
    });
    
    // Fade in error messages
    $('.errorMsg').delay(500).fadeIn(1000);
});

// Display the "terms" content
$('#openTerms').click(function () {
    $('#termsContent').css('display', 'block');
});

// To top button animation
$(window).scroll(function () {
    if ($(this).scrollTop()) {
        $('#toTop').fadeIn();
    } else {
        $('#toTop').fadeOut();
    }
});

$("#toTop").click(function () {
    $("html, body").animate({scrollTop: 0}, 1000);
});