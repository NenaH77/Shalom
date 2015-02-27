<?php
session_start();
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}


//setup Mysql database
$mysql = 'mysql:host=localhost; dbname=shalom; port=8889';

//SSL class lynda.com video states to use always use try/catch
try{
    $db = new PDO($mysql, 'root', 'root');
    $errorInfo = $db->errorInfo();
    if (isset($errorInfo[2])){
        $error = $errorInfo[2];
    }
}catch (PDOException $e){
    $error = $e->getMessage();
}

//makes sure user submitted the form by checking request....alternative if($_POST['submit']) but that can send request w/o data
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //once condition is met, begin storing info in variables
    $_SESSION['message'] = "<div class='message'>Group was added Successfully!</div>";
    $group = $_POST['groups'];
    $day = $_POST['days'];
    $time = $_POST['hrtime'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    $topic = $_POST['topic'];




    $stmt = $db->prepare("INSERT INTO smgrp (groups, days, hrtime, age, location, topic) VALUES (:groups, :days, :hrtime, :age, :location, :topic);");

    $stmt->bindParam(':groups', $group);
    $stmt->bindParam(':days', $day);
    $stmt->bindParam(':hrtime', $time);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':topic', $topic);
    $stmt->execute();

    $errorInfo = $stmt->errorInfo();
        if (isset($errorInfo[2])){
            $error = $errorInfo[2];
            echo "<h2 style='color:white; background-color:red'>$error</h2>";
    }
}
?>

<?php include("../includes/layout/adminheader.php");?>

<?php include("../includes/layout/adminNav.php");?>

        <div class="wrapper_table">
        <h2>Add a Group</h2>
        <p>To add a group, complete the form</p>

            <form action="group.php" method="POST">

                <div class="form-group">
                   <label for="groups">Group</label> 
                   <input type="text" name="groups" placeholder="ex. John Doe" required=""/> 
                </div>

                <div class="form-group">
                     <label for="days">Day</label> 
                      <input type="text" name="days" placeholder="ex. Saturday" required=""/>
                </div>

                <div class="form-group">
                    <label for="hrtime">Time</label> 
                    <input type="text" name="hrtime" placeholder="ex. 7:00pm" required=""/> 
                </div>

                <div class="form-group">
                   <label for="age">Age</label> 
                   <input type="text" name="age" placeholder="ex. 25-40" required=""/>
                </div>

                <div class="form-group">
                    <label for="location">Location</label> 
                    <input type="text" name="location" placeholder="ex. 345 Dean Circle" required=""/>
                </div>

                <div class="form-group"> 
                    <label for="topic">Topic</label> 
                    <input type="text" name="topic" placeholder="ex. Women's Study" required=""/> 
                </div>

                </div>
                    <input class="btn btn-danger" type="submit" id="submit" name="submit" value="Cancel" />
                    <input class="btn btn-primary" type="submit" id="submit" name="submit" value="Add" />
            </form>

        </div>

        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <br>
                <table class='table table-hover'>
                    <tr>
                        <th>Group</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Age</th>
                        <th>Location</th>
                        <th>Topic</th>

                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>

<!--Existing Groups Displayed on Page -->
 <section>
    <h3>Existing Groups</h3>
    <p>Groups will display in public website</p>

<?php
if (isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

$stmt = $db->prepare("SELECT * FROM smgrp ORDER BY weekId");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row){
    echo "<tr><td>" . $row['groups'] . "</td>";
    echo "<td>" . $row['days'] . "</td>";
    echo "<td>" . $row['hrtime'] . "</td>";
    echo "<td>" . $row['age'] . "</td>";
    echo "<td>" . $row['location'] . "</td>";
    echo "<td>" . $row['topic'] . "</td>";

    echo '<td><a href="grpdelete.php?id=' .$row['id']. '"><button id="delete" class="btn btn-success">Delete</button></a></td>';
    echo '<td><a href="grpupdate.php?id=' .$row['id']. '"><button id="edit" class="btn btn-warning">Edit</button></a></td>';
}
?>

                </table>
            </div>
        </div>
    </div>
    </div>

<?php include("../includes/layout/adminfooter.php");?>

</body>
</html>