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

 $dis_query="SELECT `donation`.`donation_id`, `donor`.`don_id`, `donor`.`name`, `donation`.`date`,`camp`.`camp_id`, `camp`.`title`, `donation`.`units`, `bloodgroup`.`group`, `donation`.`remark` FROM `donation`, `donor`, `camp`, `bloodgroup`   WHERE `donation`.`don_id` = `donor`.`don_id` And `donation`.`camp_id` = `camp`.`camp_id` And `donor`.`bgid` = `bloodgroup`.`bgid` ORDER BY `donation_id` DESC";
 $result=mysql_query($dis_query);
 while($row = mysql_fetch_array($result))
 {
//		 print_r($row);
	 $rs[]=$row;
 }
 if($_GET['id']!="")
 { 
 $del_que= "DELETE FROM `donation` WHERE donation_id='".$_GET['id']."'";	
 mysql_query($del_que);
 header('location:donation.php');
 }
?>
<html>
	<head>
		<title>Donation Page</title>
		<link href="StyleSheet.css" rel="stylesheet" type="text/css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="style1.css" rel="stylesheet" type="text/css">
		<link href="css.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body>

<?php 
$num_rec_per_page=20;
mysql_connect('localhost','root','');
mysql_select_db('bloodbank');
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT * FROM `donation`"; 
$rs_result = mysql_query ($sql); //run the query
?>

	
		<!--header & menu start-->
		<?php include("menu.php"); ?>
		<!--header & menu end-->
			
		<center>
			
		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Donation Details </p>
		
		<center>
        <table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
<tr>
<td class="sub_txt"> <?php $sql = "SELECT * FROM `donation`"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records 
echo "Total data find ".$total_records."";?></td>
<td align="right">
<?php
$sql = "SELECT * FROM `donation`"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='donation.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='donation.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='donation.php?page=$total_pages'>".'>|'."</a> ";?>
</td>
</table>
        
<br>
<center>
  <table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
           	  <tr >
				<th width="9%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Donation ID</th>
	        	  <th width="10%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Donor Name</th>
                <th width="9%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Date</th>
                <th width="15%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Camp</th>                
                <th width="5%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Units</th>
                <th width="8%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Blood Group</th>
                <th width="25%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Remark</th> 
                <th width="10%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center" colspan="2">Action</th>
              </tr>
        	   <?php
		       for($i = 0; $i < count($rs); $i++)
				{
		     ?>
             <tr class='alter1'>
					<td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['donation_id']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['name']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['date']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['title']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['units']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['group']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['remark']?></td>
                     <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt"><a href="donationupdate.php?id=d5d67b7529fda44<?php echo $rs[$i]['donation_id'];?>dbacda6b093e739"><img src="images/update.png" /></a></td>
		                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt"><a href="donation.php?id=<?php echo $rs[$i]['donation_id'];?>"onClick="return confirm('Are you sure you want to delete?')"><img src="images/delete.png" /></a></td>
                    
                    </tr>
                    <?php 
}; 
?> 
</table>
<br>
<table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
<tr>
<td class="sub_txt" align="right">
<?php 
$sql = "SELECT * FROM `donation`"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='page.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='page.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='page.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
?>
</td>
</tr>
</table>
</center>
<br/>
</body>
</html>