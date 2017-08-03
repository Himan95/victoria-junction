<?php
error_reporting(0);
session_start();
include('connect/connection.php');

$records1 = $connection->prepare('SELECT * FROM web_info');
$records1->execute();
$results1=$records1->fetch(PDO::FETCH_ASSOC);



//Update Button clicked
if(isset($_POST['update_pass'])){

$records2 = $connection->prepare('SELECT * FROM login WHERE username=:username');
$records2->bindParam(':username', $_SESSION['username']);
$records2->execute();
$results2=$records2->fetch(PDO::FETCH_ASSOC);

if($_POST['old_password']==$results2['password']){

  $records3 = $connection->prepare('UPDATE login SET password=:password WHERE username=:username');
  $records3->bindParam(':password', $password);
  $records3->bindParam(':username', $username);
  $username=$_SESSION['username'];
  $password=$_POST['password'];
  $records3->execute();

  $records31 = $connection->prepare('UPDATE register SET password=:password WHERE username=:username');
  $records31->bindParam(':password', $password);
  $records31->bindParam(':username', $username);
  $username=$_SESSION['username'];
  $password=$_POST['password'];
  $records31->execute();

  $success="Password updated successfully.";
  }
  else{
	   $error_alert="Enter correct password";
	}
}

?>

<!--


License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<!-- Mirrored from empreuslabs.com/demos/july-2016/07-07-2016/grocery_store/web/  [XR&CO'2014], Thu, 04 May 2017 07:59:30 GMT -->
<head>
  <title><?php echo $results1['web_name']; ?> | Update Details </title>
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


  <!-- header -->
  <?php include('header.php'); ?>
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
        <li>Change Password</li>
      </ul>
    </div>
  </div>
  <!-- //products-breadcrumb -->

  <!-- banner -->
  <div class="banner">
    <?php include('left-nav-bar.php'); ?>
    <div class="w3l_banner_nav_right">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel tile fixed_height_450">
          <div class="x_title">
            <h2 style="text-align:center; margin:20px;">Update Password</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="change_user_password.php" method="post">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Old password<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" required="required" placeholder="Enter current password" autocomplete="off" name="old_password" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >New password<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" required="required" autocomplete="off" name="password" placeholder="Enter new password" class="form-control col-md-7 col-xs-12">
                  <i><font color="green" style="font-style:italic;font-weight:bold;">
                    <?php if($success!=null){ ?>
                      <img src="images/tick.png">
                      <?php
                      echo $success;
                    } ?>
                  </font></i>
                  <i><font color="red" style="font-style:italic;font-weight:bold;">
                    <?php if($error_alert!=null){ ?>
                      <img src="images/cross.gif">
                      <?php
                      echo $error_alert;
                    } ?>
                  </font></i>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="reset" class="btn btn-primary">Reset</button>
                  <button type="submit" name="update_pass" class="btn btn-success">Update</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>


<div class="clearfix"></div>
</div>
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

<!-- Mirrored from empreuslabs.com/demos/july-2016/07-07-2016/grocery_store/web/  [XR&CO'2014], Thu, 04 May 2017 08:00:21 GMT -->
</html>
