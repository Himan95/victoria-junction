<?php

date_default_timezone_set('Asia/Kolkata');
session_start();
error_reporting(0);

include('../connect/connection.php');

if(!$_SESSION['admin'] || !$_SESSION['usertype'] ){
  echo "<script>alert('For admin only');</script>";
	echo "<script>window.location.href='login.php';</script>";
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

  <title>Victoria Junction | My Profile</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">

</head>
<style>
table,td,tr{
  text-transform: uppercase;
}
</style>
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
              <h2><?php echo $_SESSION['usertype']; ?></h2>
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

              <b>Logged in as :</b> <i><?php echo $_SESSION['usertype']; ?></i> | <a href="http://victoriajunction.in" target="_blank"> <b><i class="fa fa-laptop fa-x"></i></b> <font color="green" style="font-weight:bold">View Website</font></a>
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
            <div class="x_panel tile fixed_height_450">
              <div class="x_title">
                <h2>View Recent Orders </h2>
                <div class="clearfix"></div>
                <i>(Recent Orders include orders made yesterday and today only)</i>
              </div>

              <div class="x_content">

                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="recent_orders.php">
                  <div class="form-group">
                    <label class="control-label col-md-2">Choose Order Status<span class="required">*</span>
                    </label>

                    <div class="col-md-9">
                      <select name="order_status" class="form-control col-md-9 col-xs-12">
                        <option selected disabled>Choose here</option>
                        <option>Pending</option>
                        <option>Complete</option>
                      </select>
                    </div>
                  </div>
                  <div class="ln_solid"></div>

                  <center>
                    <div class="form-group">
                      <button type="reset" class="btn btn-primary">Reset</button>
                      <button type="submit" name="check_status" class="btn btn-success">Check Status</button>
                    </div>
                  </center>

                </form>
                <?php
                $from=date('Y-m-d');
                $date_format= 'Y-m-d';
                $today=strtotime('now');
                $yesterday=strtotime('-1 day',$today);
                $to=gmdate($date_format,$yesterday);

                $status=$_POST['order_status'];

                if(isset($_POST['check_status'])){

                  $records2 = $connection->prepare('SELECT * FROM orders WHERE created_at BETWEEN :yesterday AND :today AND order_status=:order_status');
                  $records2->bindParam(':yesterday', $to);
                  $records2->bindParam(':today', $from);
                  $records2->bindParam(':order_status', $status);
                  $records2->execute();
                  $results2=$records2->fetch(PDO::FETCH_ASSOC);

                }

                else {
                  $records2 = $connection->prepare('SELECT * FROM orders WHERE created_at BETWEEN :yesterday AND :today ORDER BY order_id DESC');
                  $records2->bindParam(':yesterday', $to);
                  $records2->bindParam(':today', $from);
                  $records2->execute();
                  $results2=$records2->fetch(PDO::FETCH_ASSOC);
                }

                if(!$results2['order_id'])  // No Order exists
                {
                  echo "<table id='datatable-responsive' class='table table-striped table-bordered dt-responsive nowrap' align='left' border='1'  cellspacing='2' cellpadding='2'  width='750px;'>
                  <tr style='background-color:#EDEDED;padding:5px'>

                  <td style='padding:5px' align='left'<i><b>ORDER NO. </b></i></td>
                  <td style='padding:5px' align='left'<i><b>NAME</b></i></td>
                  <td style='padding:5px' align='left'<i><b>PHONE </b></i></td>
                  <td style='padding:5px' align='left'<i><b>ADDRESS</b></i></td>
                  <td style='padding:5px' align='left'<i><b>PRODUCT</b></i></td>
                  <td style='padding:5px' align='left'<i><b>PRICE</b></i></td>
                  <td style='padding:5px' align='left'<i><b>ORDER STATUS </b></i></td>
                  </tr>";
                  echo "<br />";

                  echo "<tr><td colspan='7' style='padding:3px' align='left'>No Records Found</td>";

                }
                else {

                echo "<table id='datatable-responsive' class='table table-striped table-bordered dt-responsive nowrap' align='left' border='1'  cellspacing='2' cellpadding='2'  width='750px;'>
                <tr style='background-color:#EDEDED;padding:5px'>

                <td style='padding:5px' align='left'<i><b>ORDER NO. </b></i></td>
                <td style='padding:5px' align='left'<i><b>ORDER DATE. </b></i></td>
                <td style='padding:5px' align='left'<i><b>NAME</b></i></td>
                <td style='padding:5px' align='left'<i><b>PHONE </b></i></td>
                <td style='padding:5px' align='left'<i><b>ADDRESS</b></i></td>
                <td style='padding:5px' align='left'<i><b>PRODUCT</b></i></td>
                <td style='padding:5px' align='left'<i><b>PRICE</b></i></td>
                <td style='padding:5px' align='left'<i><b>ORDER STATUS </b></i></td>
                </tr>";
                echo "<br />";

                do{
                  $orderDate = date_format(date_create_from_format('Y-m-d', $results2['created_at']), 'd-m-Y');
                  echo "<tr><td style='padding:3px' align='left'>".$results2['order_no']."</td>";
                  echo "<td style='padding:3px' align='left'>".$orderDate."</td>";
                  echo "<td style='padding:3px' align='left'>".$results2['customer_name']."</td>";
                  echo "<td style='padding:3px' align='left'>".$results2['customer_contact']."</td>";
                  echo "<td style='padding:3px' align='left'>".$results2['shipping_address']."</td>";
                  echo "<td style='padding:3px' align='left'>".$results2['product']."</td>";
                  echo "<td style='padding:3px' align='left'>".$results2['price']."</td>";
                  echo "<td style='padding:3px' align='left'>".$results2['order_status']."</td></tr>";

                }while($results2=$records2->fetch(PDO::FETCH_ASSOC));
              }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>



      <!-- /page content -->

      <!-- footer content
      <footer style="margin-top:px;">
        <div class="pull-right">
          Designed and maintained by <b><a href="#">Empreus Labs</a></b>
        </div>
        <div class="clearfix"></div>
      </footer>
       footer content -->

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
