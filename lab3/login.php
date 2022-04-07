<?php
$users = file("users.txt");
$users = implode(":", $users);
$users = explode(":", $users);

    $errors = [];
  
    if (empty($_POST["username"]) or $_POST["username"]=="") {
        $errors["username"] = "username is required";
    }
    if (empty($_POST["pass"]) or $_POST["pass"]=="") {
        $errors["pass"] = "Password is required";
    }
    if (count($errors) > 0) {
        $err = json_encode($errors);
        header("Location:loginform.php?errors={$err}");
        return;
    } else {

    if (isset($_POST['username'])) {
        $dir = "users.txt";
        $datafile = fopen($dir, 'r');
        while (($line = fgets($datafile)) !== false) {
            $userArray = explode(":", $line);
            $emailtemp = trim($_POST["username"]);
           
            if ($emailtemp === $userArray[0]) {
                $passwordtemp = $userArray[2];
                var_dump($passwordtemp);
                if ($passwordtemp === trim($_POST["pass"])) {
        
                    echo "Started session";
                    session_start();
                    $_SESSION["username"] = $emailtemp;
                    header("Location:home.php");
                    return;
                }
            } else {
                continue;
            };
        }
    }
    $errors["pass"] = "Incorrect password or email";
    $err = json_encode($errors);
    header("Location:loginform.php?errors={$err}");
}