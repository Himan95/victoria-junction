<?php
error_reporting(0);
session_start();
include('connect/connection.php');
require 'item.php';

$records1 = $connection->prepare('SELECT * FROM web_info');
$records1->execute();
$results1=$records1->fetch(PDO::FETCH_ASSOC);


if(isset($_GET['item_id'])){

  $prod_id=$_GET['item_id'];

  $records2 = $connection->prepare('SELECT * FROM products WHERE prod_id=:prod_id');
  $records2->bindParam(':prod_id',$prod_id);
  $records2->execute();
  $results2=$records2->fetch(PDO::FETCH_ASSOC);

  $item=new Item();
  $item->id=$results2['prod_id'];
  $item->name=$results2['prod_name'];
  $item->price=($results2['prod_price'] - $results2['prod_discount']) ;

  $item->quantity=1;

  //Check if product exists
  $cart = unserialize(serialize($_SESSION['cart']));
  $index=-1;
  for($i=0;  $i<count($cart); $i++){
    if($cart[$i]->id == $_GET['item_id'])
    {
      $index = $i;
      break;
    }
  }

  if($index==-1){
    $_SESSION['cart'][]=$item;
  }
  else
  {
    $cart[$index]->quantity=$cart[$index]->quantity+1;
    $_SESSION['cart']= $cart;
  }
}
//Delete item from cart
if(isset($_GET['index'])){
  $cart = unserialize(serialize($_SESSION['cart']));
  unset($cart[$_GET['index']]);
  $cart=array_values($cart);
  $_SESSION['cart']=$cart;
}
?>

<html>
<head>
  <title><?php echo $results1['web_name']; ?> | My Cart</title>
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
  <link href="css/cart.css" rel="stylesheet" type="text/css" media="all" />

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
        <li>My Cart</li>
      </ul>
    </div>
  </div>

  <div style="margin-top:70px;" class="container">
    <h1 style="text-align:center;margin-top:20px;">Shopping Cart</h1>
    <table id="datatable-responsive" style="margin-top:20px;" class="table table-striped table-bordered dt-responsive nowrap" align="left" border="1"  cellspacing="2" cellpadding="2" >
      <tr>
        <th>Remove</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Sub Total</th>
      </tr>
      <?php
      $cart=unserialize(serialize($_SESSION['cart']));
      $index=0;
      $s=0;
      for($i=0;$i<count($cart);$i++){
        $s+=$cart[$i]->price * $cart[$i]->quantity;

        ?>

        <tr>
          <td><a onclick="return confirm('Are You Sure?')" href="cart.php?index=<?php echo $index;?>">Delete</td>

            <td><?php echo $cart[$i]->name;?></td>
            <td><?php echo $cart[$i]->price;?></td>
            <td><?php echo $cart[$i]->quantity;?></td>
            <td><?php echo $cart[$i]->price * $cart[$i]->quantity;?></td>
          </tr>
          <?php $index++; } ?>
          <tr>
            <?php
             $_SESSION['tot_amount']=$s;
            if($s==0)
            {
              echo '<td colspan="5" align="center">No Products Added</td></tr>
              <tr><td colspan="4" align="right">TOTAL:</td>
              <td align="left">'.$s.'</td></tr>
              ';
            }
            else
            {
             ?>
            <td colspan="4" align="right">TOTAL:</td>
            <td align="left"><?php echo $s; ?></td>
            <?php } ?>
          </tr>
        </table>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div style="margin-bottom:20px;" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <center><a style="margin-right:20px;" class="btn btn-warning" href="index.php">Shop More</a>
        <a class="btn btn-success" href="NON_SEAMLESS_KIT/dataFrom.php">Confirm</a></center>
      </div>
        </div>
        <div class="clearfix"></div>
      </div>

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
    </body>
    <?php include('newsletter.php');?>

    <?php include('footer.php');?>
    </html>
