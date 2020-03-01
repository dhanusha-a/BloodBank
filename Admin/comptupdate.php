<?php
session_start();
 if(!isset($_SESSION["username"]))
{
	header('location:index.php');
}
 
?>

<?php
	include ('../conn.php');
	$id=$_GET['id'];	
	$id=substr("$id",15,2);
	$cn=mysqli_connect("localhost","root","","blood_bank");
	$s="SELECT * FROM `compdetails` WHERE  `comp_dt_id`='" . $id. "'";		
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	$data=mysqli_fetch_array($q);
	//print_r($data);
	$bidt=$data[1];
	$bgid=$data[2];
	$bcid=$data[3];
	$perdate=$data[4];
	$expdate=$data[5];
	mysqli_close($cn);
?> 

<html>
	<head>
		<title>Update Component Page</title>
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

		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Update Component Details </p>
		
		<div style="height:290px; width:500px; margin:auto; margin-top:30px; margin-bottom:90px; background-color:#EAEAEA; ">
		
		<form method="post">
		 <table  width="450px" align="center" >
		 
         <tr><td>&nbsp;</td>
		 <td>&nbsp;</td></tr>		
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Whole Blood ID:-</td>
				<td><select name="t1" required style="width:200px"><option value="">Select</option>
<?php
$cn=makeconnection();
$s="select * from blooddetails";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	while($data=mysqli_fetch_array($result))
	{	
			if($bidt== $data['bidt'])
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
				<td class="lefttd"  style="vertical-align:middle"> Blood Group:-</td>
				<td><select name="t2" required style="width:200px"><option value="">Select</option>
<?php
$cn=makeconnection();
$s="select * from bloodgroup";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);while($data=mysqli_fetch_array($result))
	{	
			if($bgid == $data['bgid'])
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
				<td class="lefttd"  style="vertical-align:middle"> Blood Component:-</td>
				<td><select name="t3" required style="width:200px"><option value="">Select</option>
<?php
$cn=makeconnection();
$s="select * from bloodcomponent";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	while($data=mysqli_fetch_array($result))
	{	
			if($bcid== $data['bcid'])
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
				<td class="lefttd"  style="vertical-align:middle">Preparation Date:-</td>
				<td><input type="date" name="t4" value="<?php echo $perdate?>" required /></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
			
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Expiry Date:-</td>
				<td><input type="date" name="t5" value="<?php echo $expdate?>" required /></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
         <tr><td>&nbsp;</td>
		 <td>&nbsp;</td></tr>
		 <tr><td>&nbsp;</td>
		 <td><input type="submit" value="Update" name="sbmt" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px;"></td></tr>	
        
        <tr><td colspan="2"  align="center"></td></tr>
        
		</table>
		
</form>
</div>
</body>
</html>
		