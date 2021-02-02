
<?php
	session_start();
	$message= "";
	if(isset($_SESSION['username']))
	{
		session_destroy();
		
		echo"you are logged out successfully";
		
	}	
	header("location:login.php ");
?>
<!DOCTYPE html>
<html>

	<head>
		<title>My Forum</title>
		<meta charset = "utf-8">
		<meta name = "viewpoint content = "width=device-width, initial-scale = 1.0">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
	<body>
		<p><?php echo $message;?></p>
	
		





	</body>
	<footer class ="footer">
		<p>Copyright &copy; 2020-2021</p>
	<footer>


</html>