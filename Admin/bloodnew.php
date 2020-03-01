<?php
include ('../conn.php');
session_start();
 if(!isset($_SESSION["username"]))
{
	header('location:index.php');
}
 
?>

<html>
	<head>
		<title>Add Blood Details Page</title>
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

		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Add Whole Blood Details </p>
		
		<div style="height:120px; width:500px; margin:auto; margin-top:30px; margin-bottom:90px; background-color:#EAEAEA; ">
		
		<form method="post">
		 <table  width="450px" align="center" >
		 
         <tr><td>&nbsp;</td>
		 <td>&nbsp;</td></tr>
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Pouch ID:-</td>
				<td><input type="text" name="t1" value="" required title=""/></td>
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
	echo $r;
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
</select>
             </td>
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
		echo $a;
		echo $b;
		$inn_query="INSERT INTO `blooddetails`(`pouch_id`, `donation_id`) VALUES('$a','$b')";
		$i=mysql_query($inn_query);
	//	mysql_error($inn_query);
		header('location:blood.php');
	
}
?>