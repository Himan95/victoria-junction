<div class="top-brands">
	<div style="margin-bottom:-50px;" class="container">
		<h3>Hot Offers</h3>
		<!---728x90--->
		<?php
		error_reporting(0);
		session_start();

		include('connect/connection.php');
		$records = $connection->prepare('SELECT * FROM products WHERE prod_quantity>0 ORDER BY rand() LIMIT 4');
		$records->execute();
		$results=$records->fetch(PDO::FETCH_ASSOC);
		do{
			echo '
			<div class="agile_top_brands_grids">
			<div class="col-md-3 top_brand_left">
			<div class="hover14 column">
			<div class="agile_top_brand_left_grid">
			<div class="agile_top_brand_left_grid1">
			<div class="agile_top_brand_left_grid_pos">
			<img src="images/offer.png" alt=" " class="img-responsive" />
			</div>
			<figure>
			<div class="snipcart-item block">
			<div class="snipcart-thumb">
			<a href="single.php?product='.$results['prod_id'].'">';
			if($results['prod_image'])
			echo '<img src="'.$results['prod_image'].'" alt=" " class="img-responsive bada-image" /></a>';
			else {
				echo '<img src="images/empty-image.png" alt=" " class="img-responsive bada-image" /></a>';
			}


			echo '
			<p>'.$results['prod_name'].'</p>
			<h4>Rs.'.$results['prod_price'].'<span>Rs.'.$results['prod_span_price'].'</span></h4>
			</div>
			<div class="snipcart-details">
			<form action="cart.php" method="GET">
			<fieldset>
			<input type="hidden" name="cmd" value="_cart" />
			<input type="hidden" name="add" value="1" />
			<input type="hidden" name="business" value=" " />
			<input type="hidden" name="item_id" value="'.$results['prod_id'].'" />
			<input type="hidden" name="item_name" value="'.$results['prod_name'].'" />
			<input type="hidden" name="amount" value="'.$results['prod_price'].'" />
			<input type="hidden" name="discount_amount" value="'.$results['prod_discount'].'" />
			<input type="hidden" name="currency_code" value="INR" />
			<input type="hidden" name="return" value=" " />
			<input type="hidden" name="cancel_return" value=" " />
			<input type="submit" name="submit" value="Add to cart" class="button" />
			</fieldset>
			</form>
			</div>
			</div>
			</figure>
			</div>
			</div>
			</div>
			</div>
			</div>
			';
		}
		while($results=$records->fetch(PDO::FETCH_ASSOC));
		?>

	</div>
</div>
</div>
</div>
