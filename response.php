<?php
//error_reporting(0);
session_start();
include('connect/connection.php');
date_default_timezone_set('Asia/Kolkata');
require 'item.php';

$order_id=$_SESSION['value'][0];
$tracking_id=$_SESSION['value'][1];
$bank_ref_no=$_SESSION['value'][2];
$order_status=$_SESSION['value'][3];
$failure_message=$_SESSION['value'][4];
$payment_mode=$_SESSION['value'][5];
$card_name=$_SESSION['value'][6];
$status_code=$_SESSION['value'][7];
$status_message=$_SESSION['value'][8];
$currency=$_SESSION['value'][9];
$amount=$_SESSION['value'][10];
$delivery_name=$_SESSION['value'][19];
$delivery_address=$_SESSION['value'][20];
$delivery_city=$_SESSION['value'][21];
$delivery_zip=$_SESSION['value'][22];
$delivery_state=$_SESSION['value'][23];
$delivery_country=$_SESSION['value'][24];
$delivery_tel=$_SESSION['value'][25];
$mer_amount=$_SESSION['value'][35];
$response_code=$_SESSION['value'][38];
$trans_date=$_SESSION['value'][40];
$bin_country="India";

$cart = unserialize(serialize($_SESSION['cart']));
$r=sizeof($cart);

$created_at=date('Y-m-d');
$created_time=date('h:i:s');

while($r--){

  $prod_id=$cart[$r]->id;
  $records21 = $connection->prepare('SELECT * FROM products WHERE prod_id=:prod_id');
  $records21->bindParam(':prod_id',$prod_id);
  $records21->execute();
  $results21=$records21->fetch(PDO::FETCH_ASSOC);

  $product=$results21['prod_name'];
  $price=$results21['prod_price'];
  $quantity=$results21['prod_quantity'];

  $records2 = $connection->prepare('INSERT INTO orders(order_no,tracking_id,product,price,quantity,order_status,customer_name,customer_contact,created_at,created_time,delivery_zip,delivery_state,delivery_country,shipping_address,status_message,total) VALUES(:order_no,:tracking_id,:product,:price,:quantity,:order_status,:customer_name,:customer_contact,:created_at,:created_time,:delivery_zip,:delivery_state,:delivery_country,:shipping_address,:status_message,:total)');
  $records2->bindParam(':order_no',$order_id);
  $records2->bindParam(':tracking_id',$tracking_id);
  $records2->bindParam(':product',$product);
  $records2->bindParam(':price',$price);
  $records2->bindParam(':quantity',$quantity);
  $records2->bindParam(':order_status',$order_status);
  $records2->bindParam(':customer_name',$delivery_name);
  $records2->bindParam(':customer_contact',$delivery_tel);
  $records2->bindParam(':created_at',$created_at);
  $records2->bindParam(':created_time',$created_time);
  $records2->bindParam(':delivery_zip',$delivery_zip);
  $records2->bindParam(':delivery_state',$delivery_state);
  $records2->bindParam(':delivery_country',$delivery_country);
  $records2->bindParam(':shipping_address',$delivery_address);
  $records2->bindParam(':status_message',$status_message);
  $records2->bindParam(':total',$amount);
  $records2->execute();

  $_SESSION['cart']="";
  echo "<script>window.location.href='invoice.php?order_no='.$order_id.'';</script>";

}
?>
