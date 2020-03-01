<?php
error_reporting(0);
$email=$_POST['email'];
$submit=$_POST['Submit'];
$host     = 'localhost';
$dbName   = 'blood_bank';
$userName = 'root';
$password = '';

$connect = mysql_connect($host, $userName, $password) or die(mysql_error());
mysql_select_db($dbName) or die(mysql_error());
	if (isset($submit))	
	{
		$email_check=mysql_query("SELECT * FROM `donor` WHERE `email`='".$email."'");
		$count=mysql_num_rows($email_check) ;		
		if($count!=0)
		{	
			$ramdom = md5(uniqid(mt_rand()));
			$resetPassLink = 'http://localhost/www.BloodBank.com/resetPassword.php?fp_code='.$ramdom;
			mysql_query("UPDATE `donor` SET `key`='".$ramdom."' WHERE email='".$email."'");
	$mailto = $_POST['email'];
   require 'PHPMailer/PHPMailerAutoload.php';
   $mail = new PHPMailer();
     $mail ->IsSmtp(true);
   $mail ->SMTPDebug = 2;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com.";
   $mail ->Port = 465;
   $mail ->IsHTML(true);
   $mail ->Username = "freedemo6@gmail.com";
   $mail ->Password = "8153858905";
   $mail ->SetFrom("freedemo6@gmail.com");
   $mail ->Subject = "Password Update Request";
   $mail ->Body = 'Dear '.$userDetails['first_name'].', 
				<br/>Recently a request was submitted to reset a password for your account. If this was a mistake, just ignore this email.
				<br/>To reset your password, visit the following link: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>
				<br/> That link will run for Five Minutes and After that you have to request again.     
				<br/><br/>Regards,
				<br/>Life Saver Blood Bank';
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
       echo "<script>alert('The mail will not sent some system error will come.')</script>";
   }
   else
   {
      echo "<script>alert('Forgot Password link will sent your Email Id .')</script>";
	  header('location:index.php');
   }
		}
		else 
		{
			 echo "<script>alert('This email does not exist.')</script>";	
		}
	}
?>
<html>
	<head>
		<title>Forgot Password</title>
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

				<h1>Forgot Password </h1>

				<form name="form" id="form" onSubmit="note();" method="post">
					<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"  >         
						<tr>
							<td width="5%">&nbsp;</td>
							<td width="89%">
								<div align="center">
								<table width="100%" border="0" align="left" cellpadding="1" cellspacing="1">                 
									<tr>
										<td colspan="2" >
											<div align="left">Enter your email address in the box below. <br>Your password will be sent to the email address.</div>
										</td>
									</tr>
									<tr>
										<td colspan="2" >&nbsp;</td>
									</tr>
									<tr>
										<td colspan="2"  > <p class="redtext"> </p>	</td>
									</tr>
									<tr>
										<td width="23%" ><div align="left">Enter Email ID </div></td>
										<td width="77%">
											<div align="left">
												<input name="email" type="email" id="email" required />
												<input name="Submit" type="submit"  id="Submit" value="Submit"   />
											</div>
										</td>
									</tr>                 
									<tr>
										<td colspan="2"  ><div align="left"></div></td>
									</tr>
								</table>
								</div>
							</td>
							<td width="6%">&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					</table>
				</form>
				<p>&nbsp;</p>
				<p align="justify">. 
				<p align="center">
					<a href="donorsignup.php">
						<img src="images/donor-icon.gif" alt="Free Blood Donors Registration On  Blood Bank.Com" width="197" height="60" border="0" align="absmiddle" />
					</a>
				</p> 
				<br />
				</div>
			</div>
			<!-- END LEFT SIDE-->
  
  
	
			<!--footer-->
			<?php include("footer.php"); ?>
			<!--footer-->
		</div>
	<!--END BODY-->	
	</body>
</html>