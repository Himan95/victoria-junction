<?php

include('../connect/connection.php');
$records2 = $connection->prepare('SELECT * FROM products WHERE prod_id=:prod_id');
$records2->bindParam(':prod_id', $_POST['prod_id']);
$records2->execute();
$results2=$records2->fetch(PDO::FETCH_ASSOC);

//print_r($results2);
echo $results2['prod_name'].'##'.$results2['prod_type'].'##'.$results2['prod_price'].'##'.$results2['prod_quantity'].'##'.$results2['prod_span_price'].'##'.$results2['prod_discount'].'##'.$results2['prod_desc'].'##'.$results2['prod_image'];

?>
