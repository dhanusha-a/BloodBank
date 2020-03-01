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

 $dis_query="SELECT blooddetails.bidt,blooddetails.pouch_id,donation.don_id, donor.name, bloodgroup.group, camp.title FROM blooddetails, donor, bloodgroup, camp, donation WHERE blooddetails.donation_id=donation.donation_id And donation.don_id=donor.don_id And donor.bgid=bloodgroup.bgid And donation.camp_id=camp.camp_id ORDER BY `bidt` DESC ";
 $result=mysql_query($dis_query);
 while($row = mysql_fetch_array($result))
 {
//		 print_r($row);
	 $rs[]=$row;
 }
 
 if($_GET['id']!="")
 { 
 $del_que= "DELETE FROM blooddetails WHERE bidt_id='".$_GET['id']."'";	
 mysql_query($del_que);
 header('location:blood.php');
 }
?>

<html>
	<head>
		<title>Blood Details Page</title>
		<link href="StyleSheet.css" rel="stylesheet" type="text/css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="style1.css" rel="stylesheet" type="text/css">
		<link href="css.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body>
    <?php 
$num_rec_per_page=20;
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
			
		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Whole Blood Details </p>
		
		<center>
          <table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
<tr>
<td class="sub_txt"> <?php $sql = "SELECT * FROM `blooddetails`"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records 
echo "Total data find $total_records";?></td>

<td align="right" class="sub_txt">
<?php
$sql = "SELECT * FROM `blooddetails`"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='blood.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='blood.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='blood.php?page=$total_pages'>".'>|'."</a> ";?>
</td>
</td>
</tr>
</table>
<br>
  <table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
           	  <tr >
				<th width="12%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Blood ID</th>
	        	  <th width="12%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Pouch No.</th>
                <th width="18%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Donor</th>
                <th width="15%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Blood Group</th>
                <th width="16%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Camp</th>
                <th style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center" colspan="2">Action</th>
              </tr>
                 <?php
		       for($i = 0; $i < count($rs); $i++)
				{
		     ?>
             <tr class='alter1'>
					<td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['bidt']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['pouch_id']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['name']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['group']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['title']?></td>
                    <td width="9%" class="sub_txt" style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;"><a href="bloodupdate.php?id=d5d67b7529fda44<?php echo $rs[$i]['bidt'];?>dbacda6b093e739"><img src="images/update.png" /></a></td>
		            <td width="7%" class="sub_txt" style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;"><a href="blood.php?id=<?php echo $rs[$i]['bidt'];?>"onClick="return confirm('Are you sure you want to delete?')"><img src="images/delete.png" /></a></td>
        
                    
                    
                    </tr>
                    <?php }?>
                    </table>
                    <br>
			  <table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
<tr>
<td align="right" class="sub_txt">
<?php
$sql = "SELECT * FROM blooddetails"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='blood.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='blood.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='blood.php?page=$total_pages'>".'>|'."</a> ";?>
</td>
</tr>
</table>
			  
</body>
</html>