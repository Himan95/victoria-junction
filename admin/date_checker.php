<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
error_reporting(0);

include('../connect/connection.php');

                  $records2 = $connection->prepare('SELECT * FROM orders WHERE created_at BETWEEN :yesterday AND :today AND order_status=:order_status');
                  $records2->bindParam(':yesterday', $to);
                  $records2->bindParam(':today', $from);
                  $records2->bindParam(':order_status', $status);
                  $records2->execute();
                  $results2=$records2->fetch(PDO::FETCH_ASSOC);

                  echo !$results2['order_id'];


    ?>
