/*
 * JavaScript stuff
 */
// Create global element ID catcher: _('elementID')
function _(el) {
    return document.getElementById(el);
}

// Ajax file uploading functions
function uploadFile() {
    var file = _('upload-file').files[0];
    // For testing/debuging, remove when done
    console.log(file.name+' | '+file.size+' | '+file.type);
    var category = _('category').value;
    // For testing/debuging, remove when done
    console.log(category.value);
    var title = _('title').value;
    // For testing/debuging, remove when done
    console.log(title.value);
    var author = _('author').value;
    // For testing/debuging, remove when done
    console.log(author.value);
    var description = _('description').value;
    // For testing/debuging, remove when done
    console.log(description.value);
    var formdata = new FormData();
    formdata.append('upload-file', file);
    formdata.append('category', category);
    formdata.append('title', title);
    formdata.append('author', author);
    formdata.append('description', description);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener('progress', progressHandler, false);
    ajax.addEventListener('load', completeHandler, false);
    ajax.addEventListener('error', errorHandler, false);
    ajax.addEventListener('abort', abortHandler, false);
    ajax.open('POST', '../app/parsers/upload_file.php');
    ajax.send(formdata);
}
function progressHandler(event) {
    _('loaded_n_total').innerHTML = 'Processed '+event.loaded+' of '+event.total+' bytes successfully.';
    var percent = (event.loaded / event.total) * 100;
    _('progressBar').style.width = Math.round(percent)+'%';
    _('status').innerHTML = Math.round(percent)+'% uploaded... please wait';
}
function completeHandler(event) {
    _('status').innerHTML = event.target.responseText;
    _('progressBar').value = 0;
}
function errorHandler(event) {
    _('status').innerHTML = 'Upload Failed';
}
function abortHandler(event) {
    _('status').innerHTML = 'Upload Aborted';
}

// Google Analytics
(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
e=o.createElement(i);r=o.getElementsByTagName(i)[0];
e.src='https://www.google-analytics.com/analytics.js';
r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
ga('create','UA-XXXXX-X','auto');ga('send','pageview');

/* 
 * jQuery Stuff
 */
// Instantiate encapsulated code only when document has been fully loaded
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

    // Hide progress bar
    $('#progress-display').hide();
});

// Display the "terms" content
$('#openTerms').click(function () {
    $('#termsContent').toggle();
});

// Back To Top button animation
$(window).scroll(function () {
    if ($(this).scrollTop()) {
        $('#toTop').fadeIn().css("display","inline-block");
    } else {
        $('#toTop').fadeOut().css("display","inline-block");
    }
});

$('#toTop').click(function () {
    $('html, body').animate({scrollTop: 0}, 1000);
});

// Animations for upload form elements
$('#addBtn').click(function() {
    $(this).slideUp(1000);
    $('#addContainer').animate({
        opacity: 0
    }, 1000).hide(1000);
    $('#uploadForm').slideDown(1000);
});

$('#cancelBtn').click(function() {
    $('#addBtn').slideDown(1000);
    $('#addContainer').show().animate({
        opacity: 1
    }, 1000);
    $('#uploadForm').slideUp(1000);
});

$('#uploadBtn').click(function() {
    $('.hide-me').slideUp(1000);
    $('#progress-display').show();
    $('#upload-frame').animate({
        height: "175px",
        opacity: 1
    }, 5500).slideDown(1000);
});