<?php include_once(APP_DIR.'/Resources/views/partials/head.php');
?>
	<div class="banner">
	<!-- start slider -->
       <div id="fwslider">
         <div class="slider_container">
            <div class="slide"> 
               <img src="images/slider1.jpg" class="responsive-image" alt=""/>
            </div>
            <div class="slide">
               <img src="images/slider2.jpg" class="responsive-image" alt=""/>
            </div>
           <div class="slide">
               <img src="images/slider3.jpg" class="responsive-image" alt=""/>
          </div>
          <div class="slide">
               <img src="images/slider4.jpg" class="responsive-image" alt=""/>
          </div>
          <div class="slide">
               <img src="images/slider5.jpg" class="responsive-image" alt=""/>
          </div>
          <div class="slide">
               <img src="images/slider6.jpg" class="responsive-image" alt=""/>
          </div>
          <div class="slide">
               <img src="images/slider7.jpg" class="responsive-image" alt=""/>
          </div>
    </div>
        <!--/slide -->
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
       </div>
       <!--/slider -->
      </div>
	  <div class="main">
		<div class="content-top">
			<h2>Arfa Enterprises</h2>
			<div class="close_but"><i class="close1"> </i></div>
				<ul id="flexiselDemo3">
				<li><a href="/shop"><img src="images/board1.jpg"/></a></li>
				<li><a href="/shop"><img src="images/board2.jpg" /></a></li>
				<li><a href="/shop"><img src="images/board3.jpg" /></a></li>
				<li><a href="/shop"><img src="images/board4.jpg" /></a></li>
				<li><a href="/shop"><img src="images/board5.jpg" /></a></li>
				<li><a href="/shop"><img src="images/board6.jpg"/></a></li>
				<li><a href="/shop"><img src="images/board7.jpg" /></a></li>
				<li><a href="/shop"><img src="images/board8.jpg" /></a></li>
				<li><a href="/shop"><img src="images/board9.jpg" /></a></li>
				<li><a href="/shop"><img src="images/board10.jpg" /></a></li>
			</ul>
		<h3>New Duffle Extreme Series</h3>
			<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
		</script>
		<script type="text/javascript" src="js/jquery.flexisel.js"></script>
		</div>
	</div>
	<div class="content-bottom">
		<div class="container">
			<div class="row content_bottom-text">
			  <div class="col-md-7">
				<h3>ARFA<br>Enterprises</h3>
				<p class="m_1">Bag Business is here to help you get ready for a day out or night on the town. With our wide range of bags that are versatile, stylish and well made we are sure to have something you love.</p>
				<p class="m_2">We’re a simple bag company that believes in quality, integrity and sustainability. We believe in supporting small businesses by purchasing their goods and we want to spread love, kindness and beauty through our products.</p>
			  </div>
			</div>
		</div>
	</div>
<?php
include_once(APP_DIR.'/Resources/views/partials/footer.php');
?>