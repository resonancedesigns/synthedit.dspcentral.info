<?php
require_once '../app/core/init.php';
if(!$username = Input::get('user')) {
	Redirect::to('index.php');
} else {
	$user = new User($username);
	if(!$user->exists()) {
		Redirect::to(404);
	} else {
		$data = $user->data();
	}
}
?>
<html>
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
        <?php
        // Create the inline styling for the custom profile banner. 
    	$userBanner = '
			<style type="text/css">
				.profileBanner {
					background-image: url("users/' . $user->data()->username . '/imgs/' . $user->data()->banner_pic . '");
				}
	        </style>
    	';
    	// Check if the user has uploaded a custom profile banner image.
    	if(!empty($user->data()->banner_pic)) {
    		// If they have, insert the inline styling.
    		echo $userBanner;
    	} 
        ?>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
       	<div id="profile">
       		<?php 
            include_once INC_ROOT . '/includes/layout/signed_in_nav.static.php';
            include_once INC_ROOT . '/includes/content/general/user_profile.php';
	        include_once INC_ROOT . '/includes/layout/footer.php';
            ?>
	    </div>
        <!-- Load libraries -->
        <?php include_once INC_ROOT . '/includes/content/data/javascripts.php'; ?>
	</body>
</html>