<?php
	include('conn.php');
?>
<html>
	<head>
		<title>Blood Stock</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link href="css.css" rel="stylesheet" type="text/css" />
		
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/revolution-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/font-awesome.css" rel="stylesheet">
		<link href="css/flaticon.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/owl.css" rel="stylesheet">
		<link href="css/jquery.fancybox.css" rel="stylesheet">
		<link href="css/hover.css" rel="stylesheet">
	</head>
  
	<body >
	<!--START BODY-->		
		<div id="templatemo_container">
			<!--header-->
			<?php include("header.php"); ?>
			<!--header-->
		
			<!--menu-->
			<?php include("menu.php"); ?>
			<!--menu-->
			
			<!-- START LEFT SIDE-->				
					<br><br>
					<h1>Blood Stock  </h1>
					
					
					<!-- InstanceBeginEditable name="matter" -->    
					<section class="tabs-section default-section with-padding bg-lightgrey">
						<div class="auto-container">
            
						<div class="outer-container">
							<!--Tabs Box-->
							<div class="row">
							<div class="content-column col-md-12">
								<!--<h4>Surat Raktadan Kendra & Research Centre's Stock Position # as on</h4>-->
							<div class="upper-content">
							<div class="text">                
                 
							<div class="row">
							<div class="col-md-8">
                 	            <!-- <h4>Updated On 11th March 2017</h4><br>-->
								
							<table width="100%" class="table-bordered table-condensed table-striped">  
								<tbody>
									<tr>
										<td><strong>Rh</strong></td>
										<td colspan="4" align="center"><strong>Positive</strong></td>
										<td colspan="4" align="center"><strong>Negative</strong></td>
									</tr>
									<tr>
									  <td><strong> Group</strong></td>
									  <td align="center"><strong>A</strong></td>
									  <td align="center"><strong>B</strong></td>
									  <td align="center"><strong>O</strong></td>
									  <td align="center"><strong>AB</strong></td>
									  <td align="center"><strong>A</strong></td>
									  <td align="center"><strong>B</strong></td>
									  <td align="center"><strong>O</strong></td>
									  <td align="center"><strong>AB</strong></td>
									</tr>
									<tr>
										<td><strong>Whole Blood</strong></td>
										<?php 
										$cn=makeconnection();
										$s="select count(comp_dt_id) as total ,cd.bgid ,(select bg.group from bloodgroup as bg where bg.bgid = cd.bgid) as groupf, cd.bcid ,(select bc.comp from bloodcomponent as bc where bc.bcid = cd.bcid) as bcomp , (select count(bliss_id) from bloodissue as bi  where bi.bgid = cd.bgid and bi.bcid = cd.bcid) as issue from compdetails as cd where bcid=10 group by cd.bgid , cd.bcid";
										$q=mysqli_query($cn,$s);	
										$data=mysqli_fetch_array($q);
										//print_r($data);
										mysqli_close($cn);?>
										<td align="center"><?php if($data[1]=='13') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='15') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='19') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='17') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='14') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='16') {echo $data[0] - $data[5]; } else{echo "0";}?></td>
										<td align="center"><?php if($data[1]=='20') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='18') {echo $data[0] - $data[5]; } else{echo "0";}?></td>										 
									</tr>
									<tr>
										<td><strong>Red Cell Concentrate</strong></td>
										<?php 
										$cn=makeconnection();
										$s="select count(comp_dt_id) as total ,cd.bgid ,(select bg.group from bloodgroup as bg where bg.bgid = cd.bgid) as groupf, cd.bcid ,(select bc.comp from bloodcomponent as bc where bc.bcid = cd.bcid) as bcomp , (select count(bliss_id) from bloodissue as bi  where bi.bgid = cd.bgid and bi.bcid = cd.bcid) as issue from compdetails as cd where bcid=14 group by cd.bgid , cd.bcid";
										$q=mysqli_query($cn,$s);	
										$data=mysqli_fetch_array($q);
										//print_r($data);
										mysqli_close($cn);?>
										<td align="center"><?php if($data[1]=='13') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='15') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='19') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='17') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='14') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='16') {echo $data[0] - $data[5]; } else{echo "0";}?></td>
										<td align="center"><?php if($data[1]=='20') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='18') {echo $data[0] - $data[5]; } else{echo "0";}?></td>	
									</tr>
									<tr>
										<td><strong>Platelet Concentrate</strong></td>
										<?php 
										$cn=makeconnection();
										$s="select count(comp_dt_id) as total ,cd.bgid ,(select bg.group from bloodgroup as bg where bg.bgid = cd.bgid) as groupf, cd.bcid ,(select bc.comp from bloodcomponent as bc where bc.bcid = cd.bcid) as bcomp , (select count(bliss_id) from bloodissue as bi  where bi.bgid = cd.bgid and bi.bcid = cd.bcid) as issue from compdetails as cd where bcid=18 group by cd.bgid , cd.bcid";
										$q=mysqli_query($cn,$s);	
										$data=mysqli_fetch_array($q);
										//print_r($data);
										mysqli_close($cn);?>
										<td align="center"><?php if($data[1]=='13') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='15') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='19') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='17') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='14') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='16') {echo $data[0] - $data[5]; } else{echo "0";}?></td>
										<td align="center"><?php if($data[1]=='20') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='18') {echo $data[0] - $data[5]; } else{echo "0";}?></td>	
									</tr>
									<tr>
										<td><strong>Fresh Frozen Plasma</strong></td>
										<?php 
										$cn=makeconnection();
										$s="select count(comp_dt_id) as total ,cd.bgid ,(select bg.group from bloodgroup as bg where bg.bgid = cd.bgid) as groupf, cd.bcid ,(select bc.comp from bloodcomponent as bc where bc.bcid = cd.bcid) as bcomp , (select count(bliss_id) from bloodissue as bi  where bi.bgid = cd.bgid and bi.bcid = cd.bcid) as issue from compdetails as cd where bcid=12 group by cd.bgid , cd.bcid";
										$q=mysqli_query($cn,$s);	
										$data=mysqli_fetch_array($q);
										//print_r($data);
										mysqli_close($cn);?>
										<td align="center"><?php if($data[1]=='13') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='15') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='19') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='17') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='14') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='16') {echo $data[0] - $data[5]; } else{echo "0";}?></td>
										<td align="center"><?php if($data[1]=='20') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='18') {echo $data[0] - $data[5]; } else{echo "0";}?></td>											 
									</tr>
									<tr>
										<td><strong>Cryoprecipitate</strong></td>
										<?php 
										$cn=makeconnection();
										$s="select count(comp_dt_id) as total ,cd.bgid ,(select bg.group from bloodgroup as bg where bg.bgid = cd.bgid) as groupf, cd.bcid ,(select bc.comp from bloodcomponent as bc where bc.bcid = cd.bcid) as bcomp , (select count(bliss_id) from bloodissue as bi  where bi.bgid = cd.bgid and bi.bcid = cd.bcid) as issue from compdetails as cd where bcid=16 group by cd.bgid , cd.bcid";
										$q=mysqli_query($cn,$s);	
										$data=mysqli_fetch_array($q);
										//print_r($data);
										mysqli_close($cn);?>
										<td align="center"><?php if($data[1]=='13') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='15') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='19') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='17') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='14') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='16') {echo $data[0] - $data[5]; } else{echo "0";}?></td>
										<td align="center"><?php if($data[1]=='20') {echo $data[0] - $data[5]; } else{echo "0";} ?></td>
										<td align="center"><?php if($data[1]=='18') {echo $data[0] - $data[5]; } else{echo "0";}?></td>										</tr>
								</tbody>
							</table>								 

							</div>									 
							</div>								 
							</div>
							</div>
							</div>
							</div>
						</div>								
						</div>
					</section>
					<!-- InstanceEndEditable -->
					
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