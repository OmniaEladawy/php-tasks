<?php

$user = file("users.txt")[$_GET["id"]];
$line = explode(":", $user);

echo "<div style='width: 500px; margin: 100px auto ; border:2px solid red '>
    <div style='text-align: center'>
        <h3 style='display:inline-block ; color:red'> Id :</h3> <span> {$line[9]}</span> <br/>
        <h1 style='display:inline-block ; color:red'> First Name :</h1> <span style='font-weight:bold'> {$line[0]}</span> <br/>
        <h1 style='display:inline-block ; color:red'> Last Name :</h1> <span style='font-weight:bold'> {$line[1]}</span> <br/>
    </div>
    <ul>
        <li><span style='color:red ; font-size:20px ; font-weight:bold'> Address : </span> {$line[2]}</li> <br/>
        <li><span style='color:red ; font-size:20px ; font-weight:bold'> Country : </span> {$line[3]}</li> <br/>
        <li><span style='color:red ; font-size:20px ; font-weight:bold'> Gender : </span> {$line[4]}</li> <br/>
        <li><span style='color:red ; font-size:20px ; font-weight:bold'> Username : </span> {$line[6]}</li> <br/>
        <li><span style='color:red ; font-size:20px ; font-weight:bold'> Departement : </span> {$line[8]}</li> <br/>
    </ul>
    </div>";
?>