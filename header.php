<?php
error_reporting(0);
session_start();
include('connect/connection.php');

$records1 = $connection->prepare('SELECT * FROM web_info');
$records1->execute();
$results1=$records1->fetch(PDO::FETCH_ASSOC);
?>
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
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user"></span> Login / Register</a>
				<div class="mega-dropdown-menu">
					<div class="w3ls_vegetables">
						<ul class="dropdown-menu drp-mnu">
							<?php if(isset($_SESSION['username'])){ ?>
								<li><a href="checksession.php">LOGOUT</a></li>
								<?php }else{ ?>
									<li><a href="login.php">LOGIN</a></li>
									<?php } ?>
									<li><a href="login.php">SIGN UP</a></li>
									<li><a href="my-accounts.php">MY ACCOUNT</a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="w3l_header_right1">
				<h2><a href="mail.php">Contact Us</a></h2>
			</div>
			<div class="clearfix"> </div>
		</div>
