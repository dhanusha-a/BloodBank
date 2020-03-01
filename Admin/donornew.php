<?php
session_start();
 if(!isset($_SESSION["username"]))
{
	header('location:index.php');
}
?>
<?php
//error_reporting(0);
include ('../conn.php');
		$a=$_POST['t1'];
		$b=$_POST['t2'];
		$c=$_POST['t3'];
		$d=$_POST['t4'];
		$e=$_POST['t5'];
		$f=$_POST['t6'];
		$g=$_POST['t7'];
		$h= $_POST['t8'];
		$i=$_POST['t9'];
		$j=$_POST['t10'];
		$k=$_POST['t11'];
		$l=$_POST['t12'];		
		$m=$_POST['t13'];
		$n=$_POST['t14'];
		$pwd=md5($b);
if(isset($_POST["send"])) 
{
$target_dir = "doner_pic/";
$target_file = $target_dir . basename($_FILES["t9"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["t9"]["tmp_name"]);
    if($check !== false) {
      //  echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $error= "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    $error= "Sorry, file already exists.";
    $uploadOk = 0;
}
//aloow certain file formats
	if($imageFileType != "jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType !="gif"){
		$error="sorry, only jpg, jpeg, Png & gif files are allowed.";
		$uploadok=0;
	}else{
		if(move_uploaded_file($_FILES["t9"]["tmp_name"], $target_file)){
		$cn=makeconnection();
		$q="0";
		$s="INSERT INTO `donor`(`uname`, `pwd`, `key`, `name`, `gender`, `dob`,`weight`,`bgid`,`occupation`,`image`,`email`, `cno`, `add`, `city`, `state`) VALUES ('".$a."','".$pwd."','".$q."','".$c."','".$d."','".$e."','".$f."','".$g."','".$h."','". basename($_FILES["t9"]["name"])  ."','".$j."','".$k."','".$l."','".$m."','".$n."')";
	$q=mysqli_query($cn,$s);
	echo mysqli_error($cn);
	echo $s;
	if($q>0)
	{
		$mailto = $_POST['email'];
   require 'PHPMailer/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp(true);
   $mail ->SMTPDebug = 2;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com.";
   $mail ->Port = 465;
   $mail ->IsHTML(true);
   $mail ->Username = "freedemo6@gmail.com";
   $mail ->Password = "8153858905";
   $mail ->SetFrom("freedemo6@gmail.com");
   $mail ->Subject = "Create user A/C by Admin " ;
   $mail ->Body = "Hello ".$c." You Have  Registration on ours Blood Bank<br>
   					Your  User Id :- ".$a."<br>
						  Password:- ".$b." ";

	$mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
      echo "Mail Sent";
   }
		header('location:donorlogin.php');
	}
	else
	{	
		echo "<script>alert(mysqli_error($q));</script>";
	}
		} else{
			echo "<script>alert('sorry there was an error uploading your file.')</script>";
		}	
	
	}
}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Donor Page</title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="style1.css" rel="stylesheet" type="text/css">
 <link href="css.css" rel="stylesheet" type="text/css" />
</head>
<body>


		<!--header & menu start-->
		<?php include("menu.php"); ?>
		<!--header & menu end-->
		
		<center>
		
		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Add Donor Details </p>

		<div style="height:940px; width:700px; margin:auto; margin-top:30px; margin-bottom:90px; background-color:#EAEAEA; ">

<form method="post" name="frm">
	
	 <table  width="450px" align="center" >
     <tr><td>&nbsp;</td> </tr>
	 
		<tr> <td colspan=2> <IMG src="../images/icon-lock.gif" width="16" height="23" align="absmiddle" /><b> Future Login Information </b> </td> </tr>
		<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		
        <tr><td class="lefttd"  style="vertical-align:middle"> User Name:-</td><td><input type="text" name="t1" value=""  required="required" pattern="[a-zA-Z ]{2,15}" title="please enter only character for  name" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
         <tr><td class="lefttd"  style="vertical-align:middle"> Password:-</td><td><input type="password" name="t2" value=""  required="required" maxlength="10" pattern="[a-zA-Z0-9]{6,10}" title="please enter character and number  for  password " /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
		 
        <tr> <td colspan=2> <IMG src="../images/add_buddy_icon.gif" width="16" height="23" align="absmiddle" /><b> Donor Information </b> </td> </tr>
		<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		
		<tr><td class="lefttd"  style="vertical-align:middle">Name:-</td><td><input type="text" name="t3"  required="required" pattern="[a-zA-Z ]{2,55}" title="please enter only character " value="" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
		 <tr><td class="lefttd"  style="vertical-align:middle">Gender:-</td><td><select  name="t4" class="text"     validate="required:true">
										<option value="">Select </option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
		  <tr><td class="lefttd"  style="vertical-align:middle">Date of Birth:-</td><td><input type="date" name="t5"  pattern="[0-9--]{10,10}" maxlength="10" title="please enter yyyy-mm-dd " value="" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
		  <tr><td class="lefttd"  style="vertical-align:middle">Weight:-</td><td><input type="text" name="t6"  required="required" pattern="[0-9]{2,3}" maxlength="3" title="please enter only character " value="" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
		  <tr>
			<td class="lefttd"  style="vertical-align:middle">Blood Group:-</td>
			<td>
            <select name="t7" required style="width:200px"><option value="">Select</option>
<?php
$cn=makeconnection();
$s="select * from bloodgroup";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
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
</select>
                
        </td>
		</tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
		  <tr>
			<td class="lefttd"  style="vertical-align:middle">Occupation:-</td>
		  <td><select  name="t8" class="text"  id="occupation" style="width:205px"   validate="required:true">
										<option value="">Select </option>
										<option value="business">Business</option>
										<option value="service">Service</option>
                                        <option value="house_wife">House Wife</option>
										<option value="student">Student</option>
                                        <option value="police">Police/Army</option>
                                        <option value="professional">Professional</option>
										<option value="others">Others</option>                   
			</select></td>
		 </tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
		  <tr><td class="lefttd"  style="vertical-align:middle">Image:-</td><td><input name="t9" type="file" id="t9" validate="required:true"/></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
		 
		 <tr> <td colspan=2> <IMG src="../images/icon-misuse.gif" width="16" height="23" align="absmiddle" /><b> Contact Information </b> </td> </tr>
		<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
         <tr><td class="lefttd"  style="vertical-align:middle">Email:-</td><td><input type="email" name="t10" value="" required="required" title="please enter validate email  "/></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
         
		<tr><td class="lefttd"  style="vertical-align:middle"> Contact Number:-</td><td><input type="text" name="t11" value=""  required="required" pattern="[0-9]{10,10}" title="please enter only number "maxlength="10" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
		  <tr><td class="lefttd"  style="vertical-align:middle">Address:-</td><td> <textarea name="t12" rows=3 id="t12"></textarea> </td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
		  <tr><td class="lefttd"  style="vertical-align:middle">City:-</td><td><input type="text" name="t13"  required="required" pattern="[a-zA-Z _]{2,15}" title="please enter only character " value="" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		 
		  <tr><td class="lefttd"  style="vertical-align:middle">State:-</td><td><input type="text" name="t14"  required="required" pattern="[a-zA-Z _]{2,15}" title="please enter only character " value="" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
        
         <tr><td>&nbsp;</td>
		 <td>&nbsp;</td></tr>
		 <tr><td>&nbsp;</td>
		 <td><input type="submit" value="Add" name="submit" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; "></td></tr>	
        
        <tr><td colspan="2"  align="center"></td></tr>
        
		</table>
</form>
</div>

</center>
</body>
</html>
<?php
	if(isset($_POST["submit"])) 
	{
		$cn=makeconnection();
		$pwd=md5($_POST['t2']);
		$s="INSERT INTO `donor`(`uname`, `pwd`,`name`, `gender`, `dob`,`weight`, `bgid`,`occupation`,  `image`, `email`, `cno`, `add`, `city`, `state`) VALUES('".$_POST['t1']."','".$pwd."','".$_POST['t3']."','".$_POST['t4']."','".$_POST['t5']."''".$_POST['t6']."','".$_POST['t7']."','".$_POST['t8']."','".$_POST['t9']."','".$_POST['t10']."','".$_POST['t11']."','".$_POST['t12']."','".$_POST['t13']."','".$_POST['t14']."')";
		
mysqli_query($cn,$s);
//mysqli_error($s);
	mysqli_close($cn);
	//header('location:donor.php');
	
}
?> 