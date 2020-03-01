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

 $dis_query="SELECT * FROM `camp`";
 $result=mysql_query($dis_query);
 while($row = mysql_fetch_array($result))
 {
	 $rs[]=$row;
 }
 
 if($_GET['id']!="")
 { 
 $del_que= "DELETE FROM `camp` WHERE `camp_id`='".$_GET['id']."'";	
 mysql_query($del_que);
 header('location:camp.php');
 }

/*print "<pre>";
print_r($rs);
print "</pre>";*/
?>


<html>
	<head>
		<title>Camps Page</title>
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
		$sql = "SELECT * FROM camp LIMIT $start_from, $num_rec_per_page"; 
		$rs_result = mysql_query ($sql); //run the query	
		?>

		<!--header & menu start-->
		<?php include("menu.php"); ?>
		<!--header & menu end-->
		
		<center>
		
		<p style="font-family:Palatino Linotype; font-size:30px; color:#990000"> Camp Details </p>

<table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
<tr>
<td class="sub_txt"> <?php $sql = "SELECT * FROM camp"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records 
echo "Total data find $total_records";?></td>
<td align="right" class="sub_txt">
<?php
$sql = "SELECT * FROM camp"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='camp.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++)
 { 
            echo "<a href='camp.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='camp.php?page=$total_pages'>".'>|'."</a> ";?>
</td>
</tr>
</table>

</center>
	<br>
	<center>
	
  <table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
           	  <tr >
			  <th width="3%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Camp ID</th>
				<th width="9%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Image</th>
	        	  <th width="5%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Title</th>
                <th width="9%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Organization</th>
                <th width="16%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Address</th>
                <th width="5%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">City</th>
                <th width="10%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Date</th>
                <th width="8%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Estimated Donors</th>
                <th width="6%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Actual Donors</th>
                <th width="6%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center">Units</th>                              
				
                <th width="20%" style=" border-right:dotted 1px #d9d9d9;" class="sub_txt1" align="center" colspan="2"><center>Action</th>
              </tr>
                <?php

		       for($i = 0; $i < count($rs); $i++)
				{
		     ?>
             <tr class='alter1'>
					<td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['camp_id']?></td>
                  	<td class="sub_txt" style="border-bottom:dotted 1px #CCCCCC; border-right:dotted 1px #CCCCCC;" ><img src="../camp/<?php echo @$rs[$i]['image']; ?>" width="50" height="50"/>
    <input type="hidden" name="h1" value="<?php {echo @$rs[$i]['image'];} ?>" /></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['title']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['org']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt"><?php echo $rs[$i]['address']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt"><?php echo $rs[$i]['city']?></td>
                    <td class="sub_txt" style="border-bottom:dotted 1px #CCCCCC; border-right:dotted 1px #CCCCCC;" ><strong><?php echo $rs[$i]['date']?></strong></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt" ><?php echo $rs[$i]['estimated_donors']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt"><?php echo $rs[$i]['actual_donors']?></td>
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt"><?php echo $rs[$i]['units']?></td>    
                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt"><a href="campupdate.php?id=d5d67b7529fda44<?php echo $rs[$i]['camp_id'];?>dbacda6b093e739"><img src="images/update.png" /></a></td>
		                    <td style="border-bottom:dotted 1px #CCCCCC;border-right:dotted 1px #CCCCCC;" class="sub_txt">                    <a href="camp.php?id=<?php echo $rs[$i]['camp_id'];?>"onClick="return confirm('Are you sure you want to delete?')"><img src="images/delete.png" /></a></td>
                                     
                </tr>               
                	<?php }?>
              </table>
              <br>
              <table cellpadding="2" cellspacing="0" style="border:solid 1px #b8b8b8" width="80%" class="table_head1">
<tr>
<td align="right" class="sub_txt">
<?php
$sql = "SELECT * FROM camp"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='camp.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='camp.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='camp.php?page=$total_pages'>".'>|'."</a> ";?>
</td>
</tr>
</table>

    </center>
    <br/><br/>
	
	
</body>
</html>