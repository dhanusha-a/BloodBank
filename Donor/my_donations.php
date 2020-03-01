<?php
 session_start();
 if(!isset($_SESSION['uname']))
{
	header('location:.	./donorlogin.php');
}
// echo "Hello   ".$_SESSION['uname'];
?>
<?php
	include('../conn.php');
	$cn=makeconnection();
	$s="SELECT `don_id` FROM `donor` WHERE `uname` = '".$_SESSION['uname']."'";
	$q=mysqli_query($cn,$s);
	$data=mysqli_fetch_row($q);
	$uid=$data[0];
	echo $uid;
	$s="SELECT `donor`.`don_id`,`donation`.`date`, `camp`.`title` FROM donor,donation, camp WHERE donation.don_id=donor.don_id And `donation`.`don_id`='".$uid."' And donation.camp_id=camp.camp_id";
	
	$q=mysqli_query($cn,$s);
	//$r=mysqli_num_rows($q);
	//$data=mysqli_fetch_row($q);
	
?>
<html>
	<head>
		<title>My Donations</title>
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
					<br><br>
					<h1>My Donations  </h1>
					
					
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
										<td><strong> Sr.No </strong></td>
										<td><strong> Date </strong></td>
										<td><strong> Camp </strong></td>
									</tr>
									 
		  <?php
				$i=0;
		       while($row=mysqli_fetch_array($q))
			   {
				   $i++;
		     ?>
		  <tr>
				<td><?php echo $i; ?></td>
			  <td><?php echo $row['date']; ?></td>
			  <td><?php echo $row['title']; ?></td>
		  </tr>
				<?php }?>
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