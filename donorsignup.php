<?php
	error_reporting(0);
include ('conn.php');
		$a=$_POST['t1'];
		$b=$_POST['t2'];
		$c=$_POST['t3'];
		$d=$_POST['name'];
		$e=$_POST['gender'];
		$f=$_POST['t10'];
		$g=$_POST['email'];
		$h= $_POST['mobile'];
		$i=$_POST['address'];
		$j=$_POST['cboCountry'];
		$k=$_POST['cboState'];
		$l=$_POST['city'];		
		$m=$_POST['occupation'];
		$p=$_POST['date'];
		$pwd=md5($b);
if(isset($_POST["send"])) 
{
$target_dir = "doner_pic/";
$target_file = $target_dir . basename($_FILES["t8"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["t8"]["tmp_name"]);
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
		if(move_uploaded_file($_FILES["t8"]["tmp_name"], $target_file)){
		$cn=makeconnection();
		$q="0";
			$s="INSERT INTO `donor`(`uname`, `pwd`, `key`, `name`, `gender`, `dob`, `bgid`, `email`, `cno`, `add`, `city`, `state`, `weight`, `image`, `occupation`) VALUES ('".$a."','".$pwd."','".$q."','".$d."','".$e."','".$p."','".$f."','".$g."','".$h."','".$i."','".$l."','".$k."',      '".$_POST['weight']."','". basename($_FILES["t8"]["name"])  ."','".$m."')";
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
   $mail ->Subject = "Confirmation mail for Donor  Registration" ;
   $mail ->Body = "Hello ".$_POST['t1']." You Have registrered in our Blood Bank<br>
   					Your Username :- ".$a."<br>
						 			Password:- ".$_POST['t2']." ";

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
<html>
 <head>
	<title>Donor Signup</title>
	
	<link rel="stylesheet" href="datecalendar/jquery.ui.all.css">
    <script src="datecalendar/jquery-1.9.0.js"></script>
	<script src="datecalendar/jquery.ui.core.js"></script>
	<script src="datecalendar/jquery.ui.widget.js"></script>
	<script src="datecalendar/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="datecalendar/demos.css">
	<link rel="stylesheet" type="text/css" media="screen" href="webaddict/css/cmxform.css" />
	<script src="webaddict/lib/jquery.metadata.js" type="text/javascript"></script><script src="webaddict/js/cmxforms.js" type="text/javascript"></script>
	<script src="webaddict/jquery.validate.js" type="text/javascript"></script>
	<script src="webaddict/lib/jquery.js" type="text/javascript"></script>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="css.css" rel="stylesheet" type="text/css" />
	
	<script>
	var $j = jQuery.noConflict()
	$j(function() {
		$j( "#dateofbirth" ).datepicker({
			changeMonth: true,
			changeYear: true, 
			maxDate: "today(-18Y)"
		});
		$j( "#dateofbirth" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	});
	var $j = jQuery.noConflict()
	$j(function() {
		$j( "#lastdonation" ).datepicker({
			changeMonth: true,
			changeYear: true, 
			maxDate: "today()"
		});
		$j( "#lastdonation" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	});
	</script>

 </head>
 <body>
	<!--START BODY-->
	<div id="templatemo_container">
	
		<!--header-->
		<?php include("header.php"); ?>
		<!--header-->
		
		<!--menu-->
		<?php include("menu.php"); ?>
		<!--menu-->
		
		<!-- START LEFT SIDE-->	
		<div id="templatemo_left_section">
		
			<div id="templatemo_left_content">		
				<h1>Blood Donor Signup</h1>
				<form class="frmdummy"  id="signupForm" name="signupForm" method="post" action="" enctype="multipart/form-data">
					<table width="600" cellspacing="0" cellpadding="0">          
						<tr>
							<td width="100%">
								<h2>	<strong>Donor Registration Form </strong>	</h2>
							</td>
						</tr>
						<tr>
							<td>
								<ul>
									<li> We are very glad that you want to signup as donor.</li>
									<li>To register as a blood donor is a responsibility.</li>
									<li>Once you are a registered donor, implies that you will be glad or privileged to donate blood at all possible times.</li>
									<br>
								</ul>
							</td>
						</tr>
						<tr>
							<td class="paratext">We respect your privacy. We will never rent, sell or give away your email to any third party.</td>
						</tr>
						<tr>
							<td colspan="4" class="Alert_1" ><br>
							</td>
						</tr>
					</table>
					
					<FIELDSET style="border-color: #CCCCCC; border-style: solid; border-width: 1px; -moz-border-radius: 1px;">			
						<LEGEND>
							<FONT face="Arial, Helvetica, sans-serif" size="2" class="header1">
							<B><IMG src="images/icon-lock.gif" width="16" height="23" align="absmiddle" /> Future Login Information </B>
							</FONT>
						</LEGEND>
						<TABLE width="600" cellpadding="0" cellspacing="8">      
							<TR>
								<TD width="23%">	
									<div align="right" >
									<div align="left">&nbsp;<span class="redtext">*</span> Username </div>
									</div>	
								</TD>
								<TD width="77%"><input name="t1" type="text" class="text" id="t1" required pattern="[a-zA-Z0-9]{4,10}" title="please enter only character  between 4 to 10 for user name" value="" maxlength="10" style="width:205px" /></TD>
							</TR>
							<TR>
								<TD>
									<DIV align="right" >
									<DIV align="left">&nbsp;<SPAN class="redtext">*</SPAN> Password </DIV>
									</DIV>
								</TD>
								<TD><INPUT name="t2" type="password" class="text" id="t2" value="" required pattern="[a-zA-Z0-9]{6,12}" title="please enter only character and numbers between 6 to 12 for password" minlength="6" maxlength="12" style="width:205px"  /></TD>
							</TR>
							<TR>
								<TD>
									<DIV align="right" >
									<DIV align="left">&nbsp;<SPAN class="redtext">*</SPAN> Retype Password</DIV>
									</DIV>
								</TD>
								<TD><INPUT name="t3" type="password" class="text" id="t3" value="" onBlur="required" required pattern="[a-zA-Z0-9]{6,12}" title="please enter only character and numbers between 6 to 12 for password" minlength="6" maxlength="12" style="width:205px"   /></TD>
							</TR>
						</TABLE>
					</FIELDSET>
					<BR />
				
					<FIELDSET style="border-color: #CCCCCC; border-style: solid; border-width: 1px; -moz-border-radius: 1px;">
						<LEGEND>
							<FONT face="Arial, Helvetica, sans-serif" size="2" class="header1">
							<B> <IMG src="images/add_buddy_icon.gif" width="21" height="21" align="absmiddle" /> Donor Information </B>
							</FONT>
						</LEGEND>
						<TABLE width="600" cellpadding="0" cellspacing="8">
							<TR>
								<TD width="23%">
									<DIV align="right" >
									<DIV align="left">&nbsp;<SPAN class="redtext">*</SPAN> Donor Name</DIV>
									</DIV>
								</TD>
								<TD width="77%"><INPUT type="text" name="name" value="" id="name" class="text" required pattern="[a-zA-Z _]{4,30}" title="please enter only character donor name" validate="required:true" style="width:205px" /></TD>
							</TR>
							<TR>
								<TD>
									<DIV align="right" >
									<DIV align="left">&nbsp;<SPAN class="redtext">*</SPAN> Gender</DIV>
									</DIV>
								</TD>
								<TD>
									<select  name="gender" class="text"  id="gender" style="width:205px"   validate="required:true">
										<option value="">Select </option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</TD>
							</TR>
							<TR>
								<TD>
									<div align="right" >
									<div align="left">&nbsp;<span class="redtext">*</span> Date of Birth </div>
									</div>
								</TD>
								<TD><input type="date" name="date" value="" required title="please enter only this format yyyy-mm-dd." /></TD>
							</TR>
							<TR>
								<TD>								
									<DIV align="left" ><span class="redtext">* </span>Weight</DIV>
								</TD>
								<TD><INPUT name="weight" type="text"   id="weight" size="5" required pattern="[0-9]{2,2}" title="please enter only  numbers between 2 to 2 for age" maxlength="3"style="width:190px" />   <SPAN >kgs</SPAN></TD>
							</TR>
							<TR>
								<TD><DIV align="left" >&nbsp;<SPAN class="redtext">*</SPAN> Blood Group </DIV></TD>
								<TD>
									<select name="t10" required><option value="">Select</option>
<?php
$cn=makeconnection();
$s="select * from bloodgroup";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
//	echo $r;
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

								</TD>	
							</TR>
                            <TR>
                            <TD>
									<DIV align="right" >
									<DIV align="left">&nbsp;Occupation</DIV>
									</DIV>
								</TD>
                            <TD>
									<select  name="occupation" class="text"  id="occupation" style="width:205px"   validate="required:true">
										<option value="">Select </option>
										<option value="business">Business</option>
										<option value="service">Service</option>
                                        <option value="house_wife">House Wife</option>
										<option value="student">Student</option>
                                        <option value="police">Police/Army</option>
                                        <option value="professional">Professional</option>
										<option value="others">Others</option>                   
									</select>
								</TD>
                                
							</TR>
							<TR>
								<TD>								
									<DIV align="left" ><span class="redtext">* </span> Image</DIV>
								</TD>
								<TD><INPUT name="t8" type="file"   id="t8" />  </TD>
							</TR>
							
						</TABLE>
					</FIELDSET>
					<BR />
					
					<FIELDSET style="border-color: #CCCCCC; border-style: solid; border-width: 1px; -moz-border-radius: 1px;">	
						<LEGEND>
							<FONT face="Arial, Helvetica, sans-serif" size="2" class="header1">
							<B><IMG src="images/icon-misuse.gif" width="13" height="16" align="absmiddle" /> Contact Information </B>
							</FONT>
						</LEGEND>
						<TABLE width="600" cellpadding="1" cellspacing="8">
							<TR>
								<TD><DIV align="left" >&nbsp;<SPAN class="redtext">*</SPAN> Email</DIV></TD>
								<TD><INPUT name="email" type="email" class="text" id="email" value="" required maxlength="50" style="width:205px" /></TD>
							</TR>
							<TR>
								<TD><DIV align="left" >&nbsp;<SPAN class="redtext">*</SPAN> Mobile No </DIV></TD>
								<TD>
									<INPUT name="mobile" type="text" class="text" id="mobile"  maxlength="10"required="required" pattern="[0-9]{10,11}" title="please enter only numbers between 10 to 11 for mobile no." validate="required:true" style="width:205px" />
								</TD>
								<TD>
							</TR>
							<TR>
								<TD><DIV align="left" >&nbsp;&nbsp;&nbsp;Address</DIV></TD>
								<TD><TEXTAREA name="address" rows="3" wrap="physical" id="address" style="width:200px" class="text"></TEXTAREA></TD>
							</TR>
							<!--<TR>
								<TD><DIV align="left" >&nbsp;<span class="redtext">*</span> Country</DIV></TD>
    <TD><script src="country1.js" type="text/javascript"></script>
                    <select name="cboCountry" id="cboCountry" onChange="Fill_States();" style="width:205px"  >
                      <option value="select">select</option>
                      <option value="">
                                              </option>
                    </select>
                    <input    name="txtNumCountries" type="hidden" />
                    <input   name="txtSelectedCountry" type="hidden" />
                    <input  name="txtNumStates" type="hidden" />
                    <input   name="txtSelectedState" type="hidden" />
                    <input  name="txtStateLength" type="hidden" />
                    <input   name="txtCountryLength" type="hidden" />
                    <input name="txtCountry" id="txtCountry"  type="hidden" />
                    <input  name="txtState" id="txtState" type="hidden" /> </TD>
								</TR>
							</TR>-->
							<TR>
								<TD width="23%">
									<div align="right" >
									<div align="left">&nbsp;<span class="redtext">*</span> City</div>
									</div>
								</TD>
								<TD width="77%">
									<input type="text"  name="city"  class="text" id="area" style="width:205px" required pattern="[a-zA-Z _]{0,15}" title="please enter only character" validate="required:true" autocomplete="off" />
									<ul id="c" style=" position:absolute; background-color:#000000; color:#FFFFFF; display:none; width:200px; max-height:500px; border:1px solid #959595; margin-top:-5px; padding:0 5px; line-height:25px; list-style:none;"align="center"> 
									</ul>    
								</TD>
							</TR>
							<TR>
								<TD><DIV align="left" >&nbsp;<span class="redtext">*</span>State</DIV></TD>
								<TD>
								<input type="text"  name="cboState"  class="text" id="area" style="width:205px" required pattern="[a-zA-Z _]{0,15}" title="please enter only character"  autocomplete="off" />
								<!--<select name="cboState"  id="cboState"  onchange="Update_Globals();"  style="width:205px" > </select>
								<script type="text/javascript"> Fill_Country();Fill_States();Clear_Form();</script>-->   </TD>
							</TR>
													
							
						</TABLE>
					</FIELDSET>
					<BR />
					
					<TABLE width="450" cellspacing="0" cellpadding="0">
						<TR>
							<TD>
								<DIV align="right">
									<input id="send" name="send" type="submit" value="Register" class="Bluebuttonstyle" />&nbsp; 
									<INPUT name="reset" type="reset" class="Bluebuttonstyle" value="Reset" />&nbsp;
								</DIV>
							</TD>
						</TR>
					</TABLE>
				</FORM>
			</div>
		</div>
		<!-- END LEFT SIDE-->

		<!-- START RIGHT SIDE-->
		<div id="templatemo_right_section">
		
			<div id="templatemo_category">
				<h2><strong>Blood Donations</strong></h2>
				<div class="templatemo_rightmenu">		
					<ul>
						<li><a class="rp_icontitles" href="AboutBloodDonate.htm">About Blood Donate</a></li>
						<li> <a class="rp_icontitles" href="eligibledonor.htm">Who Can/Can't Donate </a></li>
						<li> <a class="rp_icontitles"  href="whydonateblood.htm">Why Donate Blood?</a></li>
					</ul>
				</div>
			</div>
			
			<br><br>
			
			<div id="templatemo_contact">
				<h2>WANTED: More Life-savers !</h2>
				<p>		
					<br> 
					<img src = "images/acbd4404bff43883a6b5cc5a35b5ff68.jpg" vspace="3" border=0  style="border:#C9C9C9 1px solid;" width="180" />
					<br><br><br>
					<img src = "images/89f6edd8334760e58a3b107647dc76e8.jpg" vspace="3" border=0  style="border:#C9C9C9 1px solid;" width="180" />
				</p>
			</div>
			
		</div>
		<!-- END RIGHT SIDE-->


	
		<!--footer-->
		<?php include("footer.php"); ?>
		<!--footer-->
	</div>
	
<!--body end-->
 </body>
</html>