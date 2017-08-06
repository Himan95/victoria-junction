
<?php

error_reporting(0);
session_start();
include('../connect/connection.php');
date_default_timezone_set('Asia/Kolkata');
require '../item.php';

$order_no=mt_rand(100000, 999999);
$_SESSION['check']=0;
$countt=0;
if(isset($_POST['apply_coupon'])){
	if($_SESSION['check']==0){
		$_SESSION['check']++;
		$coupon_name=strtoupper($_POST['promo_code']);
		$today=date('Y-m-d');
		$records = $connection->prepare('SELECT * FROM coupons WHERE coupon_name=:coupon_name');
		$records->bindParam(':coupon_name',$coupon_name);
		$records->execute();
		$results=$records->fetch(PDO::FETCH_ASSOC);

		if($results['coupon_enddate'] < $today)
		echo "<script>alert('Coupon Invalid!');</script>";
		else{
			$_SESSION['actual_total']=$_SESSION['tot_amount'];
			$_SESSION['tot_amount']=$_SESSION['tot_amount'] - ($_SESSION['tot_amount'] * $results['coupon_discount'] / 100);
			$countt=1;
			echo "<script>alert('Coupon applied!');</script>";
		}
	}
	else {
		echo "<script>alert('Coupon can be applied only once!');</script>";

	}
}

if(!$_SESSION['tot_amount']){
	echo "<script>alert('No products added to cart!');</script>";
	echo "<script>window.location.href='../index.php';</script>";
}

if(!$_SESSION['logged_in']){
	echo "<script>alert('You need to login to buy products!');</script>";
	echo "<script>window.location.href='../login.php';</script>";
}


$records1 = $connection->prepare('SELECT * FROM web_info');
$records1->execute();
$results1=$records1->fetch(PDO::FETCH_ASSOC);


$records4 = $connection->prepare('SELECT * FROM customers WHERE cust_name=:cust_name');
$records4->bindParam(':cust_name',$_SESSION['username']);
$records4->execute();
$results4=$records4->fetch(PDO::FETCH_ASSOC);

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
label{
	text-transform: uppercase;
}
hr{
	border: 2px solid red;
	width:15%;
	position: relative;
	top:-10px;
	margin-bottom: 20px;
}
#demo-form2{
	margin-top: 100px;
}
.form-group{
	margin-top: 20px;

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
	<?php
	error_reporting(0);
	session_start();
	include('connect/connection.php');

	$records1 = $connection->prepare('SELECT * FROM web_info');
	$records1->execute();
	$results1=$records1->fetch(PDO::FETCH_ASSOC);
	?>
	<!-- header -->
	<div class="agileits_header">
		<div class="w3l_offers">
			<a href="../specials.php">Special Offers !</a>
		</div>

		<div class="w3l_search">
			<h3 style="color:red;margin-top:8px;margin-left:5px" align="center"> Welcome To <?php echo $results1['web_name'];  ?></h3>
		</div>


		<div class="product_list_header">
			<form action="../cart.php" method="post" class="last">
				<fieldset>
					<input type="hidden" name="cmd" value="_cart" />
					<input type="hidden" name="display" value="1" />
					<a class="" href="../cart.php"><img class="cart-img" src="../images/cart.png"></a>
					<!--<input type="submit" name="submit" value="" class="button" />-->
				</fieldset>
			</form>
		</div>
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user"></span> Login / Register</a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<?php if(isset($_SESSION['username'])){ ?>
									<li><a href="../checksession.php">LOGOUT</a></li>
									<?php }else{ ?>
										<li><a href="../login.php">LOGIN</a></li>
										<?php } ?>
										<li><a href="../login.php">SIGN UP</a></li>
										<li><a href="../my-accounts.php">MY ACCOUNT</a></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="w3l_header_right1">
					<h2><a href="../mail.php">Contact Us</a></h2>
				</div>
				<div class="clearfix"> </div>
			</div>

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
		<div class="col-md-12">
			<div class="col-md-5">
				<h3 style="text-align:center;">Personal Details<hr /></h3>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" >Name:
					</label>
					<div class="col-md-9 col-sm-6 col-xs-12">
						<input type="text" required="required" value="<?php echo $_SESSION['username']; ?>" placeholder="eg: Rahul Goyal" autocomplete="off" name="delivery_name" class="form-control col-md-7 col-xs-12">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" >Email:
					</label>
					<div class="col-md-9 col-sm-6 col-xs-12">
						<input type="email" autocomplete="on" required="required" placeholder="eg: abc@xyz.com" autocomplete="off" name="email" class="form-control col-md-7 col-xs-12">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" >Contact:
					</label>
					<div class="col-md-9 col-sm-6 col-xs-12">
						<input type="number" required="required" placeholder="eg: 9458XX1254" autocomplete="off" name="delivery_tel"  value="<?php echo $results4['cust_contact'];?>" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" >Amount:
					</label>
					<div class="col-md-9 col-sm-6 col-xs-12">
						<input type="number" readonly required="required" placeholder="eg: Rs. 25000" autocomplete="off" value="<?php echo $_SESSION['tot_amount'];?>" name="amount" class="form-control col-md-7 col-xs-12">
					</div>
				</div>

			</div>
			<div class="col-md-7">
				<h3 style="text-align:center;">Delivery Information</h3>
				<hr/>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" >Address:
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" autocomplete="on" required="required" value="<?php echo $results4['cust_address'];?>" placeholder="eg: Flat No 4A, 4th Floor, Shakti Kunj, Khalpara" autocomplete="off" name="delivery_address" class="form-control col-md-7 col-xs-12">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" >Zip:
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="number" required="required" placeholder="eg: 734001" autocomplete="off" name="delivery_zip" class="form-control col-md-7 col-xs-12">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" >City:
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" required="required" value="Siliguri" placeholder="eg: Siliguri" autocomplete="off" name="delivery_city" class="form-control col-md-7 col-xs-12">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" >State:
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" required="required" value="West Bengal" placeholder="eg: West Bengal" autocomplete="off" name="delivery_state" class="form-control col-md-7 col-xs-12">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" >Country:
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" required="required" value="India" placeholder="eg: India" autocomplete="off" name="delivery_country" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" required="required" readonly id="tid" name="tid">
		<input type="hidden" value="INR" name="currency" />
		<input type="hidden" name="merchant_id" value="13007"/>
		<input type="hidden" name="order_id" value="<?php echo $order_no; ?>" />
		<input type="hidden" value="EN" name="language" />
		<input type="hidden" name="redirect_url" value="http://victoriajunction.in/NON_SEAMLESS_KIT/ccavResponseHandler.php"/>
		<input type="hidden" name="cancel_url" value="http://victoriajunction.in/NON_SEAMLESS_KIT/ccavResponseHandler.php"/>


		<!--
		<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" >Promo Code
	</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
	<input type="text" placeholder="eg: SUMMERSALE15" autocomplete="off" value="" name="promo_code" class="form-control col-md-7 col-xs-12">
</div>
</div>
-->
<div class="ln_solid"></div>
<div class="form-group">
	<div style="margin-top:20px;text-align:center;" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<input type="submit" style=""  name="checkout" class="btn btn-success" value="CheckOut">
	</div>
</div>
</form>

<form style="text-align:center;" method="POST" action="dataFrom.php">
	<?php
	if($countt==0){
		echo '
	<div style="text-align:center;  margin-bottom:20px;" class="col-md-12 col-sm-6 col-xs-12 col-md-offset-3">
		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="text" required placeholder="eg: SUMMERSALE15" autocomplete="off" value="" name="promo_code" class="form-control col-md-7 col-xs-12">
				<input style=" text-align:center;margin-top:5px;border:none; color:blue;" class="btn-default" type="submit" name="apply_coupon" value="Apply Coupon"/>
			</div>
		</div>
	</div>
	';
}
	?>
</form>

<div class="clearfix"></div>

<!-- //banner -->
<!---728x90--->


<!-- newsletter -->
<?php
error_reporting(0);
session_start();
include ('connect/connection.php');
if(isset($_POST['subscribe'])){

  date_default_timezone_set('Asia/Kolkata');
  $email=$_POST['email'];
  $subscribed_at=date('Y:m:d');

  $stmt=$connection->prepare('INSERT INTO newsletter (email, subscribed_at) VALUES (:email,:subscribed_at)');
  $stmt->bindParam(':email',$email);
  $stmt->bindParam(':subscribed_at',$subscribed_at);
  $stmt->execute();

  echo "<script>alert('Thank you for subscribing to our newsletter. We will keep you updated with our latest arrivals!');</script>";
  echo "<script>window.location.href='../about.php';</script>";
}
?>
<div class="newsletter">
  <div class="container">
    <div class="w3agile_newsletter_left">
      <h3>Sign up for our newsletter</h3>
    </div>
    <div class="w3agile_newsletter_right">
      <form action="../newsletter.php" method="post">
        <input type="email" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
        <input type="submit" name="subscribe" value="Subscribe Now">
      </form>
    </div>
    <div class="clearfix"> </div>
  </div>
</div>

<!-- //newsletter -->

<!-- footer -->
<div class="footer">
	<div class="container">
		<div class="col-md-3 w3_footer_grid">
			<h3>Information</h3>
			<ul class="w3_footer_grid_list">
				<li><a href="../events.php">Events</a></li>
				<li><a href="../about.php">About Us</a></li>
				<li><a href="../services.php">Services</a></li>
			</ul>
		</div>
		<div class="col-md-3 w3_footer_grid">
			<h3>Policy Info</h3>
			<ul class="w3_footer_grid_list">

				<li><a href="../shipping.php">Shipping Policy</a></li>
				<li><a href="../privacy.php">Privacy Policy</a></li>
				<li><a href="../refund.php">Refund Policy</a></li>
				<li><a href="../termsandconditions.php">Terms of use</a></li>
			</ul>
		</div>
		<div class="col-md-3 w3_footer_grid">
			<h3>Extras</h3>
			<ul class="w3_footer_grid_list">
				<li><a href="../faqs.php">FAQs</a></li>
				<li><a href="../brands.php">Brands</a></li>
				<li><a href="../affiliates.php">Affiliates</a></li>
				<li><a href="../specials.php">Specials</a></li>

			</ul>
		</div>
		<div class="col-md-3 w3_footer_grid">
			<h3>My Account</h3>
			<ul class="w3_footer_grid_list">
				<li><a href="../my-accounts.php">My Account</a></li>
				<li><a href="../order-history.php">Order History</a></li>

				<li><a href="../newsletters.php">Newsletters</a></li>
			</ul>
		</div>
		<div class="clearfix"> </div>
		<div class="agile_footer_grids">
			<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
				<div class="w3_footer_grid_bottom">
					<h4>100% secure payments</h4>
					<img src="../images/card.png" alt=" " class="img-responsive" />
				</div>
			</div>
			<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
				<div class="w3_footer_grid_bottom">
					<h5>connect with us</h5>
					<ul class="agileits_social_icons">
						<li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

						<li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>

					</ul>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="wthree_footer_copy">
			<p>© 2016 Victoria Junction, Siliguri. All rights reserved | Design by <a href="http://empreuslabs.com/">Empreus Labs</a></p>
		</div>
	</div>
</div>

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
