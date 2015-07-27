<?php
session_cache_limiter(false);
session_start();

ini_set('display_errors', 'On');

define('INC_ROOT', dirname(__DIR__));

define('GUSER', 'dspcentral.info@gmail.com'); // GMail username
define('GPWD', 'Mungching1!'); // GMail password

$GLOBALS['config'] = array (
    'mysql' => array (
        'host' => '127.0.0.1',
        'username' => 'rezinunts',
        'password' => 'Mungching1!',
        'db' => 'dspcentral_se'
    ),
    'remember' => array (
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'session' => array (
        'session_name' => 'user',
        'token_name' => 'token'
    )
);

spl_autoload_register(function($class) {
    require_once INC_ROOT . '/classes/' . $class . '.php';
});

require_once INC_ROOT . '/functions/sanitize.php';
// Load PHPMailer classes and email sending function
require_once INC_ROOT . '/functions/PHPMailerAutoload.php';
require_once INC_ROOT . '/functions/sendmail.php';

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));
    if($hashCheck->count()) {
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
}

$dbHost = '127.0.0.1';
$dbUsername = 'rezinunts'; 
$dbPassword = 'Mungching1!'; 
$dbDatabase = 'dspcentral_se';

$connectMe = mysqli_connect("$dbHost","$dbUsername","$dbPassword", "$dbDatabase") or die ("could not connect to mysql");