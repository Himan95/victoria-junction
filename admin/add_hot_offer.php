<?php

date_default_timezone_set('Asia/Kolkata');
session_start();
error_reporting(0);

include('../connect/connection.php');

if(!$_SESSION['admin'] || !$_SESSION['usertype'] ){
  echo "<script>alert('For admin only');</script>";
	echo "<script>window.location.href='login.php';</script>";
}

$records1 = $connection->prepare('SELECT * FROM products WHERE prod_id NOT IN (SELECT offer_id FROM hot_offers) ORDER BY prod_id');
$records1->execute();

  $offer_id=$_POST['prod_id'];
  $offer_discount=$_POST['offer_discount'];
  $offer_status=1;
//Update Button clicked
if(isset($_POST['add_hot_offer'])){

  $records2 = $connection->prepare('SELECT * FROM products WHERE prod_id=:prod_id');
  $records2->bindParam(':prod_id',$offer_id);
  $records2->execute();
  $row=$records2->fetch(PDO::FETCH_ASSOC);

  if($row['prod_price']<=$offer_discount){
    echo "<script>alert('Discount cannot be greater than actual price!');</script>";
  }
  else{
  $stmt1=$connection->prepare('INSERT INTO hot_offers (offer_id,offer_discount,offer_status) VALUES (:offer_id,:offer_discount,:offer_status)');
  $stmt1->bindParam(':offer_id',$offer_id);
  $stmt1->bindParam(':offer_discount',$offer_discount);
  $stmt1->bindParam(':offer_status',$offer_status);
  $stmt1->execute();

  $stmt2=$connection->prepare('UPDATE products SET prod_discount=:offer_discount WHERE prod_id=:prod_id');
  $stmt2->bindParam(':offer_discount',$offer_discount);
  $stmt2->bindParam(':prod_id',$offer_id);
  $stmt2->execute();

  echo "<script>alert('New Offer added!');</script>";
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


  <script src="//cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>

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
                <div class="clearfix"></div>
              </div>
                <h2>Add Product Offers</h2>
              <div class="x_content">
                <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="add_hot_offer.php" method="post">
                  <div class="form-group">
                    <label class="control-label col-md-3" >Select Offer Product<span class="required">*</span>
                    </label>
                    <div class="col-md-6  col-sm-6 col-xs-12">
                        <select name="prod_id" class="form-control col-md-7 col-xs-12">
                          <option selected disabled>Choose Product</option>
                          <?php
                          while($row=$records1->fetch(PDO::FETCH_ASSOC)){
                            echo '<option>'.$row['prod_id'].'</option>';}
                            ?>
                          </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3" >Add Offer Discount<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="number" required="required" placeholder="Enter discount amount: eg. 50" autocomplete="off" name="offer_discount" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>


                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="reset" class="btn btn-primary">Reset</button>
                      <button type="submit" name="add_hot_offer" class="btn btn-success">Add Offer</button>
                    </div>
                  </div>
                </form>
                  </div>
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
