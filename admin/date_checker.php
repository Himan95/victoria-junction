<?php
session_start();
error_reporting(0);
include('../connect/connection.php');

$records = $connection->prepare('SELECT * FROM users');
$records->execute();

while($row=$records->fetch(PDO::FETCH_ASSOC))
echo $row['user_type'];


    ?>
