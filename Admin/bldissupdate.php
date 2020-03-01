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
	$cn=mysqli_connect("localhost","root","","blood_bank");
	$s="SELECT * FROM `bloodissue` WHERE  bliss_id='" . $id. "'";		
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	$data=mysqli_fetch_array($q);
	//print_r($data);
	$component=$data[1];
	$component_detail=$data[2];
	$brr=$data[3];
	$date=$data[4];
	$price=$data[6];
	mysqli_close($cn);
?> 


<html>
	<head>
		<title>Update Blood Issue Page</title>
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

		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Blood Issue Details </p>
		
		<div style="height:270px; width:500px; margin:auto; margin-top:30px; margin-bottom:90px; background-color:#EAEAEA; ">
		
		<form method="post">
		 <table  width="450px" align="center" >
		 
         <tr><td>&nbsp;</td>
		 <td>&nbsp;</td></tr>		
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Component</td>
				<td><select name="t1" required style="width:200px"><option>Select </option>
<?php
$cn=makeconnection();
$s="select * from bloodcomponent";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
		while($data=mysqli_fetch_array($result))
	{	
			if($component== $data['bcid'])
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
</select>
  </td>
			</tr>
			
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Component Detail:-</td>
				<td><select name="t2" required style="width:200px"><option>Select </option>
<?php
$cn=makeconnection();
$s="select * from compdetails";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
		while($data=mysqli_fetch_array($result))
	{	
			if($component_detail == $data['comp_dt_id'])
			{
			echo "<option selected='selected' value='$data[0]'>$data[0]</option>";
			}
			else
			{
			echo "<option  value='$data[0]'>$data[0]</option>";	
			}
		
	}
	mysqli_close($cn);

?>
</select>
  </td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle"> Blood Reserve:-</td>
				<td><select name="t3" required style="width:200px"><option>Select </option>
<?php
$cn=makeconnection();
$s="select * from bloodreq";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
		while($data=mysqli_fetch_array($result))
	{	
			if($brr == $data['brr_id'])
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
</select>
  </td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Date:-</td>
				<td><input type="date" name="t4" value="<?php echo $date;?>" required title="please enter only this format yyyy-mm-dd." /></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
			
			<tr>
				<td class="lefttd"  style="vertical-align:middle"> Price:-</td>
				<td><input type="text" name="t5" value="<?php echo $price;?>" required pattern="[0-9_]{2,3}" maxlength="3" title=""/></td>
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