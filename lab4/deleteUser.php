<?php

require "pdoconnect.php";

$user_id = $_GET["id"];
try{

    $db=connectToDatabase();
    var_dump($db);
    if($db){
        $delete_query = 'delete from student where `id` =:userid';
        $del_stmt = $db->prepare($delete_query);
        $del_stmt->bindParam(":userid",$user_id );
        $res=$del_stmt->execute();
        if ($res){
            header("Location:dbconnection.php");
        }
    }

}catch (PDOException $e){
    echo $e->getMessage();
}