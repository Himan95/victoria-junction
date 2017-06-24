<div class="top-brands">
		<div class="container">
			<h3>Hot Offers</h3>
<!---728x90--->
<?php
error_reporting(0);
session_start();

include('connect/connection.php');
$records = $connection->prepare('SELECT * FROM products ORDER BY rand() LIMIT 4');
$records->execute();
$results=$records->fetch(PDO::FETCH_ASSOC);
do{
echo '
			<div class="agile_top_brands_grids">
				<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="tag"><img src="images/tag.png" alt=" " class="img-responsive" /></div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.php?product='.$results['prod_id'].'"><img title=" " alt=" " src="'.$results['prod_image'].'"  /></a>
											<p>'.$results['prod_name'].'</p>
											<h4>Rs.'.$results['prod_price'].' <span>Rs. 10.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="'.$results['prod_name'].'" />
													<input type="hidden" name="amount" value="'.$results['prod_price'].'" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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

				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
