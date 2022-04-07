<?php
$userID = $_GET['id'];
try {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['psw'];

    $dbConnection = require 'pdoconnect.php';
    $db=connectToDatabase();
    $updateStm = "update `student` set `name`= ?, `email`=?,`password`=? where `ID`=$userID";
    $prepareStm = $db->prepare($updateStm);
    $res = $prepareStm->execute([$name, $email, md5($password)]);
    header("Location: dbconnection.php");
} catch (Exception $e) {

    echo $e->getMessage();
}