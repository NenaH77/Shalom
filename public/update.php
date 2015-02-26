<?php

require_once '../includes/core/init.php';
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
            )
        ));
        if($validate->passed()) {
            try {
                $user->update(array(
                    'name' => Input::get('name')
                ));
                Session::flash('home', 'Your details have been updated.');
                Redirect::to('index.php');
            } catch(Exception $e) {
                die($e->getMessage());
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

<?php include("../includes/layout/adminNav.php");?>

<form class="form-signin" action="" method="post">
    <div class="field">
        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" value="<?php echo escape($user->data()->name); ?>">
        <br>
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
        <input class="btn btn-primary" type="submit" value="Update">
    </div>
</form>

<?php include("../includes/layout/adminfooter.php");?>