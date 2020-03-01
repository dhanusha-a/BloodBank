<?php
 session_start();
 if(!isset($_SESSION['uname']))
{
	header('location:../donorlogin.php');
}
 //echo "Hello   ".$_SESSION['uname'];
?>
<?php
	include('../conn.php');
	$cn=makeconnection();
	$s="select * from donor where uname='" . $_SESSION["uname"] . "'";
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	
	$data=mysqli_fetch_array($q);
	$name=$data[5];
	$weight=$data[14];
	$occ=$data[16];
	$email=$data[9];
	$cno=$data[10];
	$add=$data[11];
	$city=$data[12];
	$state=$data[13];
	$pic=$data[16];
	//echo $occ;
	mysqli_close($cn);
?> 
<html>
	<head>
		<title>Update Details</title>
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
					<h1>Donor Profile Update</h1>
					
					<form class="frmdummy"  id="updatefrm" name="updateform" method="post" action="" enctype="multipart/form-data">
					
						<FIELDSET style="border-color: #CCCCCC; border-style: solid; border-width: 1px; -moz-border-radius: 1px;">			
						<LEGEND>
							<FONT face="Arial, Helvetica, sans-serif" size="2" class="header1">
							<B><IMG src="../images/icon-lock.gif" width="16" height="23" align="absmiddle" /> Login Information </B>
							</FONT>
						</LEGEND>						
						<font size=3.5> &nbsp; &nbsp; &nbsp; To change PASSWORD click here :				
						<a class="rp_icontitles" href="change_pwd.php"><font size="3" color="#a30000"> <b> Change Password </b> </a>						
						</FIELDSET>
						<BR />
					
						<FIELDSET style="border-color: #CCCCCC; border-style: solid; border-width: 1px; -moz-border-radius: 1px;">						
						<LEGEND>
							<FONT face="Arial, Helvetica, sans-serif" size="2" class="header1">
							<B> <IMG src="../images/add_buddy_icon.gif" width="21" height="21" align="absmiddle" /> Donor Information </B>
							</FONT>
						</LEGEND>
						<TABLE width="600" cellpadding="0" cellspacing="8">
                        <TR>
						  <TR>
								<TD width="23%">
									<DIV align="right" >
									<DIV align="left">&nbsp;<SPAN class="redtext">*</SPAN> Donor Name</DIV>
									</DIV>
								</TD>
								<TD width="77%"> <input type="text" name="t1" value="<?php echo @$name;  ?>"  required="required" pattern="[a-zA-Z _]{3,100}" title="please enter only character name" style="width:205px" /></TD>
                                <TD>&nbsp;
                                
                                </TD>

							<TR>
								<TD>								
									<DIV align="left" >&nbsp;<span class="redtext">*</span>Weight</DIV>
								</TD>
								<TD><INPUT name="t2" type="text" id="t2" size="5" maxlength="3"style="width:190px" value="<?php echo @$weight;  ?>" required required pattern="[0-9]{1,2}" title="please enter only number for weight" />   <SPAN >kgs</SPAN></TD>
<TD rowspan="2">&nbsp;</TD>
                                
							</TR>
                            <TR>
								<TD>								
									<DIV align="left" >&nbsp;<span class="redtext">*</span>Occupation</DIV>
								</TD>
								<TD><select  name="occupation" class="text"  id="occupation" style="width:205px"   validate="required:true">
										<option value="">Select </option>
										<option value="business"<?php if ($occ=='business'):?> selected="selected"<?php endif;?>>Business</option>
										<option value="service"<?php if ($occ=='service'):?> selected="selected"<?php endif;?>>Service</option>
                                        <option value="house_wife"<?php if ($occ=='house_wife'):?> selected="selected"<?php endif;?>>House Wife</option>
										<option value="student"<?php if ($occ=='student'):?> selected="selected"<?php endif;?>>Student</option>
                                        <option value="police"<?php if ($occ=='police'):?> selected="selected"<?php endif;?>>Police/Army</option>
                                        <option value="professional"<?php if ($occ=='professional'):?> selected="selected"<?php endif;?>>Professional</option>
										<option value="others"<?php if ($occ=='others'):?> selected="selected"<?php endif;?>>Others</option>                   
									</select></TD>
<TD rowspan="2">&nbsp;</TD>
                                
							</TR>
							
							
						</TABLE>
						
				      </FIELDSET>
					<BR />
					
					<FIELDSET style="border-color: #CCCCCC; border-style: solid; border-width: 1px; -moz-border-radius: 1px;">	
						<LEGEND>
							<FONT face="Arial, Helvetica, sans-serif" size="2" class="header1">
							<B><IMG src="../images/icon-misuse.gif" width="13" height="16" align="absmiddle" /> Contact Information </B>
							</FONT>
						</LEGEND>
						<TABLE width="600" cellpadding="1" cellspacing="8">
							<TR>
								<TD><DIV align="left" >&nbsp;<SPAN class="redtext">*</SPAN> Email</DIV></TD>
								<TD><INPUT name="t3" type="email" class="text" id="t3" value="<?php echo @$email;  ?>" required maxlength="50" style="width:205px"  title="please enter validate email"/></TD>
							</TR>
							<TR>
								<TD><DIV align="left" >&nbsp;<SPAN class="redtext">*</SPAN> Mobile No </DIV></TD>
								<TD>
									<INPUT name="t4" type="text" class="text" id="t4" value="<?php echo @$cno; ?>" required pattern="[0-9]{10,10}" required="required" maxlength="10" title=" <img src=images/error_bang.gif> please enter only number " validate="required:true" style="width:205px" />
								</TD>
								<TD>
							</TR>
							<TR>
								<TD><DIV align="left" >&nbsp;&nbsp;&nbsp;Address</DIV></TD>
								<TD><TEXTAREA name="t5"  rows="3" wrap="physical" id="t5"  style="width:200px" class="text"><?php echo @$add;    ?></TEXTAREA></TD>
							</TR>
							<TR>
								<TD><DIV align="left" >&nbsp;<span class="redtext">*</span>City</DIV></TD>
								<TD><INPUT name="t6" type="text" class="text" id="t6" value="<?php echo @$city;?>" maxlength="50" title="<img src=images/error_bang.gif> please enter only character" validate="required:true" required pattern="[a-zA-Z]{2,10}" style="width:205px"/> </TD>
							</TR>
							<TR>
								<TD width="23%">
									<div align="right" >
									<div align="left">&nbsp;<span class="redtext">*</span> State</div>
									</div>
								</TD>
								<TD width="77%">
									<input type="text"  name="t7"  class="text" id="t7" style="width:205px" value="<?php echo @$state;?>" maxlength="50" title="<img src=images/error_bang.gif> please enter only character" validate="required:true" required pattern="[a-zA-Z]{2,10}" autocomplete="off" />
									<ul id="c" style=" position:absolute; background-color:#000000; color:#FFFFFF; display:none; width:200px; max-height:500px; border:1px solid #959595; margin-top:-5px; padding:0 5px; line-height:25px; list-style:none;"align="center"> 
									</ul>    
								</TD>
							</TR>						
							
						</TABLE>
					</FIELDSET>
					<BR />					
					
					<TABLE width="450" cellspacing="0" cellpadding="0">
						<TR>
							<TD>
								<DIV align="right">
									<input id="send" name="send" type="submit" value="Update" class="btn" />&nbsp; 
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
	</body>
</html>
<?php

if(isset($_POST["send"])) 
	{
		$cn=makeconnection();
		$s="UPDATE `donor` SET `name`='".$_POST['t1']."',`weight`='".$_POST['t2']."',`email`='".$_POST['t3']."',`cno`='".$_POST['t4']."',`add`='".$_POST['t5']."',`city`='".$_POST['t6']."',`state`='".$_POST['t7']."' WHERE `uname`='".$_SESSION['uname']."'";
	//	echo "mysqli_error($s)";
$i=mysqli_query($cn,$s);
	mysqli_close($cn);
	header('location:index.php');
	
}
?>