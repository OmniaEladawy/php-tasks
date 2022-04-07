<?php
    //validation 
    $errors = [];
    $oldData=[];

    if(empty($_POST["fName"]) or $_POST["fName"]==""){
        $errors["fName"]= "first name is required";
    }else{
        $oldData["fName"]=$_POST["fName"];
    }

    if(empty($_POST["lName"]) or $_POST["lName"]==""){
        $errors["lName"]= "last name is required";
    }else{
        $oldData["lName"]=$_POST["lName"];
    }

    if(empty($_POST["address"]) or $_POST["address"]==""){
        $errors["address"]= "address is required";
    }else{
        $oldData["address"]=$_POST["address"];
    }

    if(empty($_POST["username"]) or $_POST["username"]==""){
        $errors["username"]= "username is required";
    }else{
        $oldData["username"]=$_POST["username"];
    }

    if(empty($_POST["psw"]) or $_POST["psw"]==""){
        $errors["psw"]= "password is required";
    }

    if(empty($_POST["code"]) or $_POST["code"]==""){
        $errors["code"]= "code is required";
    }

    if(empty($_POST["skills"])){
        $errors["skills"]= "you should select at least one skill";
    }

    if(empty($_POST["gender"])){
        $errors["gender"]= "you should select your gender";
    }

    if(count($errors) > 0){
        $res = json_encode($errors);

        if(count($oldData) > 0){
            
            $olddata = json_encode($oldData);

            header(header:"Location:index.php?errors={$res}&data={$olddata}");
        }else{
            header(header:"Location:index.php?errors={$res}");
        }
    }else{
        //save user
    $user = implode(":",$_POST);

    # file handle
    $filename="users.txt";
    try{
        $userfile =fopen($filename, "a");
        fwrite($userfile, $user.PHP_EOL);
        fclose($userfile);
        header(header:"Location:allusers.php");
    }catch (Exception $e){
        echo $e->getMessage();
    }
    }

    ///////////////////////////////////////////////////////////////


    

    /////////////////////////////////////////////////////////////////

    
?>    