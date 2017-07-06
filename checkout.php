<?php

error_reporting(0);
session_start();
include('connect/connection.php');

if(isset($_SESSION['logged_in']))
{

}
else {
  echo "<script>alert('You need to login to buy products!');</script>";
  echo "<script>window.location.href='login.php';</script>";
}
if(isset($_POST['confirm'])){

  //Write code for creating order and adding in db 
  echo "<script>alert('Redirecting to Payment Gateway!');</script>";
}
?>
<html>

<head>

  <title>My Cart</title>
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

</head>
<style>
body{
  margin:20px;
}
.container{
  max-width:75%;
  margin: 0px auto;
  border: 1px dashed;
}
h2{
  margin:20px;
}
.form-group{
  text-align: center;
}
</style>
<body>
  <div class="container">
    <h2 style="text-align:center">Billing Information</h2>
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
          <input type="number" required="required" placeholder="eg: Rs. 25000" autocomplete="off" name="amount" class="form-control col-md-7 col-xs-12">
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="reset" class="btn btn-primary">Reset</button>
          <button type="submit" name="confirm" class="btn btn-success">Confirm Order</button>
        </div>
      </div>
  </div>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
