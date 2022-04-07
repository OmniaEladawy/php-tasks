<?php
$id =$_GET["id"];
var_dump($_POST);
$updetedUser=implode(":",$_POST);
$user=file("users.txt");
$user[$id]=$updetedUser;
$userfile=fopen("users.txt","w");
foreach($user as $u ){
    $u= trim($u,"\n");
    $u=$u.PHP_EOL;
    fwrite($userfile , $u);
}
fclose($userfile);
header("Location:allusers.php");
?>