<?php
error_reporting(0);
session_start();
include('connect/connection.php');
?>
<style>
.img{
	margin-bottom:10px;
	border-radius: 14px;
	zoom: 110%;
}
</style>
<center>
	<div class="banner_bottom">
		<div class="wfour_banner_bottom_left_grid_sub">
		</div>
		<div class="wfour_banner_bottom_left_grid_sub1">
			<?php

			$records = $connection->prepare('SELECT * FROM offers ORDER BY rand() LIMIT 3');
			$records->execute();
			$results=$records->fetch(PDO::FETCH_ASSOC);
			do{
				echo '
				<div class="col-md-4 wfour_banner_bottom_left">
				<div class="wthree_banner_bottom_left_grid">
				<img src="'.$results['offer_image'].'" alt=" " class="img img-responsive" />
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
</center>
