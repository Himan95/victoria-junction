<?php
error_reporting(0);
session_start();
include ('connect/connection.php');
if(isset($_POST['subscribe'])){

  date_default_timezone_set('Asia/Kolkata');
  $email=$_POST['email'];
  $subscribed_at=date('Y:m:d');

  $stmt=$connection->prepare('INSERT INTO newsletter (email, subscribed_at) VALUES (:email,:subscribed_at)');
  $stmt->bindParam(':email',$email);
  $stmt->bindParam(':subscribed_at',$subscribed_at);
  $stmt->execute();

  echo "<script>alert('Thank you for subscribing to our newsletter. We will keep you updated with our latest arrivals!');</script>";
  echo "<script>window.location.href='about.php';</script>";
}
?>
<div class="newsletter">
  <div class="container">
    <div class="w3agile_newsletter_left">
      <h3>Sign up for our newsletter</h3>
    </div>
    <div class="w3agile_newsletter_right">
      <form action="newsletter.php" method="post">
        <input type="email" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
        <input type="submit" name="subscribe" value="Subscribe Now">
      </form>
    </div>
    <div class="clearfix"> </div>
  </div>
</div>
