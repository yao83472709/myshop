<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Home</title>
<link href="<?php echo $base_url?>css2/bootstrap.css" rel='stylesheet' type='text/css' media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo $base_url?>js2/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<link href="<?php echo $base_url?>css2/style.css" rel='stylesheet' type='text/css' media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Google Fonts -->
<link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo $base_url?>css2/sticky-navigation.css" />
<link href="<?php echo $base_url?>css2/demo.css" rel="stylesheet" type="text/css" />
<script>
$(function() {

	// grab the initial top offset of the navigation 
	var sticky_navigation_offset_top = $('#sticky_navigation').offset().top;
	
	// our function that decides weather the navigation bar should have "fixed" css position or not.
	var sticky_navigation = function(){
		var scroll_top = $(window).scrollTop(); // our current vertical position from the top
		
		// if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
		if (scroll_top > sticky_navigation_offset_top) { 
			$('#sticky_navigation').css({ 'position': 'fixed', 'top':0, 'left':0 });
		} else {
			$('#sticky_navigation').css({ 'position': 'relative' }); 
		}   
	};
	
	// run our function on load
	sticky_navigation();
	
	// and run it again every time you scroll
	$(window).scroll(function() {
		 sticky_navigation();
	});
	
	// NOT required:
	// for this demo disable all links that point to "#"
	$('a[href="#"]').click(function(event){ 
		event.preventDefault(); 
	});
	
});
</script>
</head>
<body>
	<!-- Header Part Starts Here -->
	<div class="class" style=" display:none;z-index:1000;border: #222222 1px solid; width: 1076px;height: 300px;position:fixed ;left: 254px;top:93px;background:#222222; ">
		<ul style="width: 1000px;height: 280px;margin-left:37px;margin-top: 10px">
			<?php
				//var_dump($catelist);
			foreach($catelist as $value){
			if($value !=''){
				echo'<li style="list-style: none;color:white;float: left;margin-left: 10px;"><a style="color:white;text-decoration: none;" href="blog/catelist/'.$value['id'].'">'.$value['catelistname'].'</a> | </li>';
				}
			}
			?>
		</ul>
	</div>
<div class="header">

	<div class="container">
	<div id="demo_top_wrapper">
	<div id="sticky_navigation_wrapper">
		<div id="sticky_navigation">
			<div class="demo_container navigation-bar">
				<div class="navigation">
					<div class="logo"><a href="index.html">CLASS</a></div>
					<span class="menu"></span>
					<script>
						$( "span.menu" ).click(function() {
						  $( ".navig" ).slideToggle( "slow", function() {
						    // Animation complete.
						  });
						});
					</script>
					<div class="clearfix"></div>
				</div>
				<div class="navigation-right">
					<ul class="user">
						<li>
							<span></span><a href="login">Log In</a>
						</li>
						<li>
							<span class="bascket"></span><a href="bascket.html">Basket(0)</a>
						</li>
						<li>
							<button class="search"></button>
						</li>
					</ul>
				</div>
				<div class="clearfix"></div>
				<div class="serch">
								<span>
									<input type="text" placeholder="Search" required="">
									<input type="submit" value="" />
								</span>
				</div>
				<script>
					$( "button.search" ).click(function() {
					  $( ".serch" ).slideToggle( "slow", function() {
					    // Animation complete.
					  });
					});
				</script>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<div class="container">
<section id="main">
	<div class="content">
		<!-- Banner Starts Here --->
		<div class="banner">
			<h1>Hazy Shade of spring</h1>
			<small>Quisque lorem tortor fringilla sed, vestibulum id, eleifend justo.</small>
			<div class="ban-btn">
				<a href="#">check new arrivals</a>
			</div>
		</div>
		<!-- Banner Ends Here --->
		<!-- Gallery Starts Here --->
		<div class="gallery">
			<div class="gallery-row">
				<div class="gallery-grid">
					<div class="grid-top img-pos"><img src="<?php echo $base_url?>images2/p1.jpg" alt="" class="img-responsive">
						<div class="img-caption">
							<p>HEATHER <br>GREY BASICS</p>
							<small>New Arrival</small>
						</div>
					</div>
					<div class="grid-bot img-pos"><img src="<?php echo $base_url?>images2/p2.jpg" alt="" class="img-responsive"><div class="img-caption"></div></div>
				</div>
				<div class="gallery-grid1">
					<div class="grid1-row1">
						<div class="g1-r2">
							<div class="twit t-wit">
								<span class="line"></span>
								<i class="twit-icon"></i>
								<span class="line"></span>
								<p>Opening Ceremony @IndonesiaFW tomorrow, PMers! Are you ready for the biggest fashion movement in</p>
								<small>@PuspitaMarthaID </small>
							</div>
							<div class="twit img-pos"><img src="<?php echo $base_url?>images2/p3.jpg" alt="" class="img-responsive"><div class="img-caption"></div></div>
							<div class="clearfix"></div>
						</div>
						<div class="g1-r2">
							<div class="twit img-pos"><img src="<?php echo $base_url?>images2/p4.jpg" alt="" class="img-responsive">
								<div class="img-caption jk-t">
									<p>chuck taylors</p>
									<small>$125.00</small>
								</div>
							</div>
							<div class="twit t-wit">
								<span class="line"></span>
								<i class="twit-icon"></i>
								<span class="line"></span>
								<p>Girls, Girls, Girls: A Look Back at 50 Years of the Pirelli Calendar</p>
								<small>@Vogue</small>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="grid1-row2">
						<div class="twit t-hat">
							<i class="aarow"></i>
							<p>Jaxon Hat</p>
							<small>Beanie Hat</small>
						</div>
						<div class="twit img-pos"><img src="<?php echo $base_url?>images2/p5.jpg" alt="" class="img-responsive">
							<div class="img-caption jk-t">
									<p>basic blazer</p>
									<small>from $199.00</small>
								</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="gallery-grid">
					<div class="grid-bot t-hat">
						<i class="aarow"></i>
						<p>elegant shoes</p>
						<small>BRAIDED LEATHER</small>
					</div>
					<div class="grid-top img-pos"><img src="<?php echo $base_url?>images2/p6.jpg" alt="" class="img-responsive respon">
						<div class="img-caption">
							<p>jeans for<br>ADVENTURE</p>
							<small>New Arrival</small>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- Gallery Ends Here --->
		<!--- Subscribe Bar Starts here -->
		<div class="subscribe">
			<h3>sign up to receive our updates</h3>
			<p>Nulla ipsum dolor lacus, suscipit adipiscing. Cum sociis natoque penatibus et ultrices volutpat.</p>
			<div class="sub-bar">
				<span>
					<input type="text"  placeholder="Your e-mail" required="" />
					<input type="submit" value="add" />
				</span>
			</div>
		</div>
		<!--- Subscribe Bar Ends here -->
		<!-- Partners Starts Here --->
		<div class="partner">
				<ul id="flexiselDemo3">
				   <li><img src="<?php echo $base_url?>images2/ss1.jpg" class="img-responsive" alt=""/></li>
				   <li><img src="<?php echo $base_url?>images2/ss2.jpg" class="img-responsive" alt=""/></li>
				   <li><img src="<?php echo $base_url?>images2/ss3.jpg" class="img-responsive" alt=""/></li>
				   <li><img src="<?php echo $base_url?>images2/ss4.jpg" class="img-responsive" alt=""/></li>
				   <li><img src="<?php echo $base_url?>images2/ss5.png" class="img-responsive" alt=""/></li>
				</ul>
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
	         <script type="text/javascript" src="<?php echo $base_url?>js2/jquery.flexisel.js"></script>
		</div>
		<!-- Partners Ends Here --->
		<!-- Footer Menu Starts here --->
		<div class="footer">
			<div class="row footer-row">
				<div class="col-md-3 footer-col">
					<h3 class="ft-title">Collection</h3>
					<ul class="ft-list">
						<li><a href="#">Woman (1725)</a></li>
						<li><a href="#">Men (635)</a></li>
						<li><a href="#">Kids (2514</a></li>
						<li><a href="#">Comming Soon (76)</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-col">
					<h3 class="ft-title">site</h3>
					<ul class="ft-list  list-h">
						<li><a href="#">Terms of Service </a></li>
						<li><a href="#">Privacy Policy </a></li>
						<li><a href="#">Copyright Policy </a></li>
						<li><a href="#">Press Kit</a></li>
						<li><a href="#">Support</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-col">
					<h3 class="ft-title">Shop</h3>
					<ul class="ft-list list-h">
						<li><a href="#">About us</a></li>
						<li><a href="#">Shipping Metods</a></li>
						<li><a href="#">Career</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
				<div class="col-md-3 foot-cl">
					<h3 class="ft-title">social</h3>
					<p>Shoper is made with love in Warsaw,<br>Copyright &copy; 2014.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
					<ul class="social">
						<li><i class="fa"></i></li>
						<li><i class="tw"></i></li>
						<li><i class="is"></i></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- Footer Menu Ends here --->
	</div>
</section>
</div>
	<!-- Header Part Starts Here -->
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>

</body>
<script>
	$('.logo').mouseover(function(){
		//document.write('123');
		$('.class').slideDown();
	});
	$('.logo').mouseout(function(){
		$('.class').hide();
	});
	$('.class').mouseover(function(){
		$('.class').show();
	});
	$('.class').mouseout(function(){
		$('.class').hide();
	})


</script>
</html>