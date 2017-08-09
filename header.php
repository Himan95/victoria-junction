<?php
error_reporting(0);
session_start();
include('connect/connection.php');

$records1 = $connection->prepare('SELECT * FROM web_info');
$records1->execute();
$results1=$records1->fetch(PDO::FETCH_ASSOC);
?>
<style>
.active {
}


.linked{
  text-decoration: none;
  color:white;
}
/* Dropdown Button */
.dropbttn {
  color: white;
  padding: 10px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.btn-hover:hover{
  background-color:#3e8e41;
}

/* The container <div> - needed to position the dropdown content */


/* Dropdown Content (Hidden by Default) */
.content-dropdown {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 180px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.content-dropdown a {
  font-size: 15px;
  color: black;
  padding: 10px 12px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.content-dropdown a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .content-dropdown {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbttn {
  background-color: #3e8e41;
}


</style>
<div class="agileits_header">
	<div class="w3l_offers">
		<a href="specials.php">Special Offers</a>
	</div>

	<div class="w3l_search">
		<marquee style="color:red; margin-top:8px;"> <h4 style="  font-size:22px; width: 400px;text-align:center;color:red;"> Welcome To <?php echo $results1['web_name'];  ?> |
		First Live Eggless Bakery in North Bengal </h4></marquee>
	</div>


	<div class="product_list_header">
		<form action="cart.php" method="post" class="last">
			<fieldset>
				<input type="hidden" name="cmd" value="_cart" />
				<input type="hidden" name="display" value="1" />
				<a class="" href="cart.php"><img class="cart-img" style="height:30px;" src="images/cart.png"></a>
				<!--<input type="submit" name="submit" value="" class="button" />-->
			</fieldset>
		</form>
	</div>
	<div class="w3l_header_right">
		<ul>
			<li class="dropdown profile_details_drop">

				<a href="#" class="dropbttn"><span class="fa fa-user"></span> Login / Register</a>
				<div class="content-dropdown">
				<!--<div class="mega-dropdown-menu">
					<div class="w3ls_vegetables">-->

							<?php if(isset($_SESSION['username'])){ ?>
								<a href="checksession.php">LOGOUT</a>
								<?php }else{ ?>
									<a href="login.php">LOGIN</a>
									<?php } ?>
									<a href="login.php">SIGN UP</a>
									<a href="my-accounts.php">MY ACCOUNT</a>

							</div>
						<!--</div>-->
					</li>
				</ul>
			</div>
			<div class="w3l_header_right1">
				<h2><a href="mail.php">Contact Us</a></h2>
			</div>
			<div class="clearfix"> </div>
		</div>
