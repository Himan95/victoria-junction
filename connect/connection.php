<?php
//Fixed Variables for db connection
$hostname="localhost";
$username="root";
$password="";
$dbname="vj_17";

//database connection
try {
  $connection= new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8",$username,$password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //echo"<font color='black'>Connection success :</font>";

} catch (PDOException $e) {
  // Error in connection
  echo"<font color='black'>Connection failed : ".$e->getMessage()."</font>";
}

 ?>
