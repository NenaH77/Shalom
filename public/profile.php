<?php

require_once '../includes/core/init.php';
if(!$username = Input::get('user')) {
    Redirect::to('index.php');
} else {
    $user = new User($username);
    if(!$user->exists()) {
        Redirect::to(404);
    } else {
        $data = $user->data();
?>

<?php include("../includes/layout/adminheader.php");?>

<?php include("../includes/layout/adminNav.php");?>

<div class="container">
    <h3><?php echo escape($data->username); ?></h3>
    <p>Name: <?php echo escape($data->name); ?></p>

<div class="wrapper">

</div>


<?php   }   } ?>

<?php include("../includes/layout/adminfooter.php");?>