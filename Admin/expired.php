<?php
session_start();
 if(!isset($_SESSION["username"]))
{
	header('location:index.php');
}
 
?>
<?php
include('../conn.php');

	$date = strtotime(date("Y/m/d"));
		$z=date('Y-m-d', $date);
		//echo $z;	
$host     = 'localhost';
$dbName   = 'blood_bank';
$userName = 'root';
$password = '';
$connect = mysql_connect($host, $userName, $password) or die(mysql_error());
mysql_select_db($dbName) or die(mysql_error());

 $dis_query="SELECT compdetails.comp_dt_id, compdetails.bidt, bloodgroup.group, bloodcomponent.comp, compdetails.expdate, blooddetails.pouch_id, blooddetails.donation_id, donation.don_id, donor.name From compdetails, bloodgroup, bloodcomponent,blooddetails, donation, donor WHERE compdetails.bidt = blooddetails.bidt And blooddetails.donation_id = donation.donation_id And donation.don_id = donor.don_id And compdetails.bgid =bloodgroup.bgid And compdetails.bcid =bloodcomponent.bcid And compdetails.expdate<='".$z."'";
 $result=mysql_query($dis_query);
 while($row = mysql_fetch_array($result))
 {
	 $rs[]=$row;
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
			<p style="font-family:Palatino Linotype; font-size:31px; color:#990000">Report</p>	
		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000">Expired Blood</p>
      <br />
<table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
           	  <tr >
				<th width="11%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">
Component Detail ID</th>
	        	  <th width="7%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Blood ID</th>
                   <th width="9%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Donor Name</th>
                <th width="11%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Pouch_id</th>
                <th width="16%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Blood Group</th>
                <th width="9%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Component</th>
                <th width="12%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Expiry Date</th>
               </tr>
                   <?php
		       for($i = 0; $i < count($rs); $i++)
				{
		     ?>
             <tr class='alter1'>
					<td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['comp_dt_id']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['bidt']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['name']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['pouch_id']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['group']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['comp']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['expdate']?></td>
                    </tr>
                    <?php }?>
</table>				
</center>
</body>
</html>