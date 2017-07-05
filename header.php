<?php
error_reporting(0);
session_start();
include('connect/connection.php');
?>
<div class="agileits_header">
	<div class="w3l_offers">
		<a href="products.php">Today's special Offers !</a>
	</div>

	<div class="w3l_search">
		<h2 style="color:red;margin-top:5px;margin-left:5px" align="center">Welcome To Victoria Junction</h2>
	</div>

	<div class="product_list_header">
		<form action="#" method="post" class="last">
			<fieldset>
				<input type="hidden" name="cmd" value="_cart" />
				<input type="hidden" name="display" value="1" />
				<input type="submit" name="submit" value="View your cart" class="button" />
			</fieldset>
		</form>
	</div>
	<div class="w3l_header_right">
		<ul>
			<li class="dropdown profile_details_drop">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
				<div class="mega-dropdown-menu">
					<div class="w3ls_vegetables">
						<ul class="dropdown-menu drp-mnu">
							<?php if(isset($_SESSION['username'])){ ?>
							<li><a href="checksession.php">LOGOUT</a></li>
						<?php }else{ ?>
						<li><a href="login.php">LOGIN</a></li>
						<?php } ?>
							<li><a href="login.php">SIGN UP</a></li>
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
