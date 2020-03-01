<html>
 <head>
	<title>Blood Bank</title>		
	<link href="css.css" rel="stylesheet" type="text/css" />
	<link href="style.css" rel="stylesheet" type="text/css">
		
	<script src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/coin-slider.js"></script>
	<link rel="stylesheet" href="js/coin-slider-styles.css" type="text/css" />
		
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.1.js"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.1.css" media="screen" />
	
	<script type="text/javascript">
	$(document).ready(function() {
	/*	Examples - images	*/
		$(".largerphoto").fancybox({
			'width'				: 600,
			'height'				: 550,
			'autoScale'     	: false,
			'transitionIn'		: 'elastic',
			'transitionOut'		: 'elastic',
			'type'				: 'iframe'
		});	

		$("a#example2").fancybox({
			'width'				: 600,
			'height'				: 550,
			'titleShow'		: false,
			'transitionIn'	: 'elastic',
			'transitionOut'	: 'elastic'
		});

		$("a[rel=example_group]").fancybox({
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'titlePosition' 	: 'over',
			'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
				return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
			}
		});

	/*   Examples - various	*/
		$("#various1").fancybox({
			'titlePosition'		: 'inside',
			'transitionIn'		: 'none',
			'transitionOut'		: 'none'
		});

		$("#various2").fancybox();
	
		$("#various3").fancybox({
			'width'				: '85%',
			'height'			: '85%',
			'autoScale'			: false,
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'type'				: 'iframe'
		});

		$("#various4").fancybox({
			'padding'			: 0,
			'autoScale'			: false,
			'transitionIn'		: 'none',
			'transitionOut'		: 'none'
		});
	});
	</script>
	
	<style type="text/css">
			th
			{
				border-right:dotted 1px #d9d9d9;
				border-bottom:dotted 1px #CCCCCC;
			}
			
			td.a
			{
				border-bottom:dotted 1px #CCCCCC;
				border-right:dotted 1px #CCCCCC;
			}
	</style>
		
 </head>
 <body>	
 <!--start body-->
 
	<div id="wrapper">
	
		<!--header-->
		<?php include("header.php"); ?>
		<!--header-->
		
		<!--menu-->
		<?php include("menu.php"); ?>
		<!--menu-->
		
		<!--banner-->
		<div id="banner">    
			<div id="games">
				<img src="js/images/banner.jpg" alt="banner" width="1000" height="250" />  
				<!--<a href="index.htm"><img src="js/images/banner.jpg" alt="banner" width="1000" height="250" /></a>-->
			</div>
			
			<!--<script>
				$('#games').coinslider();
			</script> -->
		</div>
		<!--banner end-->
		
		<!--content-->
		<div id="body_content">
		
			<!--cleft part-->
			<div class="cleft">
				<!--threebutton-->
				<div class="three_button" align="center">
				<a href="donorsignup.php"><img src="images/1_button.png" alt="Free Blood Donors Registration On  Blood Bank.Com" width="202" height="67" /></a>
				<!--<a href="donorsignup.htm"><img src="images/2_button.png" alt="Register Blood Bank" width="202" height="67" /></a>--> &nbsp; &nbsp;
				<a href="blood_req.php"><img src="images/3_button.png" alt="Free Blood Donors Registration On  Blood Bank.Com" width="202" height="67"/></a>
				</div>
				<!--three button end-->
				
				
				<h3>WELCOME TO BLOOD BANK</h3>
				<p style="font-family:georgia,garamond,serif; font-size:15px;">
				Donation of blood is a sign of kindness and care for the fellow human beings. There is no gift more valuable than a Gift of Blood, as it is actually a Gift of Life for the person who receives it. Blood Bank Management System is an online edge for bringing mutually giving blood donors and patients who needs blood.<br />      
				You can go to the nearest government approved blood centre, which is based on voluntary non/remunerated blood donation and make your significant contribution to saving life of a patient by donating blood. Your contribution is extremely valuable to us.            
				</p>
				
				<!--<h3 style="margin-bottom:10px;">RECENT BLOOD DONORS</h3><br />
                <table width="650" bgcolor="#f2f2f2" cellpadding="4" cellspacing="2" style="margin:10px 0 0 25px; border:1px dotted #999999; font-family:Arial, Helvetica, sans-serif; font-size:13px;">
					<tr class="change" style="font-size:13px; font-weight:bold;">
						<th align="left">Patients Name</th>
						<th align="center">Blood Group</th>
						<th align="left">State</th>
						<th align="center">Contact Number</th>
					</tr>
					
					<tr align="center">
						<tr class='alter1'> 
							<td class="a" bgcolor="#ebffec">TEST</td>
							<td class="a" bgcolor="#ffe8e8" align="center" >A1-</td>
							<td class="a" bgcolor="#e5f3fe">Chang-hua</td>
							<td class="a" bgcolor="#f5f5f5" align="center" > 
								<a id="example2" href="member-login.htm" style="text-decoration:none; color:#666666;" ><strong>View</strong></a>
							</td>
						</tr>
					</tr>
					
					<tr>
						<td colspan="3"></td>
						<td align="center"><a href="donors.htm" style="color:#000; text-decoration:none;">View All..</a></td>
					</tr>					
				</table>-->
			</div>
			<!--cleft part end-->
			
			<!--cmid part
			<div class="cmid"></div>
			<!--cmid part end-->
			
			<!--cright part-->
			<div class="cright">
			
				<!--marquee part-->
				<!--<h3> TODAYS BLOOD REQUEST</h3>
					<div class="box">
						<marquee behavior=scroll direction="up" scrollamount="5" scrollDelay="300" height="150" onMouseOver="javascript:this.stop();" onMouseOut="javascript:this.start();">
							I am <a style="color:#000; text-decoration:none;" href="viewrequester.htm" > <strong>TETTEST </strong> need <strong style=color:#FF0000>A2-</strong> blood and my contact no: 78979879879879 </a> 
							<br />
						</marquee>
						<a href="todaysbloodrequest.htm" style="font-size:12px; float:right; font-family:Arial, Helvetica, sans-serif; text-decoration:none; color:#ff0000; margin:0px 10px 10px 0;">MORE</a>
					</div>-->
				<!--marquee part end-->
				
				<!--mini banner part-->
				
					<div class="mbox">  
						<h3>Share Blood - Share Life</h3>
						<div style="margin:10px;">	
						<br><br>
						<img src = "images/blood-donor-plus-icon.jpg" vspace="3" hspace="10" border=0  style="border:#C9C9C9 1px solid;" width="180" height="250"/>
						</div>
					</div>
				<!--mini banner part end-->
				
			</div>
			<!--cright part end-->
			
		</div>
		<!--content end-->
		
		<!--footer-->
		<?php include("footer.php"); ?>
		<!--footer-->
	</div>
	
<!--body end-->
 </body>
</html>