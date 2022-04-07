<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location:loginform.php");
} else {
    $email = $_SESSION["username"];
}

header("Location:allusers.php");
?>
