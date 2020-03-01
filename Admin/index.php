<html>
	<head>
		<title>Admin Login</title>
		<link href="css/lightbox.css" rel="stylesheet" />
		<link href="StyleSheet.css" rel="stylesheet" type="text/css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	</head>

	<body>
		<?php include('conn.php'); ?>

		<!--header-->		
		<br>
			<center><h1><a href="Home.php"><img src="images/logo1.png" alt="" height="50"></a></h1></center><br>
		<!--header-->
		
		<!--menu-->
		<div class="nav_bg">
		<div class="wrap">
		<ul class="nav">
			<li ><a href="../index.php" target="_blank">Home</a></li>			
        </ul>
		</div>
		<!--menu-->
  
   
		<div style="height:427px;">
			<form method="post">

			<table width="600px" height="300px"  style="margin:auto; margin-top:30px;" color="white">
				<tr>  </tr>
				<tr>
					<td colspan="2" align="center"><font style="font-family:Lucida Calligraphy; font-size:27px; color:#990000">Admin Login</td>
				</tr>    
								
                <tr>
					<td align="right"><img src="images/images45.jpg" width="150px" height="150px" /></td>
                    <td style="vertical-align:top">
					
						<table height="130px"> 					
							<tr>
								<td class="lefttd"> <font style="font-family:Lucida Calligraphy; font-size:15px;"> Username: &nbsp;</td>
								<td><input type="text" name="t1" /></td>
							</tr>
							<tr>
								<td class="lefttd"> <font style="font-family:Lucida Calligraphy; font-size:15px;"> Password:</td>
								<td><input type="password"name="t2" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><input type="submit" value="Log In" name="sbmt" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-size:15px; text-shadow:1px 1px 6px black; font-family:Lucida Calligraphy;"></td>
							</tr>            
						</table>
					</td>
				</tr>
			</table>		
			</form>
		</div>
       
        <!--footer-->		
		<?php include("footer.php"); ?>	
		<!--footer-->
		
		


<?php
session_start();
$_SESSION['loginstatus']="";
$pwd=md5($_POST["t2"] );
if(isset($_POST["sbmt"])) 
{
	
	$cn=makeconnection();			

			$s="SELECT * FROM `admin` WHERE uname='" . $_POST["t1"] . "' and pwd='" .$pwd. "'";
			
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	$data=mysqli_fetch_array($q);
	
	
	mysqli_close($cn);
	if($r>0)
	{
		$_SESSION["username"]=$_POST["t1"];
		$_SESSION["usertype"]=$data[2];
		$_SESSION['loginstatus']="yes";
		echo $_SESSION["username"];
		header("location:home.php");
	}
	else
	{
		echo "<script>alert('Invalid User Name Or Password');</script>";
	}
		
		}	
	

?> 
</body>
</html>