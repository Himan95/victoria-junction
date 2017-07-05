<?php

date_default_timezone_set('Asia/Kolkata');
session_start();
error_reporting(0);

include('../connect/connection.php');

if(!$_SESSION['admin'] || !$_SESSION['usertype'] ){
  echo "<script>alert('For admin only');</script>";
	echo "<script>window.location.href='login.php';</script>";
}

$coupon_name=$_POST['coupon_name'];
$coupon_discount=$_POST['coupon_discount'];
$coupon_startdate=$_POST['coupon_startdate'];
$coupon_enddate=$_POST['coupon_enddate'];
$coupon_status=1;

$today= date('Y-m-d');


$records = $connection->prepare('SELECT * FROM coupons WHERE coupon_name=:coupon_name');
$records->bindParam(':coupon_name', $coupon_name);
$records->execute();
$results=$records->fetch(PDO::FETCH_ASSOC);


//Update Button clicked
if(isset($_POST['add_coupon'])){

  if ($coupon_enddate < $coupon_startdate || $coupon_enddate > $today || $coupon_startdate > $today) {
    echo "<script>alert('Date Invalid');</script>";
  }
  else {

    if(($results['coupon_name'])!=true)
    {
      $stmt1=$connection->prepare('INSERT INTO coupons (coupon_name,coupon_discount,coupon_startdate,coupon_enddate,coupon_status)  VALUES (:coupon_name,:coupon_discount,:coupon_startdate,:coupon_enddate,:coupon_status)');
      $stmt1->bindParam(':coupon_name',$coupon_name);
      $stmt1->bindParam(':coupon_discount',$coupon_discount);
      $stmt1->bindParam(':coupon_startdate',$coupon_startdate);
      $stmt1->bindParam(':coupon_enddate',$coupon_enddate);
      $stmt1->bindParam(':coupon_status',$coupon_status);
      $stmt1->execute();
      echo "<script>alert('New Coupon added!');</script>";

    }
    else {
      echo "<script>alert('Coupon already exists!');</script>";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Victoria Junction | Admin Panel</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"> <span>Victoria Junction</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="../images/46.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $_SESSION['username']; ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <?php
          include('sidebarmenu.php');
          ?>

          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle" style="margin-top:-10px;">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right" style="text-align:right;margin-top:7px;margin-right:5px;">

              <b>Logged in as :</b> <i><?php echo $_SESSION['username']; ?></i> | <a href="http://www.victoriajunction.co.in" target="_blank"> <b><i class="fa fa-laptop fa-x"></i></b> <font color="green" style="font-weight:bold">View Website</font></a>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <!-- top tiles -->

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <center><h2>Victoria Junction | Add New Coupon  </h2></center>
            <div class="x_panel tile fixed_height_450">
              <div class="x_title">
                <h2>Add New  Coupon</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="add_coupon.php" method="post">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Add Coupon Name<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-6 col-xs-12">
                      <input type="text" required="required" placeholder="eg: GRAB10, SUMMER15" autocomplete="off" name="coupon_name" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Add Coupon Start Date<span class="required">*</span>
                    </label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <input type="date" required="required" autocomplete="off" name="coupon_startdate" class="form-control col-md-4 col-xs-12">
                    </div>

                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Add Coupon End Date<span class="required">*</span>
                    </label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <input type="date" required="required" autocomplete="off" name="coupon_enddate" class="form-control col-md-4 col-xs-12">
                    </div>

                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Add Coupon Discount<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-6 col-xs-12">
                      <input type="number" required="required" placeholder="Enter a valid discount value (1-100)" autocomplete="off" name="coupon_discount" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="reset" class="btn btn-primary">Reset</button>
                      <button type="submit" name="add_coupon" class="btn btn-success">Add Coupon</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php //include('report-card-display.php'); ?>
    </div>
  </div>



  <!-- /page content -->

  <!-- footer content -->
  <footer style="margin-top:px;">
    <div class="pull-right">
      Designed and maintained by <b><a href="#">Empreus Labs</a></b>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="../vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="../vendors/gauge.js/dist/gauge.min.js"></script>

<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="../vendors/skycons/skycons.js"></script>


<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>


</body>
</html>
