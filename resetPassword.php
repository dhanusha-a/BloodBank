<?php 
	error_reporting(0);

?>

<html>
	<head>
		<title>New Password</title>
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

				<h1>Enter New Password </h1>
				<form name="form" id="form" method="post">
					<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"  >         
						<tr>
							<td width="5%">&nbsp;</td>
							<td width="89%">
								<div align="center">
								<table width="70%" border="0" align="left" cellpadding="1" cellspacing="1">                 
									<tr>
										<td colspan="2" >
											<div align="left">Enter your new password in the box below.</div>
										</td>
									</tr>
									<tr>
										<td colspan="2" >&nbsp;</td>
									</tr>
									<tr>
										<td colspan="2"  > <p class="redtext"> </p>	</td>
									</tr>
									<tr>
										<td><div align="left">Enter New Password </div></td>
										<td>
											<div align="left">
												<input name="pass" type="password" required maxlength="10" pattern="[a-zA-Z0-9 ]{2,10}" title="please enter only character and numbers between 2 to 10 for password"  />												
											</div>
										</td>
									</tr>    
									<tr>
										<td><div align="left">Re-Enter New Password </div></td>
										<td>
											<div align="left">
												<input name="cpass" type="password" required maxlength="10" pattern="[a-zA-Z0-9 ]{2,10}" title="please enter only character and numbers between 2 to 10 for password"/>												
											</div>
										</td>
									</tr>    
									<tr>
										<td>&nbsp;</td>
										</td>&nbsp;</td>
									</tr>
									<tr>
										<td></td>
										<td ><input name="submit" type="submit" class="Button" id="submit" value="Submit" /> &nbsp;
											<input name="submit1" type="reset" class="Button"  id="submit1" value="Reset" /> 
										</td>
									</tr>
								</table>
								</div>
							</td>
						</tr>
					</table>
				</form>
			</div>
			<!-- END LEFT SIDE-->
			<br><br><br>
  
	
			<!--footer-->
			<?php include("footer.php"); ?>
			<!--footer-->
		</div>
	<!--END BODY-->	
	</body>
</html>
<?php 
$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
$a= end( explode( "=", $escaped_url ) );
$email=$_POST['email'];
$submit=$_POST['submit'];
$host     = 'localhost';
$dbName   = 'blood_bank';
$userName = 'root';
$password = '';

$connect = mysql_connect($host, $userName, $password) or die(mysql_error());
mysql_select_db($dbName) or die(mysql_error());
$email_check=mysql_query("SELECT * FROM donor WHERE `key`='".$a."'");
		$count=mysql_num_rows($email_check) ;
		if($count!=0)
		{	
		if (isset($submit))
		{
			$pwd=md5($_POST['pass']);
			mysql_query("UPDATE `donor` SET `pwd`='".$pwd."' WHERE `key`='".$a."'");
			header('location:donorlogin.php');		
		}
		}
		else 
		{
			header('location:index.php');	
		}
?>