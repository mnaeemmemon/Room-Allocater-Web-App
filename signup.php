<!DOCTYPE html>

<?php

	session_start();

	if($_POST) {
	
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$dbservername = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "room_allocater";

		$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
		
		$case1 = "select * from members where username = '$username'";
		$case2 = "select * from members where email = '$email'";
		
		$result1 = mysqli_query($conn, $case1);
		$result2 = mysqli_query($conn, $case2);
		
		$num1 = mysqli_num_rows($result1);
		$num2 = mysqli_num_rows($result2);
		
		if($username != "" && $password != "" && $email != "")
		{
			if($num1 > 0 && $num2 > 0)
			{
				echo '<script>alert("User Already Exists")</script>'; 
			}
			else if($num1 > 0)
			{
				echo '<script>alert("Username Already Taken")</script>'; 
				
			}
			else if($num2 > 0)
			{
				echo '<script>alert("You Account is Already Exists")</script>';
				
			}
			else
			{
				$reg = "insert into members (username, password, email) values ('$username','$password','$email') ";
				mysqli_query($conn, $reg);
				header('location: index.php');	
			}
		}
		else
		{	echo '<script>alert("All fields are required to be filled!")</script>';	}
		
		$conn->close();
	}
	
?>

<html lang="en">
<head>
	<title>Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41" style="font-size: 50px;">
					Sign Up
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Confirm password">
						<input class="input100" type="password" name="confim_pass" placeholder="Confirm Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Sign Up
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

</body>
</html>