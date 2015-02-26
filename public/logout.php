<?php

require_once '../includes/core/init.php';
$user = new User();
$user->logout();
Redirect::to('login.php');