<?php
//error_reporting(0);
session_start();
include('connect/connection.php');
?>
<style>

</style>
<div class="top-brands">
	<div class="container">
		<h3 style="margin-bottom:15px;">Specializations</h3>



		<?php
		$records = $connection->prepare('SELECT * FROM products WHERE prod_type IN("Cakes","Cookies","Breads") ORDER BY rand() LIMIT 4');
		$records->execute();


		while($results=$records->fetch(PDO::FETCH_ASSOC)){
			echo '
			<div style="margin-bottom:20px;" class="col-md-3 w3ls_w3l_banner_left">
			<div class="hover14 column">
			<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
			<div class="agile_top_brand_left_grid1">
			<figure>
			<div class="snipcart-item block">
			<!--<div class="snipcart-thumb">-->
			<a href="single.php?product='.$results['prod_id'].'">';
			if($results['prod_image'])
			echo '<img src="'.$results['prod_image'].'" alt=" " class="img-responsive bada-image" /></a>';
			else {
				echo '<img src="images/empty-image.png" alt=" " class="img-responsive bada-image" /></a>';
			}


			echo '
			<p><b>'.$results['prod_name'].'</b></p>
			</figure>
			</div>
			</div>
			</div>
			</div>
			';
		}
		?>
	</div>
