<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Telemedicine</title>
	<meta name="description" content="Telemedicine Project for rural areas of Bangladesh, By BMPT"/> 
	<meta name="keywords" content="Telemedicine, Rural health care,BMPT"/>
	 <?php $this->load->view('includes/head'); ?> 
     <link rel="stylesheet" type="text/css" href="<?php echo $includes_dir?>css/sliderman.css" />
</head>

<body id="lite_library">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header_1'); ?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/menubar'); ?> 
	
	<!-- Intro Content -->
	<div class="content_wrap intro_bg">
		<div class="content clearfix"> 
			<div class="intro_text">
				<h1>Telemedicine Project</h1>
                <div align="right"> <label class="a"> <?php echo $this->session->userdata('hello') .  $this->session->userdata('uname') . "!" ?></label>
                </div>			
				<p class="a">It is an initiative to provide quality health service to the rural areas of Bangladesh</p>
				<p></p>
			</div>		
		</div>
	</div>

	<!-- Main Content -->
	<div class="content_wrap main_content_bg" >
		<div class="content main_content_bg parallel clearfix">
			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>	
			<div class="w76 frame parallel_target" >				
			<div id="slider_container_4">
				<div class="SliderName_4_left">
					<a href="javascript:void(0);" id="sliderPrevBtn">Previous</a>
				</div>
				<div id="SliderName_4" class="SliderName_4">
					<img src="<?php echo $includes_dir?>slide_image/1.jpg" width="700" height="300" alt="" title="" />
					<img src="<?php echo $includes_dir?>slide_image/2.jpg" width="700" height="300" alt="" title="" />
					<img src="<?php echo $includes_dir?>slide_image/3.jpg" width="700" height="300" alt="" title="" />
					<img src="<?php echo $includes_dir?>slide_image/4.jpg" width="700" height="300" alt="" title="" />
					<img src="<?php echo $includes_dir?>slide_image/5.jpg" width="700" height="300" alt="" title="" />
					<img src="<?php echo $includes_dir?>slide_image/6.jpg" width="700" height="300" alt="" title="" />
					<img src="<?php echo $includes_dir?>slide_image/7.jpg" width="700" height="300" alt="" title="" />
					<img src="<?php echo $includes_dir?>slide_image/8.jpg" width="700" height="300" alt="" title="" />
				</div>
				<div class="SliderName_4_right">
					<a href="javascript:void(0);" id="sliderNextBtn">Next</a>
				</div>
				<div class="c"></div>
				<div class="SliderName_4_navigation_outer" id="SliderName_4_navigation_outer">
					<div class="SliderName_4_navigation" id="SliderName_4_navigation"></div>
				</div>

				
				
			</div>	
			</div>

			<div class="w33 r_margin frame parallel_target">
				<h3 align="center">Login Panel</h6>
				<ul class="bullet">
					<li>
						<a href="<?php echo $base_url; ?>auth">Login</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>auth/register_account">Register for an Account</a>
					</li>
                  
					</ul>

				<hr/>
				<h3 align="center">Logout</h3>
				
				<ul class="bullet">
					<li>
					<a href="<?php echo $base_url;?>auth/logout">Logout</a>
				</li>
				</ul>

				<hr/>
				
				</ul>
			</div>
		</div>
	</div>

	<!-- Footer -->  
	<?php $this->load->view('includes/footer'); ?> 	
</div>

<!-- Scripts -->  
<?php $this->load->view('includes/scripts'); ?> 
<script src="<?php echo $includes_dir;?>js/sliderman.1.3.7.js"></script>
<script type="text/javascript">
					// this is a demo for more advanced users, who are familiar with JavaScript
					// also we're using jQuery library for easier selecting elements and bind actions to them.
					$(document).ready(function() {

						demo4Easing = { name: 'pow2', method: function(x) { return Math.pow(x,2); }};

						demo4Effect1 = {name: 'myEffect41', rows: 6, cols: 12, fade: true, easing: 'swing', order: 'cross', delay: 100, duration: 400};
						demo4Effect2 = {name: 'myEffect42', rows: 6, cols: 12, fade: true, easing: 'swing', order: 'cross', delay: 100, duration: 400, reverse: true};
						demo4Effect3 = {name: 'myEffect43', rows: 6, cols: 12, fade: true, easing: 'pow2', order: 'rectangle', delay: 200, duration: 1000};
						demo4Effect4 = {name: 'myEffect44', rows: 6, cols: 12, fade: true, easing: 'pow2', order: 'rectangle', delay: 200, duration: 1000, reverse: true};
						demo4Effect5 = {name: 'myEffect45', rows: 3, cols: 10, zoom: true, move: true, right: true, easing: 'swing', order: 'circle', delay: 150, duration: 800};
						demo4Effect6 = {name: 'myEffect46', rows: 3, cols: 10, zoom: true, move: true, left: true, easing: 'swing', order: 'circle', delay: 150, duration: 800, reverse: true};
						demo4Effect7 = {name: 'myEffect49', rows: 5, cols: 1, zoom: true, move: true, bottom: true, easing: 'bounce', order: 'circle', delay: 150, duration: 800};
						demo4Effect8 = {name: 'myEffect410', rows: 5, cols: 1, zoom: true, move: true, top: true, easing: 'bounce', order: 'circle', delay: 150, duration: 800, reverse: true};

						effectsDemo4 = [demo4Effect1,demo4Effect2,demo4Effect3,demo4Effect4,demo4Effect5,demo4Effect6,demo4Effect7,demo4Effect8];

						var demoSlider_4 = Sliderman.slider({
							container: 'SliderName_4',
							width: 700,
							height: 300,
							effects: effectsDemo4,
							display: {
								autoplay: 3000,
								autostart: true,
								first_slide: true,
								effects_order: 'effects'
							},
							events: {
								// after method will be executed after all animation is complete.
								after: function() {
									// removing active class from all links
									$("#SliderName_4_navigation").find("a").removeClass("active_page");
									// setting the active page class to the new slide.
									$("#SliderName_4_page_" + demoSlider_4.get('current')).addClass("active_page");
								}
							}
						});

						// building navigation manually
						var demoSlider_4TotalSlides = demoSlider_4.get('length');
						var demoSlider_4Navigation = $("#SliderName_4_navigation");

						// here we're *not* checking data for validness. this is only for illustration purposes.
						for (var i = 0; i < demoSlider_4TotalSlides; i++)
						{
							// adding pages to the navigation bar
							demoSlider_4Navigation.append('<a href="javascript:void()" class="SliderName_4_page" id="SliderName_4_page_' + i + '">' + (i+1) + '</a>');
						}
						$("#SliderName_4_page_0").addClass("active_page");
						demoSlider_4Navigation.css({'marginLeft': '-' + parseInt(demoSlider_4Navigation.width()/2) + 'px'}).fadeIn("fast");

						// next button click
						$("#sliderNextBtn").click(function() {
							demoSlider_4.next();
						});

						// previous button click
						$("#sliderPrevBtn").click(function() {
							demoSlider_4.prev();
						});

						// clicking on pages
						$("#SliderName_4_navigation").find("a.SliderName_4_page").click(function() {
							demoSlider_4.go( $(this).attr("id").replace("SliderName_4_page_", "") );
						});





					});

				</script>


</body>
</html>