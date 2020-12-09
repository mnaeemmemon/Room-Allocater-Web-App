<!DOCTYPE html>

<?php

	session_start();

	if($_POST) 
	{
		$_SESSION['user'] = $_POST['username'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$dbservername = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "room_allocater";

		$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

		if($conn->connect_error){
				die("Connection failed: " . $conn->connect_error);
		}
		else if ($username != "" && $password != "")
		{
			$case1 = "select* from members where username = '$username' && password = '$password' ";
			$case2 = "select* from members where username = '$username' ";
			
			$result1 = mysqli_query($conn, $case1);
			$result2 = mysqli_query($conn, $case2);
			
			$num1 = mysqli_num_rows($result1);
			$num2 = mysqli_num_rows($result2);
			
			if($num1 == 1)
			{
				while($row = mysqli_fetch_assoc($result1)) {
					$_SESSION['userid'] = $row['id'];
				}
				echo "<script>localStorage.setItem('userExist', true); </script>";
				header('location: home.php');
			}
			else if($num2 == 1)
			{
				echo '<script>alert("Wrong Password for this Username")</script>';
			}
			else{
				echo '<script>alert("Invalid Username or Password")</script>';
			}
		}
		else
		{	echo '<script>alert("All fields are required to be filled!")</script>';	}
			
		$conn->close();
	}
	
?>

<html lang="en">
<head>
	<title>Log In</title>
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
					Log In
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

</body>
</html>