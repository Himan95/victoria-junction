<?php

//error_reporting(0);
session_start();
include('../connect/connection.php');
date_default_timezone_set('Asia/Kolkata');
require '../item.php';


$order_no=mt_rand(100000, 999999);

if(!$_SESSION['tot_amount']){
	echo "<script>alert('No products added to cart!');</script>";
	echo "<script>window.location.href='../index.php';</script>";
}

if(!$_SESSION['logged_in']){
	echo "<script>alert('You need to login to buy products!');</script>";
	echo "<script>window.location.href='../login.php';</script>";
}

$cart = unserialize(serialize($_SESSION['cart']));
$r=sizeof($cart);

if(isset($_POST['checkout'])){

	$coupon_name=strtoupper($_POST['promo_code']);
	$today=date('Y-m-d');
	$records = $connection->prepare('SELECT * FROM coupons WHERE coupon_name=:coupon_name');
	$records->bindParam(':coupon_name',$coupon_name);
	$records->execute();
	$results=$records->fetch(PDO::FETCH_ASSOC);

	if($results['coupon_enddate'] < $today)
	echo "<script>alert('Coupon Invalid!');</script>";
	else{
		$order_status="Pending";
		$payment_status="Pending";

		$customer_name=$_SESSION['username'];
		$customer_contact=$_POST['delivery_tel'];
		$customer_email=$_POST['email'];

		$created_at=date('Y-m-d');
		$created_time=date('h:i:s');
		$shipping_address=$_POST['address'];
		$total= $_SESSION['tot_amount'];
		$_SESSION['payment'] = $total - ($total * ($results['coupon_discount']/100));

		while($r--){

			$prod_id=$cart[$r]->id;
			$records21 = $connection->prepare('SELECT * FROM products WHERE prod_id=:prod_id');
			$records21->bindParam(':prod_id',$prod_id);
			$records21->execute();
			$results21=$records21->fetch(PDO::FETCH_ASSOC);

			$product=$results21['prod_name'];
			$price=$results21['prod_price'];
			$quantity=$results21['prod_quantity'];

			//Write code for creating order and adding in db
			$records2 = $connection->prepare('INSERT INTO orders(order_no,product,price,quantity,payment_status,order_status,customer_name,customer_contact,customer_email,created_at,created_time,shipping_address,total) VALUES(:order_no,:product,:price,:quantity,:payment_status,:order_status,:customer_name,:customer_contact,:customer_email,:created_at,:created_time,:shipping_address,:total)');
			$records2->bindParam(':order_no',$order_no);
			$records2->bindParam(':product',$product);
			$records2->bindParam(':price',$price);
			$records2->bindParam(':quantity',$quantity);
			$records2->bindParam(':payment_status',$payment_status);
			$records2->bindParam(':order_status',$order_status);
			$records2->bindParam(':customer_name',$customer_name);
			$records2->bindParam(':customer_contact',$customer_contact);
			$records2->bindParam(':customer_email',$customer_email);
			$records2->bindParam(':created_at',$created_at);
			$records2->bindParam(':created_time',$created_time);
			$records2->bindParam(':shipping_address',$shipping_address);
			$records2->bindParam(':total',$_SESSION['payment']);
			$records2->execute();

		}

		echo "<script>alert('Redirecting to Payment Gateway!');</script>";
		echo "<script>window.location.href='ccavResponseHandler.php';</script>";
	}
}


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
<head>
	<title><?php echo $results1['web_name']; ?> | Checkout </title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Victoria Junction, Siliguri - Custom Cakes fro Every Occassion, Gluten, Dairy & Egg-Free Options Available
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome icons -->
	<link href="../css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //font-awesome icons -->
	<!-- js -->
	<script src="../js/jquery-1.11.1.min.js"></script>
	<!-- //js -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="../js/move-top.js"></script>
	<script type="text/javascript" src="../js/easing.js"></script>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
	</script>
	<!-- start-smoth-scrolling -->
	<script>
	window.onload = function() {
		var d = new Date().getTime();
		document.getElementById("tid").value = d;
	};
	</script>

</head>
<style>
hr{
	width:75%;
}
#demo-form2{
	margin-top: 100px;
}
.form-group{
	margin-top: 20px;
	text-align: center;
}
</style>
<body>
	<script src='../../../../../../../ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script><script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','../../../../../../www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-30027142-1', 'w3layouts.com');
	ga('send', 'pageview');
	</script>
	<script async type='text/javascript' src='../../../../../../cdn.fancybar.net/ac/fancybar6a2f.js?zoneid=1502&amp;serve=C6ADVKE&amp;placement=w3layouts' id='_fancybar_js'></script>
	<style type='text/css'>  .adsense_fixed{position:fixed;bottom:-8px;width:100%;z-index:999999999999;}.adsense_content{width:720px;margin:0 auto;position:relative;background:#fff;}.adsense_btn_close,.adsense_btn_info{font-size:12px;color:#fff;height:20px;width:20px;vertical-align:middle;text-align:center;background:#000;top:4px;left:4px;position:absolute;z-index:99999999;font-family:Georgia;cursor:pointer;line-height:18px}.adsense_btn_info{left:26px;font-family:Georgia;font-style:italic}.adsense_info_content{display:none;width:260px;height:340px;position:absolute;top:-360px;background:rgba(255,255,255,.9);font-size:14px;padding:20px;font-family:Arial;border-radius:4px;-webkit-box-shadow:0 1px 26px -2px rgba(0,0,0,.3);-moz-box-shadow:0 1px 26px -2px rgba(0,0,0,.3);box-shadow:0 1px 26px -2px rgba(0,0,0,.3)}.adsense_info_content:after{content:'';position:absolute;left:25px;top:100%;width:0;height:0;border-left:10px solid transparent;border-right:10px solid transparent;border-top:10px solid #fff;clear:both}.adsense_info_content #adsense_h3{color:#000;margin:0;font-size:18px!important;font-family:'Arial'!important;margin-bottom:20px!important;}.adsense_info_content .adsense_p{color:#888;font-size:13px!important;line-height:20px;font-family:'Arial'!important;margin-bottom:20px!important;}.adsense_fh5co-team{color:#000;font-style:italic;}</style>

	<!-- header -->
	<?php include('../header.php');?>
	<!--Header-->

	<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		var navoffeset=$(".agileits_header").offset().top;
		$(window).scroll(function(){
			var scrollpos=$(window).scrollTop();
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		});

	});
	</script>
	<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" name="customerData" action="ccavRequestHandler.php">

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Transaction Id<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="number" required="required" readonly id="tid" name="tid" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Name<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="text" required="required" value="<?php echo $_SESSION['username']; ?>" placeholder="eg: Rahul Goyal" autocomplete="off" name="delivery_name" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Email Id<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="email" required="required" placeholder="eg: abc@xyz.com" autocomplete="off" name="email" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Contact No.<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="number" required="required" placeholder="eg: 9458XX1254" autocomplete="off" name="delivery_tel" class="form-control col-md-7 col-xs-12">
			</div>
		</div>
		<hr/>
		<h4 style="text-align:center;"><u>Billing Information</u></h4>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Billing Name<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="text" required="required" placeholder="eg: Fawad Khan" autocomplete="off" name="billing_name" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Billing Email<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="email" required="required" placeholder="eg: abc@xyz.com" autocomplete="off" name="billing_email" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Billing Contact<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="text" required="required" placeholder="eg: 9458XX1254" autocomplete="off" name="billing_tel" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Billing Address<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="text" required="required" placeholder="eg: Flat No 4A, 4th Floor, Shakti Kunj, Khalpara" autocomplete="off" name="billing_address" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Billing City<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="text" required="required" placeholder="eg: Siliguri" autocomplete="off" name="billing_city" value="Siliguri" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Billing State<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="text" required="required" value="West Bengal" placeholder="eg: West Bengal" autocomplete="off" name="billing_state" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Billing Zip<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="number" required="required" placeholder="eg: 712248" autocomplete="off" name="billing_zip" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Billing Country<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="text" required="required" value="India" placeholder="eg: India" autocomplete="off" name="billing_country" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<hr/>
		<h4 style="text-align:center;"><u>Delivery Information</u></h4>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Delivery Address<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="text" required="required" placeholder="eg: Flat No 4A, 4th Floor, Shakti Kunj, Khalpara" autocomplete="off" name="delivery_address" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Delivery City<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="text" required="required" value="Siliguri" placeholder="eg: Siliguri" autocomplete="off" name="delivery_city" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Delivery State<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="text" required="required" value="West Bengal" placeholder="eg: West Bengal" autocomplete="off" name="delivery_state" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Delivery Zip<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="number" required="required" placeholder="eg: 712248" autocomplete="off" name="delivery_zip" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Delivery Country<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="text" required="required" value="India" placeholder="eg: India" autocomplete="off" name="delivery_country" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<input type="hidden" value="INR" name="currency" />
		<input type="hidden" name="merchant_id" value="13007"/>
		<input type="hidden" name="order_id" value="<?php echo $order_no; ?>" />
		<input type="hidden" value="EN" name="language" />
		<input type="hidden" name="redirect_url" value="http://victoriajunction.in/NON_SEAMLESS_KIT/ccavResponseHandler.php"/>
		<input type="hidden" name="cancel_url" value="http://victoriajunction.in/NON_SEAMLESS_KIT/ccavResponseHandler.php"/>
		<hr>
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Total Amount<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="number" readonly required="required" placeholder="eg: Rs. 25000" autocomplete="off" value="<?php echo $_SESSION['tot_amount'];?>" name="amount" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" >Promo Code<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="text" placeholder="eg: SUMMERSALE15" autocomplete="off" value="" name="promo_code" class="form-control col-md-7 col-xs-12">
			</div>
		</div>

		<div class="ln_solid"></div>
		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				<button type="reset" class="btn btn-primary">Reset</button>
				<input type="submit" name="checkout" class="btn btn-success" value="CheckOut">
			</div>
		</div>

	</form>

	<div class="clearfix"></div>
	<br><br>
	<!-- //banner -->
	<!---728x90--->


	<!-- newsletter -->
	<?php include ('../newsletter.php'); ?>
	<!-- //newsletter -->

	<!-- footer -->
	<?php include('../footer.php');?>
	<!-- //footer -->

	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>
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

<!-- Mirrored from empreuslabs.com/demos/july-2016/07-07-2016/grocery_store/web/about.php  [XR&CO'2014], Thu, 04 May 2017 08:01:11 GMT -->
</html>
