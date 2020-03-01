<?php
	error_reporting(0);
	include('conn.php');
	$x = date('Y/m/d H:i:s ', time());
	$a=$_POST['name'];
	$b=$_POST['email'];
	$c=$_POST['cno'];
	$e=$_POST['query'];
	$d=$_POST['sub'];
	if(isset($_POST["submit"])) 
{
		$cn=makeconnection();			
		$s="INSERT INTO `inquiry`(`name`, `inquiry`, `subj`, `email`, `cno`, `date`) VALUES ('".$a."','" .$e. "','" .$d. "','" .$b."','" .         $c ."','" . $x ."')";
			
			
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
		<title>Contact Us</title>
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
					<h1>Contact Us </h1>
					
					<table width="460" cellspacing="0" cellpadding="0">       
						<tr>
							<td>
								<table width="100%" cellpadding="0" cellspacing="0" >
									<tr>
										<td height="34" colspan="3" >&nbsp;&nbsp;If you want any information or any clarifications...you can reach us...</td>
									</tr>
									<tr>
										<td width="3%">&nbsp;</td>
										<td width="" align="left">
											<p>
												
												SDJ International College,<br />
												Plot No. 166, &nbsp; Opp. IDI,<br />
												B/h Someshwara Bunglows,<br />
												Vesu - 395007,<br />
												Surat,<br />
												Gujarat<br />
												India<br />
												<br />
												<span class="style7"> </span> 
												Phone : 91 93441 05858&nbsp;<br />
												Email id :demo@bloodbank.com
											</p>
										</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
								</table>
								<div align="center"> </div>
							</td>
						</tr>
						<tr><td ></td></tr>
						<tr>
							<td ><div align="center"> <span class="Alert"> </span></div>
								<div class="PageForms">
									<form method="post" name="form" id="form" onSubmit="return Check_form()">
										<table width="100%" border="0" cellpadding="0" cellspacing="0" >
											<tr>
												<th align="left">Complete the form below to contact us. If you would like a reply, please include your name and email address</th>
											</tr>
											<tr>
												<td>
													<table width="100%" cellpadding="3" cellspacing="4"> <col width="150" />
														<tr>
															<td><span class="redtext">*</span> <span >Name</span></td>
															<td class="Field"><input type="text" id="name" class="keyfield" name="name" value="" required pattern="[a-zA-Z0-9]{4,20}" title="please enter only character for user name" value="" maxlength="10" style="width: 200px; "/>	</td>
														</tr>
														<tr>
															<td><span class="redtext">*</span> <span >Email</span></td>
															<td class="Field"><input type="email" id="email" class="keyfield" required='true' name="email" style="width: 200px;" value="" /></td>
														</tr>
														<tr>
															<td><span class="redtext"></span> <span ><span class="redtext">* </span>Contact number</span></td>
															<td class="Field"><input type="text" id="cno" class="keyfield" name="cno" required pattern="[0-9]{10,10}" title="please enter only Number" value="" maxlength="10" style="width: 200px;"  value="" /></td>
														</tr>                                                        
														<tr>
															<td><span class="redtext">*</span> <span >Inquiry</span> </td>
															<td class="Field">
																<textarea required name="query" cols="22" rows="5" class="keyfield" id="query" style="width: 200px ;"></textarea>
															</td>
														</tr>
														<tr>
															<td class="Gap" colspan="2"></td>
														</tr>
														<tr>
															<td></td>
															<td> <input name="submit" type="submit" class="Button" value="Submit" /> &nbsp;                        
																<input name="submit1" type="reset" class="Button"  id="submit1" value="Reset">
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