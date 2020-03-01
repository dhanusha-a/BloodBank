<?php
session_start();
 if(!isset($_SESSION["username"]))
{
	header('location:index.php');
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staff Update Page</title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="style1.css" rel="stylesheet" type="text/css">
 <link href="css.css" rel="stylesheet" type="text/css" />

</head>
<body>
	<?php
	$id=$_GET['id'];	
	$cn=mysqli_connect("localhost","root","","blood_bank");
			$s="SELECT * FROM `staff` WHERE  `stf_id`='" . $id. "'";
			
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	
	$data=mysqli_fetch_array($q);
	$name=$data[1];
	$uname=$data[2];
	$pass=$data[3];
	$de=$data[5];
	mysqli_close($cn);
		
		
	
	

?> 

		<!--header & menu start-->
		<?php include("menu.php"); ?>
		<!--header & menu end-->
		
		<center>
		
		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Update Staff Details </p>

		<div style="height:240px; width:600px; margin:auto; margin-top:30px; margin-bottom:90px; background-color:#EAEAEA; ">

<form method="post">
	<table  width="700px"  style="margin:auto"><tr><td>&nbsp;</td></tr>

    <td style="vertical-align:top" width="450px" height="400px">
                <table cellpadding="0" cellspacing="0" width="450px">
   <td style="vertical-align:top; padding-left:70px" width="500px">
	 <table cellpadding="0" cellspacing="0" width="450px" align="center" >
    <tr><td class="lefttd"  style="vertical-align:middle">Name:-</td><td><input type="text" name="t1" value="<?php echo @$name;  ?>"  required="required" pattern="[a-zA-Z _]{5,15}" title="please enter only character  between 5 to 15 for  name" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr><td class="lefttd"  style="vertical-align:middle">User Name:-</td><td><input type="text" name="t2"  required="required" pattern="[a-zA-Z]{2,15}" title="please enter only character for User Name" value="<?php echo @$uname;?>" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
          <tr><td class="lefttd"  style="vertical-align:middle"> Password:-</td><td><input name="t3" type="password" pattern="[a-zA-Z0-9]{6,12}" title="please enter number and character." value="<?php echo @$pass;?>" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
         <tr><td class="lefttd"  style="vertical-align:middle"> Designation:-</td><td><input type="text" name="t4" value="<?php echo @$de;?>"  pattern="[a-zA-Z _]{2,10}" title="please enter only number for designation." /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>		<tr><td>&nbsp;</td><td><input type="submit" value="Update" name="sbmt" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px;  "></td></tr>	
        
        <tr><td colspan="2"  align="center"></td></tr>
        
		</table>
</form>
</div>
<?php
	include('conn.php');
	if(isset($_POST["sbmt"])) 
	{
		$cn=makeconnection();
		
		
					$s="UPDATE `staff` SET name='" .$_POST["t1"]. "' ,uname='" .$_POST["t2"]."' , pwd='" .$_POST["t3"]. "',designation='" .$_POST["t4"]. "' where stf_id='" . $id. "'";
		
$i=mysqli_query($cn,$s);
	mysqli_close($cn);
	header('location:staff.php');
	
}
?> 