<?php
session_start();
error_reporting(0);
include('../connect/connection.php');


$records = $connection->prepare('SELECT * FROM admin_credentials');
$records->execute();
$results=$records->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){

  $username=$_POST['username'];
  $password=$_POST['password'];

  if($results['username']==$username &&  $results['password']==$password){

    $_SESSION['admin']="True";
    echo "<script>window.location.href='select_user.php';</script>";
  }
  else {
    echo "<script>alert('Wrong Credentials');</script>";
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
          <form name="form1" action="login.php" method="POST">
            <h1>VJ Login Panel</h1>
            <div>
              <input type="text" class="form-control" required autocomplete="off" name="username" placeholder="Username" ="" autofocus />
            </div>
            <div>
              <input type="password" class="form-control" required autocomplete="off" name="password" placeholder="Password" ="" />
              <p><font color="red" style="font-style:italic"><?php if($errMsg!=null){echo $errMsg;} ?></font> </p>
              <p><font color="green" style="font-style:italic"><?php if($success!=null){echo $success;} ?></font> </p>
            </div>

            <div>
              <center><input type="submit" name="submit" class="btn btn-primary submit" style="margin-left:150px;" value="Log In">

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
