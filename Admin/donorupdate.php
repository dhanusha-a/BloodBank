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
<title>Donor Update Page</title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="style1.css" rel="stylesheet" type="text/css">
 <link href="css.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php
	$id=$_GET['id'];	
	$id = substr("$id",15,2);
	$cn=mysqli_connect("localhost","root","","blood_bank");
	$s="SELECT * FROM `donor` WHERE  `don_id`='" . $id. "'";
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	
	$data=mysqli_fetch_array($q);
	$uname=$data[1];
	$name=$data[5];
	$gender=$data[6];
	$dob=$data[7];
	$bgid=$data[8];
	$email=$data[9];
	$cno=$data[10];
	$add=$data[11];
	$city=$data[12];
	$state=$data[13];
	$weight=$data[14];
	$pic=$data[15];
	$occupation=$data[16];

	mysqli_close($cn);
		
		
	
	

?> 


		<!--header & menu start-->
		<?php include("menu.php"); ?>
		<!--header & menu end-->
		
		<center>
		
		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Update Donor Details </p>

		<div style="height:600px; width:700px; margin:auto; margin-top:30px; margin-bottom:90px; background-color:#EAEAEA; ">

<form method="post">
	<table  width="700px"  style="margin:auto">
		<tr><td>&nbsp;</td></tr>
		<tr><td>&nbsp;</td></tr>
		
    <tr><td  align="right">&nbsp;</td><td><img src="../doner_pic/<?php echo @$pic; ?>" style="padding-left:40px"  width="200px" height="200px"/>
    <input type="hidden" name="h1" value="<?php {echo @$pic;} ?>" />

    <td style="vertical-align:top" width="450px" height="400px">
                <table cellpadding="0" cellspacing="0" width="450px">
   <td style="vertical-align:top; padding-left:70px" width="500px">
	 <table cellpadding="0" cellspacing="0" width="450px" align="center" >
    <tr><td class="lefttd"  style="vertical-align:middle"> User Name:-</td><td><input type="text" name="t1" value="<?php echo @$uname;  ?>"  required="required" pattern="[a-zA-Z _]{2,15}" title="please enter only character for  name" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr><td class="lefttd"  style="vertical-align:middle">Name:-</td><td><input type="text" name="t2"  required="required" pattern="[a-zA-Z _]{2,15}" title="please enter only numbers for age" value="<?php echo @$name;?>" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
         <tr><td class="lefttd"  style="vertical-align:middle"> Date Of Birth:-</td><td><input type="date" name="t3"          value="<?php echo @$dob;?>" required="required" title="please enter only this format yyyy-mm-dd." /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
         <tr><td class="lefttd"  style="vertical-align:middle">Email:-</td><td><input type="email" name="t4" value="<?php echo @$email;?>" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
         
<tr><td class="lefttd"  style="vertical-align:middle"> Contact Number:-</td><td><input type="text" name="t5" value="<?php echo @$cno;  ?>"  required="required" pattern="[0-9]{10,10}" title="please enter only number "maxlength="10" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
        <tr><td class="lefttd"  style="vertical-align:middle">Address:-</td><td><textarea name="t6"  title="please enter only numbers for age" pattern="[a-zA-Z0-9]{2,60}"><?php echo @$add;?></textarea></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
          <tr><td class="lefttd"  style="vertical-align:middle"> City:-</td><td><input type="text" name="t7" value="<?php echo @$city;?>"  pattern="[a-zA-Z]{2,10}" title="please enter only character." /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
         <tr><td class="lefttd"  style="vertical-align:middle"> State:-</td><td><input type="text" name="t8" value="<?php echo @$state;?>"  pattern="[a-zA-Z]{2,20}" title="please enter only character." /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
        <tr><td class="lefttd"  style="vertical-align:middle">Weight:-</td><td><input type="text" name="t9"  required="required" pattern="[0-9]{2,2}" title="please enter only numbers for age" value="<?php echo @$weight;?>" maxlength="3" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
         <tr><td class="lefttd"  style="vertical-align:middle"> Occupation:-</td><td><select  name="t10" class="text"  id="t10" style="width:205px"   validate="required:true">
										<option value="">Select </option>
										<option value="business"<?php if ($occupation=='business'):?>
selected="selected"<?php endif;?>>Business</option>
										<option value="service"<?php if ($occupation=='service'):?>
selected="selected"<?php endif;?>>Service</option>
                                        <option value="house_wife"<?php if ($occupation=='house_wife'):?>
selected="selected"<?php endif;?>>House Wife</option>
										<option value="student"<?php if ($occupation=='student'):?>
selected="selected"<?php endif;?>>Student</option>
                                        <option value="police"<?php if ($occupation=='police'):?>
selected="selected"<?php endif;?>>Police/Army</option>
                                        <option value="professional"<?php if ($occupation=='professional'):?>
selected="selected"<?php endif;?>>Professional</option>
										<option value="others"<?php if ($occupation=='others'):?>
selected="selected"<?php endif;?>>Others</option>                   
									</select></td></tr>
		 
         <tr><td>&nbsp;</td></tr>
		 <tr><td>&nbsp;</td></tr>	
		 <tr><td>&nbsp;</td></tr>
		 <tr><td><input type="submit" value="Update" name="sbmt" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px;  ">
		 &nbsp;&nbsp;
		 <input type="button" onclick="location.href='donor.php'" value="Back" name="back" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px;></td></tr>	
        
        <tr><td colspan="2"  align="center"></td></tr>
        
		</table>
</form>
</div>
<?php
	/*if (isset($_POST["back"]))
	{
		header('location:donor.php');
	}*/
	include('conn.php');
	if(isset($_POST["sbmt"])) 
	{
	//	echo $_POST['t8'];
		$cn=makeconnection();
		$s="UPDATE `donor` SET `uname`='".$_POST['t1']."',`name`='".$_POST['t2']."',`dob`='".$_POST['t3']."',`email`='".$_POST['t4']."',`cno`='".$_POST['t5']."',`add`='".$_POST['t6']."',`city`='".$_POST['t7']."',`state`='".$_POST['t8']."',`weight`='".$_POST['t9']."',`occupation`='".$_POST['t10']."' WHERE `don_id`='" . $id. "' ";	
    $q=mysqli_query($cn,$s);
	//echo $s;
	//echo mysqli_error($cn,$s);
	mysqli_close($cn);
	header('location:donor.php');
	
}
?> 