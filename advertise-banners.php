<?php
error_reporting(0);
session_start();
include('connect/connection.php');
?>
<style>
.img{
	margin-bottom:10px;
	border-radius: 14px;
	zoom: 120%;
}
</style>
<center>
	<div class="top-brands">
		<div class="container">
			<h2>Specializations</h2>
			<br><br>
			<div class="wfour_banner_bottom_left_grid_sub">
			</div>
			<div class="wfour_banner_bottom_left_grid_sub1">
				<?php

				$records = $connection->prepare('SELECT * FROM products WHERE prod_type="Cakes" ORDER BY rand() LIMIT 4');
				$records->execute();
				$results=$records->fetch(PDO::FETCH_ASSOC);
				do{
					echo '
					<div class="col-md-3 wfour_banner_bottom_left">
					<div class="wthree_banner_bottom_left_grid">
					<img src="'.$results['prod_image'].'" alt=" " class="img img-responsive" />
					</div>
					</div>

					';
				}
				while($results=$records->fetch(PDO::FETCH_ASSOC));
				?>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	</center>
