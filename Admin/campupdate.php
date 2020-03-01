<?php
session_start();
 if(!isset($_SESSION["username"]))
{
	header('location:index.php');
}
 
?>

<html>
	<head>
		<title>Update Camps Page</title>
		<link href="StyleSheet.css" rel="stylesheet" type="text/css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="style1.css" rel="stylesheet" type="text/css">
		<link href="css.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php
	$id=$_GET['id'];	
	$id=substr("$id",15,2);
	$cn=mysqli_connect("localhost","root","","blood_bank");
			$s="SELECT * FROM `camp` WHERE  `camp_id`='" . $id. "'";
			
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	
	$data=mysqli_fetch_array($q);
	$title=$data[1];
	$org=$data[2];
	$add=$data[3];
	$city=$data[4];
	$state=$data[5];
	$date=$data[6];
	$es=$data[7];
	$ac=$data[8];
	$unit=$data[9];
	$pic=$data[10];
	$stf=$data[11];
//echo $pic;
	mysqli_close($cn);
?> 

		<!--header & menu start-->
		<?php include("menu.php"); ?>
		<!--header & menu end-->
		
		<center>
		
		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Update Camp Details </p>
		
		<div style="height:580px; width:700px; margin:auto; margin-top:30px; margin-bottom:90px; background-color:#EAEAEA; ">
		
<form method="post">
	<table  width="700px"  style="margin:auto">
		<tr><td>&nbsp;</td></tr>
		<tr><td>&nbsp;</td></tr>
		
		  <tr><td  align="right">&nbsp;</td><td><img src="../camp/<?php echo @$pic; ?>" style="padding-left:40px"  width="200px" height="200px"/>
    <input type="hidden" name="h1" value="<?php {echo @$pic;} ?>" />
    <td style="vertical-align:top" width="450px" height="400px">
	
                
   <td style="vertical-align:top; padding-left:70px" width="500px">
	 <table width="450px" align="center" >
    <tr><td class="lefttd"  style="vertical-align:middle"> Title:-</td><td><input type="text" name="t1" value="<?php echo @$title;  ?>"  required="required" pattern="[a-zA-Z _]{4,15}" title="please enter only character  between 4 to 15 for  name" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
        <tr><td class="lefttd"  style="vertical-align:middle">Organization:-</td><td><input type="text" name="t2"  required="required" pattern="[a-zA-Z _]{2,15}" title="please enter only numbers for age" value="<?php echo @$org;?>" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
          <tr><td class="lefttd"  style="vertical-align:middle"> Address:-</td><td><textarea name="t3" title="please enter only number." pattern="[0-9]{2,2}"><?php echo @$add;?></textarea></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
         <tr><td class="lefttd"  style="vertical-align:middle"> City:-</td><td><input type="text" name="t4" value="<?php echo @$city;?>"  pattern="[a-zA-Z _]{2,10}" title="please enter only number for mobile no." /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
         <tr><td class="lefttd"  style="vertical-align:middle">State:-</td><td><input type="text" name="t5" value="<?php echo @$state;?>"  pattern="[a-zA-Z _]{5,15}" title="please enter only character for Occupation." /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
         <tr><td class="lefttd"  style="vertical-align:middle">Date:-</td><td><input type="text" name="t6" value="<?php echo @$date;?>" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
         
		<tr><td class="lefttd"  style="vertical-align:middle"> Estimated Donors:-</td><td><input type="text" name="t7" value="<?php echo @$es;  ?>"  required="required" pattern="[0-9]{1,3}" title="please enter only character  between 5 to 15 for  name" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
        <tr><td class="lefttd"  style="vertical-align:middle">Actual Donors:-</td><td><input type="text" name="t8"   pattern="[0-9]{2,3}" title="please enter only numbers " value="<?php echo @$ac;?>" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
          <tr><td class="lefttd"  style="vertical-align:middle"> Units:-</td><td><input type="text" name="t9" value="<?php echo @$unit;?>"  pattern="[0-9]{0,2}" title="please enter only number." /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
        
         <tr><td>&nbsp;</td>
		 <td>&nbsp;</td></tr>
		 <tr><td>&nbsp;</td>
		 <td><input type="submit" value="Update" name="sbmt" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; "></td></tr>	
        
        <tr><td colspan="2"  align="center"></td></tr>
        
		</table>
</form>
</div>
<?php
	include('conn.php');
	if(isset($_POST["sbmt"])) 
	{
		$cn=makeconnection();
		$s="UPDATE `camp` SET `image`='" .$pic. "' , title='" .$_POST["t1"]. "' ,org='" .$_POST["t2"]."' , address='" .$_POST["t3"]. "',city='" .$_POST["t4"]. "',state='" .$_POST["t5"]. "',date='" .$_POST["t6"]. "',estimated_donors='" .$_POST["t7"]. "',actual_donors='" .$_POST["t8"]. "' ,units='" .$_POST["t9"]."' , image='" .$_POST["t10"]. "',stf_id='" .$_POST["t11"]. "'where `camp_id`='" . $id. "'";
		
$i=mysqli_query($cn,$s);
	mysqli_close($cn);
	header('location:camp.php');
	
}
?> 