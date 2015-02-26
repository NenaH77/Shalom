<?php

session_start();
$_SESSION["message"] = "<div class='message'>Delete was Successful</div>";

//setup database
$user="root";
$pass="root";
$mysql='mysql:host=localhost;dbname=shalom;port=8889';
$dbh = new PDO($mysql, $user, $pass);

//getting specific client id
$id = $_GET['id'];
//delete from client where id is = to id
$stmt=$dbh->prepare('DELETE FROM smgrp WHERE id = :id');
$stmt->bindParam(':id', $id);
$stmt->execute();
header('Location: group.php');
die();
?>