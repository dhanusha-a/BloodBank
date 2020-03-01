<?php
session_start();
 if(!isset($_SESSION["username"]))
{
	header('location:index.php');
}
 include ('conn.php');
?>

<html>
	<head>
		<title>Add Donation Page</title>
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

		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Add Donation Details </p>
		
		<div style="height:290px; width:500px; margin:auto; margin-top:30px; margin-bottom:90px; background-color:#EAEAEA; ">
		
		<form method="post">
		 <table  width="450px" align="center" >
		 
         <tr><td>&nbsp;</td>
		 <td>&nbsp;</td></tr>
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Date:-</td>
				<td><input type="date" name="t1" value="" required title="please enter only this format mm/dd/yyyy." /></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Donor:-</td>
				<td><select name="t2" required style="width:200px"><option value="">Select</option>
<?php
$cn=makeconnection();
$s="select * from donor";
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
	mysqli_close($cn);

?>
</select></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle"> Unit:-</td>
				<td><select  name="t4">
					<option value="350ml">350ml</option>
					<option value="450ml">450ml</option>
				</select></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Remark:-</td>
				<td><input type="text" name="t5" value=""  pattern="[a-zA-Z _]{5,15}" title="" size=40/></td>
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
$host     = 'localhost';
$dbName   = 'blood_bank';
$userName = 'root';
$password = '';

$connect = mysql_connect($host, $userName, $password) or die(mysql_error());
mysql_select_db($dbName) or die(mysql_error());
	if(isset($_POST["sbmt"])) 
	{
	
		$a=$_POST['t1'];
		$b=$_POST['t2'];
		$c=$_POST['t3'];
		$d=$_POST['t4'];
		$e=$_POST['t5'];
		$inn_query="INSERT INTO `donation`( `date`, `don_id`, `camp_id`, `units`, `remark`) VALUES ('$a','$b','$c','$d','$e')";
		mysql_query($inn_query);
		header('location:donation.php');
	
}
?>	
        	