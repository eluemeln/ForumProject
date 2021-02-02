<?php
	$errors ="";
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$Conn = mysqli_connect("localhost","root","" ,"forum");
		
		$username = htmlspecialchars($_POST["username"]);
		$email = htmlspecialchars($_POST["email"]);
		$password = htmlspecialchars($_POST["password"]);
		$Cp = htmlspecialchars($_POST["Cpassword"]);
		if(empty($email) or empty($password)or empty($Cp) or empty($username)or !filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$errors = "Error!";
		}
		
		else
		{
			$sql = "SELECT * FROM register WHERE username ='$username'";
			$res = mysqli_query($Conn,$sql);
			$val = mysqli_fetch_assoc($res);
			$sql1 = "SELECT * FROM register WHERE email ='$email'";
			$res1 = mysqli_query($Conn,$sql1);
			$val1 = mysqli_fetch_assoc($res1);
			
			if($val["username"]==$username)
			{
				$errors= "user already exists";
			}
			else if ($val1["email"])
			{
				echo "email already exists";
			}
	
			else
			{
				//$password = password_hash($password,PASSWORD_DEFAULT);
				$q = "INSERT INTO register(username,email,password) VALUES('$username','$email','$password')";
				$result = mysqli_query($Conn,$q);
					
				if ($result)
				{ 	
					if ($result["password"]==$cp)
					//echo "user createted;
					header("location:login.php");
								
				}
				else
				{
							
					$errors= " OOPS! error occured";
				}
					
							
			}	
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Registration page</title
		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="\Online Store\ForumCSS\Reg.css" media="screen"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
	
	<body style = "background-color:brown">
		<div style =" background-color:magenta;">
			<h1>Register</h1>
		</div>
		<p style = "color:blue; font :16; "><b> <?php echo $errors; ?></b> </p><br>
		<div>
			<form action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method = "POST">
			<input type ="text" name = "username" placeholder ="Username" required><br><br>
			<input type ="text" name = "email" placeholder ="Email" required><br><br>
			<input type = "password" name = "password" placeholder= "Password" required><br><br>
			<input type = "password" name = "Cpassword" placeholder= "Confirm Password" required><br><br>
			<button type ="Submit" name = "register" id = "reg_btn">Register</button>
			</form>
		</div>
		<br>
		<p id="Custom"><a href ="login.php">Login</a><p>
	</body>
	<div class ="footer">
		<p>Copyright &copy; 2020-2021</p>
	</div>



</html>