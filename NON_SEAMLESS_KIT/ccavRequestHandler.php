<html>
<head>
<title>Payment Processing</title>
</head>
<body>
<center>

<?php include('Crypto.php');?>

<?php

	error_reporting(0);

	$merchant_data='';
	$working_key='0AE7F5D71761F3C5F7E690A8F14D7576';//Shared by CCAVENUES
	$access_code='K3NAW3VDMWELPP1Q';//Shared by CCAVENUES

	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}

	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

?>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>
