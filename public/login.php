<?php

require_once '../includes/core/init.php';
if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true)
        ));
        if($validate->passed()) {
            $user = new User();
            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);
            if($login) {
                Redirect::to('index.php');
            } else {
                echo '<p>Incorrect username or password</p>';
            }
        } else {
            foreach($validate->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
?>

<?php include("../includes/layout/adminheader.php");?>

<form class="form-signin" action="" method="post">
<h1 class="form-signin-heading">Login</h1>
    <div class="field">
        <label for='username'>Username</label>
        <input class="form-control" type="text" name="username" id="username">
    </div>

    <div class="field">
        <label for='password'>Password</label>
        <input class="form-control" type="password" name="password" id="password">
    </div>

    <div class="field">
        <p>Don't have an account?<a href="register.php"> Sign Up </a></p>
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login">
</form>

