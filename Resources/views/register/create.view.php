<?php include_once(APP_DIR.'/Resources/views/partials/head.php');
?>
<div class="main">
	<div class="shop_top">
		<div class="container">
			<form action="/register" method="post">
			<div class="row">
				<div class="mx-auto col-10 col-md-8 col-lg-6">
				<div class="mb-3">
				<?php 
				if(!empty($errors)){
						echo ' 
					<b style="color:red;">'.$errors.'</b>';
				}
				?>
				</div>
				 <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Name</label>
					<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
				  </div>
				  <div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
				  </div>
				  <div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" name="password">
				  </div>
				  <div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Confrim Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" name="cnf_password">
				  </div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary align-item-center" value="true" name="register">Submit</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<?php include_once(APP_DIR.'/Resources/views/partials/footer.php');?>