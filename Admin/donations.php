<?php
session_start();
 if(!isset($_SESSION["username"]))
{
	header('location:index.php');
}
 
?>
<?php
error_reporting(0);
$host     = 'localhost';
$dbName   = 'blood_bank';
$userName = 'root';
$password = '';

$connect = mysql_connect($host, $userName, $password) or die(mysql_error());
mysql_select_db($dbName) or die(mysql_error());

 $dis_query="SELECT donor.name, donation.date, camp.title, donation.units, bloodgroup.group FROM donor, donation, bloodgroup, camp WHERE donation.don_id=donor.don_id And donor.bgid=bloodgroup.bgid And donation.camp_id=camp.camp_id";
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
    <?php 
$num_rec_per_page=10;
mysql_connect('localhost','root','');
mysql_select_db('blood_bank');
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT * FROM `blooddetails` LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysql_query ($sql); //run the query
?>
	
		<!--header & menu start-->
		<?php include("menu.php"); ?>
		<!--header & menu end-->
	<center>
        <p style="font-family:Palatino Linotype; font-size:31px; color:#990000">Report</p>	  		
		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Total Donations </p>
        			
	<table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
<tr>
<td class="sub_txt"> <?php $sql = "SELECT * FROM donation"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records 
echo "Total data find $total_records";?></td>

<td align="right" class="sub_txt">
<?php
$sql = "SELECT * FROM donation"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='donations.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='donations.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='donations.php?page=$total_pages'>".'>|'."</a> ";?>
</td>
</td>
</tr>
</table>
<br>
			<table cellpadding="2" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
           	  <tr >
				<th width="3%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Sr. No.</th>
	        	  <th width="7%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Donor Name</th>
                <th width="9%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Date</th>
                <th width="9%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Camp</th>                
                <th width="5%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Units</th>
                <th width="8%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Blood Group</th>
              </tr>
              <?php
		       for($i = 0; $i < count($rs); $i++)
				{
		     ?>
             <tr class='alter1'>
					<td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $i;?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['name']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['date']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['title']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['units']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['group']?></td>     
                     </tr>
                    <?php }?>
                    </table>
                    <br>
			  <table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
<tr>
<td align="right" class="sub_txt">
<?php
$sql = "SELECT * FROM donation"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='donations.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='donations.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='donations.php?page=$total_pages'>".'>|'."</a> ";?>
</td>
</tr>
</table>

</center>
</body>
</html>