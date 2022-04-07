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

    //file upload
    
    $fileName = $_FILES["img"]["name"];
    $tmpName = $_FILES["img"]["tmp_name"];

    $allowedextensions=['png','jpg','jpeg'];
    $ext=pathinfo($fileName)["extension"];
    if(in_array($ext,$allowedextensions)){
        move_uploaded_file($tmpName, "files/".$fileName);

        //$imgPath = "files/".$fileName ;

        //echo "<img width='200' height='200' src='{$imgPath}' style='display:block ; margin-top:20px'>";

    }else{
        $errors["img"]= "not valid img";
    }


    /////////////////////////////////////////////////////////////////

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
    }catch (Exception $e){
        echo $e->getMessage();
    }
    header(header:"Location:loginform.php");
    }

   

?>    
