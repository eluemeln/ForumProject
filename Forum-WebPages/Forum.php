<?php
	session_start();
	if(is_null($_SESSION["username"]))
	{
		header("Location: login.php");	
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Forum</title>
		<meta charset = "utf-8">
		<meta name = "viewpoint content= "width=device-width, initial-scale= 1.0">
		<link rel="stylesheet" type="text/css" href="\Online Store\ForumCSS\Forum.css" media="screen"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
	<body>
			<p> Welcome <?php echo $_SESSION["username"]?><!!!</p>
			<a href = "create_post.php">Create a new Post</a>
			<p id ="cont"><a href ="Logout.php"><b>Want to Logout?<b></a></p>
			
		<div  class = "container">
			<?php
				$t = time(); 
				$datetime = new DateTime();
				$Conn = mysqli_connect("localhost","root","" ,"forum");
				$res = "SELECT  post_title, poster FROM posting";
				$val = mysqli_query($Conn, $res);
				
				//echo"  Posted  on ".(date("d-m-Y",$t))."      ";
				//date_default_timezone_set("America/Edmonton");
			
				//echo date_default_timezone_get();
				//echo"  at  ".date("h:i:sa").".";
				while($vata = mysqli_fetch_assoc($val))
				{
				echo "<a href='Show_content.php?title=".$vata['post_title']."'>".$vata['post_title']."</a> Created 
				by ".$vata["poster"]." at ".$datetime->format('Y-m-d H:i:s')."<br>";
				;
				
				}
				//echo "<a href='Show_content.php?title=".$vata['post_title']."'>".$vata['post_title']."</a> by".$vata["poster"]."<br>"
				//;
			
			?>
			 
		</div>
		
		<div class ="footer">
			<p>Copyright &copy; 2020-2021</p>
	</div>

	</body>
</html>