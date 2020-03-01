<?php
//error_reporting(0);
include ('../conn.php');
session_start();
 if(!isset($_SESSION["username"]))
{
	header('location:index.php');
}
 ?>
<?php
	$id=$_GET['brr_id'];	
	$cn=mysqli_connect("localhost","root","","blood_bank");
	$s="SELECT bloodreq.brr_id,bloodreq.pname,bloodgroup.group,bloodgroup.bgid,bloodcomponent.comp,bloodcomponent.bcid  FROM `bloodreq`,bloodgroup,bloodcomponent WHERE bloodreq.bgid = bloodgroup.bgid And bloodreq.bcid = bloodcomponent.bcid And bloodreq.brr_id ='".$id."'";		
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	$data=mysqli_fetch_array($q);
	//print_r($data);
	$pname=$data[1];
	$bgid=$data[2];
	$bcid=$data[4];
/*	echo "$pname <br>";
	echo "$bgid <br>";
	echo "$bcid <br>";*/	
	mysqli_close($cn);
?> 
<html>
	<head>
		<title>Add Blood Issue Page</title>
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
		
		<div style="height:340px; width:500px; margin:auto; margin-top:30px; margin-bottom:90px; background-color:#EAEAEA; ">
		
		<form method="post">
		 <table  width="450px" align="center" >
           <tr><td>&nbsp;</td>
		 <td>&nbsp;</td></tr>
         	<tr>
				<td class="lefttd"  style="vertical-align:middle"> Blood Reserve ID:-</td>
				<td><select name="t1" required style="width:200px" onChange="self.location=self.location+'?brr_id='+this.selectedIndex"><option><?php $id=$_GET['brr_id']; if($id==true){ echo $id;} else { echo "Select";}?></option>
<?php
$cn=makeconnection();
$s="SELECT * FROM `bloodreq`";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
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
           <tr><td>&nbsp;</td>
		 <td>&nbsp;</td></tr>
         	<tr>
				<td class="lefttd"  style="vertical-align:middle"> Blood Reserve:-</td>
				<td><input type="text" name="t10" value="<?php echo $pname?>" required pattern="[a-zA-Z0-9  ]{2,5}" title=""/>
  </td>
			</tr>
		 
         <tr><td>&nbsp;</td>
		 <td>&nbsp;</td></tr>		
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Blood Group :- </td>
				<td><input type="text" name="t2" value="<?php echo $bgid?>" />
  </td>
			</tr>
			
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Blood Component :-</td>
				<td><input type="text" name="t3" value="<?php echo $bcid?>"/>
  </td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
			<tr>
				<td class="lefttd"  style="vertical-align:middle">Date:-</td>
				<td><input type="date" name="t4" value="" required title="please enter only this format yyyy-mm-dd." /></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
			
			<tr>
				<td class="lefttd"  style="vertical-align:middle"> Price:-</td>
				<td><input type="text" name="t5" value="" required pattern="[0-9_]{2,4}" maxlength="4" title=""/></td>
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
		//echo $a;
		//echo $b;
		$inn_query="INSERT INTO `bloodissue`(`brr_id`,`bgid`,`bcid`,`date`,`price`) VALUES('$a','$b','$c','$d','$e')";
		$i=mysql_query($inn_query);
		$inn_query="UPDATE `bloodreq` SET `status`='Served' WHERE`brr_id`='$a'";
		$i=mysql_query($inn_query);
	//	mysql_error($inn_query);
		header('location:bldiss.php');
	
}
?>