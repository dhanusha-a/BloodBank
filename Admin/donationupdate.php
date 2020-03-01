<?php
session_start();
 if(!isset($_SESSION["username"]))
{
	header('location:index.php');
}
 
?>

<html>
	<head>
		<title>Update Donation Page</title>
		<link href="StyleSheet.css" rel="stylesheet" type="text/css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="style1.css" rel="stylesheet" type="text/css">
		<link href="css.css" rel="stylesheet" type="text/css" />
	</head>
 
	<body>
<?php
	include ('../conn.php');
	$id=$_GET['id'];	
	//echo $id;
	$id = substr("$id",15,2);
	$cn=mysqli_connect("localhost","root","","blood_bank");
	$s="SELECT * FROM donation WHERE  donation_id='" . $id. "'";		
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	$data=mysqli_fetch_array($q);
	//print_r($data);
	$date=$data[1];
	$donor=$data[2];
	$camp=$data[3];
	$staff=$data[4];
	$unit=$data[5];
	$remark=$data[6];
//echo $remark;
	mysqli_close($cn);
?> 
		<!--header & menu start-->
		<?php include("menu.php"); ?>
		<!--header & menu end-->
		
		<center>

		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Update Donation Details </p>
		
		<div style="height:290px; width:500px; margin:auto; margin-top:30px; margin-bottom:90px; background-color:#EAEAEA; ">
		
		<form method="post">
		 <table  width="450px" align="center" >
		 
         <tr><td>&nbsp;</td>
		 <td>&nbsp;</td></tr>
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Date:-</td>
				<td><input type="date" name="t1" value="<?php echo @$date;?>" required title="please enter only this format yyyy-mm-dd." /></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Donor:-</td>
				<td><select name="t2" required style="width:200px" selected=""><option value="">Select</option>
<?php
$cn=makeconnection();
$s="select * from donor";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
//	echo $r;
	while($data=mysqli_fetch_array($result))
	{	
			if($donor == $data['don_id'])
			{
			echo "<option selected='selected' value='$data[0]'>$data[1]</option>";
			}
			else
			{
			echo "<option  value='$data[0]'>$data[1]</option>";	
			}
		
	}
	mysqli_close($cn);

?>
</select></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle"> Camp:-</td>
				<td><select name="t3" required style="width:200px"><option value="">Select</option>
<?php
$cn=makeconnection();
$s="select * from camp";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	while($data=mysqli_fetch_array($result))
	{	
			if($camp == $data['camp_id'])
			{
			echo "<option selected='selected' value='$data[0]'>$data[1]</option>";
			}
			else
			{
			echo "<option  value='$data[0]'>$data[1]</option>";	
			}
		
	}
	mysqli_close($cn);

?></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle"> Unit:-</td>
				<td><select name="t4">
					<option value="350ml"<?php if ($unit=='350ml'):?>
selected="selected"<?php endif;?>>350ml</option>
					<option value="450ml" <?php if ($unit=='450ml'):?>
selected="selected"<?php endif;?>>450ml</option>
				</select></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Remark:-</td>
				<td><input type="text" name="t5" value="<?php echo @$remark;?>" pattern="[a-zA-Z  _]{2,15}" title="" size=40/></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
         <tr><td>&nbsp;</td>
		 <td>&nbsp;</td></tr>
		 <tr><td>&nbsp;</td>
		 <td><input type="submit" value="Submit" name="sbmt" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px;"></td></tr>	
        
        <tr><td colspan="2"  align="center"></td></tr>
        
		</table>
		
</form>
</div>
</body>
</html>
<?php
	if(isset($_POST["sbmt"])) 
	{
		$cn=makeconnection();
		$s="UPDATE `donation` SET `date`='" .$_POST["t1"]. "', `don_id`='" .$_POST["t2"]. "', `camp_id`='" .$_POST["t3"]. "',`units`='" .$_POST["t4"]. "', `remark`='" .$_POST["t5"]. "'WHERE `donation_id`='".$id."'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	header('location:donation.php');
	
}
?> 		