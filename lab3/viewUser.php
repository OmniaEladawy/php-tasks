<?php

$user = file("users.txt")[$_GET["id"]];
$line = explode(":", $user);

echo "<div style='width: 500px; margin: 100px auto ; border:2px solid red '>
    <div style='text-align: center'>
        <h1 style='display:inline-block ; color:red'> Name :</h1> <span style='font-weight:bold'> {$line[0]}</span> <br/>
    </div>
    <ul>
        <li><span style='color:red ; font-size:20px ; font-weight:bold'> Email : </span> {$line[1]}</li> <br/>
        <li><span style='color:red ; font-size:20px ; font-weight:bold'> Room : </span> {$line[3]}</li> <br/>
    </ul>
    </div>";
?>