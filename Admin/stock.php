<?php
session_start();
 if(!isset($_SESSION["username"]))
{
	header('location:index.php');
}
 
?>
<?php
include('../conn.php');
?>
<html>
	<head>
		<title>Reports Page</title>
		<link href="StyleSheet.css" rel="stylesheet" type="text/css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="style1.css" rel="stylesheet" type="text/css">
		<link href="css.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body>
	
		<!--header & menu start-->
		<?php include("menu.php"); ?>
		<!--header & menu end-->
			
		<center>
			<p style="font-family:Palatino Linotype; font-size:31px; color:#990000">Report</p>	
		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Stock</p>
			  <table width="70%" class="table-bordered table-condensed table-striped">  
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
										<td align="center"><?php if($data[1]=='18') {echo $data[0] - $data[5]; } else{echo "0";}?></td>									
										</tr>
								</tbody>
									
							</table>						
                            </center>
                            </body>
                            </html>