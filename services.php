<?php
error_reporting(0);
session_start();
include('connect/connection.php');

$records1 = $connection->prepare('SELECT * FROM web_info');
$records1->execute();
$results1=$records1->fetch(PDO::FETCH_ASSOC);

$records = $connection->prepare('SELECT * FROM services');
$records->execute();
$results=$records->fetch(PDO::FETCH_ASSOC);
?>
<!--


License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<!-- Mirrored from empreuslabs.com/demos/july-2016/07-07-2016/grocery_store/web/services.php  [XR&CO'2014], Thu, 04 May 2017 08:01:11 GMT -->
<head>
<title><?php echo $results1['web_name']; ?>  | Services </title>
<!-- for-mobile-apps -->
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
<!-- start-smoth-scrolling -->
</head>

<style>
img{
		width:auto;
		height:200px;
    border-radius: 200px;
    padding: 2px;
}
</style>
<body>
<script src='../../../../../../ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script><script>
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
<?php include('header.php');?>
<!-- header -->
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
<!-- //script-for sticky-nav -->
	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php"><span>Victoria</span> Junction</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="events.php">Events</a><i>/</i></li>
					<li><a href="about.php">About Us</a><i>/</i></li>

					<li><a href="services.php">Services</a></li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i><?php echo $results1['web_contact']; ?></li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com"><?php echo $results1['web_email']; ?></a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li>Services</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!---728x90--->
<!-- banner -->
	<div class="banner">
<?php include('left-nav-bar.php'); ?>
		<div class="w3l_banner_nav_right">
<!-- services -->
			<h2 style="margin-top:20px;font-size:250%; text-align:center;">Services</h2>
			<div class="w3ls_service_grids">
				<div class="col-md-12 w3ls_service_grid_left">
					<p style="text-align: justify"><?php echo  $results['description']; ?></p>
				</div>

				<div class="clearfix"> </div>
			</div>
<!---728x90--->
			<div class="w3ls_service_grids1">
				<div class="col-md-6 w3ls_service_grids1_left">
					<?php
					echo
					'
					<img class="img" src="'.$results['services_image'].'" />
					'
					;
					?>
				</div>

				<div class="col-md-6 w3ls_service_grids1_right">
					<ul>
						<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Personalised Cakes</li>
						<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Pastries</li>
						<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Fast Home Delivery</li>
						<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Cookies & Muffins</li>
						<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Chocolates</li>
						<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>24 * 7 availability</li>
					</ul>
					<a href="products.php">Shop Now</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //services -->
		</div>
		<div class="clearfix"></div>
	<br><br><br>
<!-- //banner -->
<!---728x90--->
<!-- services-bottom -->
	<div class="services-bottom">
		<div class="container">
			<div class="col-md-3 about_counter_left">
				<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
				<p style="color:black;" class="counter">89,147</p>
				<h3 style="color:black;">Followers</h3>
			</div>
			<div class="col-md-3 about_counter_left">
				<i class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></i>
				<p style="color:black;" class="counter">54,598</p>
				<h3 style="color:black;">Savings</h3>
			</div>
			<div class="col-md-3 about_counter_left">
				<i class="glyphicon glyphicon-export" aria-hidden="true"></i>
				<p style="color:black;" class="counter">83,983</p>
				<h3 style="color:black;">Support</h3>
			</div>
			<div class="col-md-3 about_counter_left">
				<i class="glyphicon glyphicon-bullhorn" aria-hidden="true"></i>
				<p style="color:black;" class="counter">45,894</p>
				<h3 style="color:black;">Popularity</h3>
			</div>
			<div class="clearfix"> </div>
			<!-- Stats-Number-Scroller-Animation-JavaScript -->
				<script src="js/waypoints.min.js"></script>
				<script src="js/counterup.min.js"></script>
				<script>
					jQuery(document).ready(function( $ ) {
						$('.counter').counterUp({
							delay: 10,
							time: 1000
						});
					});
				</script>
			<!-- //Stats-Number-Scroller-Animation-JavaScript -->

		</div>
	</div>
<!-- //services-bottom -->
<!-- newsletter-top-serv-btm -->
<div class="newsletter-top-serv-btm">
	<div class="container">
		<div class="col-md-4 wthree_news_top_serv_btm_grid">
			<div class="wthree_news_top_serv_btm_grid_icon">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i>
			</div>
			<h3>Smooth Shopping Cart</h3>
			<p>The easiest working shopping cart is here for you at Victoria Junction.</p>
		</div>
		<div class="col-md-4 wthree_news_top_serv_btm_grid">
			<div class="wthree_news_top_serv_btm_grid_icon">
				<i class="fa fa-bar-chart" aria-hidden="true"></i>
			</div>
			<h3>Track order history</h3>
			<p>Track order history at the earliest via VJ plugins.</p>
		</div>
		<div class="col-md-4 wthree_news_top_serv_btm_grid">
			<div class="wthree_news_top_serv_btm_grid_icon">
				<i class="fa fa-truck" aria-hidden="true"></i>
			</div>
			<h3>On Time Delivery</h3>
			<p>We please our customers with best services and on time delivery.</p>
		</div>
		<div class="clearfix"> </div>
	</div>
	</div>
<!-- //newsletter-top-serv-btm -->
<!-- newsletter -->
<?php include('newsletter.php');?>
<!-- //newsletter -->
<!-- footer -->
<?php include('footer.php');?>
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

<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
</body>

<!-- Mirrored from empreuslabs.com/demos/july-2016/07-07-2016/grocery_store/web/services.php  [XR&CO'2014], Thu, 04 May 2017 08:01:14 GMT -->
</html>
