<?php
error_reporting(E_ALL & ~E_NOTICE);
require_once 'app/core/init.php';

$user = new User($username);
	if(!$user->exists()) {
		Redirect::to(404);
	} else {
		$data = $user->data();
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
       	<div id="update">
       		<?php include_once INC_ROOT . '/includes/layout/signed_in_nav.anim.php'; ?>
	        <div id="content-swapper" class="container-fluid">
	            <div class="row-fluid">
	            	<div class="col-lg-12">
	                    <h2 class="members-headers">Upload Complete<small>Your profile picture has been updated... .. .</small></h2>
	                    <img src="users/<?php echo escape($data->username) ?>/imgs/<?php echo escape($data->profile_pic) ?>">
	                </div>
	            </div>
	        </div>
	        <?php include_once INC_ROOT . '/includes/layout/signed_in_footer.anim.php'; ?>
	    </div>
        <!-- Load libraries -->
        <?php include_once INC_ROOT . '/includes/content/data/javascripts.php'; ?>
	</body>
</html>