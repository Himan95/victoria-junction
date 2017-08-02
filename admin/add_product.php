<?php
error_reporting(0);
session_start();

include('../connect/connection.php');

if(!$_SESSION['admin'] || !$_SESSION['usertype'] ){
  echo "<script>alert('For admin only');</script>";
	echo "<script>window.location.href='login.php';</script>";
}


$records1 = $connection->prepare('SELECT * FROM category ORDER BY category_name');
$records1->execute();

//Add product Button clicked
if(isset($_POST['add_product'])){

  $prod_id=$_POST['prod_id'];
  $prod_name=$_POST['prod_name'];
  $prod_type=$_POST['prod_type'];
  $prod_price=$_POST['prod_price'];
  $prod_quantity=$_POST['prod_quantity'];
  $prod_desc=$_POST['editor1'];
  $prod_discount=$_POST['prod_discount'];
  $prod_span_price=$_POST['prod_span_price'];

  //Process the image that is uploaded by the user
  $target_dir = "../images/";
  $target_file = $target_dir . basename($_FILES['imageUpload']['name']);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  move_uploaded_file($_FILES['imageUpload']['tmp_name'], $target_file);
  $final_image=substr($target_file, 3);
  /* Code to check if product id exists */

  $records = $connection->prepare('SELECT * FROM product_master WHERE prod_id=:prod_id');
  $records->bindParam(':prod_id', $prod_id);
  $records->execute();
  $results=$records->fetch(PDO::FETCH_ASSOC);

  try{
    if($prod_type=='')
    echo "<script>alert('Please Choose Product Category!');</script>";

    else{

      $stmt1=$connection->prepare('INSERT INTO product_master (prod_id,prod_type,prod_name)  VALUES (:prod_id,:prod_type,:prod_name)');
      $stmt1->bindParam(':prod_id',$prod_id);
      $stmt1->bindParam(':prod_type',$prod_type);
      $stmt1->bindParam(':prod_name',$prod_name);
      $stmt1->execute();

      $stmt=$connection->prepare('INSERT INTO products (prod_id,prod_name,prod_type,prod_image,prod_price,prod_quantity,prod_desc,prod_discount,prod_span_price) VALUES (:prod_id,:prod_name,:prod_type,:prod_image,:prod_price,:prod_quantity,:prod_desc,:prod_discount,:prod_span_price)');
      $stmt->bindParam(':prod_id',$prod_id);
      $stmt->bindParam(':prod_name',$prod_name);
      $stmt->bindParam(':prod_type',$prod_type);
      $stmt->bindParam(':prod_image',$final_image);
      $stmt->bindParam(':prod_price',$prod_price);
      $stmt->bindParam(':prod_quantity',$prod_quantity);
      $stmt->bindParam(':prod_desc',$prod_desc);
      $stmt->bindParam(':prod_discount',$prod_discount);
      $stmt->bindParam(':prod_span_price',$prod_span_price);

      $stmt->execute();
    }
    echo "<script>alert('Product added!');</script>";
  }
  catch(PDOException $e){echo "<script>alert('Add Product failed : Product Id exists');</script>"; }
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
                <h2>Add a Product</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form method="POST" enctype="multipart/form-data" action="add_product.php">
                  <div class="form-group">
                    <label class="control-label col-md-3" >Product Id<span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                      <input type="text" required="required" autocomplete="off" placeholder="eg: Cake_01, Muffin_02, Cookie_03" name="prod_id" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <br><br><br>
                  <div class="form-group">
                    <label class="control-label col-md-3" >Product Name<span class="required">*</span>
                    </label>
                    <div class="col-md-3">
                      <input type="text" required="required" placeholder="eg: Chocolate Cake, Vanilla Pastry" autocomplete="off" name="prod_name" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-3">Product Type<span class="required">*</span>
                    </label>
                    <div class="col-md-3">
                      <select name="prod_type" class="form-control col-md-7 col-xs-12">
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
                        <input type="number" required="required" placeholder="Enter actual price" autocomplete="off" name="prod_price" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-3">Product Quantity<span class="required">*</span>
                      </label>
                      <div class="col-md-3">
                        <input type="number" required="required" autocomplete="off" name="prod_quantity" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <br><br><br>

                    <div class="form-group">
                      <label class="control-label col-md-3" >Product Span Price<span class="required">*</span>
                      </label>
                      <div class="col-md-3">
                        <input type="number" required="required"  placeholder="Enter dummy price" autocomplete="off" name="prod_span_price" class="form-control col-md-7 col-xs-12">
                      </div>

                      <label class="control-label col-md-3" >Product Discount<span class="required">*</span>
                      </label>
                      <div class="col-md-3">
                        <input type="number" required="required" placeholder="Enter discount to be given in Rupees"  autocomplete="off" name="prod_discount" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <br><br><br>

                    <div class="form-group">
                      <label class="control-label col-md-3" >Product Image<span class="required">*</span>
                      </label>
                      <div class="col-md-6">
                        <input type="file" onchange="readURL(this);" id="imageUpload" required="required" autocomplete="off" name="imageUpload" class="form-control col-md-7 col-xs-12">
                        Exact Size: 140 by 140 pixels
                      </div>
                      <div style="text-align:center;" class="col-md-3">
                        <img id="blah" alt="Image" width="100" height="85"/>
                      </div>
                    </div>

                    <br><br><br>
                    <br><br><br>

                    <div class="form-group">
                      <label class="control-label col-md-3" >Product Description<span class="required">*</span>
                      </label>
                      <div class="col-md-9">
                        <textarea name="editor1" required></textarea>
                        <script>
                        CKEDITOR.replace('editor1');
                        </script>

                        <!--<textarea required="required" placeholder="Enter description here" autocomplete="off" rows="4" columns="20" name="prod_desc" class="form-control col-md-7 col-xs-12"></textarea>-->
                      </div>
                    </div>

                    <br><br><br>

                    <div class="form-group">
                      <div class="col-md-9">
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button type="submit" name="add_product" class="btn btn-success">Add Product</button>
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
<script>
function readURL(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();

               reader.onload = function (e) {
                   $('#blah')
                       .attr('src', e.target.result)
                       ;
               };

               reader.readAsDataURL(input.files[0]);
           }
       }
     </script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="../vendors/skycons/skycons.js"></script>


<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>


</body>
</html>
