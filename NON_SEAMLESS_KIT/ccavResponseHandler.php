<?php include('Crypto.php')?>
<?php
	session_start();
	error_reporting(0);


	$workingKey='0AE7F5D71761F3C5F7E690A8F14D7576';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
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
		echo "<script>alert('Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.');</script>'";
		echo "<script>window.location.href='../response.php'</script>";

	}
	else if($order_status==="Aborted")
	{
		echo "<script>alert('Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail');</script>";
		echo "<script>window.location.href='../index.php'</script>";
		//echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";

	}
	else if($order_status==="Failure")
	{
		echo "<script>alert('Thank you for shopping with us.However,the transaction has been declined.');</script>'";
		echo "<script>window.location.href='../index.php'</script>";

	}
	else
	{
//		echo "<br>Security Error. Illegal access detected";
		echo "<script>alert('Security Error. Illegal access detected');</script>'";
		echo "<script>window.location.href='../index.php'</script>";

	}

	echo "<br><br>";

	echo "<table cellspacing=4 cellpadding=4>";
	$_SESSION['dataSize']=$dataSize;
	for($i = 0; $i < $dataSize; $i++)
	{
		$information=explode('=',$decryptValues[$i]);
		$_SESSION['parameter'][$i]=$information[0];
		$_SESSION['value'][$i]=$information[1];
	    	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
	}

	echo "</table><br>";
	echo "</center>";
?>
