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

 $dis_query="SELECT compdetails.comp_dt_id, blooddetails.bidt,bloodgroup.bgid , bloodgroup.group, bloodcomponent.comp, compdetails.prepdate, compdetails.expdate FROM compdetails, blooddetails, bloodgroup, bloodcomponent WHERE compdetails.bidt = blooddetails.bidt And compdetails.bgid = bloodgroup.bgid And compdetails.bcid = bloodcomponent.bcid ORDER BY comp_dt_id DESC  ";
 $result=mysql_query($dis_query);
 while($row = mysql_fetch_array($result))
 {
	 $rs[]=$row;
 }
 
 if($_GET['id']!="")
 { 
 $del_que= "DELETE FROM blooddetails WHERE bidt_id='".$_GET['id']."'";	
 mysql_query($del_que);
 header('location:compt.php');
 }
?>


<html>
	<head>
		<title>Component Details Page</title>
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
$sql = "SELECT * FROM `compdetails` LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysql_query ($sql); //run the query
?>
		<!--header & menu start-->
		<?php include("menu.php"); ?>
		<!--header & menu end-->
			
		<center>
			
		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Component Details </p>
		<center>
          <table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
<tr>
<td class="sub_txt"> <?php $sql = "SELECT * FROM `compdetails`"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records 
echo "Total data find $total_records";?></td>

<td align="right" class="sub_txt">
<?php
$sql = "SELECT * FROM `compdetails`"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='compt.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='compt.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='compt.php?page=$total_pages'>".'>|'."</a> ";?>
</td>
</td>
</tr>
</table>
<br>
		<center>
  <table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
           	  <tr >
				<th width="13%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Component Detail ID</th>
	        	  <th width="16%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Component</th>
                <th width="12%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Blood Group</th>
                <th width="20%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Preparation Date</th>
                <th width="16%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Expiry Date</th>
                <th style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center" colspan="2">Action</th>
              </tr>
			  <?php
		       for($i = 0; $i < count($rs); $i++)
				{
		     ?>
             <tr class='alter1'>
					<td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['comp_dt_id']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['comp']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['group']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['prepdate']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['expdate']?></td>
                    <td width="7%" class="sub_txt" style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;"><a href="comptupdate.php?id=d5d67b7529fda44<?php echo $rs[$i]['comp_dt_id'];?>dbacda6b093e739"><img src="images/update.png" /></a></td>
		            <td width="7%" class="sub_txt" style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;"><a href="compt.php?id=<?php echo $rs[$i]['comp_dt_id'];?>"onClick="return confirm('Are you sure you want to delete?')"><img src="images/delete.png" /></a></td>
        
                    
                    
                    </tr>
                    <?php }?>
                 </table>
			  <br>
              <table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
<tr>
<td align="right" class="sub_txt">
<?php
$sql = "SELECT * FROM compdetails"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='compt.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='compt.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='compt.php?page=$total_pages'>".'>|'."</a> ";?>
</td>
</tr>
</table>
</body>
</html>