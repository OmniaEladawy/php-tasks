<html>
  
<body style="text-align: center;
    border: 1px solid black;
    padding: 50px;">

Thanks <?php
    if ($_POST["gender"] == "Male") {
        echo "Mr ";
    }else{
        echo "Miss ";
    }

echo $_POST["fName"]." ".$_POST["lName"]; 
?>
<br><br><br>
Please Review your information <br><br><br>

Name: <?php echo $_POST["fName"]." ".$_POST["lName"]; ?>  <br><br><br>
Address: <?php echo $_POST["address"]; ?>  <br><br><br>
Your Skills:<?php 
    if(!empty($_POST['skills'])){
        // Loop to store and display values of individual checked checkbox.
        foreach($_POST['skills'] as $selected){
        echo $selected." ";
        }
    }
?>  <br><br><br>
Departement: <?php echo $_POST["departement"]; ?>  


</body>
</html>