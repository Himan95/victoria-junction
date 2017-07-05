<?php
session_start();
error_reporting(0);

include('../connect/connection.php');


if($_SESSION['usertype']){
  echo "<script>alert('Alreay Logged In');</script>";
	echo "<script>window.location.href='index.php';</script>";
}


if(!$_SESSION['admin']){
  echo "<script>alert('For admin only');</script>";
	echo "<script>window.location.href='login.php';</script>";
}


$records = $connection->prepare('SELECT * FROM users');
$records->execute();

if(isset($_POST['submit'])){
  $_SESSION['usertype']=$_POST['user_type'];
  echo "<script>window.location.href='index.php';</script>";

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
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login" style="background-color:white">
  <div align="left" style="border-bottom:1px solid grey" style="position:fixed;">



  </div>
  <div>

    <div class="login_wrapper">
      <div class="animate form form-content">
        <section class="login_content">
          <form name="form1" action="select_user.php" method="POST">
            <h1>Select User</h1>
            <div class="form-group">

            <select name="user_type" class="form-control col-md-7 col-xs-12">
              <option selected disabled>Choose Here</option>
              <?php
              while($row=$records->fetch(PDO::FETCH_ASSOC)){
                echo '<option>'.$row['user_type'].'</option>';
              }
                ?>
              </select>

            </div>
            <br><br><br>
            <div>
              <center><input type="submit" name="submit" class="btn btn-primary submit" style="margin-left:150px;" value="Select">

              </center>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Want to go back to main website?
                <a href="../index.php" target="_self" class="to_register"> Click here</a>
              </p>

              <div class="clearfix"></div>
              <br />


            </div>
          </form>
        </section>
      </div>

    </div>
  </div>


</body>
</html>
