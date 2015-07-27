<?php
// Initialize the application
require_once '../app/core/init.php';
$user = new User();
$data = $user->data();
if(!$user->isLoggedIn()) {
    Redirect::to('index.php');
}
if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'existing_password' => array(
                'required' => true,
                'min' => 6
            ),
            'new_password' => array(
                'required' => true,
                'min' => 6
            ),
            'new_password_again' => array(
                'required' => true,
                'min' => 6,
                'matches' => 'new_password'
            )
        ));
        if($validation->passed()) {
            if(Hash::make(Input::get('existing_password'), $user->data()->salt) !== $user->data()->password) {
                echo "Your current password is wrong.";
            } else {
                try {
                    $salt = Hash::salt(32);
                    $user->update(array(
                        'password' => Hash::make(Input::get('new_password'), $salt),
                        'salt' => $salt
                    ));
                    Session::flash('home', 'Your password has been changed!');
                    Redirect::to('index.php');
                } catch(Exception $e) {
                    die($e->getMessage());
                }
                
            }
        } else {
            foreach ($validation->errors() as $error) {
                echo $error, "<br>";
            }
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
        <title>SynthEdit @ dspCentral - Tools</title>
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
        <div id="userpass">
            <?php include_once INC_ROOT . '/includes/layout/signed_in_nav.static.php'; ?>
            <?php include_once INC_ROOT . '/includes/content/general/update_pass.php'; ?>
            <?php include_once INC_ROOT . '/includes/layout/footer.php'; ?>
        </div>
        <!-- Load libraries -->
        <?php include_once INC_ROOT . '/includes/content/data/javascripts.php'; ?>
    </body>
</html>