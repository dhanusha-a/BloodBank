<html>
	<head>
		<title>Change Password</title>
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
					<h1>Change Password</h1>
					
					<form class="frmdummy"  id="change_pwd" name="change_password" method="post" action="">
						<FIELDSET style="border-color: #CCCCCC; border-style: solid; border-width: 1px; -moz-border-radius: 1px;">			
						
						<TABLE width="600" cellpadding="0" cellspacing="8">      
							<TR>
								<TD width="30%">	
									<div align="right" >
									<div align="left">&nbsp;<span class="redtext"></span>&nbsp;&nbsp; Username </div>
									</div>	
								</TD>
								<TD width="77%">XYZ</TD>
							</TR>
							<TR>
								<TD>
									<DIV align="right" >
									<DIV align="left">&nbsp;<SPAN class="redtext">*</SPAN> Enter Old Password </DIV>
									</DIV>
								</TD>
								<TD><INPUT name="password" type="password" class="text" id="password" value="" maxlength="20" style="width:205px"  /></TD>
							</TR>
							<TR>
								<TD>
									<DIV align="right" >
									<DIV align="left">&nbsp;<SPAN class="redtext">*</SPAN> Enter New Password </DIV>
									</DIV>
								</TD>
								<TD><INPUT name="password" type="password" class="text" id="password" value="" maxlength="20" style="width:205px"  /></TD>
							</TR>
							<TR>
								<TD>
									<DIV align="right" >
									<DIV align="left">&nbsp;<SPAN class="redtext">*</SPAN> Retype New Password</DIV>
									</DIV>
								</TD>
								<TD><INPUT name="confirm_password" type="password" class="text" id="confirm_password" value="" maxlength="20" style="width:205px" /></TD>
							</TR>
						</TABLE>
					</FIELDSET>
					<BR />
					
					<TABLE width="350" cellspacing="0" cellpadding="0">
						<TR>
							<TD>
								<DIV align="right">
									<input id="send" name="send" type="submit" value="Change" class="Bluebuttonstyle" />&nbsp; 
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