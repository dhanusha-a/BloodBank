<?php
session_start();
 if(!isset($_SESSION["username"]))
{
	header('location:index.php');
}
 
?>

<html>
	<head>
		<title>Admin Home Page</title>
		<link href="StyleSheet.css" rel="stylesheet" type="text/css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> 
	</head>
	
	<body>	
		<!--header & menu start-->
		<?php include("menu.php"); ?>
		<!--header & menu end-->
       
			<center>
			<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Welcome to Admin Panel</p>
			<br>
			<img src="../images/Blood-Donor-Day-2015-Wallpapers.jpg" height="120">
			<img src="../images/images7.jpg" height="120">			
			<img src="../images/images8.jpg" height="120">
			<img src="../images/download1.jpg" height="120">
			<img src="../images/download.jpg" height="120">
			<img src="../images/timthumb.jpg" height="120">			
			<br><br>
			<p style="font-family:Palatino Linotype; font-size:20px; color:#990000"> 
			Among Flowers - The Rose. <br>
			Among Human Beings - The Blood Donor. </p>
			
	</body>
</html>