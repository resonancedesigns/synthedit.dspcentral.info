<?php
require_once '../app/core/init.php';
$user = new User();
$user->logout();
Redirect::to('index.php');