<?php
error_reporting(0);
session_start();
include('connect/connection.php');

$id=$_GET['product'];

$records = $connection->prepare('SELECT * FROM products WHERE prod_id=:prod_id');
$records->bindParam(':prod_id', $id);
$records->execute();
$results=$records->fetch(PDO::FETCH_ASSOC);

?>
<!--


License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<!-- Mirrored from empreuslabs.com/demos/july-2016/07-07-2016/grocery_store/web/single.php  [XR&CO'2014], Thu, 04 May 2017 08:02:15 GMT -->
<head>
	<title>Victoria Junction | Single </title>
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
	<script src='js/okzoom.js'></script>
	<script>
	$(function(){
		$('#example').okzoom({
			width: 150,
			height: 150,
			border: "1px solid black",
			shadow: "0 0 5px #000"
		});
	});
	</script>
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
				<li>Single Page</li>
			</ul>
		</div>
	</div>
	<!-- //products-breadcrumb -->
	<!---728x90--->
	<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<li><a href="products.php">Branded Foods</a></li>
						<li><a href="household.php">Households</a></li>
						<li class="dropdown mega-dropdown active">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Veggies & Fruits<span class="caret"></span></a>
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>
										<li><a href="vegetables.php">Vegetables</a></li>
										<li><a href="vegetables.php">Fruits</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li><a href="kitchen.php">Kitchen</a></li>
						<li><a href="short-codes.php">Short Codes</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Beverages<span class="caret"></span></a>
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>
										<li><a href="drinks.php">Soft Drinks</a></li>
										<li><a href="drinks.php">Juices</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li><a href="pet.php">Pet Food</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Frozen Foods<span class="caret"></span></a>
							<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
								<div class="w3ls_vegetables">
									<ul>
										<li><a href="frozen.php">Frozen Snacks</a></li>
										<li><a href="frozen.php">Frozen Nonveg</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li><a href="bread.php">Bread & Bakery</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
			<div class="w3l_banner_nav_right_banner3">
				<h3>Best Deals For New Products<span class="blink_me"></span></h3>
			</div>
			<!---728x90--->
			<div class="agileinfo_single">
				<h5><?php echo $results['prod_name'].'-'.$results['prod_type']; ?></h5>
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src=<?php echo $results['prod_image']; ?> alt=" " class="img-responsive" />
				</div>
				<div class="col-md-8 agileinfo_single_right">
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked>
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p><?php echo $results['prod_desc']; ?></p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
<?php  			echo '
							<h4>Rs.'.$results['prod_price'].'<span>Rs.'.$results['prod_span_price'].'</span></h4>
							</div>
							<div class="snipcart-details">
							<form action="#" method="post">
							<fieldset>
							<input type="hidden" name="cmd" value="_cart" />
							<input type="hidden" name="add" value="1" />
							<input type="hidden" name="business" value=" " />
							<input type="hidden" name="item_name" value="'.$results['prod_name'].'" />
							<input type="hidden" name="amount" value="'.$results['prod_price'].'" />
							<input type="hidden" name="discount_amount" value="'.$results['prod_discount'].'" />
							<input type="hidden" name="currency_code" value="INR" />
							<input type="hidden" name="return" value=" " />
							<input type="hidden" name="cancel_return" value=" " />
							<input type="submit" name="submit" value="Add to cart" class="button" />
						</fieldset>
					</form>

						</div>
					</div>

					';
					?>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- //banner -->
	<!---728x90--->
	<!-- brands -->
	<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
		<div class="container">
			<h3>Popular Brands</h3>
			<div class="w3ls_w3l_banner_nav_right_grid1">
				<h6>Products</h6>
				<?php
				$records = $connection->prepare('SELECT * FROM products ORDER BY rand() LIMIT 4');
				$records->execute();
				$results=$records->fetch(PDO::FETCH_ASSOC);
				do{
					echo '

					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.php?product='.$results['prod_id'].'"><img src="'.$results['prod_image'].'" alt=" " class="img-responsive" /></a>
											<p>'.$results['prod_name'].'</p>
											<h4>Rs.'.$results['prod_price'].'<span>Rs.'.$results['prod_span_price'].'</span></h4>
											</div>
											<div class="snipcart-details">
											<form action="#" method="post">
											<fieldset>
											<input type="hidden" name="cmd" value="_cart" />
											<input type="hidden" name="add" value="1" />
											<input type="hidden" name="business" value=" " />
											<input type="hidden" name="item_name" value="'.$results['prod_name'].'" />
											<input type="hidden" name="amount" value="'.$results['prod_price'].'" />
											<input type="hidden" name="discount_amount" value="'.$results['prod_discount'].'" />
											<input type="hidden" name="currency_code" value="INR" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					';
				}
				while($results=$records->fetch(PDO::FETCH_ASSOC));
				echo '<div class="clearfix"> </div>';
				?>
			<br><br>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	<!-- //brands -->
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

<!-- Mirrored from empreuslabs.com/demos/july-2016/07-07-2016/grocery_store/web/single.php  [XR&CO'2014], Thu, 04 May 2017 08:02:16 GMT -->
</html>
