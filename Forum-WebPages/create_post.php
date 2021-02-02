<?php
	$errors ="";
	session_start();
	if(is_null($_SESSION["username"]))
	{
		header("Location: login.php");
			
	}
	if($_SERVER["REQUEST_METHOD"]== "POST")
	{	$Conn = mysqli_connect("localhost","root","" ,"forum");
		
		$title = htmlspecialchars($_POST["title"]);
		$post_desc = htmlspecialchars($_POST["desc"]);
		$poster = $_SESSION["username"];
		if(empty($title) or empty($post_desc))
		{
			$errors = "Fill out the fields";	
			
		}
		else
		{
			$b = " SELECT post_title from posting WHERE post_title = '$title'";
			$c= mysqli_query($Conn, $b);
			$value = mysqli_fetch_array($c);
			if($value["post_title"]==$title)
			{
				$errors= "post already exists";
				
				
			}
			else
			{
				$a = "INSERT INTO posting(poster,post_title, post_desc) VALUES('$poster','$title', '$post_desc')";
				$Var =  mysqli_query($Conn, $a);
				if($Var)
				{
					header("location: Forum.php");
					
				}
				else{
					echo " No post created";
					
				}
			
			}
			
		}	
		
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Creating Posts</title>
		<meta charset = "utf-8">
		<meta name = "viewpoint content= "width=device-width, initial-scale= 1.0">
		<link rel="stylesheet" type="text/css" href="\Online Store\ForumCSS\CreatPost.css" media="screen"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
	
	<body style = "background-color:gray;">
		<div style =" background-color:white;">
			<h4><a href = "Forum.php"><b>Go back to forum</b></a></h4>
			<h2>Create a new post</h2>
		</div>
		
		<p style ="color:red;"><b><?php echo $errors; ?></b></p>
			<form  class = "center" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method = "POST">
				<input type ="text" name = "title" placeholder ="Title" ><br><br>
				<textarea  rows = "20"  cols="60"  name = "desc"placeholder="Post description"required></textarea><br>
				<button type ="Submit">Send</button>
			</form>
		<aside>
			<img src ="\Online Store\Images\Sky.jpg" alt ="sky" width="1350" height ="160"/>
		</aside>
		
		
	
	
	
	
	</body>
	<div class ="footer">
		<p>Copyright &copy; 2020-2021</p>
	</div>


</html>