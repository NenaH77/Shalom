<?php

session_start();
$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => 'root',
        'db' => 'db'
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800 //1week (calculate 60 seconds in 1 week)
    ),
    'sessions' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);
//standard php library
spl_autoload_register(function($class) {
    require_once '../includes/classes/' . $class . '.php';
    //require_once 'classes/config.php';
    //require_once 'classes/cookie.php';
});

require_once '../includes/functions/sanitize.php';

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('sessions/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));
    if($hashCheck->count()) {
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
}