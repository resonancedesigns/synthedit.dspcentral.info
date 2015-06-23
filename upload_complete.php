<?php
require_once 'app/core/init.php';

$user = new User($username);
	if(!$user->exists()) {
		Redirect::to(404);
	} else {
		$data = $user->data();
	}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="ico/favicon.ico">

        <title>Member System - Profile</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Customized styling -->
        <link href="css/stylized.css" rel="stylesheet">
    </head>
    <body>
       	<div id="update">
       		<?php include_once 'includes/layout/signed_in_nav.php'; ?>
	        <div class="container-fluid contentArea">
	            <div class="row-fluid">
	            	<div class="col-lg-12">
	                    <h2 class="members-headers">Upload Complete<small>Your file has been uloaded to the server... .. .</small></h2>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div id="update-footer">
		    <div class='navbar-wrapper'>
		        <div class='container-fluid'>
		            <div id='main-nav' class='navbar-fluid navbar-inverse navbar-fixed-bottom' role='navigation'>
		                <div class='container-fluid'>
		                    <div class='navbar-header'>
		                        <div id='logoText'>Member<span class='logoText-smaller'>System</span></div>
		                    </div>
		                    <div class="txt-vert-cntr">
		                        <div class="pull-right"><a href="#">Back to top</a></div>
		                        <div class="pull-right copyright">&copy; 2014 Resonance Design</div>
		                    </div>
		                    <div class='navbar-collapse collapse'>
		                        <ul class='nav navbar-nav'>
		                            <li class="profile-footer"><a href="profile.php?user=<?php echo escape($user->data()->username); ?>">Profile</a></li>
				                    <li class="update-footer"><a href="update.php">Update</a></li>
				                    <li class="userpass-footer"><a href="userpass.php">Change password</a></li>
				                    <li class="logout-footer"><a href="logout.php">Log out</a></li>
		                        </ul>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
        <!-- Load libraries -->
        <script src="libs/jquery-1.11.1.min.js"></script>
        <script src="libs/bootstrap.min.js"></script>

        <!-- Load scripts -->
        <script src="scripts/main.js"></script>
        <!-- TODO: Get the ajaxify and bootstrap tabs to get along -->
		<script src="scripts/jquery-scrollto.js"></script>
		<script src="scripts/jquery.history.js"></script>
		<script src="scripts/ajaxify-html5.js"></script>
	</body>
</html>