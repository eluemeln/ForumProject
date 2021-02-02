<?php
	$errors ="";
	$count = 0;
if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$Conn = mysqli_connect("localhost","root","" ,"forum");
		
		$username = htmlspecialchars($_POST["username"]);
		
		$password = htmlspecialchars($_POST["password"]);
		if(empty($password) or empty($username))
		{
			$errors = "Invalid inputs";		
		}
		else
		{	
			$Que = "SELECT username, password FROM  register WHERE username = '$username'";
			$rest = mysqli_query($Conn,$Que);
			$val = mysqli_fetch_assoc($rest);
			
			if($val["username"]!=$username )
			{
				//$errors= "user doesnt exist";
				
				echo'<script type = "text/javascript">alert("account doesnt exists")</script>';
			}
			else
			{
				if ($password==$val["password"])
				{
					session_start();
					
					$_SESSION["username"] = $username;
					//echo" login sucessful";
					header("location: Forum.php");
				}
				else
				{
					$errors ="OOps!passwordb is Incorect, try again";
				}	
			}
		}

	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
		<meta charset = "utf-8">
		<meta name = "viewpoint content= "width=device-width, initial-scale= 1.0">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="\Online Store\ForumCSS\login.css" media="screen"/>
		<script src="\Online Store\Forum_JS\Login.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
	
	<body style = "background-color:gray;">
		<div style =" background-color:magenta;">
			<h1>Login</h1>
		</div>
		<div style="background-color:0fff;">
			<p style = "color:red;"><b> <?php //echo $errors; ?></b> </p>
			<form  action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method = "POST">
			<p>Username</p>
				<input type ="text" name = "username" id= "Uname" value="" placeholder ="Username" required><br>
			<p>Password</p>
				<input type = "password" name = "password" id= "Pwd" value ="" placeholder= "Password"required><br>
				
				<button  onClick="Javascript:Login()" id ="login">Login</button>
			</form>
			<br>
		</div>
		<p id = "Custom"><a href ="Reg.php"> Register</a></p>
		
	
	</body>
	<div class ="footer">
		<p>Copyright &copy; 2020-2021</p>
	</div>


</html>