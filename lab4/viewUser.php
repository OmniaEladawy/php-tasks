<?php

try {
    $userID = $_GET['id'];
    $dbConnection = require 'pdoconnect.php';
    $db=connectToDatabase();
    $select_query = "select * from `student` where `ID` = $userID ";
    $stmt = $db->prepare($select_query);
    $res = $stmt->execute();
  
    $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
} catch (Exception $e) {
    echo $e->getMessage();
}

echo "<div style='width: 500px; margin: 100px auto ; border:2px solid red '>
    <div style='text-align: center'>
        <h3 style='display:inline-block ; color:red'> Id :</h3> <span style='font-weight:bold'> {$rows[0]->id}</span> <br/>
        <h1 style='display:inline-block ; color:red'> Name :</h1> <span style='font-weight:bold'> {$rows[0]->name}</span> <br/>
    </div>
    <ul>
        <li><span style='color:red ; font-size:20px ; font-weight:bold'> Email : </span> {$rows[0]->email}</li> <br/>
    </ul>
    </div>";
?>