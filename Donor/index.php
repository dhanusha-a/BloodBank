<?php
 session_start();
 if(!isset($_SESSION['uname']))
{
	header('location:../donorlogin.php');
}
?>
<?php
	include('../conn.php');
	$cn=makeconnection();
	$s="select * from donor where uname='" . $_SESSION["uname"] . "'";
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	
	$data=mysqli_fetch_array($q);
	$name=$data[5];
	$bgroup=$data[8];
	$gender=$data[6];
	$dob=$data[7];
	$add=$data[11];
	$city=$data[12];
	$cno=$data[10];
	$email=$data[9];
	$pic=$data[15];
	//echo $name;
	mysqli_close($cn);
?> 
<html>
	<head>
		<title>My Profile</title>
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
			<?php include("donor_menu.php"); ?>
			<!--menu-->
			
			<!-- START LEFT SIDE-->	
				<div id="templatemo_left_section">
				<br>
					<h1>Welcome <?php echo $_SESSION['uname'];?></h1>
					
					<h3>Word of Thanks</h3>
					<p><font face="OpenSans" size="3"> 
						"Dear Donor, <br> Blood is a substance that has no substitute. Your blood can save lives of many people. You are a life-guard. We are truly thankful for your kind gesture of blood donation. We hope that you continue the drive with future blood donations." 
					</p>			 
					<FIELDSET style="border-color: #CCCCCC; border-style: solid; border-width: 1px; -moz-border-radius: 1px;">
						<LEGEND>
							<FONT face="Arial, Helvetica, sans-serif" size="3" class="header1">
							<B> Donor Information </B>
							</FONT>
						</LEGEND>
						<table border="0" width="100%" >
							<tbody>									
								<tr>
									<td width="15%">Name</td>
									<td>:</td>
									<td><strong><?php echo $name?></strong></td>
									<td rowspan="6" valign="center"><img src="../doner_pic/<?php echo @$pic; ?>" style="padding-left:40px"  width="170px" height="170px"/>
    <input type="hidden" name="h1" value="<?php {echo @$pic;} ?>"></td>
								</tr>
								<tr>
								  <td>Blood Group</td>
								  <td>:</td>
								  <td><?php 								
								  				if ($bgroup=='13')
												{
													echo "A+";	
												}
												else if ($bgroup=='14')
												{
													echo "A-";	
												}
												else if ($bgroup=='15')
												{
													echo "B+";	
												}
												else if ($bgroup=='16')
												{
													echo "B-";	
												}
												else if ($bgroup=='17')
												{
													echo "AB+";	
												}
												else if ($bgroup=='18')
												{
													echo "AB-";	
												}
												else if ($bgroup=='19')
												{
													echo "O+";	
												}
												else 
												{
													echo "O-";	
												}
												
?></td>
								</tr>
								<tr>
								  <td>Gender</td>
								  <td>:</td>
								  <td><?php echo $gender;?></td>
								</tr>
								<tr>
								  <td>Date of Birth</td>
								  <td>:</td>
								  <td><?php echo $dob;?></td>
								</tr>
								<tr>
								  <td>Address</td>
								  <td>:</td>
								  <td><?php echo $add;?>, <?php echo $city;?>.  </td>
								</tr>
								<tr>
								  <td>Contact No</td>
								  <td>:</td>
								  <td><?php echo $cno;?></td>
								</tr>
								<tr>
								  <td>Email</td>
								  <td>:</td>
								  <td><?php echo $email;?></td>
								</tr>							
							</tbody>
						</table>	
					</fieldset>
					<br><br>
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