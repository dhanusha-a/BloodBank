<?php
error_reporting(0);
$host     = 'localhost';
$dbName   = 'blood_bank';
$userName = 'root';
$password = '';

$connect = mysql_connect($host, $userName, $password) or die(mysql_error());
mysql_select_db($dbName) or die(mysql_error());
 $dis_query="select*from camp";
 $result=mysql_query($dis_query);
 while($row = mysql_fetch_array($result))
 {
	 $rs[]=$row;
 }
	$title=$data[1];
	$org=$data[2];
	$date1=$data[6];
	$es=$data[7];
	$add=$data[3];
	$city=$data[5];
	$pic=$data[10];
	echo $city;
	
	mysqli_close($cn);
?> 
<html>
	<head>
		<title>Camps</title>
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
					<h1> Camps </h1>
					
					<!-- InstanceBeginEditable name="matter" -->
    
					<section class="tabs-section default-section with-padding bg-lightgrey">
					<div class="auto-container">            
					<div class="outer-container">
						<!--Tabs Box-->
						<div class="row clearfix">                
						<div class="col-md-12 padd-bott-40">
						<table width="70%" class="table-bordered table-condensed table-responsive table-striped"> 
							<tbody> 
							 <?php
		       for($i = 0; $i < count($rs); $i++)
				{   
				?>
				 <tr><td colspan="4" >&nbsp;</td></tr>
								<tr> 
									<td width="20%" rowspan="5" align="center" valign="top">
									<img src="camp/<?php echo $rs[$i]['image'] ?>" width="300" height="200"><input type="hidden" name="h1" value="<?php echo $rs[$i]['image']?>"></td>              
									<td>Title</td>
									<td>:</td>
									<td><strong><?php echo $rs[$i]['title']?></strong></td>
								</tr> 
								<tr> 									         
									<td>Organised By</td>
									<td>:</td>
									<td><?php echo $rs[$i]['org']?></td>
								</tr> 
								<tr> 									         
									<td>Date</td>
									<td>:</td>
									<td><?php echo $rs[$i]['date']?></td>
								</tr>
								<tr> 									         
									<td>Estimated Donors</td>
									<td>:</td>
									<td><?php echo $rs[$i]['estimated_donors']?></td>
								</tr>
								<tr> 									         
									<td>Address</td>
									<td>:</td>
									<td><?php echo $rs[$i]['address']?><br><?php echo $rs[$i]['city']?>.</td>
								</tr>            
							</tbody>							
							<?php }?>
						</table>     
						
						</div>				
						</div>
					</div>                
					</div>            
					</section>
					<!-- InstanceEndEditable -->
					
			<!-- END LEFT SIDE-->
			
			<!--footer-->
			<?php include("footer.php"); ?>
			<!--footer-->
		</div>
	<!--END BODY-->	
	</body>
</html>