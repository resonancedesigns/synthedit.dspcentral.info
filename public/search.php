<?php
require_once '../app/core/init.php';
$user = new User();
$data = $user->data();

// Search
if(isset($_GET['s'])) {
	// Instantiate a new instancce of the search class
	$search = new Search();

	// Store search term into a variable
	$searchTerm = $_GET['s'];

	// Send the search term to the Search class and store the result
	$searchResults = $search->search($searchTerm);
} else {
	$searchEmpty = "You did not enter a search term.";
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
        <div id="search">
	        <?php
	        // User is logged in to the system
	        if($user->isLoggedIn()) {        
	            // If user is signed in, display the following HTML -->
	            include_once INC_ROOT . '/includes/layout/signed_in_nav.static.php';
	        } else { 
	            // If user is not signed in, display the following HTML
	            include_once INC_ROOT . '/includes/layout/signed_out_nav.static.php';
	        }
	        include_once INC_ROOT . '/includes/content/general/search.php';
	        include_once INC_ROOT . '/includes/layout/footer.php';
	        ?>
	    </div>
        <!-- Load libraries -->
        <?php include_once INC_ROOT . '/includes/content/data/javascripts.php'; ?>
    </body>
</html>