<?php
include ('../conn.php');
error_reporting(0);
session_start();
 if(!isset($_SESSION["username"]))
{
	header('location:index.php');
} 
?>
<html>
	<head>
		<title>Add Component Page</title>
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

		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Add Component Details </p>
		
		<div style="height:290px; width:500px; margin:auto; margin-top:30px; margin-bottom:90px; background-color:#EAEAEA; ">
		
		<form method="post" autocomplete="off">
		 <table  width="450px" align="center" >
		 
         <tr><td>&nbsp;</td>
		 <td>&nbsp;</td></tr>		
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Whole Blood ID:-</td>
				<td><select name="t1" required style="width:200px"  onchange="jsFunction(this.value)"; ><option value="">Select</option>
<?php
$cn=makeconnection();
$s="select * from blooddetails";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
//	echo $r;
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"])&& $data[0]==$_POST["s2"])
		{
			echo "<option value=$data[0] selected>$data[0]</option>";
		}
		else
		{
			echo "<option value=$data[0]>$data[0]</option>";
		}
	}
	mysqli_close($cn);
	

?>
</select></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr>
				<td class="lefttd"  style="vertical-align:middle"> Blood Component:-</td>
				<td><select name="t3" required style="width:200px"><option value="">Select</option>
<?php
$cn=makeconnection();
$s="select * from bloodcomponent";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	echo $r;
	while($data=mysqli_fetch_array($result))
	{
		if(isset($_POST["show"])&& $data[0]==$_POST["s2"])
		{
			echo "<option value=$data[0] selected>$data[1]</option>";
		}
		else
		{
			echo "<option value=$data[0]>$data[1]</option>";
		}
	}

?>
</select></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Preparation Date:-</td>
				<td><?php $date=strtotime(date("m/d/Y"));
		$y=date('Y/m/d', $date);
		echo $y;?></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
			
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Expiry Date:-</td>
				<td><?php
     			$bcom=$_POST['t3']; 
				 if($bcom=='10')
				{
					$date = strtotime(date("m/d/Y"));
					$date = strtotime("+30 day", $date);
					$z=date('Y/m/d', $date)  ;
					    echo $z ;
				}
				else if($bcom=='12')
				{
					$date = strtotime(date("m/d/Y"));
					$date = strtotime("+365 day", $date);
					$z=date('Y/m/d', $date)  ;
					    echo $z ;
				}
				else if($bcom=='14')
				{
					$date = strtotime(date("m/d/Y"));
					$date = strtotime("+35 day", $date);
					$z=date('Y/m/d', $date)  ;
					    echo $z ;
				}
				else if ($bcom=='16')
				{
					$date = strtotime(date("m/d/Y"));
					$date = strtotime("+365 day", $date);
					$z=date('Y/m/d', $date)  ;
					    echo $z ;	
				}
				else 
				{
					$date = strtotime(date("m/d/Y"));
					$date = strtotime("+5 day", $date);
					$z=date('Y/m/d', $date)  ;
					    echo $z ;	
				}
				?></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
         <tr><td>&nbsp;</td>
		 <td>&nbsp;</td></tr>
		 <tr><td>&nbsp;</td>
		 <td><input type="submit" value="Add" name="sbmt" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px;"></td></tr>	
        
        <tr><td colspan="2"  align="center"></td></tr>
        
		</table>
		
</form>
</div>
</body>
</html>
<?php
if(isset($_POST["sbmt"])) 
	{
		echo $_POST['t1'];
$cn=makeconnection();
$s="SELECT `blooddetails`.`bidt`,`blooddetails`.`donation_id`,`donation`.`don_id`,donor.bgid, bloodgroup.group FROM `blooddetails`,`donation`, donor,bloodgroup WHERE `blooddetails`.`donation_id`=donation.donation_id And donation.don_id = donor.don_id And donor.bgid= bloodgroup.bgid And blooddetails.bidt='".$_POST['t1']."'";
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	$data=mysqli_fetch_array($q);
	$bgid=$data[3];
		$a=$_POST['t1'];
		$c=$_POST['t3'];
		$s="INSERT INTO `compdetails`(`bidt`, `bgid`, `bcid`, `prepdate`, `expdate`) VALUES('$a','$bgid','$c','$y','$z')";
		mysqli_query($cn,$s);
		mysqli_close($cn);
		header('location:compt.php');	
	}
?>		