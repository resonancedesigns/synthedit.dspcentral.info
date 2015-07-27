<?php
error_reporting(E_ALL & ~E_NOTICE);
require_once ('../app/core/init.php');

$user = new User();

if(!$user->isLoggedIn()) {
	Redirect::to('index.php');
}

if(Input::exists()) {
	if(Token::check(Input::get('token'))) {
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'name' => array(
				'required' => true,
				'min' => 2,
				'max' => 50
			),
			'email' => array(
				'required' => true,
				'min' => 6,
				'max' => 128
			)
		));
		if($validation->passed()) {
			try {
				$user->update(array(
					'name' => Input::get('name'),
					'email' => Input::get('email'),
					'bio' => Input::get('bio')
				));
				Session::flash('home', 'Your details have been updated.');
				Redirect::to('index.php');
			} catch(Exception $e) {
				die($e->getMessage());
			}
		} else {
			foreach($validation->errors() as $error) {
				echo $error, '<br>';
			}
		}
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
       	<div id="update">
       		<?php 
       		include_once INC_ROOT . '/includes/layout/signed_in_nav.static.php';
       		include_once INC_ROOT . '/includes/content/general/update_profile.php';
       		include_once INC_ROOT . '/includes/layout/footer.php';
       		?>
	    </div>
        <!-- Load libraries -->
        <?php include_once INC_ROOT . '/includes/content/data/javascripts.php'; ?>
	</body>
</html>