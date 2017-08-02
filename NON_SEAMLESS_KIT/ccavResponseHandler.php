
<?php include('Crypto.php');?>
<?php

//	error_reporting(0);
	session_start();
	include('../connect/connection.php');

	$workingKey='0AE7F5D71761F3C5F7E690A8F14D7576';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="Success";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	echo "<center>";

	for($i = 0; $i < $dataSize; $i++)
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
	}

	if($order_status==="Success")
	{
		$cart = unserialize(serialize($_SESSION['cart']));
		$r=sizeof($cart);

		$created_at=date('Y-m-d');
		$created_time=date('h:i:s');
		$order_no=$_POST['order_id'];
		$customer_name=$_SESSION['username'];
		$customer_contact=$_POST['delivery_tel'];
//		$customer_email=$_POST['email'];

		$shipping_address=$_POST['delivery_address'];
		$total= $_SESSION['tot_amount'];
		$actual_total=$_SESSION['actual_total'];

		while($r--){

			$prod_id=$cart[$r]->id;
			$records21 = $connection->prepare('SELECT * FROM products WHERE prod_id=:prod_id');
			$records21->bindParam(':prod_id',$prod_id);
			$records21->execute();
			$results21=$records21->fetch(PDO::FETCH_ASSOC);

			$product=$results21['prod_name'];
			$price=$results21['prod_price'];
			$quantity=$results21['prod_quantity'];

			$records2 = $connection->prepare('INSERT INTO orders(order_no,product,price,quantity,order_status,customer_name,customer_contact,created_at,created_time,shipping_address,total) VALUES(:order_no,:product,:price,:quantity,:order_status,:customer_name,:customer_contact,:created_at,:created_time,:shipping_address,:total)');
			$records2->bindParam(':order_no',$order_no);
			$records2->bindParam(':product',$product);
			$records2->bindParam(':price',$price);
			$records2->bindParam(':quantity',$quantity);
			$records2->bindParam(':order_status',$order_status);
			$records2->bindParam(':customer_name',$customer_name);
			$records2->bindParam(':customer_contact',$customer_contact);
			$records2->bindParam(':customer_email',$customer_email);
			$records2->bindParam(':created_at',$created_at);
			$records2->bindParam(':created_time',$created_time);
			$records2->bindParam(':shipping_address',$shipping_address);
			$records2->bindParam(':total',$total);
			$records2->execute();

			echo "<br>Thank you for shopping with us. Your transaction is successful. We will be shipping your order to you soon.";

	}
}
	else if($order_status==="Aborted")
	{
		$cart = unserialize(serialize($_SESSION['cart']));
		$r=sizeof($cart);

		$created_at=date('Y-m-d');
		$created_time=date('h:i:s');
		$order_no=$_POST['order_id'];
		$customer_name=$_SESSION['username'];
		$customer_contact=$_POST['delivery_tel'];
//		$customer_email=$_POST['email'];

		$shipping_address=$_POST['delivery_address'];
		$total= $_SESSION['tot_amount'];
		$actual_total=$_SESSION['actual_total'];

		while($r--){

			$prod_id=$cart[$r]->id;
			$records21 = $connection->prepare('SELECT * FROM products WHERE prod_id=:prod_id');
			$records21->bindParam(':prod_id',$prod_id);
			$records21->execute();
			$results21=$records21->fetch(PDO::FETCH_ASSOC);

			$product=$results21['prod_name'];
			$price=$results21['prod_price'];
			$quantity=$results21['prod_quantity'];

			$records2 = $connection->prepare('INSERT INTO orders(order_no,product,price,quantity,order_status,customer_name,customer_contact,created_at,created_time,shipping_address,total) VALUES(:order_no,:product,:price,:quantity,:order_status,:customer_name,:customer_contact,:created_at,:created_time,:shipping_address,:total)');
			$records2->bindParam(':order_no',$order_no);
			$records2->bindParam(':product',$product);
			$records2->bindParam(':price',$price);
			$records2->bindParam(':quantity',$quantity);
			$records2->bindParam(':order_status',$order_status);
			$records2->bindParam(':customer_name',$customer_name);
			$records2->bindParam(':customer_contact',$customer_contact);
			$records2->bindParam(':customer_email',$customer_email);
			$records2->bindParam(':created_at',$created_at);
			$records2->bindParam(':created_time',$created_time);
			$records2->bindParam(':shipping_address',$shipping_address);
			$records2->bindParam(':total',$total);
			$records2->execute();

		echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";

	}
	else if($order_status==="Failure")
	{
		echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
	}
	else
	{
		echo "<br>Security Error. Illegal access detected";

	}

	echo "<br><br>";

	echo "<table cellspacing=4 cellpadding=4>";
	for($i = 0; $i < $dataSize; $i++)
	{
		$information=explode('=',$decryptValues[$i]);
	    	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
	}

	echo "</table><br>";
	echo "</center>";
?>
