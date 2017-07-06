<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
error_reporting(0);

include('connect/connection.php');

if(isset($_SESSION['username'])){

  $records1 = $connection->prepare('UPDATE login SET logout_time=:logout_time WHERE username=:username');
  $records1->bindParam(':logout_time', $logout_time);
  $records1->bindParam(':username', $username);
  $username=$_SESSION['username'];
  $logout_time=date('Y-m-d h:i:s');
  $records1->execute();

  $_SESSION['username']="";
  $_SESSION['logged_in']=false;
  echo "<script>alert('You have successfully logged out!');</script>";
  session_destroy();
  echo "<script>window.location.href='login.php';</script>";
}
?>
