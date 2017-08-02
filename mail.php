<?php
error_reporting(0);
session_start();
include ('connect/connection.php');

$records1 = $connection->prepare('SELECT * FROM web_info');
$records1->execute();
$results1=$records1->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['send_mail'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $subject=$_POST['subject'];
  $message=$_POST['message'];
  $telephone=$_POST['telephone'];


    date_default_timezone_set('Asia/Kolkata');

    $stmt=$connection->prepare('INSERT INTO support (name,email,subject,message,telephone,submitted_at) VALUES (:name,:email,:subject,:message,:telephone,:submitted_at)');
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':subject',$subject);
    $stmt->bindParam(':message',$message);
    $stmt->bindParam(':telephone',$telephone);
    $stmt->bindParam(':submitted_at',date('Y-m-d'));
    $stmt->execute();


  $messageToSend= "<html>
  <head>
  <link href='css/bootstrap.css' rel='stylesheet' type='text/css' media='all' />
  <link href='css/style.css' rel='stylesheet' type='text/css' media='all' />
  <link href='css/font-awesome.css' rel='stylesheet' type='text/css' media='all' />
  <script src='js/jquery-1.11.1.min.js'></script>
  <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
  </head>

  <body style='padding: 10px; margin: 0 auto;'>
  <div style='margin: 0px auto;border: 1px oli;'>
  <h1  style='text-align: center; font-weight: bold; color:#0000EE;'>Victoria Junction</h1>
  <h3 style='text-align: center;'>Confectionaries Shop</h3>

  <h4 style='margin:22px; text-align: center; font-size: 20px;'>REPLY: Email from Victoria Junction</h4>

  <p style='text-align: center; margin-top: 30px; font-size: 18px; font-family:serif;'>Message: $message</p>

  <p style='text-align: center;  margin-top: 30px; font-size: 16px; font-family:sans-serif;'>Victoria Junction, Golden Enclave Building, Siliguri</p>
  </div>
  </body>
  <script src='js/bootstrap.min.js'></script>
  </html>";

  $to='cooldudehiman@gmail.com';
  $subject='Customer Support';
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset: utf8\r\n";
  $m=mail($to,$subject,$messageToSend,$headers);
  if($m){
    echo "<script>alert('Thank You! We will get back to you pretty soon!');</script>";
    echo "<script>window.location.href='index.php';</script>";
  }
  else {
    echo "<script>alert('Sorry, Mail could not be sent!');</script>";
  }
}
?>
<!--
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<!-- Mirrored from empreuslabs.com/demos/july-2016/07-07-2016/grocery_store/web/mail.php  [XR&CO'2014], Thu, 04 May 2017 08:01:05 GMT -->
<head>
  <title><?php echo $results1['web_name']; ?>| Mail Us </title>
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

<body>
  <script src='../../../../../../ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
  <script>
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
        <a href="index.php"><img height="100px" src="images/vj_logo.png"/></a>
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
          <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href=""><?php echo $results1['web_email']; ?></a></li>
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
        <li>Mail Us</li>
      </ul>
    </div>
  </div>
  <!-- //products-breadcrumb -->
  <!---728x90--->
  <!-- banner -->
  <div class="banner">
    <?php include('left-nav-bar.php'); ?>
    <div class="w3l_banner_nav_right mail-class">
      <!-- mail -->
      <div class="mail">

        <!---728x90--->
        <div class="agileinfo_mail_grids">
          <div class="col-md-4 agileinfo_mail_grid_left">
            <ul>
              <li><i class="fa fa-home" aria-hidden="true"></i></li>
              <li>address<span><?php echo $results1['web_address']; ?></span></li>
            </ul>
            <ul>
              <li><i class="fa fa-envelope" aria-hidden="true"></i></li>
              <li>email<span><a href="mailto:info@example.com"><?php echo $results1['web_email']; ?></a></span></li>
            </ul>
            <ul>
              <li><i class="fa fa-phone" aria-hidden="true"></i></li>
              <li>call to us<span><?php echo $results1['web_contact']; ?></span></li>
            </ul>
          </div>
          <div class="col-md-8 agileinfo_mail_grid_right">
            <form action="mail.php" method="post">
              <div class="col-md-6 wthree_contact_left_grid">
                <input type="text" name="name" placeholder="Name*" autocomplete="off" required="">
                <input type="email" name="email" placeholder="Email*" autocomplete="off" required="">
              </div>
              <div class="col-md-6 wthree_contact_left_grid">
                <input type="text" maxlength="10" minlength="10" name="telephone" placeholder="Telephone*" required="">
                <input type="text" name="subject" placeholder="Subject*"  required="">
              </div>
              <div class="clearfix"> </div>
              <textarea  name="message" placeholder="Message..." required=""></textarea>
              <input type="submit" name="send_mail" value="Submit">
              <input type="reset" value="Clear">
            </form>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
      <!-- //mail -->
    </div>
    <div class="clearfix"></div>
  </div>
  <!-- //banner -->
  <!---728x90--->
  <!-- map -->
  <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d96748.15352429623!2d-74.25419879353115!3d40.731667701988506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sshopping+mall+in+New+York%2C+NY%2C+United+States!5e0!3m2!1sen!2sin!4v1467205237951" style="border:0"></iframe>
  </div>

  <!-- //map -->
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

<!-- Mirrored from empreuslabs.com/demos/july-2016/07-07-2016/grocery_store/web/mail.php  [XR&CO'2014], Thu, 04 May 2017 08:01:05 GMT -->
</html>
