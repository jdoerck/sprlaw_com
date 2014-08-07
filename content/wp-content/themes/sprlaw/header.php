<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> style="margin-top: 0 !important;">
<head>
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<meta charset="<?php bloginfo('charset'); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<title><?php
		if(is_search() || is_main_query()) {
			echo 'Search Results | ' . bloginfo('name');
		} else {
			wp_title( '&laquo;', true, 'right' );
		}
		?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php bloginfo('template_directory'); ?>/bootstrap/css/bootstrap.css" rel="stylesheet"
		  media="screen">
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900' rel='stylesheet'
		  type='text/css'>
	<link href="<?php bloginfo('template_directory'); ?>/_css/style.css" rel="stylesheet" media="screen">

	<!--[if lte IE 8]>
	<script src="<?php echo bloginfo('template_directory'); ?>/_js/html5shiv.min.js" type="text/javascript"></script>
	<script src="<?php echo bloginfo('template_directory'); ?>/_js/respond.min.js" type="text/javascript"></script>
	<link href="<?php bloginfo('template_directory'); ?>/_css/ie.css" rel="stylesheet" media="screen">
	<![endif]-->
	<?php wp_head(); ?>
	<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-50576928-1', 'sprlaw.com'); ga('send', 'pageview');</script>
</head>
<?php

$body_class = "";

if(is_mobile()){
	$body_class = "mobile";
}
if(is_ipad()){
	$body_class = "ipad";
}
?>
<body <?php body_class($body_class); ?>>
<div id="grey-out"> </div>
<header id="branding" role="banner" class="<?php if(is_mobile()){ echo 'mobile'; } ?>">
	<div class="container">
		<div class="row">
			<div class="span12">

				<?php
				if(is_front_page()):
					$logo = 'h1';
				else:
					$logo = 'h2';
				endif; ?>

				<a href="<?php echo esc_url(home_url('/')); ?>"><img class="logo" src="<?php echo bloginfo('template_directory'); ?>/_i/logo2.png"><<?php echo $logo; ?> class="logo <?php if(is_mobile()){ echo 'mobile'; } ?><?php if(is_ipad()){ echo 'ipad'; } ?>"><span>Sive, Paget &amp; Riesel, P.C.</span></<?php echo $logo; ?>></a>


				<ul id="main_links" class="nav nav-tabs <?php if(is_mobile()){ echo 'mobile'; } ?><?php if(is_ipad()){ echo 'ipad'; } ?>">

					<?php if (!is_mobile()): ?><li class="about"><a <?php if (get_the_ID() == 2135) {
							echo 'class="active" ';
						} ?>href="<?php echo get_permalink(2135); ?>">About Us</a></li><?php endif; ?><li class="main-link"><a id="main_attorneys_link" class="show_subnav  <?php if (get_the_ID() == 2214 || get_post_type() == 'attorney') {
							echo ' important';
						} ?>" href="<?php echo get_permalink(2214); ?>">Attorneys</a></li><li class="main-link"><a id="main_expertise_link" class="show_subnav  <?php if (get_the_ID() == 2770 || get_post_type() == 'expertise') {
							echo ' important';
						} ?>" href="<?php echo get_permalink(2770); ?>">Expertise</a></li><li class="main-link"><a id="main_results_link" class="show_subnav <?php if (get_the_ID() == 2180  || get_post_type() == 'result') {
							echo ' important';
						} ?>" href="<?php echo get_permalink(2180); ?>">Results</a></li><?php if (!is_mobile()): ?><li class="blog"><a <?php if (get_the_ID() == 2123 || is_archive()) {
							echo 'class="active" ';
						} ?>href="<?php echo get_permalink(2143); ?>">Blog</a></li><?php endif; ?><li id="options"> </li>
				</ul>
			</div>
		</div>
	</div>
	</div>
</header>
<!-- #branding -->
<?php if (!is_mobile()): ?>
	<ul id="quick_links" class="nav-tabs nav <?php if(is_mobile()){ echo 'mobile'; } ?><?php if(is_ipad()){ echo 'ipad'; } ?>">

		<li class="contact"><a <?php if (get_the_ID() == 2575) {
				echo 'class="active" ';
			} ?>href="<?php echo get_permalink(2575); ?>">Contact</a></li>
		<!-- <li class="publications"><a <?php if (get_the_ID() == 2175) {
			echo 'class="active" ';
		} ?>href="<?php echo get_permalink(2175); ?>">Publications</a></li> -->
		<li class="pro_bono"><a <?php if (get_the_ID() == 2139) {
				echo 'class="active" ';
			} ?>href="<?php echo get_permalink(2139); ?>">Pro Bono</a></li>
		<li class="community"><a <?php if (get_the_ID() == 2137) {
				echo 'class="active" ';
			} ?>href="<?php echo get_permalink(2137); ?>">Community</a></li>
		<li class="careers"><a <?php if (get_the_ID() == 2141) {
				echo 'class="active" ';
			} ?>href="<?php echo get_permalink(2141); ?>">Careers</a></li>
		<li class="search"> </li>
	</ul>
<?php else: ?>
	<ul id="quick_links" class="nav nav-tabs <?php if(is_mobile()){ echo 'mobile'; } ?><?php if(is_ipad()){ echo 'ipad'; } ?>">
		<li class="contact"><a <?php if (get_the_ID() == 2575) {
				echo 'class="active" ';
			} ?>href="<?php echo get_permalink(2575); ?>">Contact</a></li><li class="blog"><a <?php if (get_the_ID() == 2123 || is_archive()) {
				echo 'class="active" ';
			} ?>href="<?php echo get_permalink(2143); ?>">Blog</a></li><li class="about"><a <?php if (get_the_ID() == 2135) {
				echo 'class="active" ';
			} ?>href="<?php echo get_permalink(2135); ?>">About Us</a></li><li class="options"> </li><li class="careers"><a <?php if (get_the_ID() == 2141) {
				echo 'class="active" ';
			} ?>href="<?php echo get_permalink(2141); ?>">Careers</a></li><li class="pro_bono"><a <?php if (get_the_ID() == 2139) {
				echo 'class="active" ';
			} ?>href="<?php echo get_permalink(2139); ?>">Pro Bono</a></li><!--<li class="publications"><a <?php if (get_the_ID() == 2175) {
			echo 'class="active" ';
		} ?>href="<?php echo get_permalink(2175); ?>">Publications</a></li>--><li class="options"> </li>
		<form method="get" id="hdr_searchform" action="/"><input id="s" type="search" name="s" placeholder="Search" class="active" style="background: url('_i/icon_mag_glass.png') no-repeat #FFF !important;width: 100% !important; color: #000;text-align: center;letter-spacing: .3em;"></form>
	</ul>

<?php endif; ?>

<div id="main_links_info" class="<?php if(is_mobile()){ echo 'mobile'; } ?><?php if(is_ipad()){ echo 'ipad'; } ?>">
	<div class="container">
		<div class="row">

			<div class="main_expertise_link">

			</div>
			<div class="main_results_link">

			</div>
			<div class="main_attorneys_link">

			</div>
		</div>
	</div>
</div>
