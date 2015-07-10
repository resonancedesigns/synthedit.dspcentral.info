<?php
// Initialize the application
require_once 'app/core/init.php';
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
        <div id="index">
	        <?php
	        // If user is currently in a session, send them to the home page
	        if(Session::exists('home')) {
	            echo '
	                <div class="container">
	                    <div class="row">
	                        <div id="page-content" class="col-lg-12">'
	                            . Session::flash('home') . 
	                        '</div>
	                    </div>
	                </div>
	            ';
	        }
	        $user = new User();
	        // User is logged in to the system
	        if($user->isLoggedIn()) {        
	            // If user is signed in, display the following HTML -->
	            include_once INC_ROOT . '/includes/layout/signed_in_nav.anim.php';
	        } else { 
	            // If user is not signed in, display the following HTML
	            include_once INC_ROOT . '/includes/layout/signed_out_nav.anim.php';
	        }
	        include_once INC_ROOT . '/includes/content/general/home.php';
	        include_once INC_ROOT . '/includes/layout/footer.php';
	        ?>
	    </div>
        <!-- Load libraries -->
        <?php include_once INC_ROOT . '/includes/content/data/javascripts.php'; ?>
    </body>
</html>