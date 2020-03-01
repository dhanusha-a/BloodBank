<?php
session_start();
 if(!isset($_SESSION["username"]))
{
	header('location:index.php');
}
 
?>

<html>
	<head>
		<title>Add Camps Page</title>
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

		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Add Camp Details </p>
		
		<div style="height:570px; width:700px; margin:auto; margin-top:30px; margin-bottom:90px; background-color:#EAEAEA; ">
		
<form method="post">
		 <table  width="450px" align="center" >
		 
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
    <tr><td class="lefttd"  style="vertical-align:middle"> Title:-</td><td><input type="text" name="t1" value=""  required="required" pattern="[a-zA-Z   ]{4,25}" title="please enter only character  between 4 to 15 for  name" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
        <tr><td class="lefttd"  style="vertical-align:middle">Organization:-</td><td><input type="text" name="t2"  required="required" pattern="[a-zA-Z _]{2,15}" title="" value="" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
          <tr><td class="lefttd"  style="vertical-align:middle"> Address:-</td><td><textarea name="t3" required title="" pattern="[a-zA-Z0-9]{2,60}"></textarea></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
         <tr><td class="lefttd"  style="vertical-align:middle"> City:-</td><td><input type="text" name="t4" value="" required pattern="[a-zA-Z _]{2,10}" title="" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
         <tr><td class="lefttd"  style="vertical-align:middle">State:-</td><td><input type="text" name="t5" value="" required pattern="[a-zA-Z _]{5,15}" title="" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
         <tr><td class="lefttd"  style="vertical-align:middle">Date:-</td><td><input type="date" name="t6" value="" required title="please enter only this format yyyy-mm-dd." /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
         
		<tr><td class="lefttd"  style="vertical-align:middle"> Estimated Donors:-</td><td><input type="text" name="t7" value=""  required="required" pattern="[0-9]{1,3}" title="please enter only number" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
        <tr><td class="lefttd"  style="vertical-align:middle">Actual Donors:-</td><td><input type="text" name="t8"   pattern="[0-9]{2,3}" title="please enter only numbers " value="" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
          <tr><td class="lefttd"  style="vertical-align:middle"> Units:-</td><td><input type="text" name="t9" value=""  pattern="[0-9]{0,2}" title="please enter only number." /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
         <tr><td class="lefttd">Upload Image:-</td><td><input type="file" name="t11" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td>
		 <td><input type="submit" value="Add" name="sbmt" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px;"></td></tr>	
        
        <tr><td colspan="2"  align="center"></td></tr>
        
		</table>
		
</form>
</div>
</body>
</html>

<?php
	include('conn.php');
	if(isset($_POST["sbmt"])) 
	{
		$cn=makeconnection();
		$s="INSERT INTO `camp`(`title`, `org`, `address`, `city`, `state`, `date`, `estimated_donors`, `actual_donors`, `units`, `image`, `stf_id`) VALUES('".$_POST['t1']."','".$_POST['t2']."','".$_POST['t3']."','".$_POST['t4']."','".$_POST['t5']."','".$_POST['t6']."','".$_POST['t7']."','".$_POST['t8']."','".$_POST['t9']."','".$_POST['t11']."','".$_POST['t10']."')";
		
$i=mysqli_query($cn,$s);
	mysqli_close($cn);
	header('location:camp.php');
	
}
?> 