<?php
/*
TEST SHALOM SITE
*/
session_start();
$_SESSION['message'] = "<div class='message'>Your edit was a success!</div>";

//setup database
$user="root";
$pass="root";
$mysql='mysql:host=localhost;dbname=shalom;port=8889';
$dbh = new PDO($mysql, $user, $pass);

//pulling all info from groups
$regId = $_GET['id'];
    $stmt=$dbh->prepare("SELECT * FROM smgrp WHERE id = :id");
$stmt->bindParam(':id', $regId);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//if statement makes sure the user submitted the form by checking the request
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //once condition is met, begin storing info in variables
   $regId = $_GET['id'];
   $groups = $_POST['groups'];
   $days = $_POST['days'];
   $hrtime = $_POST['hrtime'];
   $age = $_POST['age'];
   $location = $_POST['location'];
   $topic = $_POST['topic'];


    //update client id
    $stmt=$dbh->prepare("UPDATE smgrp SET groups=:groups, days=:days, hrtime=:hrtime, age=:age, location=:location, topic=:topic WHERE id = :id;");
    $stmt->bindParam(':id', $regId);
    $stmt->bindParam(':groups', $groups);
    $stmt->bindParam(':days', $days);
    $stmt->bindParam(':hrtime', $hrtime);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':topic', $topic);
    $stmt->execute();


    header('Location: group.php');
}

?>

<!----- HTML FORM ------>

<!DOCTYPE html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Update Admin</title>

    <!-- CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header>
        <!-- Logo -->
       <img class="logo" src="image/logo.png" alt="Shalom Logo" />
        </header>

        <!-- body -->
        <div class="wrapper">

        <h2 class="form-signin-heading">Update your information</h2>
        <p class="lead">Please make the necessary changes.</p>

        <form class="form-signin" action="grpupdate.php?id=<?php echo $result[0]['id']; ?>" method="POST">
            <h4>Group:</h4><input class="form-control" type="text" name="groups" value="<?php echo $result[0]['groups']; ?>" required /><br>
            <h4>Days:</h4><input class="form-control" type="text" name="days" value="<?php echo $result[0]['days'];  ?>"  required /><br>
            <h4>Time:</h4><input class="form-control" type="text" name="hrtime" value="<?php echo $result[0]['hrtime'];  ?>" required /><br>
            <h4>Age:</h4><input class="form-control" type="text" name="age" value="<?php echo $result[0]['age'];  ?>" required /><br>
            <h4>Location:</h4><input class="form-control" type="text" name="location" value="<?php echo $result[0]['location'];  ?>" required /><br>
            <h4>Topic:</h4><input class="form-control" type="text" name="topic" value="<?php echo $result[0]['topic'];  ?>" required /><br>

            <br>
            <a href="group.php"><button type="button" class="btn btn-danger">Cancel</button></a>
            <button type="submit" name="submit" class="btn btn-primary">Save Update</button>
        </form>

        </div><!--end container-->
    </div><!--end wrapper-->
</body>
</html>