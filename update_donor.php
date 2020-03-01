<html>
	<head>
		<title>Update Details</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link href="css.css" rel="stylesheet" type="text/css" />
		
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
							<B><IMG src="images/icon-lock.gif" width="16" height="23" align="absmiddle" /> Login Information </B>
							</FONT>
						</LEGEND>						
						<font size=3.5> &nbsp; &nbsp; &nbsp; To change PASSWORD click here :				
						<a class="rp_icontitles" href="change_pwd.php"><font size="3" color="#a30000"> <b> Change Password </b> </a>						
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
								<TD width="77%"><INPUT type="text" name="name" value="" id="name" class="text" validate="required:true" style="width:205px" /></TD>
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
								<TD><input name="dateofbirth" type="text" class="text" id="dateofbirth" value="" maxlength="20" style="width:205px" /></TD>
							</TR>
							<TR>
								<TD>								
									<DIV align="left" >&nbsp;&nbsp;&nbsp; Weight</DIV>
								</TD>
								<TD><INPUT name="weight" type="text"   id="weight" size="5" maxlength="3"style="width:190px" />   <SPAN >kgs</SPAN></TD>
							</TR>
							<TR>
								<TD><DIV align="left" >&nbsp;<SPAN class="redtext">*</SPAN> Blood Group </DIV></TD>
								<TD>
									<SELECT  name="bloodgroup" class="text"  id="bloodgroup" style="width:205px"   title=" <img src=images/error_bang.gif> Required!" validate="required:true">
										<OPTION value="" selected="selected">Select </OPTION>
										<OPTION value="A1+" > A+ </OPTION>
										<OPTION value="A1-" > A- </OPTION>										
										<OPTION value="B+" > B+ </OPTION>
										<OPTION value="B-" > B- </OPTION>										
										<OPTION value="AB+" > AB+ </OPTION>
										<OPTION value="AB-" > AB- </OPTION>
										<OPTION value="O+" > O+ </OPTION>
										<OPTION value="O-" > O- </OPTION>										
									</SELECT>
								</TD>	
							</TR>
							<TR>
								<TD>								
									<DIV align="left" >&nbsp;&nbsp;&nbsp; Image</DIV>
								</TD>
								<TD><INPUT name="image" type="file"   id="image" />  </TD>
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
								<TD><INPUT name="email" type="text" class="text" id="email" value="" maxlength="50" style="width:205px" /></TD>
							</TR>
							<TR>
								<TD><DIV align="left" >&nbsp;<SPAN class="redtext">*</SPAN> Mobile No </DIV></TD>
								<TD>
									<INPUT name="mobile" type="text" class="text" id="mobile"  maxlength="50" title=" <img src=images/error_bang.gif> Required!" validate="required:true" style="width:205px" />
								</TD>
								<TD>
							</TR>
							<TR>
								<TD>
									<DIV align="right" >
										<DIV align="left">&nbsp;&nbsp;&nbsp; Phone No </DIV>
									</DIV>
								</TD>
								<TD><INPUT name="phone" type="text" class="text" id="phone"  maxlength="50" style="width:205px"  /></TD>
							</TR>
							<TR>
								<TD><DIV align="left" >&nbsp;&nbsp;&nbsp;Address</DIV></TD>
								<TD><TEXTAREA name="address" rows="3" wrap="physical" id="address"  style="width:200px" class="text"></TEXTAREA></TD>
							</TR>
							<TR>
								<TD><DIV align="left" >&nbsp;&nbsp;&nbsp;State</DIV></TD>
								<TD><select name="cboState"  id="cboState"  onchange="Update_Globals();"  style="width:205px" > </select>
								<script type="text/javascript"> Fill_Country();Fill_States();Clear_Form();</script>  </TD>
							</TR>
							<TR>
								<TD width="23%">
									<div align="right" >
									<div align="left">&nbsp;<span class="redtext">*</span> City</div>
									</div>
								</TD>
								<TD width="77%">
									<input type="text"  name="area"  class="text" id="area" style="width:205px" autocomplete="off" />
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
									<input id="send" name="send" type="submit" value="Update" class="Bluebuttonstyle" />&nbsp; 
									<INPUT name="Submit3" type="reset" class="Bluebuttonstyle" value="Reset" />&nbsp;
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