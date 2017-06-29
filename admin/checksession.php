<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
error_reporting(0);

include('../connect/connection.php');

if(isset($_SESSION['usertype'])){

  $_SESSION['usertype']='';
  echo "<script>alert('You have successfully logged out!');</script>";
  session_destroy();
  echo "<script>window.location.href='login.php';</script>";
}
?>
