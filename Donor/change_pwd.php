<?php
 session_start();
 if(!isset($_SESSION['uname']))
{
	header('location:../index.php');
}
?>
<html>
	<head>
		<title>Change Password</title>
		<link href="../style.css" rel="stylesheet" type="text/css">
		<link href="../css.css" rel="stylesheet" type="text/css" />
		
	</head>
  
	<body>
	<!--START BODY-->		
		<div id="templatemo_container">
			<!--header-->
			<?php include("header.php"); ?>
			<!--header-->
			
			<!--menu-->
			<?php include("donor_menu.php"); ?>
			<!--menu-->
			
			<!-- START LEFT SIDE-->	
			<div id="templatemo_left_section">		
				<div id="templatemo_left_content">		
					<h1>Change Password</h1>
					
					<form class="frmdummy"  id="change_pwd" name="change_password" method="post" action="">
						<FIELDSET style="border-color: #CCCCCC; border-style: solid; border-width: 1px; -moz-border-radius: 1px;">			
						
						<TABLE width="600" cellpadding="0" cellspacing="8">      
							<TR>
								<TD width="30%">	
									<div align="right" >
									<div align="left">&nbsp; Username </div>
									</div>	
								</TD>
								<TD width="77%"><?php echo $_SESSION['uname'];?></TD>
							</TR>
							<TR>
								<TD>
									<DIV align="right" >
									<DIV align="left">&nbsp;<SPAN class="redtext">*</SPAN> Enter Old Password </DIV>
									</DIV>
								</TD>
								<TD><INPUT name="t1" type="password" class="text" id="t1" value="" required pattern="[a-zA-Z0-9]{6,12}" title="please enter only character and numbers between 6 to 12 for password" minlength="6" maxlength="12" style="width:205px"/></TD>
							</TR>
							<TR>
								<TD>
									<DIV align="right" >
									<DIV align="left">&nbsp;<SPAN class="redtext">*</SPAN> Enter New Password </DIV>
									</DIV>
								</TD>
								<TD><INPUT name="t2" type="password" class="text" id="t2" value="" required pattern="[a-zA-Z0-9]{6,12}" title="please enter only character and numbers between 6 to 12 for password" minlength="6" maxlength="12" style="width:205px"/></TD>
							</TR>
							<TR>
								<TD>
									<DIV align="right" >
									<DIV align="left">&nbsp;<SPAN class="redtext">*</SPAN> Retype New Password</DIV>
									</DIV>
								</TD>
								<TD><INPUT name="t3" type="password" class="text" id="t3" value="" required pattern="[a-zA-Z0-9]{6,12}" title="please enter only character and numbers between 6 to 12 for password" minlength="6" maxlength="12" style="width:205px" /></TD>
							</TR>
						</TABLE>
					</FIELDSET>
					<BR />
					
					<TABLE width="350" cellspacing="0" cellpadding="0">
						<TR>
							<TD>
								<DIV align="right">
									<input id="send" name="send" type="submit" value="Change" class="btn" />&nbsp; 
									<INPUT name="Submit3" type="reset" class="btn" value="Reset" />&nbsp;
								</DIV>
							</TD>
						</TR>
					</TABLE>
					
					</FORM>
				</div>
			</div>
			<!-- END LEFT SIDE-->
			
			<!--footer-->
			<?php include("footer.php"); ?>
			<!--footer-->
		</div>
	<!--END BODY-->		
    <?php
if(isset($_POST["send"])) 
{
	include("../conn.php");
	$pwd=md5($_POST["t1"]);
	$cn=makeconnection();			

			$s="select *from donor where uname='" .$_SESSION['uname']. "' and  pwd='" .$pwd. "'";
			
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	$pwdnew=md5($_POST["t2"]);
	if($r>0)
	{
	
	$s1="update donor set pwd='" .$pwdnew."' where uname='" .$_SESSION['uname']."'";
	mysqli_query($cn,$s1);
	mysqli_close($cn);
	echo "<script>alert('Record Update');</script>";

	}
	else
	{
		echo "<script>alert('Invalid old Password');</script>";
	}
		
		}	
?> 

	</body>
</html>