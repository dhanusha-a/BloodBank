<?php 
	$id=$_GET['id'];
	echo $id;
	include ('../conn.php');
	$cn=makeconnection();
	$o="Due";
	$s="UPDATE `bloodreq` SET `status`='".$o."' WHERE `brr_id`= '".$id."'";
	mysqli_query($cn,$s);
	$s="SELECT bloodreq.brr_id, bloodreq.pname, bloodreq.disease, bloodreq.hname, bloodreq.ref_doc, bloodreq.required, bloodgroup.group, bloodcomponent.comp, bloodreq.qty, bloodreq.rcno, bloodreq.remail FROM `bloodreq`, bloodgroup,bloodcomponent WHERE bloodreq.bgid = bloodgroup.bgid And bloodreq.bcid = bloodcomponent.bcid And bloodreq.brr_id = '".$id."'";
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	
	$data=mysqli_fetch_array($q);
	$pname=$data['pname'];
	$hname=$data['hname'];
	$bgroup=$data['group'];
	$bcom=$data['comp'];
	$qty=$data['qty'];
	$remail=$data['remail'];
/*	echo $pname;
	echo $hname;
	echo $bgroup;
	echo $bcom;
	echo $qty;
	echo $remail;*/
	mysqli_close($cn);
	$mailto = $remail;
    $mailSub ="Blood Reserve";
    $mailMsg ="Your Blood Reserve is completed <br/>
				Patient's Name ".$pname." <br><br>
					Patient admitted at ".$hname."<br><br>
					your requests is following that<br><br> 
					Blood broup&nbsp; ".$bgroup." <br><br>
					Blood Componemt&nbsp; ".$bcom." <br><br>
					blood &nbsp;".$qty." no. of units. <br><br>
					So you can come out ours Blood Bank with your Blood simple.";
   require '../PHPMailer/PHPMailerAutoload.php';
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
       echo "<script>alert('No INSERT');</script>";   
	   header('location:request.php');
   }
?>