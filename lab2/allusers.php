<?php
//all users
    $users = file("users.txt");
    echo " <table border='2px' style='border:2px solid black ; border-collapse: collapse; width:100%'>
<thead>
  <tr>
    <th >Id</th>
    <th >first Name</th>
    <th >last name</th>
    <th >address</th>  
    <th >country</th>
    <th >gender</th> 
    <th >skills</th> 
    <th >username</th> 
    <th >department</th>
    <th>Action</th>
  </tr>
</thead>";
//echo ($_SERVER["REQUEST_URI"]);
foreach ($users as $index=>$l){  # $l --> line ===> is string

    $line = explode(":", $l); # convert the string to array
    echo "<tr style='text-align:center'>";
    echo " <td>{$line[9]}</td><td>{$line[0]}</td>
            <td>{$line[1]}</td>
          <td>{$line[2]}</td> <td>{$line[3]}</td>
          <td>{$line[4]}</td> <td>{$line[5]}</td>
          <td>{$line[6]}</td> <td>{$line[8]}</td>
         <td><button ><a href='viewUser.php?id={$index}'> View</a></button>
         <button> <a href='editUser.php?id={$index}'>Edit</a></button>
         <button><a href='deleteUser.php?id={$index}'> Delete </a></button></td>";
    echo "</tr>";
}
echo "</table>";

?>