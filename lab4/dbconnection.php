<?php
$dsn = 'mysql:dbname=iti;host=127.0.0.1;port=3306;'; #port number
$user = 'javauser';
$password = 'Java1234';

try{
    $db = new PDO($dsn , $user , $password);
    
    ////////////////////////// select statement /////////
    $selectquery = "select * from `student`";
    $stmt = $db->prepare($selectquery);
    $res = $stmt->execute();
    $rows=$stmt->fetchAll(PDO::FETCH_OBJ);
    echo "<table border='2px' style='border:2px solid black ; border-collapse: collapse; width:100%'> <th>ID</th>
                    <th>Name</th>  <th>Email</th>  <th>Password</th>  <th>View</th>   <th>Edit</th>  <th>Delete</th>";

    foreach ($rows as $r){
            echo "<tr style='text-align:center'> <td>$r->id</td>  <td>$r->name</td> <td>$r->email</td> <td>$r->password</td> ";
            echo "<td> <a href='viewUser.php?id={$r->id}'> View</a> </td>
                    <td> <a href='editUser.php?id={$r->id}'> Edit</a> </td>
                    <td> <a href='deleteUser.php?id={$r->id}'> Delete</a> </td>";
            echo "</tr>";
        }
    echo "</table>";

    
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>