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

/*session_start();
 if(!isset($_SESSION['username']))
{
	header('location:index.php');
}*/

 $dis_query="SELECT * FROM inquiry";
 $result=mysql_query($dis_query);
 while($row = mysql_fetch_array($result))
 {
	 $rs[]=$row;
 }
 
 if($_GET['id']!="")
 { 
 $del_que= "DELETE FROM `inquiry` WHERE `inquiry_id`='".$_GET['id']."'";	
 mysql_query($del_que);
 header('location:suggestions.php');
 }

/*print "<pre>";
print_r($rs);
print "</pre>";*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>enquiry Page</title>
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
$sql = "SELECT * FROM inquiry LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysql_query ($sql); //run the query	
?>		

<!--header & menu start-->
		<?php include("menu.php"); ?>
		<!--header & menu end-->
		
		<center>
		
		<img src="images/enquiry.jpg" / width="40%">

<br /><br>
<table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="70%" class="table_head1">
<tr>
<td class="sub_txt"> <?php $sql = "SELECT * FROM inquiry"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records 
echo "Total data find $total_records";?></td>
<td align="right" class="sub_txt">
<?php
$sql = "SELECT * FROM inquiry"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='enquiry.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++)
 { 
            echo "<a href='enquiry.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='enquiry.php?page=$total_pages'>".'>|'."</a> ";?>
</td>
</tr>
</table>
<br />
  <table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="70%" class="table_head1">
           	  <tr >
				<th width="12%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Name</th>
	        	<th width="11%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Email</th>
                <th width="15%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Contact Number</th>
                <th width="14%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Subject</th>
                <th width="22%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Enquiry</th>
                <th width="10%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Date</th>
                <th width="12%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center" >Action</th>
              </tr>
                <?php
		       for($i = 0; $i < count($rs); $i++)
				{
		     ?>
             <tr class='alter1'>            
                  	<td class="sub_txt" style="border-bottom:dotted 1px #CCCCCC; border-right:dotted 1px #CCCCCC;" ><strong><?php echo $rs[$i]['name']?></strong></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['email']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['cno']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['subj']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['inquiry']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['date']?></td>
		                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" align="center"><a href="enquiry.php?id=<?php echo $rs[$i]['inquiry_id'];?>"onClick="return confirm('Are you sure you want to delete?')"><img src="images/delete.png" /></a></td>
                                     
                </tr>         
                	<?php }?>
              </table>
              <br />
<table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="70%" class="table_head1">
<tr>
<td align="right" class="sub_txt">
<?php
$sql = "SELECT * FROM inquiry"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='enquiry.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++)
 { 
            echo "<a href='enquiry.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='enquiry.php?page=$total_pages'>".'>|'."</a> ";?>
</td>
</tr>
</table>

    </center>
    <br/><br/>
</body>
</html>