<?php

error_reporting(0);
session_start();
include('connect/connection.php');
date_default_timezone_set('Asia/Kolkata');


if(!$_SESSION['logged_in']){

  echo "<script>alert('You need to login to buy products!');</script>";
  echo "<script>window.location.href='login.php';</script>";
}

  $username=$_SESSION['username'];
  //echo $username;
  $product=$_SESSION['prod_name'];
  $price=$_SESSION['prod_price'];
  $quantity=$_SESSION['prod_quantity'];

if(isset($_POST['confirm'])){

  $order_no=mt_rand(100000, 999999);
  $order_status="Pending";

  $customer_name=$_SESSION['username'];
  $customer_contact=$_POST['contact'];
  $customer_email=$_POST['email'];

//  $prod_quantity=$results2['prod_quantity'];

  $created_at=date('Y-m-d');
  $created_at=date('h:i:s');

  $shipping_address=$_POST['address'];

  $total= $_POST['total'];

  //Write code for creating order and adding in db
  $records2 = $connection->prepare('INSERT INTO orders(order_no,product,price,quantity,order_status,customer_name,customer_contact,customer_email,created_at,created_time,shipping_address,total) VALUES(:order_no,:product,:price,:quantity,:order_status,:customer_name,:customer_contact,:customer_email,:created_at,:created_time,:shipping_address,:total)');
  $records2->bindParam(':order_no',$order_no);
  $records2->bindParam(':product',$product);
  $records2->bindParam(':price',$price);
  $records2->bindParam(':quantity',$quantity);
  $records2->bindParam(':order_status',$order_status);
  $records2->bindParam(':customer_name',$customer_name);
  $records2->bindParam(':customer_contact',$customer_contact);
  $records2->bindParam(':customer_email',$customer_email);
  $records2->bindParam(':created_at',$created_at);
  $records2->bindParam(':created_time',$created_time);
  $records2->bindParam(':shipping_address',$shipping_address);
  $records2->bindParam(':total',$total);
  $records2->execute();

  echo "<script>alert('Redirecting to Payment Gateway!');</script>";
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
	<title><?php echo $results1['web_name']; ?> | About Us </title>
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


.form-group{
  margin-top:30px;
  text-align: center;
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
	<!-- //script-for sticky-nav -->
  <div class="container">


    <h2 style="margin-top:100px; text-align:center">Billing Information</h2>
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="checkout.php" method="POST">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Name<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" required="required" value="<?php echo $_SESSION['username'] ?>" placeholder="eg: Ramesh" autocomplete="off" name="name" class="form-control col-md-7 col-xs-12">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Shipping Address<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" required="required" placeholder="eg: Khalpara, Siliguri" autocomplete="off" name="address" class="form-control col-md-7 col-xs-12">
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
          <input type="number" required="required" placeholder="eg: 9458XX1254" autocomplete="off" name="contact" class="form-control col-md-7 col-xs-12">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Total Amount<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="number" disabled required="required" placeholder="eg: Rs. 25000" autocomplete="off" value="<?php echo $_SESSION['tot_amount'];?>" name="total" class="form-control col-md-7 col-xs-12">
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="reset" class="btn btn-primary">Reset</button>
          <button type="submit" name="confirm" class="btn btn-success">Confirm Order</button>
          <a class="btn btn-warning" href="javascript:history.go(-1)">Back</a>
        </div>
      </div>
    </form>
  </div>

<div class="clearfix"></div>
<br><br>
<!-- //banner -->
<!---728x90--->


<!-- newsletter -->
<?php include ('newsletter.php'); ?>
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


</body>

<!-- Mirrored from empreuslabs.com/demos/july-2016/07-07-2016/grocery_store/web/about.php  [XR&CO'2014], Thu, 04 May 2017 08:01:11 GMT -->
</html>
