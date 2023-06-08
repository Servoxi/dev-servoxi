<div class="menu">
  <a class="toggleMenu" href="/"><img src="images/nav.png" alt="" /></a>
	<ul class="nav" id="nav" style="display: block;">
		<li><a href="/">Home</a></li>
		<li><a href="shop">Products</a></li>
		<li><a href="contact">Contact Us</a></li>								
		<li><a href="about">About Us</a></li>
		<?php 
		if(!empty($_SESSION['user']['username'])){
            echo '
			<li><a href="/add_product">Add Product</a></li>
			<li><a href="/logout">Logout</a></li>';
		}?>
		<div class="clear"></div>
	</ul>
	<script type="text/javascript" src="js/responsive-nav.js"></script>
</div>		