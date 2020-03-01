<?php
 session_start();
 if(!isset($_SESSION['uname']))
{
	header('location:../donorlogin.php');
}
?>
<html>
	<head>
		<title>Products</title>
		<link href="../style.css" rel="stylesheet" type="text/css">
		<link href="../css.css" rel="stylesheet" type="text/css" />
		
		<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/revolution-slider.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/font-awesome.css" rel="stylesheet">
<link href="../css/flaticon.css" rel="stylesheet">
<link href="../css/animate.css" rel="stylesheet">
<link href="../css/owl.css" rel="stylesheet">
<link href="../css/jquery.fancybox.css" rel="stylesheet">
<link href="../css/hover.css" rel="stylesheet">
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
			<!--<div id="templatemo_left_section">
				<div id="templatemo_left_content">-->
				
				<br><br>
					<h1>Blood Bank has license to supply following blood products :</h1>			
			
					<div class="padd-top-30">
						<table  width="100%" class="table-bordered table-condensed table-responsive table-striped">
							<tbody>
								<tr>
									<td><strong>1.</strong></td>
									<td><strong>Packed Red Cells (Red Cell Concentrate) : </strong></td>
									<td rowspan="2" align="center"><img src="../images/product01.jpg" width="81" height="150"></td>
								</tr>
								<tr>
									<td> </td>
									<td>&quot;This product is indicated   in anemia and for the patients having blood loss during surgery, due to   accidents, because of the obstetric and gynecological complications etc. </td>
								</tr>
							</tbody>
						</table>
					</div>
                 
					<div class="padd-top-30">
						<table width="100%" class="table-bordered table-condensed table-responsive table-striped">
							<tbody>
								<tr>
									<td><strong>2.</strong></td>
									<td><strong>Platelet Concentrate :</strong></td>
									<td rowspan="2" align="center"><img src="../images/product02.jpg" width="82" height="150"></td>
								</tr>
								<tr>
									<td> </td>
									<td>This product is required for patients suffering from bleeding disorders. Bloood Bank staff prepares random donor and single donor platelets (SDP). SDP are obtained on Cell Separator machine using apheresis procedure. </td>
								</tr>
							</tbody>
						</table>
					</div>
                 
					<div class="padd-top-30">
						<table width="100%" class="table-bordered table-condensed table-responsive table-striped">
							<tbody>
								<tr>
									<td width="2%"><strong>3.</strong></td>
									<td width="88%"><strong>Fresh Frozen Plasma (FFP) : </strong></td>
									<td width="10%" rowspan="2" align="center"><img src="../images/product03.jpg" width="84" height="150"></td>
								</tr>	
								<tr>
									<td> </td>
									<td>Patients having liver disorders and bleeding disorders mainly need FFP. </td>
								</tr>
							</tbody>
						</table>
					</div>
                 
					<div class="padd-top-30">
						<table width="100%" class="table-bordered table-condensed table-responsive table-striped">
							<tbody>
								<tr>
									<td><strong>4.</strong></td>
									<td><strong>Cryoprecipitate : </strong></td>
									<td rowspan="2" align="center"><img src="../images/product04.jpg" width="102" height="150"></td>
								</tr>
								<tr>
									<td> </td>
									<td>Cryoprecipitate or anti-hemophilic factor is required for hemophilia patients having coagulation factor VIII deficiency. It is also useful to save life of the patient suffering from disseminated coagulation disorder (DIC) </td>
								</tr>
							</tbody>
						</table>
					</div>
				
					<div class="padd-top-30">
						<table width="100%" class="table-bordered table-condensed table-responsive table-striped">
							<tbody>
								<tr>
									<td><strong>5.</strong></td>
									<td><strong>Whole Human Blood : </strong></td>
									<td rowspan="2" align="center"><img src="../images/product05.jpg" width="92" height="150"></td>
								</tr>
								<tr>
									<td> </td>
									<td>Use of whole blood (WB) is now replaced by components due to many disadvantages associated with WB. Clinicians demand WB for exchange transfusion and cases of accident/surgery where major blood loss is expected. However, in such cases also use of RCC and FFP is now encouraged. </td>
								</tr>
							</tbody>
						</table>
					</div>
				 
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