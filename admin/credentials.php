<?php

date_default_timezone_set('Asia/Kolkata');
session_start();
error_reporting(0);

include('../connect/connection.php');

$records2 = $connection->prepare('SELECT * FROM admin_credentials WHERE username=:username');
$records2->bindParam(':username', $_SESSION['username']);
$records2->execute();
$results2=$records2->fetch(PDO::FETCH_ASSOC);

if($_SESSION['username']!=$results2['username']|| $_SESSION['username']==''){
  echo "<script>alert('For admin only');</script>";
	echo "<script>window.location.href='../login.php';</script>";
}

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

  $records32 = $connection->prepare('UPDATE admin_credentials SET password=:password WHERE username=:username');
  $records32->bindParam(':password', $password);
  $records32->bindParam(':username', $username);
  $username=$_SESSION['username'];
  $password=$_POST['password'];
  $records32->execute();

  echo "<script>alert('Password updated successfully. Login again to continue');</script>";
  echo "<script>window.location.href='../checksession.php';</script>";
  }
  else{
	   $error_alert="Enter correct password";
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
              <center><h2>Victoria Junction | Update Credentials  </h2></center>
                  <div class="x_panel tile fixed_height_450">
                    <div class="x_title">
                    <h2>Update Password</h2>

                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="credentials.php" method="post">
                 <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Old password<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="password" required="required" autocomplete="off" name="old_password" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >New password<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="password" required="required" autocomplete="off"  name="password"  class="form-control col-md-7 col-xs-12">
                   <i><font color="green" style="font-style:italic;font-weight:bold;">
                  <?php if($success!=null){ ?>
                  <img src="../images/tick.png">
                  <?php
                  echo $success;
                  } ?>
                  </font></i>
                  <i><font color="red" style="font-style:italic;font-weight:bold;">
                  <?php if($error_alert!=null){ ?>
                  <img src="../images/cross.gif">
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