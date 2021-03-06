<?php
session_start();
error_reporting(0);

include('../connect/connection.php');

if(!$_SESSION['admin'] || !$_SESSION['usertype'] ){
  echo "<script>alert('For admin only');</script>";
	echo "<script>window.location.href='login.php';</script>";
}

$records11 = $connection->prepare('SELECT * FROM products ORDER BY prod_id');
$records11->execute();


$records1 = $connection->prepare('SELECT * FROM category ORDER BY category_name');
$records1->execute();

//Add product Button clicked
if(isset($_POST['delete_product'])){

  $prod_id=$_POST['prod_id'];
  $prod_name=$_POST['prod_name'];
  $prod_type=$_POST['prod_type'];


  $records = $connection->prepare('SELECT * FROM product_master WHERE prod_id=:prod_id');
  $records->bindParam(':prod_id', $prod_id);
  $records->execute();
  $results=$records->fetch(PDO::FETCH_ASSOC);

  if(($results['prod_id'])!=false)
  /* Write Code to check if product doesnt exist using product_id */
  {
    if($prod_type=='')
    echo "<script>alert('Please Choose Product Category!');</script>";
    else{
      $stmt1=$connection->prepare('DELETE FROM product_master WHERE prod_id=:prod_id');
      $stmt1->bindParam(':prod_id',$prod_id);
      $stmt1->execute();

      $stmt=$connection->prepare('DELETE FROM products WHERE prod_id=:prod_id');
      $stmt->bindParam(':prod_id',$prod_id);
      $stmt->execute();

      echo "<script>alert('Product Deleted!');</script>";
    }
  }
  else {
    echo "<script>alert('Product Id doesnt exist!');</script>";
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

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
                <h2>Delete Product</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form method="POST" action="delete_product.php">
                  <div class="form-group">
                    <label class="control-label col-md-3" >Product Id<span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                      <select id="foo" name="prod_id" class="form-control col-md-7 col-xs-12">
                        <option selected disabled>Choose here</option>
                        <?php
                        while($row=$records11->fetch(PDO::FETCH_ASSOC)){
                          echo '<option>'.$row['prod_id'].'</option>';}
                          ?>
                        </select>
                      </div>

                    </div>
                    <br><br><br>
                    <div class="form-group">
                      <label class="control-label col-md-3" >Product Name<span class="required">*</span>
                      </label>
                      <div class="col-md-3">
                        <input id="prod_name" type="text" required="required" autocomplete="off" name="prod_name" class="form-control col-md-7 col-xs-12">
                      </div>

                      <label class="control-label col-md-3">Product Type<span class="required">*</span>
                      </label>
                      <div class="col-md-3">
                        <select name="prod_type" id="prod_type" class="form-control col-md-7 col-xs-12">
                          <option selected disabled>Choose here</option>
                          <?php
                          while($row=$records1->fetch(PDO::FETCH_ASSOC)){
                            echo '<option>'.$row['category_name'].'</option>';}
                            ?>
                          </select>
                        </div>
                      </div>

                      <br><br><br>

                      <div class="form-group">
                        <div class="col-md-9">
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <button type="submit" name="delete_product" class="btn btn-success">Delete Product</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
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

  <script type="text/javascript">

  var request;
  $("#foo").change(function(event){
    event.preventDefault();

    // Abort any pending request
    if (request) {
      request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    request = $.ajax({
      url: "update.php",
      type: "post",
      data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
      // Log a message to the console
      //console.log("Hooray, it worked!");
      var splitt=response.split('##');
      //alert(splitt[0]);
      $('#prod_name').val(splitt[0]);
      $('#prod_type').val(splitt[1]);
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
      // Log the error to the console
      console.error(
        "The following error occurred: "+
        textStatus, errorThrown
      );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
      // Reenable the inputs
      $inputs.prop("disabled", false);
    });

  });
  </script>


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
