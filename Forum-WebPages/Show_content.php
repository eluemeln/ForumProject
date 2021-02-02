<?php
//include('Reg.php');
	session_start();
	if(is_null($_SESSION["username"]))
	{
		header("Location: login.php");
			
	}
?>
<!DOCTYPE html>
<html>
	<head>
		
		<title>Show content </title>
		<meta charset = "utf-8">
		<meta name = "viewpoint content= "width=device-width, initial-scale= 1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		
	</head>
	
	<body>
	<div>
	 <h1><a href = "Forum.php">Go back to forum</a><h1>
	 </div>
	
		<?php
		
		$Conn = mysqli_connect("localhost","root","" ,"forum");
		$title = "";
		//$email = $_SESSION["email"];
		if(isset($_REQUEST['title']))
		{
			$title = $_REQUEST['title'];
			
		}else{
			header("location:Forum.php");
			
		}
		$t = time();
		$querry = "SELECT poster, post_title, post_desc FROM posting  WHERE post_title = '$title'";
		$rows = mysqli_query($Conn, $querry);
		$data = mysqli_fetch_array($rows);
		if(is_null($data["post_title"]))
		{
			header("location:Forum.php");
		}
	
		echo"<h1>Topic:".$data["post_title"]. "</h1>";
		echo"<p<b> By ".$data["poster"].".</b><p>";
		echo"<p>Blog Post: ".$data["post_desc"]. ".</p>";
		echo"  Posted  on ".(date("d-m-Y",$t))."      ";
		date_default_timezone_set("America/Edmonton");
		
		echo date_default_timezone_get();
		$t = $data["post_title"];
		$pd = $data["post_desc"];
		echo"  at  ".date("h:i:sa").".";
		//$headers = 'From:ndk996@yahoo.com';
		//mail("nen043555@gmail.com",$t,$pd);
		?>
		
	</body>
	<br><br>
	<footer>
		<p><a href = "Logout.php">Logout</a></p>
	
	</footer>

</html>