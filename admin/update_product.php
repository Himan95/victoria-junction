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
$results11=$records11->fetch(PDO::FETCH_ASSOC);


$records1 = $connection->prepare('SELECT * FROM category ORDER BY category_name');
$records1->execute();
$results1=$records1->fetch(PDO::FETCH_ASSOC);

//Add product Button clicked
if(isset($_POST['update_product'])){

  $prod_id=$_POST['prod_id'];
  $prod_name=$_POST['prod_name'];
  $prod_type=$_POST['prod_type'];
  $prod_price=$_POST['prod_price'];
  $prod_quantity=$_POST['prod_quantity'];
  $prod_desc=$_POST['prod_desc'];
  $prod_discount=$_POST['prod_discount'];
  $prod_span_price=$_POST['prod_span_price'];


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
      $stmt1=$connection->prepare('UPDATE product_master SET prod_name =:prod_name, prod_type=:prod_type WHERE prod_id=:prod_id');
      $stmt1->bindParam(':prod_name',$prod_name);
      $stmt1->bindParam(':prod_type',$prod_type);
      $stmt1->bindParam(':prod_id',$prod_id);
      $stmt1->execute();

      $stmt=$connection->prepare('UPDATE products SET prod_name=:prod_name, prod_type=:prod_type, prod_price=:prod_price,prod_desc=:prod_desc,prod_quantity=:prod_quantity,prod_span_price=:prod_span_price,prod_discount=:prod_discount WHERE prod_id=:prod_id');
      $stmt->bindParam(':prod_id',$prod_id);
      $stmt->bindParam(':prod_name',$prod_name);
      $stmt->bindParam(':prod_type',$prod_type);
      $stmt->bindParam(':prod_price',$prod_price);
      $stmt->bindParam(':prod_desc',$prod_desc);
      $stmt->bindParam(':prod_quantity',$prod_quantity);
      $stmt->bindParam(':prod_discount',$prod_discount);
      $stmt->bindParam(':prod_span_price',$prod_span_price);
      $stmt->execute();

      echo "<script>alert('Product Updated!');</script>";
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
            <center><h2>Victoria Junction | Update Product </h2></center>
            <div class="x_panel tile fixed_height_450">
              <div class="x_title">
                <h2>Update Product</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form method="POST" action="update_product.php">
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
                        <label class="control-label col-md-3" >Product Price<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                          <input id="prod_price" type="number" required="required" autocomplete="off" name="prod_price" class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-3">Product Quantity<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                          <input type="number" id="prod_quantity" required="required" autocomplete="off" name="prod_quantity" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <br><br><br>

                      <div class="form-group">
                        <label class="control-label col-md-3" >Product Span Price<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                          <input type="number"  id="prod_span_price" required="required" autocomplete="off" name="prod_span_price" class="form-control col-md-7 col-xs-12">
                        </div>

                        <label class="control-label col-md-3" >Product Discount<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                          <input type="number" id="prod_discount" required="required" autocomplete="off" name="prod_discount" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <br><br><br>

                      <div class="form-group">
                        <label class="control-label col-md-3" >Product Description<span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                          <textarea required="required" autocomplete="off" rows="4" columns="20" id="prod_desc" name="prod_desc" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>

                      <br><br><br>

                      <div class="form-group">
                        <div class="col-md-9">
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <button type="submit" name="update_product" class="btn btn-success">Update Product</button>
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
      $('#prod_price').val(splitt[2]);
      $('#prod_quantity').val(splitt[3]);
      $('#prod_span_price').val(splitt[4]);
      $('#prod_discount').val(splitt[5]);
      $('#prod_desc').val(splitt[6]);

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
