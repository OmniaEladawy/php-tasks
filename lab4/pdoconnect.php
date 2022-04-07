<?php

function connectToDatabase(){
    $dsn = 'mysql:dbname=iti;host=127.0.0.1;port=3306;'; #port number
    $user = 'javauser';
    $password = 'Java1234';
    $db= new PDO($dsn, $user, $password);

    return $db;

}