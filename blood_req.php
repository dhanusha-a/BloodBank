<?php 
error_reporting(0);
	include ('conn.php');
		$a=$_POST['name'];
		$b=$_POST['type'];
		$c=$_POST['hname'];
		$d=$_POST['hadd'];
		$e=$_POST['dname'];
		$f=$_POST['bgroup'];
		$g=$_POST['bcom'];
		$h= $_POST['qty'];
		$i=$_POST['rname'];
		$j=$_POST['rcno'];
		$k=$_POST['remail'];
		$l='Pending';
		$m= date('Y-m-d H:i:s');
		$date = strtotime(date("Y/m/d"));
		$date = strtotime("+2 day", $date);
		$z=date('Y/m/d', $date);
		//echo $z;
		if(isset($_POST["submit"])) 
{
			$cn=makeconnection();
			$s="INSERT INTO `bloodreq`(`pname`, `disease`, `hname`, `hadd`, `ref_doc`, `bgid`, `bcid`, `required`, `qty`, `rname`, `rcno`, `remail`, `status`, `request_date`) VALUES ('".$a."','".$b."','".$c."','".$d."','".$e."','".$f."','".$g."','".$z."','".$h."','".$i."','".$j."','".$k."','".$l."','".$m."')";	
	$q=mysqli_query($cn,$s);
			$s="SELECT bloodreq.brr_ID,bloodreq.pname,bloodgroup.groUp,bloodcomponent.comp FROM `bloodreq`,bloodgroup,bloodcomponent WHERE bloodreq.bgid = bloodgroup.bgid And bloodreq.bcid = bloodcomponent.bcid And bloodreq.pname = '".$a."'";	
	$q=mysqli_query($cn,$s);	
	$data=mysqli_fetch_array($q);
	$y=$data[2];
	$u=$data[3];
	echo "$y<br>";
	echo "$u<br>";
	if($q>0)
	{
		$mailto = $k;
    $mailSub ="Blood Reserve";
    $mailMsg ="Your Blood Reserve is completed <br/> <br>
				Patient's Name :".$a." <br><br>
					Patient is admitted in ".$c."<br><br>
					Your request is as follows:<br><br> 
					Blood broup&nbsp; ".$y." <br><br>
					Blood Componemt&nbsp; ".$u." <br><br>
					".$h." no. of units. <br><br>
					So you can come at our Blood Bank with your Blood sample and Requisition Slip given by Doctor.";
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
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
    echo "<script>alert('Your Blood Reserve Request Has been Sent on admin');</script>";
	  
   }
		 header('location:blood_req.php');
	}

	else
	{	
		echo "<script>alert('No INSERT');</script>";
	}
	mysqli_close($cn);	
}
?>
<html>
 <head>
	<title>Blood Reserve Request</title>
	
	<link rel="stylesheet" href="datecalendar/jquery.ui.all.css">
    <script src="datecalendar/jquery-1.9.0.js"></script>
	<script src="datecalendar/jquery.ui.core.js"></script>
	<script src="datecalendar/jquery.ui.widget.js"></script>
	<script src="datecalendar/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="datecalendar/demos.css">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="css.css" rel="stylesheet" type="text/css" />
	
	<script>
	var $j = jQuery.noConflict()
	$j(function() {
		$j( "#txtdld" ).datepicker({
			changeMonth: true,
			changeYear: true, 
			minDate: "today()"
		});
		$j( "#txtdld" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
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
				<h1>Blood Reserve Request </h1>
				
				<table width="569" cellspacing="0" cellpadding="0">       
					<tr>
						<td width="100%" >
						<div class="PageForms">
						
						<form name="signupForm" id="signupForm"   method= "post" onSubmit="return Check_form();">
						<table width="100%" border="0" cellpadding="0" cellspacing="0" >
							<tr>
								<th align="left"><span>We realizes the importance of providing request safe blood to patients in a timely hassle free manner. Kindly fill the form below and submit. </span></th>
							</tr>
							<tr>
								<td>
									<table width="100%" cellpadding="3" cellspacing="3"> <col width="150" />
										<tr>
											<td colspan="2">
												<div align="center"></div>
											</td>
										</tr>
										<tr>
											<td width="35%"><div align="right" >
												<div align="left">&nbsp;<span class="redtext">* </span>Patient's Name</div>
											</div></td>
											<td width="69%"><input name="name" type="text" class="text" id="name" value="" required pattern="[a-zA-Z ]{4,30}" title="please enter only character name" value="" maxlength="30" style="width:205px"/> </td>
										</tr>
										<tr>
											<td><div align="right" >
												<div align="left">&nbsp;<span class="redtext">* </span>Type of Disease </div>
												</div></td>
											<td><input name="type" type="text" class="text" id="type" value="" required pattern="[a-zA-Z0-9  ]{2,30}" title="please enter only character  Type of Disease" value="" maxlength="25" style="width:205px"/></td>
										</tr>
										<tr>
											<td><div align="right" >
												<div align="left">&nbsp;<span class="redtext">* </span>Hospital Name </div>
												</div></td>
											<td><input name="hname" type="text" class="text" id="hname" value="" required  pattern="[a-zA-Z  ]{5,15}" title="please enter only character  Hospital's name" value="" maxlength="30" style="width:205px"/></td>
										</tr>
										<tr>
											<td><div align="right" >
												<div align="left"> Hospital Address</div>
											</div></td>
											<td><textarea name="hadd" rows="3" wrap="physical" class="forminput" id="hadd"  style="width:200px"></textarea> </td>
										</tr>
										<tr>
											<td><div align="left" >&nbsp;<span class="redtext">* </span>Reference Doctor's Name:</div></td>
											<td><span>Dr.</span><input name="dname" type="text" class="text" id="dname" value=""required  pattern="[a-zA-Z _]{5,15}" title="please enter only character Doctor's name" value="" maxlength="30" style="width:180px"/></td>
										</tr>
										<tr>
											<td><div align="left" >Reserved Till:</div></td>
											<td><?php $date = strtotime(date("Y/m/d"));
														$date = strtotime("+2 day", $date);
														$z=date('M d,Y', $date)   ?><?php    echo $z ?>.													
											</td>
										</tr>
										<tr>
											<td><br></td>
											<td>Dear Requester, blood you are requesting will be reserved for 48 hours. After that it will be unreserved automatically. So you are requested to come with a Requisition Slip & Blood Sample of the Patient within specified time duration.</td>
										</tr>
										<tr>
											<td><div align="left"><span class="redtext">* </span> <span >Blood Group </span></div>
											</td>
											<td>
												<select name="bgroup" required style="width:200px"><option value="">Select</option>
<?php
$cn=makeconnection();
$s="select * from bloodgroup";
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
</select>
											</td>
										</tr>
                                        <tr>
											<td><div align="left"><span class="redtext">* </span> <span >Blood Component</span></div>
											</td>
											<td>
												<select name="bcom" required style="width:200px"><option value="">Select</option>
<?php
$cn=makeconnection();
$s="select * from bloodcomponent";
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
										</tr>										<tr>
											<td><div align="left">
												<p><span class="redtext">* </span>Quantity</p>
											</div></td>
											<td><input name="qty" type="text" class="text" id="qty" value="" required pattern="[0-9]{0,2}" title="please enter only Number for Quantity" maxlength="3"/></td>
										</tr>
										<tr>
											<td><div align="left"><span class="redtext">* </span><span>Relative Name </span></div></td>
											<td><input name="rname" type="text" class="text" id="rname" value="" required pattern="[a-zA-Z ]{4,30}" title="please enter only character name" value="" maxlength="30" style="width:205px"/></td>
										</tr>
										<tr>
											<td><div align="left"><span class="redtext">* </span><span>Relative Contact No. </span></div></td>
											<td><input name="rcno" type="text" class="text" id="rcno" value="" required pattern="[0-9]{10,10}" title="please enter only Number for  Contact Number" maxlength="10"/></td>
										</tr>
										<tr>
											<td><div align="left"><span class="redtext">* </span><span>Relative Email ID </span></div></td>
											<td><INPUT name="remail" type="email" class="text" id="remail" value="" required maxlength="50" style="width:205px" /></td>
										</tr>
										<tr>
											<td></td>
											<td> <input name="submit" type="submit" class="Button" value="Submit" /> </td>
										</tr>										
									</table>
								</td>
							</tr>
						</table>
						</form>				
						
						</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		
		<!--footer-->
		<?php include("footer.php"); ?>
		<!--footer-->
		
	</div>	
	<!--body end-->  
 </body>
</html>