<?php
session_start();
include('conn.php');
$_SESSION['donorstatus']="";

if(isset($_POST["login"])) 
{
	
	$cn=makeconnection();		
	$pwd=crypt('$_POST["password"]','$5$rounds=5000$anexamplestringforsalt$');
	$pwd=md5($_POST["password"] );
	//echo $pwd;

			$s="select *from donor where uname='" . $_POST["username"] . "' and pwd= '".$pwd."' ";
			
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	mysqli_close($cn);
	if($r>0)
	{
		$_SESSION["uname"]=$_POST["username"];
       $_SESSION['donorstatus']="yes";
	   
//header("location:donor/index.php");
echo "<script>location.replace('donor/index.php');</script>";
	}
	else
	{
		echo "<script>alert('Invalid User Name Or Password');</script>";
	}		
		}	
?> 
<html>
 <head>
	<title>Donor Login</title>
	
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="css.css" rel="stylesheet" type="text/css" />
 </head>
 
 <body>
 <!--START BODY-->
	<div id="templatemo_container">
	
		<!--header-->
		<?php include("header.php"); ?>
		<!--header-->
		
		<!--menu-->
		<?php include("menu.php"); ?>
		<!--menu-->
		
		 <!-- START LEFT SIDE-->	
		<div id="templatemo_left_section">
			<div id="templatemo_left_content">
			<h1>Donor Login </h1>
				<div  style=" padding-left:10px; padding-right:10px; padding-top:10px; padding-bottom:10px"> 
					<form method="post" name="form" id="form" onSubmit="return Check_form()">
						<table width="50%" border="0" cellspacing="5" cellpadding="3">
							<tr>
								<td colspan="3">
									<span class="redtext"> </span>
								</td>
							</tr>
							<tr>
								<td width="35%"><strong>Username :</strong> &nbsp;</td>								
								<td><input name="username" type="text" id="username"  style="font-size:11px" /></td>
							</tr>
							<tr>
								<td><strong>Password :</strong>&nbsp;</td>								
								<td><input name="password" type="password" id="password"  style="font-size:11px" /></td>
							</tr>								
							<tr>
								<td>&nbsp;</td>								
								<td><input type="submit" name="login" id="login" value="Login" /></td>
							</tr>
							<tr>								
								<td colspan="2" align="center"><a href="forgot_pwd.php" style="color:000033" align="center"><strong>Forgot Password</strong></a></td>
							</tr>
							<tr>
								<td><br></td>
							</tr>							
							<tr>
								<td colspan="3"> <strong>New Donor? </strong>
									<a href="donorsignup.php" style="color:000033"><strong>Register Now!</strong></a> &nbsp; &nbsp; &nbsp;
									
								</td>
							</tr>
						</table>						
					</form> 
				</div> 				
			</div>
		</div>
		<!-- END LEFT SIDE-->
		
		<!-- START RIGHT SIDE-->
		<div id="templatemo_right_section">
			<div id="templatemo_jeya_right">
				<div id="templatemo_contact">
					<h2 align="center">Let us be Blood Brothers!</h2>
					<p>						
						<img src = "images/stock-vector-hands-with-heart-shape-on-red-background-illustration-blood-donation-349890737.jpg" vspace="3" border=0  style="border:#C9C9C9 1px solid;" width="180" />						
					</p>
				</div>
			</div>
		</div>
		<!-- END RIGHT SIDE-->
		
		
		<!--footer-->
		<?php include("footer.php"); ?>
		<!--footer-->
		
	</div>
	
<!--body end-->
 </body>
</html>