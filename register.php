<?php
require_once 'app/core/init.php';
// Initialize the user class to see if they are logged in
$user = new User();
// Check if the user is signed in and direct them to the home page if they are
if($user->isLoggedIn()) {
    Redirect::to('index.php');
}
// Create variables for backup error msgs if ajax functionality fails
$registeredDisplay = "";
$errorMsgsDisplay = "";
// Check if the form was submitted
if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        // Run form validation to check for errors
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array(
                'required' => true,
                'min' => 5,
                'max' => 20,
                'unique' => 'users'
            ),
            'password' => array(
                'required' => true,
                'min' => 8
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),
            'name' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'email' => array(
                'required' => true,
                'max' => 128
            ),
            'country' => array(
            	'required' => true
            ),
            'terms' => array(
            	'required' => true
            )
        ));
        // If form validation finds no errors, create the new user
        if($validation->passed()) {
            $user = new User();
            $salt = Hash::salt(32);
            try {
                $user->create(array(
                    'username' => Input::get('username'),
                    'password' => Hash::make(Input::get('password'), $salt),
                    'salt' => $salt,
                    'name' => Input::get('name'),
                    'email' => Input::get('email'),
                    'country' => Input::get('country'),
                    'joined' => date('Y-m-d H:i:s'),
                    'group' => 1
                ));
                $registeredDisplay .= 'You have been successfully registered. You may now <a href="sign-in.php">log in</a>.';
            } catch(Exception $e) {
                die($e->getMessage());
            }

            // Create user diretory and subdirectories
            $newDir = new NewDir('users/' . Input::get('username'));
            $newDir->createImageDirectory();
            $newDir->createThumbDirectory();
            // Copy default profile pic to new user imgs directory
            $fileOrig = 'users/default/imgs/default.png';
            $fileCopy = 'users/' . Input::get('username') . '/imgs/default.png';
            copy($fileOrig, $fileCopy);

            // Send an email to the new user informing them account creation was successful
            smtpmailer(
                // Users email address
                Input::get('email'),
                // Copy of email is sent to
                'dspcentral.info@gmail.com',
                // Email address send from 
                'dspcentral.info@gmail.com',
                // Name sent from
                'dspCentral',
                // Email subject
                'You have successfully registered with dspCentral.info',
                // Email body
                "<h1>Hello " . Input::get('name') . "!</h1>
                <p>You have successfully registered with <a href='http://www.dspcentral.info'>dspCentral.info</a> via it's <a href='http://synthedit.dspcentral.info'>SynthEdit Portal</a>.</p>
                <p>You can <a href='http://synthedit.dspcentral.info/sign-in.php'>sign in</a> at any time</p>"
            );
        // If form validation finds errors, display those errors to the guest
        } else {
            $errorMsgsDisplay .= "<ul id='errorList' class='errorList'>";
            foreach ($validation->errors() as $error) {
            	include INC_ROOT . '/includes/language/errors.php';
                $errorMsgsDisplay .= "<li class='errors'>$error</li>";
            }
            $errorMsgsDisplay .= "</ul>";
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
        <div id="register">
        	<?php include_once INC_ROOT . '/includes/layout/signed_out_nav.anim.php'; ?>
	        <?php include_once INC_ROOT . '/includes/content/general/user_register.php'; ?>
	        <?php include_once INC_ROOT . '/includes/layout/signed_out_footer.anim.php'; ?>
	    </div>
        <!-- Load libraries -->
        <?php include_once INC_ROOT . '/includes/content/data/javascripts.php'; ?>
    </body>
</html>