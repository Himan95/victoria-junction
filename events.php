
<?php
error_reporting(0);
session_start();
include('connect/connection.php');


$records = $connection->prepare('SELECT * FROM events');
$records->execute();
$results=$records->fetch(PDO::FETCH_ASSOC);
?>
<!--


License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<!-- Mirrored from empreuslabs.com/demos/july-2016/07-07-2016/grocery_store/web/events.php  [XR&CO'2014], Thu, 04 May 2017 08:01:05 GMT -->
<head>
	<title>Victoria Junction | Events </title>
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
.img{
	padding: 5px;
	max-width: 90%;
	max-height: 89%;
  margin: 0 auto;
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
	<?php include('header.php'); ?>
	<!--header-->
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
					<li><i class="fa fa-phone" aria-hidden="true"></i>+91-9093200550</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a></li>
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
				<li>Events</li>
			</ul>
		</div>
	</div>
	<!-- //products-breadcrumb -->
	<!---728x90--->
	<!-- banner -->
	<div class="banner">
		<?php include('left-nav-bar.php'); ?>
		<div class="w3l_banner_nav_right">

      <?php
			echo
			'<div class="container">
			<img class="img" src="'.$results['events_image'].'" width="1200" height="300" />
			'
			;
			?>
			<div class="clearfix"> </div>
			</div>
			<br><br>
</div>

<div class="container">
			<!-- events -->
			<div class="events">
				<h3>Events</h3>
				<!---728x90--->
				<div class="w3agile_event_grids">
					<div class="col-md-6 w3agile_event_grid">
						<div class="col-md-3 w3agile_event_grid_left">
							<i class="fa fa-bullhorn" aria-hidden="true"></i>
						</div>
						<div class="col-md-9 w3agile_event_grid_right">
							<h4>Victoria junction</h4>
							<p>Celebrate life’s sweetest moments with VJ. Our events team will work with you.
							</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-6 w3agile_event_grid">
						<div class="col-md-3 w3agile_event_grid_left">
							<i class="fa fa-bullseye" aria-hidden="true"></i>
						</div>
						<div class="col-md-9 w3agile_event_grid_right">
							<h4>Specials</h4>
							<p>We bring variety in taste.
								Come this January and we will take you to a creamy ride.</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3agile_event_grids">
						<div class="col-md-6 w3agile_event_grid">
							<div class="col-md-3 w3agile_event_grid_left">
								<i class="fa fa-credit-card" aria-hidden="true"></i>
							</div>
							<div class="col-md-9 w3agile_event_grid_right">
								<h4>Favorites</h4>
								<p>Our eye catching and mouth watering items are always there to uplift your mood.</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="col-md-6 w3agile_event_grid">
							<div class="col-md-3 w3agile_event_grid_left">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</div>
							<div class="col-md-9 w3agile_event_grid_right">
								<h4>Our Attractions</h4>
								<p>Name a celery, name any dish, and we won't let you down in it's preparations.</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3agile_event_grids">
						<div class="col-md-6 w3agile_event_grid">
							<div class="col-md-3 w3agile_event_grid_left">
								<i class="fa fa-cog" aria-hidden="true"></i>
							</div>
							<div class="col-md-9 w3agile_event_grid_right">
								<h4>Our Creations</h4>
								<p>	We create desserts for birthdays, graduations, bar or bat mitzvahs.</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="col-md-6 w3agile_event_grid">
							<div class="col-md-3 w3agile_event_grid_left">
								<i class="fa fa-trophy" aria-hidden="true"></i>
							</div>
							<div class="col-md-9 w3agile_event_grid_right">
								<h4>Our Creations</h4>
								<p> We organise baby showers, bridal showers, bachelorette parties and more.</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<!---728x90--->
					<div class="clearfix"> </div>
				</div>

			</div>

			<div class="clearfix"> </div>
			</div>
			<!-- //events -->
			<div class="clearfix"></div>

			<!-- //banner -->
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
			<script src="js/minicart.min.js"></script>
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

			<!-- Mirrored from empreuslabs.com/demos/july-2016/07-07-2016/grocery_store/web/events.php  [XR&CO'2014], Thu, 04 May 2017 08:01:06 GMT -->
			</html>
