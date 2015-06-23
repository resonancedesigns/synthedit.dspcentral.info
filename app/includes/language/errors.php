<?php
/***************/
/* This simply rewrites the default language for the error handler. 
/* Just add an if statement like the ones below and customize the
/* text for that error.
/********/ 
if($error === 'username is required') {
	$error = 'Username is required';
}
if($error === 'password is required') {
	$error = 'Password is required';
}
if($error === 'password_again is required') {
	$error = 'Retype Password is required';
}
if($error === 'name is required') {
	$error = 'Your Name is required';
}
if($error === 'email is required') {
	$error = 'Your Email is required';
}
if($error === 'country is required') {
	$error = 'Your Country is required';
}
if($error === 'terms is required') {
	$error = 'To register you must agree to the <a href="#" id="openTerms">Terms Of Use</a>.';
}
if($error === 'username must be a minimum of 5 characters') {
	$error = 'Username must be a minimum of 5 characters';
}
if($error === 'password must be a minimum of 8 characters') {
	$error = 'Password must be a minimum of 8 characters';
}
if($error === 'name must be a minimum of 2 characters') {
	$error = 'Your Name must be a minimum of 2 characters';
}
if($error === 'username must be a maximum of 20 characters') {
	$error = 'Username must be a maximum of 20 characters';
}
if($error === 'name must be a maximum of 50 characters') {
	$error = 'Your Name must be a maximum of 50 characters';
}
if($error === 'email must be a maximum of 128 characters') {
	$error = 'Your Email must be a maximum of 20 characters';
}
if($error === 'password must match password_again') {
	$error = 'Retype Password must match Password';
}
if($error === 'username already exists') {
	$error = 'Username already exists';
}