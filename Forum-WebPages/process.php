<?php
$errors ="";
	//if($_SERVER["REQUEST_METHOD"]=="POST")
	//{
		$Conn = mysqli_connect("localhost","root","" ,"forum");
		if (isset($_POST['Submit']))
		{
			$username = $_POST["username"];
			$email = $_POST["email"];
			$password = $_POST["password"];
			$sql = "SELECT username, email FROM register WHERE username =$username and email = $email LIMIT 1";
			$data = mysqli_fetch_assoc($sql);
			if(mysqli_num_rows($data)>0)
			{
				echo "user already exists";
			}
			else
			{
		
				if(empty($email) or empty($password) or !filter_var($email,FILTER_VALIDATE_EMAIL))
				{
					$errors = "invalid inputs";	
				}
				else
				{
					$password = password_hash($password,PASSWORD_DEFAULT);
					$q = "INSERT INTO register(username,email,password) VALUES('$username','$email','$password')";
					$result = mysqli_query($Conn,$q);
				
					if ($result)
					{
						echo "user created!";
							
					}
					else
					{
						
						echo " oop! error occured";
					}
				
				}		
			}
		}
	//}
?>