<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>File I/O</title>
</head>
<body>

	<h1>File I/O</h1>

	<?php
		// $arr = array("name"=>"Totini","gender"=>"Female","age"=>22);
		// $arr = json_encode($arr);
		// write($arr);
		// $arr2 = json_decode($arr);
		// echo $arr2->gender."<br>";
		// echo $arr;

	if ($_SERVER['REQUEST_METHOD'] === "POST")
	{
		// $firstName = $_POST['Firstname'];
		// write(basic_validation($firstName));

		$array = array( "Firstname"=>basic_validation($_POST['Firstname']),"Lastname"=>basic_validation($_POST['Lastname']),
			"Gender"=>basic_validation($_POST['Gender']),"DOB"=>basic_validation($_POST['DOB']),
			"Religion"=>basic_validation($_POST['Religion']),"Presentaddress"=>basic_validation($_POST['Presentaddress']),
			"Permanentaddress"=>basic_validation($_POST['Permanentaddress']),"phone"=>basic_validation($_POST['phone']),
			"Email"=>basic_validation($_POST['Email']),"Link"=>basic_validation($_POST['Link']),
			"Username"=>basic_validation($_POST['Username']),"Password"=>basic_validation($_POST['Password']),
		);

		

		$array = json_encode($array);
		write($array);
	}

	// validate input
	function basic_validation($data)
	{
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = stripcslashes($data);
		return $data;
	}

 	// write in data.txt
	function write($content)
	{
		$filePointer = fopen("data.txt", "w");	
		fwrite($filePointer, $content."\n");
		fclose($filePointer);
	}

    ?>


	<form action="<?php echo htmlspecialchars(($_SERVER['PHP_SELF'])); ?>" method = "POST">

		<fieldset>
			<legend>Basic Information:</legend>

			<label for="fname">First Name:</label>
			<input type="text" id="fname" name="Firstname" required><br>

			<label for="lname">Last name: </label>
			<input type="text" id="lname" name="Lastname" required><br>


			Select Gender:<br>
			<input type="radio" id="Male" name="Gender" value="Male" required>
			<label for="Male">Male</label> <br>

			<input type="radio" id="Female" name="Gender" value="Female">
			<label for="Female">Female</label> <br>

			<input type="radio" id="Other" name="Gender" value="Other">
			<label for="Other">Other</label><br>


			<label for="DOB">DOB:</label>
			<input type="date" id="DOB" name="DOB" required><br>

			Religion:<br>
			<select name="Religion" required > 
				<option value="" name="" ></option> 
				<option value="Islam" name="Religion" >Islam</option> 
				<option value="Hindu" name="Religion" >Hindu</option> 
				<option value="Buddhist" name="Religion" >Buddhist</option> 
				<option value="Christian" name="Religion" >Christian</option> 
			</select>
		</fieldset>
		<br><br><br>




		<fieldset>
			<legend>Contact Information:</legend>


			<label for="Presentaddress">Presentaddress:</label>
			<textarea id="Presentaddress" name="Presentaddress" rows="2" cols="20"></textarea><br>

			<label for="Permanentaddress">Permanentaddress:</label>
			<textarea id="Permanentaddress" name="Permanentaddress" rows="2" cols="20"></textarea><br>


			<label for="phone">phone: </label>
			<input type="tel" id="phone" name="phone"><br>

			<label for="Email">Email: </label>
			<input type="Email" id="Email" name="Email" required><br>

			<label for="Link">Personal Website Link : </label>
			<input type="url" id="Link" name="Link"><br>


		</fieldset>


		<br><br><br>


		<fieldset>
			<legend>Account Information:</legend>

			<label for="Username">Username:</label>
			<input type="text" id="Username" name="Username" required><br>

			<label for="Password">Password:</label>
			<input type="Password" id="Password" name="Password" required><br>

		</fieldset>
		<br>
		<input type="Submit" value="Submit">


	</form>
</body>
</html>