<?php include_once(APP_DIR.'/Resources/views/partials/head.php');?>
<body>
     <div class="main">
      <div class="shop_top">
		<div class="container">
			<div class="col-md-6">
				<div class="login-page">
					<h4 class="title">Admin Login</h4>
					<div id="loginbox" class="loginbox">
						<?php 
						if(!empty($errors)){
								echo ' 
							<b style="color:red;">'.$errors.'</b>';
						}
						?>
						<form action="/admin" method="post" name="login" id="login-form">
						  <fieldset class="input">
						    <p id="login-form-username">
						      <label for="modlgn_username">usernmae</label>
						      <input id="modlgn_username" type="text" name="username" class="inputbox" size="18" autocomplete="off">
						    </p>
						    <p id="login-form-password">
						      <label for="modlgn_passwd">Password</label>
						      <input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18" autocomplete="off">
						    </p>
						    <div class="remember">
							    <p id="login-form-remember">
							      <label for="modlgn_remember"><a href="#">Forget Your Password ? </a></label>
							   </p>
							    <input type="submit" name="login" class="button" value="login"><div class="clear"></div>
							 </div>
						  </fieldset>
						 </form>
					</div>
					<div class="button1">
					   <a href="/register"><input type="submit" name="Submit" value="Create an Account"></a>
					 </div>
					<div class="clear"></div>
				  </div>
				</div>
			</div>
		  </div>
	  </div>
<?php include_once(APP_DIR.'/Resources/views/partials/footer.php');?>