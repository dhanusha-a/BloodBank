<?php
	error_reporting(0);
	include('conn.php');
	$x = date('Y/m/d H:i:s ', time());
	$a=$_POST['name'];
	$b=$_POST['email'];
	$c=$_POST['feedback'];
	if(isset($_POST["submit"])) 
{
		$cn=makeconnection();			
		$s="INSERT INTO `feedback`(`name`, `email`, `feedback`, `date`) VALUES('".$a."','" .$b. "','" .$c. "','" .$x."')";
			
			
	$q=mysqli_query($cn,$s);
	mysqli_close($cn);
	if($q>0)
	{
		echo "<script>alert('Details Sent To Admin');</script>";
	}
	else
	{	
		echo "<script>alert('Saving Record Failed');</script>";
	}
}
?>
<html>
	<head>
		<title>Feedback</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link href="css.css" rel="stylesheet" type="text/css" />
	<head>
	
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

				<h1>Feedback</h1>

					<table width="450" cellspacing="0" cellpadding="0">       
						<tr>
							<td ><div align="center"> <span class="Alert"> </span></div>
								<div class="PageForms">
									<form  method="post" name="form" id="form" onSubmit="return Check_form()">
										<table width="100%" border="0" cellpadding="0" cellspacing="0" >
											<tr>
												<th>
													<div align="left">
														A definitive  Blood Bank and Blood Donor site needs your valuable opinion and advice to improve its content, quality and design in order to provide you a wordly-rich experience online. Kindly spend few minutes to fill in the form below:
													</div>
												</th>
											</tr>
											<tr>
												<td><p>&nbsp;</p>
													<table width="100%" cellpadding="3" cellspacing="4"> <col width="150" />
														<tr>
															<td><span class="redtext">*</span> <span >Name</span></td>
															<td class="Field"><input type="text" id="name" class="keyfield" name="name" value="" required pattern="[a-zA-Z0-9]{4,20}" title="please enter only character for user name" value="" maxlength="10" style="width: 200px;  "/></td>
														</tr>
														<tr>
															<td><span class="redtext">*</span> <span >Email</span></td>
															<td class="Field"><input type="email" id="email" class="keyfield" required='true' name="email" style="width: 200px;" value="" /></td>
														</tr>
														<tr>
															<td><span class="redtext">*</span> <span >Feedback</span> </td>
															<td class="Field">
																<textarea required name="feedback" cols="22" rows="5" class="keyfield" id="txtquery" style="width: 200px;"></textarea>
															</td>
														</tr>                         
														<tr>
															<td></td>
															<td ><input name="submit" type="submit" class="Button" id="submit" value="Submit" /> &nbsp;
																<input name="submit1" type="reset" class="Button"  id="submit1" value="Reset" /> 
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</form>
								</div>
							</td>
						</tr>
					</table>   
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