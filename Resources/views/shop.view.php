<?php include_once(APP_DIR.'/Resources/views/partials/head.php');
?>

<style>
.product-image {
  width: 306px;
  height: 200px;
  object-fit: cover;
  border-radius: 1px
}
</style>
     <div class="main">
      <div class="shop_top">
		<div class="container">
			<div class="row shop_box-top">
			<?php 
			//r_print($products);die();
			// r_print($img);die();
				if(empty($products)){
					echo "
					<h5> Sorry No Products found ....</h5>";
				}
				foreach($products as $product){
					echo '
					<div class="col-md-3 shop_box m-2">
						<a href="/single?id='.$product['p_id'].'">
							<img class="product-image " src="/images/'.$product['p_main_img'].'" width="auto" height="200" class="img-responsive" alt="'.$product['p_main_img'].'"/>
							<div class="shop_desc">
								<h3><a href="/single?id='.$product['p_id'].'">'.$product['p_name'].'</a></h3>
								<p>'.$product['p_desc'].'</p>
								<span class="actual">₹'.$product['p_price'].'</span><br>
								<ul class="buttons">
									<li class="cart"><a href="https://wa.me/+91123456778?text=hello">Whatsapp</a></li>
									<div class="clear"> </div>
								</ul>';
								if(!empty($_SESSION['user'])){
									echo'
									<a href="/delete?id='.$product['p_id'].'" style="color:red;"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
									<a href="/update?id='.$product['p_id'].'"><i class="fa fa-pencil  fa-lg" aria-hidden="true"></i></a>';
								}
								echo'
							</div>
						</a>
					</div>';
				}?>
			</div>
		 </div>
	   </div>
	  </div>
<?php
include_once(APP_DIR.'/Resources/views/partials/footer.php');
?>