<?php

require_once '../includes/core/init.php';
if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}
$user = new User(); //Current
if($user->isLoggedIn()) {
?>

<?php include("../includes/layout/adminheader.php");?>

<?php include("../includes/layout/adminNav.php");?>

 <p>Hello, <a href="profile.php?user=<?php echo escape($user->data()->username);?>"><?php echo escape($user->data()->username); ?></a></p>


    <div class="wrapper">
    <h4>My profile</h4>
        <table class="table table-striped">
           <tr>
              <td>Update your profile</td>
              <td><a class="btn btn-primary" href="update.php" role="button">Update Profile</a></td>
           </tr>
           <tr>
              <td>Change your password</td>
              <td><a class="btn btn-primary" href="changepassword.php" role="button">Change Password</a></td>
           </tr>
        </table>
    </div>

<?php   }   ?>


<?php include("../includes/layout/adminfooter.php");?>


