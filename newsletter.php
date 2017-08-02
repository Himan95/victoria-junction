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

//Write code to mail customer the newsletter template
$to=$email;
$subject="Congratulations";
$message = "
  <table style='border:2px solid #00FFCE;' cellspacing='0' cellpadding='10' width='605'>
    <td width='406' align='center' style=' text-align:center;'><p style='font-size: 22px; font-weight: bold; color: #494a48; font-family: Arial;'>Thank You for your subscription!</p></td>

    <tr>
      <td style='background-color: #ffffff;' align='center' valign='center'>
        <tr>
          <td style='background-color: #ffffff;  line-height: 120%; font-family: Georgia; text-align:center;' align='center'><p><span style=' font-size: 12px; font-weight: normal; color: #494a48; font-family: arial;'>
            Thank You For Subscribing To Our Newsletter. Latest arrivals, new products and important updates will be notified to you via email. As a cakes and confectionaries, <b>Victoria Junction</b> focuses primarily on customer satisfaction and fresh product delivery.
            Fast delivery services and flexible payment options are our key features.
            <br><br>
            For every important update or notifications, we will email you in no time. Feel free to contact us for any orders/queries. We will be glad to help you.
            </span></p>
          </tr>
          <td bgcolor='00FFCE'><table width='604' cellpadding='5' cellspacing='0'>
            <tr>
              <tr>
                <td style='background-color: #fffeee; text-align: center; height: 50px;' align='center'>
                  <span style='font-size: 14px; color: #575757; line-height: 130%; font-family: Georgia;'>
                    <a href='http://victoriajunction.in/mail.php'>
                      Contact Us?</a><br>
                      Visit us on the web at <a href='http://victoriajunction.in/index.php'>victoriajunction.in
                      </a>
                    </span>
                  </td>
                  </table>
";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset: utf8\r\n";
$m=mail($to,$subject,$message,$headers);
if($m){
  echo "<script>alert('Thank you for subscribing to our newsletter. We will keep you updated with our latest arrivals!');</script>";
  echo "<script>window.location.href='index.php';</script>";
}
else {
  echo "<script>alert('Sorry, Mail could not be sent!');</script>";
}


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
