<?php
// Initialize the application
require_once '../app/core/init.php';
// Initialize the user class to see if they are logged in
$user = new User();
// Check if the user is logged in
if($user->isLoggedIn()) {
    // Send them to the index page if they are
    Redirect::to('index.php');
}
// Create variables to display errors
$loginFailDisplay = '';
$errorMsgsDisplay = '';
// If the form has been submitted
if (Input::exists()) {
    // Check for a session token
	if (Token::check(Input::get('token'))) {
        // If token exists, validate the form values
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username' => array('required' => true),
			'password' => array('required' => true)
		));
        // If validation passes
		if ($validation->passed()) {
            // Create a new, user class
			$user = new User();
            // If user requested to be remembered, create a cookie
			$remember = (Input::get('remember') === 'on') ? true : false;
            // Attempt to find username and matching password in the database
			$login = $user->login(Input::get('username'), Input::get('password'), $remember);
            // If username and password combo exists in database, log the user in
			if($login) {
                // On successful login we direct the user to the home page
				Redirect::to('index.php');
            // If username and password combo does not exist in database
			} else {
                // Format the display for incorrect login error
                $loginFailDisplay .= '<p>Sorry, you entered an invalid username and/or password.</p>';
			}
        // If validation does not pass
		} else {
            // Format the display for the validation errors
            $errorMsgsDisplay .= '<ul class="errorList">';
			foreach ($validation->errors() as $error) {
                $errorMsgsDisplay .= '<li>$error</li>';
			}
            $errorMsgsDisplay .= '</ul>';
		}
	}
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<html class="no-js" lang="en">
    <head>
        <title>SynthEdit @ dspCentral</title>
        <?php include_once INC_ROOT . '/includes/content/meta/main.php' ?>
        <!-- Load CSS -->
        <link rel="stylesheet" href="css/se-dspcentral.css">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
    	<div id="login">
    		<?php 
            include_once INC_ROOT . '/includes/layout/signed_out_nav.static.php';
            include_once INC_ROOT . '/includes/content/forms/sign-in.php';
            include_once INC_ROOT . '/includes/layout/footer.php';
            ?>
    	</div>
        <!-- Load libraries -->
        <?php include_once INC_ROOT . '/includes/content/data/javascripts.php'; ?>
    </body>
</html>