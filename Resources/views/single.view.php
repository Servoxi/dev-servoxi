<?php include_once(APP_DIR.'/Resources/views/partials/head.php');
?>
<script>
$(document).ready(function() {
  // Bind event handler to the quantity input field
 $('#quantity').on('change', function() {
    var selectedQuantity = $(this).val();
    var price =  $('#price').attr('value');
    var updatePrice = price*selectedQuantity;
    $('#price').text("₹ "+updatePrice);
  });

  // Calculate the price based on the quantity
  function calculatePrice(quantity) {
    // Perform your calculation logic here
    // For example, multiply the quantity by a fixed price
    var fixedPrice = 10;
    return quantity * fixedPrice;
  }
});
</script>
     <div class="main">
      <div class="shop_top">
		<div class="container">
			<div class="row">
				<div class="col-md-9 single_left">
				   <div class="single_image">
					     <ul id="etalage">
							<li>
								<a href="#">
									<img class="etalage_thumb_image" src="/images/<?= $product['p_main_img']?>" />
									<img class="etalage_source_image" src="/images/<?= $product['p_main_img']?>" />
								</a>
							</li>
							<?php
							foreach($images as $imgs){
								echo '
								<li>
									<img class="etalage_thumb_image" src="/images/'.$imgs['img_name'].'" />
									<img class="etalage_source_image" src="/images/'.$imgs['img_name'].'" />
								</li>
								';
							}
							?>
						</ul>
					    </div>
				        <!-- end product_slider -->
				        <div class="single_right">
				        	<h3><?= $product['p_name'];?> </h3>
				        	<p class="m_10"><?= $product['p_desc'];?> </p>
				        	<ul class="options">
								<h4 class="m_12">Select a Size(cm)</h4>
								<li><a href="#">18</a></li>
								<li><a href="#">20</a></li>
								<li><a href="#">22</a></li>
								<li><a href="#">24</a></li>
							</ul>
				        	<ul class="product-colors">
								<h3>available Colors</h3>
								<li><a class="color1" href="#"><span> </span></a></li>
								<li><a class="color2" href="#"><span> </span></a></li>
								<li><a class="color3" href="#"><span> </span></a></li>
								<li><a class="color4" href="#"><span> </span></a></li>
								<li><a class="color5" href="#"><span> </span></a></li>
								<li><a class="color6" href="#"><span> </span></a></li>
								<div class="clear"> </div>
							</ul>
							<div class="btn_form">
							   <form>
						        <button class="btn-success btn"><a href="https://wa.me/+919175809772?text=I Want Buy this product name : *<?= $product['p_name']?>* %0A Price of the product : *<?= $product['p_price'];?>* %0A link: https://dev.servoxi.com/single?id=<?= $product['p_id'];?>" class="text-white" style="text-decoration: none;">buy now <span class="fa fa-whatsapp"></span></a></button>							  
						        </form>
							</div>
				        </div>
				        <div class="clear"> </div>
				</div>
				<div class="col-md-3">
				  <div class="box-info-product">
					<p class="price2" id="price" value="<?= $product['p_price'];?>"> ₹<?= $product['p_price'];?> </p>
					       <ul class="prosuct-qty">
								<span>Quantity:</span>
								<select id="quantity">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
								</select>
							</ul>
				   </div>
			   </div>
			</div>		
			<div class="row">
				<h4 class="m_11">Related Products</h4>
				<?php
				foreach($related_products as $product){
					echo'
					<div class="col-md-3 shop_box "><a href="/single?id='.$product['p_id'].'">
							 <img class="product-image" src="images/'.$product['p_main_img'].'" width="300" height="200" class="img-responsive" alt="'.$product['p_main_img'].'"/> 
						<div class="shop_desc"><a href="single.html">
							</a><h3><a href="/single?id='.$product['p_id'].'">'.$product['p_name'].'</a></h3>
							<p>'.$product['p_desc'].'</p>
							<span class="actual"> ₹'.$product['p_price'].'</span><br>
							<ul class="buttons">
						        <button class="btn-success btn"><a href="https://wa.me/+919175809772?text=i Want this product Price is *"'. $product['p_price'] .'"* link: https://dev.servoxi.com/single?id="'.$product['p_id'].'" class="text-white" style="text-decoration: none;">buy now <span class="fa fa-whatsapp"></span></a></button>
								<div class="clear"> </div>
							</ul>
						</div>
					</div>';
				}
				?>
			</div>	
	     </div>
	   </div>
	  </div>
<?php
include_once(APP_DIR.'/Resources/views/partials/footer.php');
?>