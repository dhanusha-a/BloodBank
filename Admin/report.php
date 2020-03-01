<?php
session_start();
 if(!isset($_SESSION["username"]))
{
	header('location:index.php');
}
 
?>

<html>
	<head>
		<title>Reports Page</title>
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
			
		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Monthly Report </p> <br>
		
		<p style="font-family:Palatino Linotype; font-size:20px;">Total Donations </p>
			<table cellpadding="2" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
           	  <tr >
				<th width="3%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Sr. No.</th>
	        	  <th width="7%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Donor Name</th>
                <th width="9%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Date</th>
                <th width="9%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Camp</th>                
                <th width="5%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Units</th>
                <th width="8%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Blood Group</th>                
              </tr>
			 </table>
			  
			  <br><br>
			  
			  
			  <p style="font-family:Palatino Linotype; font-size:20px;">Stock</p>
			  <table width="70%" class="table-bordered table-condensed table-striped">  
								<tbody>
									<tr>
										<td><strong>Rh</strong></td>
										<td colspan="4" align="center"><strong>Positive</strong></td>
										<td colspan="4" align="center"><strong>Negative</strong></td>
									</tr>
									<tr>
									  <td><strong> Group</strong></td>
									  <td align="center"><strong>A</strong></td>
									  <td align="center"><strong>B</strong></td>
									  <td align="center"><strong>O</strong></td>
									  <td align="center"><strong>AB</strong></td>
									  <td align="center"><strong>A</strong></td>
									  <td align="center"><strong>B</strong></td>
									  <td align="center"><strong>O</strong></td>
									  <td align="center"><strong>AB</strong></td>
									</tr>
									<tr>
										<td><strong>Whole Blood</strong></td>
										<td align="center">3</td>
										<td align="center">7</td>
										<td align="center">5</td>
										<td align="center">0</td>
										<td align="center">0</td>
										<td align="center">0</td>
										<td align="center">0</td>
										<td align="center">0</td>										 
									</tr>
									<tr>
										<td><strong>Red Cell Concentrate</strong></td>
										<td align="center">134</td>
										<td align="center">598</td>
										<td align="center">513</td>
										<td align="center">77</td>
										<td align="center">2</td>
										<td align="center">33</td>
										<td align="center">21</td>
										<td align="center">5</td>									 
									</tr>
									<tr>
										<td><strong>Platelet Concentrate</strong></td>
										<td align="center">0</td>
										<td align="center">1</td>
										<td align="center">1</td>
										<td align="center">1</td>
										<td align="center">2</td>
										<td align="center">0</td>
										<td align="center">0</td>
										<td align="center">0</td>										 
									</tr>
									<tr>
										<td><strong>Fresh Frozen Plasma</strong></td>
										<td align="center">304</td>
										<td align="center">301</td>
										<td align="center">337</td>
										<td align="center">92</td>
										<td align="center">10</td>
										<td align="center">43</td>
										<td align="center">42</td>
										<td align="center">10</td>										 
									</tr>
									<tr>
										<td><strong>Cryoprecipitate</strong></td>
										<td align="center">211</td>	
										<td align="center">301</td>
										<td align="center">337</td>
										<td align="center">92</td>
										<td align="center">10</td>
										<td align="center">43</td>
										<td align="center">42</td>
										<td align="center">10</td>
									</tr>
								</tbody>
							</table>							
							
							
							<br><br><br>
							
			<p style="font-family:Palatino Linotype; font-size:20px;">Total Blood Issues</p>
			<table cellpadding="2" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
           	  <tr >
				<th width="4%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Sr. No.</th>
	        	  <th width="9%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Patient Name</th>
				  <th width="8%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Disease</th>                
				  <th width="8%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Blood Group</th>     
				<th width="8%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Blood Component</th>                				  
                <th width="9%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Date</th>
                <th width="9%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Hospital</th>                
                <th width="5%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Quantity</th>
				<th width="8%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Price</th>                
                
              </tr>
			 </table>
			 
			 <br><br><br>