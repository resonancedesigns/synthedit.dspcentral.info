<?php
// Initialize the application
require_once 'app/core/init.php';
$user = new User();
$data = $user->data();
$misc = new File();
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<html class="no-js" lang="en">
    <head>
        <title>SynthEdit @ dspCentral - Misc</title>
        <?php include_once INC_ROOT . '/includes/content/meta/main.php' ?>
        <!-- Load CSS -->
        <link rel="stylesheet" href="css/se-dspcentral.css">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script>
            function _(el) {
                return document.getElementById(el);
            }
        </script>
    </head>
    <body>
        <div id="misc">
            <?php
            if($user->isLoggedIn()) {
                // If user is signed in, display the following HTML -->
                include_once INC_ROOT . '/includes/layout/signed_in_nav.static.php';
            } else { 
                // If user is not signed in, display the following HTML
                include_once INC_ROOT . '/includes/layout/signed_out_nav.static.php';
            } 
            ?>
            <?php include_once INC_ROOT . '/includes/content/general/misc.php'; ?>
            <?php include_once INC_ROOT . '/includes/layout/footer.php'; ?>
        </div>
        <!-- Load libraries -->
        <?php include_once INC_ROOT . '/includes/content/data/javascripts.php'; ?>
    </body>
</html>