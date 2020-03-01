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
	$id = substr("$id",15,2);
	$cn=mysqli_connect("localhost","root","","blood_bank");
	$s="SELECT * FROM `blooddetails` WHERE  bidt='" . $id. "'";		
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	$data=mysqli_fetch_array($q);
	//print_r($data);
	$pouch=$data[1];
	$donation=$data[2];
	mysqli_close($cn);
?> 

<html>
	<head>
		<title>Update Blood Details Page</title>
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

		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Update Whole Blood Details </p>
		
		<div style="height:120px; width:500px; margin:auto; margin-top:30px; margin-bottom:90px; background-color:#EAEAEA; ">
		
		<form method="post">
		 <table  width="450px" align="center" >
		 
         <tr><td>&nbsp;</td>
		 <td>&nbsp;</td></tr>
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Pouch ID:-</td>
				<td><input type="text" name="t1" value="<?php echo $pouch?>" required pattern="[a-zA-Z0-9  ]{2,5}" title=""/></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Donation ID:-</td>
				<td><select name="t2" required style="width:200px"><option>Select Donation ID</option>
<?php
$cn=makeconnection();
$s="select * from donation";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	while($data=mysqli_fetch_array($result))
	{	
			if($donation == $data['donation_id'])
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
</select></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
			
		 
         <tr><td>&nbsp;</td>
		 <td>&nbsp;</td></tr>
		 <tr><td>&nbsp;</td>
		 <td><input type="submit" value="Update" name="sbmt" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; "></td></tr>	
        
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
		$s="UPDATE `blooddetails` SET `pouch_id`='" .$_POST["t1"]. "',`donation_id`='" .$_POST["t2"]. "' WHERE `bidt`='".$id."'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	header('location:blood.php');
	
}
?> 				