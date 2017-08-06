<?php
error_reporting(0);
session_start();
include('connect/connection.php');


$order_id=$_GET['order_no'];


$records15= $connection->prepare('SELECT * FROM orders WHERE order_no=:order_no');
$records15->bindParam(':order_no',$order_id);
$records15->execute();
$results15=$records15->fetch(PDO::FETCH_ASSOC);


$records1 = $connection->prepare('SELECT * FROM web_info');
$records1->execute();
$results1=$records1->fetch(PDO::FETCH_ASSOC);
?>
<!--

License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<!-- Mirrored from empreuslabs.com/demos/july-2016/07-07-2016/grocery_store/web/  [XR&CO'2014], Thu, 04 May 2017 07:59:30 GMT -->
<head>
	<title><?php echo $results1['web_name']; ?> | Home </title>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Victoria Junction, Siliguri - Custom Cakes fro Every Occassion, Gluten, Dairy & Egg-Free Options Available
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome icons -->
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />


	<link href="css/print.css" rel="stylesheet" type="text/css" media="print" />

	<!-- //font-awesome icons -->
	<!-- js -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<!-- //js -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
	</script>

	<script>
			printDivCSS = new String ('<link href="css/style.css" rel="stylesheet" type="text/css">')
			printDivCSS2 = new String('<link href="css/bootstrap.css" rel="stylesheet" type="text/css">')
			function printDiv(divId) {
					window.frames["print_frame"].document.body.innerHTML=printDivCSS + printDivCSS2 + document.getElementById(divId).innerHTML;
					window.frames["print_frame"].window.focus();
					window.frames["print_frame"].window.print();
			}
	</script>
	<!-- start-smoth-scrolling -->
	<style type="text/css">

	</style>
</head>

<body>
	<?php include('header.php');?>

	<div class="container">

		<div style="margin-top:20px;	text-align: center;" class="bold">
			<h4>Thank you. Your order has been placed and will be processed shortly. For details, please write to support@victoriajunction.com</h4>
		</div>
		<div id= "yesPrint">
		<h3 style="margin-top:20px;margin-bottom:20px;	background-color: black;padding:10px;	height:40px;color:white;text-align: center;letter-spacing: 3.75px;" class="invoice">INVOICE</h3>
		<h4 style="font-size:150%; margin-bottom:10px;">ORDER FOR:</h4>
		<div class="row">
			<div style="line-height: 200%;" class="col-md-4">
					<p><?php echo $results15['customer_name']; ?></p>
					<p><?php echo $results15['shipping_address']; ?></p>
					<p><?php echo $results15['customer_contact']; ?></p>
			</div>
			<div class="col-md-4">
			</div>

			<div style="line-height: 200%;" class="col-md-4">
				<p><b>Order No:</b><?php echo $results15['order_no']; ?></p>
				<p><b>Date:</b> <?php echo $results15['created_at']; ?></p>
				<p><b>Total Amount:</b> <?php echo $results15['total']; ?></p>
				<p><b>Order Status:</b><?php echo $results15['order_status']; ?></p>
			</div>
		</div>

		<div style="margin-top:20px;">
			<table style="border:none;" id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" align="center" >
				<thead>
					<tr style="font-size:120%;">
						<th>Product</th>
						<th>Item</th>
						<th>Unit Cost</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$records155= $connection->prepare('SELECT * FROM orders WHERE order_no=:order_no');
					$records155->bindParam(':order_no',$order_id);
					$records155->execute();

					while($results155=$records155->fetch(PDO::FETCH_ASSOC)){
						echo '
											<tr style="width:120%;">
											<td><img width="70px" height="auto" src="'.$results155['prod_image'].'"/></td>
											<td>'.$results155['product'].'</td>
											<td>'.$results155['price'].'</td>
											<td>'.$results155['quantity']*$results155['price'].'</td>
										</tr>
											<hr style="border: 2px solid cyan;">
											<tr>
												<td style="border:none;" colspan="2" > </td>
												<td style="border:none;" colspan="1" >Total</td>
												<td style="border:none;">'.$results155['total'].'</td>
											</tr>
						';
					}
					 ?>


				</tbody>
			</table>
		</div>
	</div>
	</div>
		<div style="margin:30px; text-align:center">
		<input type="button" value="Print Invoice" class="btn btn-warning" onClick="javascript:printDiv('yesPrint')"/>
	</div>

<!--Printing Purpose-->
	<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>


	<?php include('newsletter.php'); ?>
	<!-- //newsletter -->
	<!-- footer -->
	<?php include('footer.php'); ?>
	<!-- //footer -->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<script>
	$(document).ready(function(){
		$(".dropdown").hover(
			function() {
				$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
				$(this).toggleClass('open');
			},
			function() {
				$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
				$(this).toggleClass('open');
			}
		);
	});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
	$(document).ready(function() {
		/*
		var defaults = {
		containerID: 'toTop', // fading element id
		containerHoverID: 'toTopHover', // fading element hover id
		scrollSpeed: 1200,
		easingType: 'linear'
	};
	*/

	$().UItoTop({ easingType: 'easeOutQuart' });

});
</script>
<!-- //here ends scrolling icon -->
</body>
</html>
