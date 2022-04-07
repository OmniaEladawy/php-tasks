<?php
//all users
    $users = file("users.txt");
    echo " <table border='2px' style='border:2px solid black ; border-collapse: collapse; width:100%'>
<thead>
  <tr>
    <th >Name</th>
    <th >Email</th>
    <th >Password</th>  
    <th >Room</th>
    <th >Action</th>
  </tr>
</thead>";
//echo ($_SERVER["REQUEST_URI"]);
foreach ($users as $index=>$l){  # $l --> line ===> is string

    $line = explode(":", $l); # convert the string to array
    echo "<tr style='text-align:center'>";
    echo " <td>{$line[0]}</td>
           <td>{$line[1]}</td>
           <td>{$line[2]}</td> 
           <td>{$line[3]}</td>
         <td><button ><a href='viewUser.php?id={$index}'> View</a></button></td>";
    echo "</tr>";
}
echo "</table>";
?>    