<?php 
	if(isset($_GET["errors"])){
		$errors= json_decode($_GET["errors"]);
		
	}

	if(isset($_GET["data"])){
		$oldData= json_decode($_GET["data"]);	
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
		<form action="validation.php" method="post">
			<div class="container">
				<h1>Register</h1>
				<hr />

				<label for="fName" class="blockLabel"><b>First Name</b></label>
				<input
					type="text"
					placeholder="Enter your first name"
					name="fName"
					id="fName"
					value= "<?php if(isset($oldData->fName)){echo "$oldData->fName";}?>"
				/> 
				<span> 	
					<?php 
						if(isset($errors->fName)){
							echo "<span style='color:red'> $errors->fName </span>";
							
						}
					?>
				</span>

				<label for="lName" class="blockLabel"><b>Last Name</b></label>
				<input
					type="text"
					placeholder="Enter your first name"
					name="lName"
					id="lName"
					value= "<?php if(isset($oldData->lName)){echo "$oldData->lName";}?>"
				/>
				<span> 	
					<?php 
						if(isset($errors->lName)){
							echo "<span style='color:red'> $errors->lName </span>";
							
						}
					?>
				</span>

				<label for="address" class="blockLabel"><b>Address</b></label>
				<textarea name="address" id="address" rows="10">
				<?php if(isset($oldData->address)){echo "$oldData->address";}?>
				</textarea>
				<span> 	
					<?php 
						if(isset($errors->address)){
							echo "<span style='color: red;
		                                display: inline-block;
							            position: absolute;
							            margin-top: 100px;
							            margin-left: 5px;'> $errors->address </span>";
						}
					?>
				</span>

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
				<span> 	
					<?php 
						if(isset($errors->gender)){
							echo "<span style='color: red;'> $errors->gender </span>";
						}
					?>
				</span>
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
				<span> 	
					<?php 
						if(isset($errors->skills)){
							echo "<span style='color: red;'> $errors->skills </span>";
						}
					?>
				</span>
				<br /><br /><br />

				<label for="username" class="blockLabel"><b>UserName</b></label>
				<input
					type="text"
					placeholder="Enter your username"
					name="username"
					id="username"
					value= "<?php if(isset($oldData->username)){echo "$oldData->username";}?>"
				/>
				<span> 	
					<?php 
						if(isset($errors->username)){
							echo "<span style='color:red'> $errors->username </span>";
							
						}
					?>
				</span>
				
				<label for="psw" class="blockLabel"><b>Password</b></label>
				<input
					type="password"
					placeholder="Enter Password"
					name="psw"
					id="psw"
				/>
				<span> 	
					<?php 
						if(isset($errors->psw)){
							echo "<span style='color:red'> $errors->psw </span>";
							
						}
					?>
				</span>

				<label class="blockLabel"><b>Departement</b></label>
				<input type="text" value="Open Source" name="departement" readonly />

				<label class="blockLabel"
					><b>Sh688o</b>
					<span style="margin-left: 20px"
						>Insert the code in the below box</span
					></label
				>
				<input type="text" name="code" />
				<span> 	
					<?php 
						if(isset($errors->code)){
							echo "<span style='color:red'> $errors->code </span>";
						}
					?>
				</span>
				<hr />

				<button type="submit" class="registerbtn">Submit</button>
				<button type="reset" class="registerbtn" style="background-color: red">
					Reset
				</button>
			</div>
		</form>
	</body>
</html>
