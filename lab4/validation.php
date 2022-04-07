<?php
    //validation 

    var_dump($_POST);
    $errors = [];
    $oldData=[];
   
    $email = $_POST["email"];
    

    if(empty($_POST["name"]) or $_POST["name"]==""){
        $errors["name"]= "name is required";
    }else{
        $oldData["name"]=$_POST["name"];
    }

    if(empty($_POST["email"]) or $_POST["email"]==""){
        $errors["email"]= "email is required";
       
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format";
    }else{
        $oldData["email"]=$_POST["email"];
    }

    if(empty($_POST["psw"]) or $_POST["psw"]==""){
        $errors["psw"]= "password is required";
    }

     ///////////////////////////////////////////////////////////////

    if(count($errors) > 0){
        $res = json_encode($errors);

        if(count($oldData) > 0){
            
            $olddata = json_encode($oldData);

            header(header:"Location:index.php?errors={$res}&data={$olddata}");
        }else{
            header(header:"Location:index.php?errors={$res}");
        }
    }else{
        $dbConnection = require 'dbconnection.php';
        $insert_query = "insert into student(`name`, `email` , `password`) values(?,?,?)";
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST["psw"]);
   
        $insert_query = $db->prepare($insert_query);
        $insert_query->bindParam(1, $name);
        $insert_query->bindParam(2, $email);
        $insert_query->bindParam(3, $password);
        $insert_query->execute();
        header("Location:dbconnection.php");
    }
?>    
