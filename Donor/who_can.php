<?php
 session_start();
 if(!isset($_SESSION['uname']))
{
	header('location:../donorlogin.php');
}
?>
<html>
	<head>
		<title>Eligibility to donate blood</title>
		<link href="../style.css" rel="stylesheet" type="text/css">
		<link href="../css.css" rel="stylesheet" type="text/css" />		
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
				<div id="templatemo_left_content">
					<h1>Who Can/Can't Blood Donate   </h1>

					<table width="100%" border="0" cellpadding="0" cellspacing="0" >
						<tr>
							<td><b>DOs and DONT's of Blood Donation</b> </td>							
						</tr>
						<tr><td><br> </td></tr>
						<tr>
							<td>
								<table width="100%" cellpadding="0" cellspacing="0">
									<col width="150" />
									<tr>
										<td class="Gap"></td>
									</tr>
									<tr>
										<td>
										<div style="display: inline"> 
										<span class="H2Text">Let others benefit from your good health. Do donate blood if ... </span><br />
										<span>you are between age group of 18-60 years.<br />
											 your weight is 45 kgs or more.<br />
											 your haemoglobin is 12.5 gm% minimum.<br />
											 your last blood donation was 3 months earlier.<br />
											 you are healthy and have not suffered from malaria, typhoid or other transmissible disease in the recent past. <br />
										 </span>
										 <span>
											<p>There are many, many people who meet these parameters of health and fitness! <br />
											 Do abide by our rules - be truthful about your health status! </p>
										 </span>
											<p>We ensure the health of blood, before we take it, as well as after it is collected.<br> Firstly, the donor is expected to be honest about his or her health history and current condition. <br>Secondly, collected blood is tested for venereal diseases, hepatitis B &amp; C and AIDS. </p>
											<p>You have to be healthy to give 'safe blood' .</p>
											<p><em><strong>Do not donate blood if you have any of these conditions</strong></em><br /><br>
											   <span class="style7">
											   <img hspace="16" src="../images/no.gif" />Malaria   (within 1 year)<br />
											   <img hspace="16" src="../images/no.gif"  />Hepatitis B, C *<br />
											   <img hspace="16" src="../images/no.gif" />Any other type of   Jaundice (within 16 years)<br />
											   <img hspace="16" src="../images/no.gif" />AIDS<br />
											   <img hspace="16" src="../images/no.gif" />Tuberculosis   (within 2 years)<br />
											   <img hspace="16" src="../images/no.gif" />Diabetes (are you under medication currently?)<br />
											   <img hspace="16" src="../images/no.gif" />Fits/ Convulsions (are you under medication currently?)<br />
											   <img hspace="16" src="../images/no.gif" />Cancer *<br />
											   <img hspace="16" src="../images/no.gif" />Leprosy or any   other infectious diseases<br />
											   <img hspace="16" src="../images/no.gif" />Any allergies (Only if you are suffering from   severe symptoms)<br />
											   <img hspace="16" src="../images/no.gif" />Hemophilia/ Bleeding problems *<br />
											   <img hspace="16" src="../images/no.gif" />Kidney disease *<br />
											   <img hspace="16" src="../images/no.gif" />Heart disease *<br />
											   <img hspace="16" src="../images/no.gif" />Chicken Pox (within   1 year)<br />
											   <img hspace="16" src="../images/no.gif" />Hormonal disorders *<br />
											   <img hspace="16" src="../images/no.gif" />Hemoglobin   deficiency / Anemia (recently)<br />
											   <img hspace="16" src="../images/no.gif" />Drastic weight loss   (recently)<br />
											   <img hspace="16" src="../images/no.gif" />Small Pox Vaccination (within the last 3 weeks)<br />
											   <img hspace="16" src="../images/no.gif" />Blood Donation (within the last 3 months)<br />
											   <img hspace="16" src="../images/no.gif" />Blood Transfusion   (within the last 6 months)<br />
											   <img hspace="16" src="../images/no.gif" />Major Surgery (within the last 3 months)<br />
											   <img hspace="16" src="../images/no.gif" />Pregnancy (within the last 6 months)<br />
											   <img hspace="16" src="../images/no.gif" />Organ   Transplant (within one year) </span> </p>                
                
										</div>
										</td>
									</tr>
									<tr> <td colspan="2">&nbsp;</td> </tr>
									 <tr>
										<td colspan="2"><div align="center">
											<input name="button" type="button" class="Button" onClick="self.location='donorsignup.php'" value="Yes! eligible, I want to save a life" />
										</div></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>  <br />
				</div>
			</div>
			<!-- END LEFT SIDE-->
  
		<!-- START RIGHT SIDE-->
		<div id="templatemo_right_section">
		
			<div id="templatemo_category">
				<h2><strong>Blood Donations</strong></h2>
					<div class="templatemo_rightmenu">
						<ul>
							<li><a class="rp_icontitles" href="abt_blood_donate.php">About Blood Donate</a></li>
							<li> <a class="rp_icontitles" href="who_can.php">Who Can/Can't Donate </a></li>
							<li> <a class="rp_icontitles"  href="why_donate.php">Why Donate Blood?</a></li>
							<li> <a class="rp_icontitles"  href="products.php">Products</a></li>
						</ul>
					</div>
			</div>
			
			<br><br>
			
			<div id="templatemo_contact">
				<h2>Give the gift of life, donate blood.</h2>
				<p>		
					<br> 
					<img src = "../images/download3.jpg"  style="border:#C9C9C9 1px solid;" width="180"/>	
					<br> <br>
					<img src = "../images/download.jpg"  style="border:#C9C9C9 1px solid;" width="180"/>	
					<br> <br>
					<img src = "../images/images6.jpg"  style="border:#C9C9C9 1px solid;" width="180"/>	
				</p>
			</div>
			
		</div>
		<!-- END RIGHT SIDE-->
			
			<!--footer-->
			<?php include("footer.php"); ?>
			<!--footer-->
		</div>
	<!--END BODY-->	
	</body>
</html>