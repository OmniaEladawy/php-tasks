<?php 

$userId = $_GET["id"];
$users = file('users.txt');
$selectedUser = $users[$userId];
$selectedUser = explode(":",$selectedUser);
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
		<form action='<?php echo "updateUser.php?id={$userId}" ;?>' method="post">
			<div class="container">
				<h1>Register</h1>
				<hr />

				<label for="fName" class="blockLabel"><b>First Name</b></label>
				<input
					type="text"
					placeholder="Enter your first name"
					name="fName"
					id="fName"
					value= "<?php echo $selectedUser[0] ;?>"
				/> 
				

				<label for="lName" class="blockLabel"><b>Last Name</b></label>
				<input
					type="text"
					placeholder="Enter your first name"
					name="lName"
					id="lName"
					value= "<?php echo $selectedUser[1] ;?>"
				/>

				<label for="address" class="blockLabel"><b>Address</b></label>
				<textarea name="address" id="address" rows="10">
				<?php echo $selectedUser[2] ;?>
				</textarea>
				

				<br /><br />

				<label for="country"><b>Country</b></label>
				<select name="country" id="country">
					<option>Egypt</option>
					<option>Italy</option>
					<option>Oman</option>
				</select>

				<br /><br /><br />

				<label style="margin-right: 20px"><b>Gender</b></label>
				<label>Male</label>
				<input
					type="radio"
					name="gender"
					value="Male"
					style="margin-right: 10px"
				/>
				<label>Female</label>
				<input type="radio" name="gender" value="Female" />

				<br /><br /><br />

				<label style="margin-right: 20px"><b>Skills</b></label>
				<label>PHP</label>
				<input
					type="checkbox"
					name="skills[]"
					value="php"
					style="margin-right: 20px"
				/>
				<label>J2SE</label>
				<input
					type="checkbox"
					name="skills[]"
					value="jse"
					style="margin-right: 20px"
				/>
				<label>Mysql</label>
				<input
					type="checkbox"
					name="skills[]"
					value="mysql"
					style="margin-right: 20px"
				/>
				<label>PoostgreeSql</label>
				<input
					type="checkbox"
					name="skills[]"
					value="poostgree"
					style="margin-right: 20px"
				/>
				
				<br /><br /><br />

				<label for="username" class="blockLabel"><b>UserName</b></label>
				<input
					type="text"
					placeholder="Enter your username"
					name="username"
					id="username"
					value= "<?php echo $selectedUser[6] ;?>"
				/>

                <br /><br /><br />

                <label for="psw" class="blockLabel"><b>Password</b></label>
				<input
					type="password"
					placeholder="Enter Password"
					name="psw"
					id="psw"
                    value= "<?php echo $selectedUser[7] ;?>"
				/>
			
				<hr />

				<button type="submit" class="registerbtn">Update</button>
			</div>
		</form>
	</body>
</html>
