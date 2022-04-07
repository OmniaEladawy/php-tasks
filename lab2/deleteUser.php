<?php 
$data=-1;
if(isset($_GET["id"])){
    $data=$_GET["id"];
}

echo "data>>".$data;

$filename = 'users.txt';
$file = fopen($filename, 'r'); 

if ($file) 
    $lines = explode( PHP_EOL, fread($file, filesize($filename)));
   
if($data !== -1){
unset($lines[$data]);

$userfile = fopen("users.txt", "w");
    $user = implode(PHP_EOL, $lines);
    fwrite($userfile, $user);
    fclose($userfile);
}

header("Location:allusers.php");

?>