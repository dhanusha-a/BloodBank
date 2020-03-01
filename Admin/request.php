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
 $dis_query="SELECT bloodreq.brr_id, bloodreq.pname, bloodreq.disease, bloodreq.hname, bloodreq.ref_doc, bloodreq.required, bloodgroup.group, bloodcomponent.comp, bloodreq.qty, bloodreq.rcno, bloodreq.remail, bloodreq.status FROM `bloodreq`, bloodgroup,bloodcomponent WHERE bloodreq.bgid = bloodgroup.bgid And bloodreq.bcid = bloodcomponent.bcid Order by brr_id";
 $result=mysql_query($dis_query);
 while($row = mysql_fetch_array($result))
 {
	 $rs[]=$row;
 }
 
 if($_GET['id']!="")
 { 
 $del_que= "DELETE FROM `bloodreq` WHERE `brr_id`='".$_GET['id']."'";	
 mysql_query($del_que);
 header('location:request.php');
 }

/*print "<pre>";
print_r($rs);
print "</pre>";*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blood Requests Page</title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
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
$sql = "SELECT * FROM bloodreq LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysql_query ($sql); //run the query	
?>

		<!--header & menu start-->
		<?php include("menu.php"); ?>
		<!--header & menu end-->
		
		<center>
		
		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Blood Reserve Request Details </p>


<table cellpadding="2"  style="border:solid 1px #b8b8b8" width="96%" class="table_head1">
<tr>
<td class="sub_txt"> <?php $sql = "SELECT * FROM bloodreq"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records 
echo "Total data find $total_records";?></td>
<td align="right" class="sub_txt">
<?php
$sql = "SELECT * FROM bloodreq"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='request.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++)
 { 
            echo "<a href='request.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='request.php?page=$total_pages'>".'>|'."</a> ";?>
</td>
</tr>
</table>

<br />
  <table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="96%" class="table_head1">
           	  <tr >
			  <th width="3%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Request ID</th>
				<th width="9%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Patient's Name</th>
	        	  <th width="5%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Type of Disease</th>
                <th width="9%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Hospital Name</th>
                <th width="10%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Doctor's Name</th>
                <th width="10%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Reserved Till</th>
                <th width="5%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Blood Group</th>
                <th width="10%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Blood Component</th>
                <th width="5%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Qty</th>
                <th width="6%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Contact Number</th>
           	    <th width="6%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Status</th>
                <th width="6%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Email ID</th>              
                <th width="21%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center" colspan="2">Action</th>
              </tr>
                <?php
		       for($i = 0; $i < count($rs); $i++)
				{
		     ?>
             <tr class='alter1'>
					<td class="sub_txt" style="border-bottom:dotted 1px #CCCCCC; border-right:dotted 1px #CCCCCC;" ><strong><?php echo $rs[$i]['brr_id']?>
                  	<td class="sub_txt" style="border-bottom:dotted 1px #CCCCCC; border-right:dotted 1px #CCCCCC;" ><strong><?php echo $rs[$i]['pname']?></strong></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['disease']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['hname']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt"><?php echo $rs[$i]['ref_doc']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt"><?php echo $rs[$i]['required']?></td>
                    <td class="sub_txt" style="border-bottom:dotted 1px #CCCCCC; border-right:dotted 1px #CCCCCC;" ><strong><?php echo $rs[$i]['group']?></strong></td>
					<td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt"><?php echo $rs[$i]['comp'];?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['qty']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt"><?php echo $rs[$i]['rcno']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt"><?php echo $rs[$i]['status']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt"><?php echo $rs[$i]['remail']?></td>
                   <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" align="center"><a href="email.php?id=<?php echo $rs[$i]['brr_id'];?>"><img src="images/email.png" /></a></td>
		                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" align="center"><a href="request.php?id=<?php echo $rs[$i]['brr_id'];?>"onClick="return confirm('Are you sure you want to delete?')"><img src="images/delete.png" /></a></td>
                                     
                </tr>        
                	<?php }?>
              </table>
              <br  />
              <table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="96%" class="table_head1">
<tr>

<td align="right" class="sub_txt">
<?php
$sql = "SELECT * FROM bloodreq"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='request.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++)
 { 
            echo "<a href='request.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='request.php?page=$total_pages'>".'>|'."</a> ";?>

</tr>
</table>
    </center>
    <br/><br/>
</body>
</html>