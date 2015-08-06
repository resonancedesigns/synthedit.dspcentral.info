<?php
require_once '../app/core/init.php';
if(!$file = Input::get('file')) {
    Redirect::to('index.php');
} else {
    $file = new File($id);
    if(!$file->exists()) {
        Redirect::to('index.php');
    } else {
        $user = new User();
        $data = $user->data();
        $file = new File();
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
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
       	<div id="profile">
       		<?php 
            // User is logged in to the system
            if($user->isLoggedIn()) {        
                // If user is signed in, display the following HTML -->
                include_once INC_ROOT . '/includes/layout/signed_in_nav.static.php';
            } else { 
                // If user is not signed in, display the following HTML
                include_once INC_ROOT . '/includes/layout/signed_out_nav.static.php';
            }
            include_once INC_ROOT . '/includes/content/general/resource.php';
	        include_once INC_ROOT . '/includes/layout/footer.php';
            ?>
	    </div>
        <!-- Load libraries -->
        <?php include_once INC_ROOT . '/includes/content/data/javascripts.php'; ?>
	</body>
</html>