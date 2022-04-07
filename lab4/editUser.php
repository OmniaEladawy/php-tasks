<?php
$userID = $_GET['id'];
try {
    $dbConnection = require 'pdoconnect.php';
    $db=connectToDatabase();
    $selectStm = "select * from `student` where `ID` = $userID";
    $prepareStm = $db->prepare($selectStm);
    $res = $prepareStm->execute();
    $rows = $prepareStm->fetchAll(PDO::FETCH_OBJ);


} catch (Exception $e) {

    echo $e->getMessage();
}

?>

<?php

    if (isset($_GET["errors"])){
        $errors = json_decode($_GET["errors"]);
    }
    if (isset($_GET["olddata"])){
        $olddata = json_decode($_GET["olddata"]);
    }

?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<style>
			body {
				font-family: Arial, Helvetica, sans-serif;
				background-color: black;
			}

			* {
				box-sizing: border-box;
			}

			/* Add padding to containers */
			.container {
				padding: 16px;
				background-color: white;
			}

			/* Full-width input fields */
			input[type='text'],
			input[type='password'],
			textarea {
				width: 60%;
				padding: 15px;
				margin: 5px 0 22px 0;
				display: inline-block;
				border: none;
				background: #f1f1f1;
			}

			input[name='departement'] {
				background: #c2c2c2;
			}

			.blockLabel{
				display:block;
			}

			input[type='text']:focus,
			input[type='password']:focus,
			textarea:focus {
				background-color: #ddd;
				outline: none;
			}

			#country {
				width: 30%;
				margin-left: 20px;
				height: 30px;
				border: none;
				background: #f1f1f1;
			}

			#country:focus {
				background-color: #ddd;
				outline: none;
			}

			/* Overwrite default styles of hr */
			hr {
				border: 1px solid #f1f1f1;
				margin-bottom: 25px;
			}

			/* Set a style for the submit button */
			.registerbtn {
				background-color: #04aa6d;
				color: white;
				padding: 16px 20px;
				margin: 8px 0;
				border: none;
				cursor: pointer;
				width: 100%;
				opacity: 0.9;
			}

			.registerbtn:hover {
				opacity: 1;
			}

			/* Add a blue text color to links */
			a {
				color: dodgerblue;
			}

			/* Set a grey background color and center the text of the "sign in" section */
			.signin {
				background-color: #f1f1f1;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<form action=<?php echo "updateUser.php?id=" . $rows[0]->id; ?> method="post" enctype="multipart/form-data">
			<div class="container">
				<h1>Register</h1>
				<hr />

				<label for="fName" class="blockLabel"><b>Name</b></label>
				<input
					type="text"
					placeholder="Enter your first name"
					name="name"
					id="name"
					value="<?php echo $rows[0]->name ?>"/>
				/> 
				<span> 	
					<?php 
						if(isset($errors->name)){
							echo "<span style='color:red'> $errors->name </span>";
							
						}
					?>
				</span>

				<label for="lName" class="blockLabel"><b>Email</b></label>
				<input
					type="text"
					placeholder="Enter your first name"
					name="email"
					id="email"
					value="<?php echo $rows[0]->email ?>"/>
				/>
				<span> 	
					<?php 
						if(isset($errors->email)){
							echo "<span style='color:red'> $errors->email </span>";
							
						}
					?>
				</span>

				<label for="psw" class="blockLabel"><b>Password</b></label>
				<input
					type="password"
					placeholder="Enter Password"
					name="psw"
					id="psw"
                    value="<?php echo $rows[0]->psw ?>"/>
                 
				/>
				<span> 	
					<?php 
						if(isset($errors->psw)){
							echo "<span style='color:red'> $errors->psw </span>";
							
						}
					?>
				</span>

				<br /><br />

				<label for="room"><b>Room No</b></label>
				<select name="room" id="room">
					<option>Application 1</option>
					<option>Application 2</option>
					<option>Cloud</option>
				</select>


				<hr />

				<button type="submit" class="registerbtn" style="margin-top: 100px">Submit</button>
				<button type="reset" class="registerbtn" style="background-color: red">
					Reset
				</button>
			</div>
		</form>
	</body>
</html>