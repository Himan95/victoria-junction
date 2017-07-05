<?php

date_default_timezone_set('Asia/Kolkata');
session_start();
error_reporting(0);

include('../connect/connection.php');

if(!$_SESSION['admin'] || !$_SESSION['usertype'] ){
  echo "<script>alert('For admin only');</script>";
	echo "<script>window.location.href='login.php';</script>";
}


$records1 = $connection->prepare('SELECT * FROM coupons');
$records1->execute();


//Update Button clicked
if(isset($_POST['delete_coupon'])){

  $coupon_name=$_POST['coupon_name'];
  $stmt1=$connection->prepare('UPDATE coupons SET coupon_status=0 WHERE coupon_name=:coupon_name');
  $stmt1->bindParam(':coupon_name',$coupon_name);
  $stmt1->execute();
  echo "<script>alert('Coupon deleted!');</script>";

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
            <center><h2>Victoria Junction | Delete Coupon  </h2></center>
            <div class="x_panel tile fixed_height_450">
              <div class="x_title">
                <h2>Delete Coupon</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="delete_coupon.php" method="post">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Select Coupon<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select name="coupon_name" class="form-control col-md-7 col-xs-12">
                        <option selected disabled>Choose here</option>
                        <?php

                        while($row=$records1->fetch(PDO::FETCH_ASSOC)){
                          echo '<option>'.$row['coupon_name'].'</option>';
                        }

                        ?>
                      </select>

                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="reset" class="btn btn-primary">Reset</button>
                      <button type="submit" name="delete_coupon" class="btn btn-success">Delete Coupon</button>
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
