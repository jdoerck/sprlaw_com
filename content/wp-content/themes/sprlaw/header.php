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


				<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr expertise environmental">
					<thead>
					<tr><th>Environmental Law &amp; Litigation</th></tr>
					</thead>
					<tbody><tr><td><a href="http://www.sprlaw.com/expertise/environmental-law-litigation/solid-and-hazardous-waste/">Solid and Hazardous Waste</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/environmental-law-litigation/climate-change/">Climate Change</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/environmental-law-litigation/alternative-energy/">Alternative Energy</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/environmental-law-litigation/federal-and-state-superfund/">Federal and State Superfund</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/environmental-law-litigation/toxic-tort-litigation/">Toxic Tort Litigation</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/environmental-law-litigation/underground-storage-tanks-oil-spill-litigation/">Underground Storage Tanks &amp; Oil Spill Litigation</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/environmental-law-litigation/enforcement/">Enforcement, Criminal Prosecutions</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/environmental-law-litigation/transactional-due-diligence/">Transactional Due Diligence</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/environmental-law-litigation/compliance-audits/">Compliance Audits</a></td></tr>	</tbody></table>
				<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr expertise develop">
					<thead>
					<tr><th>Development and Land Use</th></tr>
					</thead>
					<tbody><tr><td><a href="http://www.sprlaw.com/expertise/development-and-land-use-2/brownfields-redevelopment/">Brownfields Redevelopment</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/development-and-land-use-2/construction-law/">Construction Law</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/development-and-land-use-2/environmental-review-permitting-and-litigation-for-government-sponsored-developments/">Environmental Review, Permitting and Litigation for Government-Sponsored Developments</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/development-and-land-use-2/environmental-review-permitting-and-litigation-for-private-commercial-developments/">Environmental Review, Permitting and Litigation for Private Commercial Developments</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/development-and-land-use-2/new-york-city-e-designation-compliance/">New York City (E) Designation Compliance</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/development-and-land-use-2/permitting-for-industrial-facilities/">Permitting for Industrial Facilities</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/development-and-land-use-2/wetlands-and-stormwater/">Wetlands and Stormwater</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/development-and-land-use-2/zoning-and-land-use/">Zoning and Land Use</a></td></tr>	</tbody></table>
				<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr expertise municipal">
					<thead>
					<tr><th>Municipal Law</th></tr>
					</thead>
					<tbody><tr><td><a href="http://www.sprlaw.com/expertise/municipal-law-2/code-and-charter-revision/">Code and Charter Revision</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/municipal-law-2/civil-rights-and-personnel-litigation/">Civil Rights and Personnel Litigation</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/municipal-law-2/intra-governmental-disputes/">Intra-Governmental Disputes</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/municipal-law-2/special-districts/">Special Districts</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/municipal-law-2/tort-liability/">Tort Liability</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/municipal-law-2/open-meetingsfreedom-of-information/">Open Meetings/Freedom of Information</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/municipal-law-2/ethics/">Ethics</a></td></tr>	</tbody></table>
				<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr expertise other">
					<thead>
					<tr><th>Other</th></tr>
					</thead>
					<tbody><tr><td><a href="http://www.sprlaw.com/expertise/general-litigation-2/">General Litigation</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/employment-litigation-2/">Employment Litigation</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/alternative-dispute-resolution-2/">Alternative Dispute Resolution</a></td></tr><tr><td><a href="http://www.sprlaw.com/expertise/indian-law/">Indian Law</a></td></tr>	</tbody></table>


				<select name="expertise-link" class="mobile-select">
					<option value="">-- choose an area of expertise --</option>
					<!--<option value="">Environmental Law &amp; Litigation</option>-->
					<option value="http://www.sprlaw.com/expertise/environmental-law-litigation/solid-and-hazardous-waste/">Solid and Hazardous Waste</option><option value="http://www.sprlaw.com/expertise/environmental-law-litigation/climate-change/">Climate Change</option><option value="http://www.sprlaw.com/expertise/environmental-law-litigation/alternative-energy/">Alternative Energy</option><option value="http://www.sprlaw.com/expertise/environmental-law-litigation/federal-and-state-superfund/">Federal and State Superfund</option><option value="http://www.sprlaw.com/expertise/environmental-law-litigation/toxic-tort-litigation/">Toxic Tort Litigation</option><option value="http://www.sprlaw.com/expertise/environmental-law-litigation/underground-storage-tanks-oil-spill-litigation/">Underground Storage Tanks &#038; Oil Spill Litigation</option><option value="http://www.sprlaw.com/expertise/environmental-law-litigation/enforcement/">Enforcement, Criminal Prosecutions</option><option value="http://www.sprlaw.com/expertise/environmental-law-litigation/transactional-due-diligence/">Transactional Due Diligence</option><option value="http://www.sprlaw.com/expertise/environmental-law-litigation/compliance-audits/">Compliance Audits</option>
					<!--<option value="">Development and Land Use</option>-->
					<option value="http://www.sprlaw.com/expertise/development-and-land-use-2/brownfields-redevelopment/">Brownfields Redevelopment</option><option value="http://www.sprlaw.com/expertise/development-and-land-use-2/construction-law/">Construction Law</option><option value="http://www.sprlaw.com/expertise/development-and-land-use-2/environmental-review-permitting-and-litigation-for-government-sponsored-developments/">Environmental Review, Permitting and Litigation for Government-Sponsored Developments</option><option value="http://www.sprlaw.com/expertise/development-and-land-use-2/environmental-review-permitting-and-litigation-for-private-commercial-developments/">Environmental Review, Permitting and Litigation for Private Commercial Developments</option><option value="http://www.sprlaw.com/expertise/development-and-land-use-2/new-york-city-e-designation-compliance/">New York City (E) Designation Compliance</option><option value="http://www.sprlaw.com/expertise/development-and-land-use-2/permitting-for-industrial-facilities/">Permitting for Industrial Facilities</option><option value="http://www.sprlaw.com/expertise/development-and-land-use-2/wetlands-and-stormwater/">Wetlands and Stormwater</option><option value="http://www.sprlaw.com/expertise/development-and-land-use-2/zoning-and-land-use/">Zoning and Land Use</option>
					<!--<option value="">Municipal Law</option>-->
					<option value="http://www.sprlaw.com/expertise/municipal-law-2/code-and-charter-revision/">Code and Charter Revision</option><option value="http://www.sprlaw.com/expertise/municipal-law-2/civil-rights-and-personnel-litigation/">Civil Rights and Personnel Litigation</option><option value="http://www.sprlaw.com/expertise/municipal-law-2/intra-governmental-disputes/">Intra-Governmental Disputes</option><option value="http://www.sprlaw.com/expertise/municipal-law-2/special-districts/">Special Districts</option><option value="http://www.sprlaw.com/expertise/municipal-law-2/tort-liability/">Tort Liability</option><option value="http://www.sprlaw.com/expertise/municipal-law-2/open-meetingsfreedom-of-information/">Open Meetings/Freedom of Information</option><option value="http://www.sprlaw.com/expertise/municipal-law-2/ethics/">Ethics</option>
					<!--<option value="">Other</option>-->
					<option value="http://www.sprlaw.com/expertise/general-litigation-2/">General Litigation</option><option value="http://www.sprlaw.com/expertise/employment-litigation-2/">Employment Litigation</option><option value="http://www.sprlaw.com/expertise/alternative-dispute-resolution-2/">Alternative Dispute Resolution</option><option value="http://www.sprlaw.com/expertise/indian-law/">Indian Law</option>	</select>



			</div>
			<div class="main_results_link">


				<table border="0" cellspacing="0" cellpadding="0" style="width: 100%" id="result_table" class="tablesorter table-spr"><thead><tr><th class="featured_results  header">Featured Results</th><th class="category  header">Category</th><th class="date  header headerSortUp">Year</th><th class="location  header">Location</th></tr></thead><tbody>
					<tr>
						<td><a href="http://www.sprlaw.com/result/wholefoods-supermarket-gowanus-brooklyn/">Whole Foods Supermarket – Gowanus, Brooklyn</a></td>
						<td>Wetlands and Stormwater</td>
						<td>2014</td>
						<td>Brooklyn,&nbsp;NY</td>
					</tr><tr>
						<td><a href="http://www.sprlaw.com/result/redevelopment-of-former-domino-sugar-factory/">Redevelopment of Former Domino Sugar Factory</a></td>
						<td>Environmental Review, Permitting and Litigation for Private Developments</td>
						<td>2014</td>
						<td>Brooklyn,&nbsp;NY</td>
					</tr><tr>
						<td><a href="http://www.sprlaw.com/result/queens-west-development-corporation/">Queens West Development Corporation</a></td>
						<td>Brownfields Redevelopment</td>
						<td>2014</td>
						<td>Long&nbsp;Island&nbsp;City,&nbsp;NY</td>
					</tr><tr>
						<td><a href="http://www.sprlaw.com/result/bayonne-bridge-navigational-clearance-program/">Bayonne Bridge Navigational Clearance Program</a></td>
						<td>Environmental Review, Permitting and Litigation for Government-Sponsored Developments</td>
						<td>2014</td>
						<td>Bayonne,&nbsp;NJ</td>
					</tr><tr>
						<td><a href="http://www.sprlaw.com/result/new-york-yankees/">New York Yankees</a></td>
						<td>Development and Land Use</td>
						<td>2009</td>
						<td>Bronx,&nbsp;NY</td>
					</tr><tr>
						<td><a href="http://www.sprlaw.com/result/atlantic-yards/">Atlantic Yards</a></td>
						<td>Municipal Law</td>
						<td>2008</td>
						<td>Brooklyn,&nbsp;NY</td>
					</tr><tr>
						<td><a href="http://www.sprlaw.com/result/georgetown-company/">Georgetown Company</a></td>
						<td>Brownfields Redevelopment</td>
						<td>2007</td>
						<td>New&nbsp;York,&nbsp;NY</td>
					</tr><tr>
						<td><a href="http://www.sprlaw.com/result/chappaqua-central-school-district/">Chappaqua Central School District</a></td>
						<td>Environmental Review, Permitting and Litigation for Government-Sponsored Developments</td>
						<td>2003</td>
						<td>Chappaqua,&nbsp;NY</td>
					</tr></tbody>
<!--					<tfoot>-->
<!--					<tr><td colspan="4" class="show_more_results"><a href="/results/" id="more_results">+ More Results</a></td></tr>-->
<!--					</tfoot>-->

				</table>

				<select name="result" class="mobile-select">
					<option value="">-- choose --</option>
					<option value="http://www.sprlaw.com/result/wholefoods-supermarket-gowanus-brooklyn/">Whole Foods Supermarket &#8211; Gowanus, Brooklyn</option><option value="http://www.sprlaw.com/result/redevelopment-of-former-domino-sugar-factory/">Redevelopment of Former Domino Sugar Factory</option><option value="http://www.sprlaw.com/result/queens-west-development-corporation/">Queens West Development Corporation</option><option value="http://www.sprlaw.com/result/new-york-yankees/">New York Yankees</option><option value="http://www.sprlaw.com/result/georgetown-company/">Georgetown Company</option><option value="http://www.sprlaw.com/result/chappaqua-central-school-district/">Chappaqua Central School District</option><option value="http://www.sprlaw.com/result/bayonne-bridge-navigational-clearance-program/">Bayonne Bridge Navigational Clearance Program</option><option value="http://www.sprlaw.com/result/atlantic-yards/">Atlantic Yards</option>	</select>

				<div class="view_all">
					<hr>
					<a href="/results" class="view_all">View All On Single Page</a>
				</div>



			</div>
			<div class="main_attorneys_link">


				<div class="atty_list">
					<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr attorney principal first">
						<thead>
						<tr><th>Principals</th>
						</tr></thead>
						<tbody>
						<tr><td><a href="http://www.sprlaw.com/attorney/steven-barshov/">Steven Barshov</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/michael-s-bogin/">Michael S. Bogin</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/paul-d-casowitz/">Paul D. Casowitz</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/mark-a-chertok/">Mark A. Chertok</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/dan-chorost/">Dan Chorost</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/jennifer-coghlan/">Jennifer Coghlan</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/john-patrick-curran/">John-Patrick Curran</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/pamela-r-esterman/">Pamela R. Esterman</a></td></tr>	</tbody>
					</table>
					<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr attorney principal second">
						<thead>
						<tr><th>&nbsp;</th>
						</tr></thead>
						<tbody>
						<tr><td><a href="http://www.sprlaw.com/attorney/scott-furman/">Scott Furman</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/jeffery-b-gracer/">Jeffrey B. Gracer</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/elizabeth-knauer/">Elizabeth Knauer</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/christine-m-leas/">Christine M. Leas</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/david-paget/">David Paget</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/daniel-riesel/">Daniel Riesel</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/david-s-yudelson/">David S. Yudelson</a></td></tr>	</tbody>
					</table>
				</div>
				<div class="atty_list">
					<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr attorney associate">
						<thead>
						<tr><th>Associates</th>
						</tr></thead>
						<tbody>
						<tr><td><a href="http://www.sprlaw.com/attorney/jonathan-kalmuss-katz/">Jonathan Kalmuss-Katz</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/maggie-macdonald/">Maggie Macdonald</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/dan-mach/">Daniel Mach</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/devin-mcdougall/">Devin McDougall</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/priya-murthy/">Priya Murthy*</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/edward-roggenkamp/">Edward Roggenkamp</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/adam-stolorow/">Adam Stolorow</a></td></tr><tr><td><a href="http://www.sprlaw.com/attorney/victoria-s-treanor/">Victoria S. Treanor</a></td></tr>	</tbody>
					</table>
					<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr attorney counsel">
						<thead>
						<tr><th>Of Counsel</th>
						</tr></thead>
						<tbody>
						<tr><td><a href="http://www.sprlaw.com/attorney/michael-j-lesser/">Michael J. Lesser</a></td></tr>	</tbody>
					</table>
				</div>

				<select name="attorney" class="mobile-select">
					<option value="">-- choose an attorney --</option>
					<option value="http://www.sprlaw.com/attorney/steven-barshov/">Steven Barshov</option><option value="http://www.sprlaw.com/attorney/michael-s-bogin/">Michael S. Bogin</option><option value="http://www.sprlaw.com/attorney/paul-d-casowitz/">Paul D. Casowitz</option><option value="http://www.sprlaw.com/attorney/mark-a-chertok/">Mark A. Chertok</option><option value="http://www.sprlaw.com/attorney/2490/">Dan Chorost</option><option value="http://www.sprlaw.com/attorney/jennifer-coghlan/">Jennifer Coghlan</option><option value="http://www.sprlaw.com/attorney/john-patrick-curran/">John-Patrick Curran</option><option value="http://www.sprlaw.com/attorney/pamela-r-esterman/">Pamela R. Esterman</option><option value="http://www.sprlaw.com/attorney/scott-furman/">Scott Furman</option><option value="http://www.sprlaw.com/attorney/jeffery-b-gracer/">Jeffrey B. Gracer</option><option value="http://www.sprlaw.com/attorney/jonathan-kalmuss-katz/">Jonathan Kalmuss-Katz</option><option value="http://www.sprlaw.com/attorney/elizabeth-knauer/">Elizabeth Knauer</option><option value="http://www.sprlaw.com/attorney/christine-m-leas/">Christine M. Leas</option><option value="http://www.sprlaw.com/attorney/michael-j-lesser/">Michael J. Lesser</option><option value="http://www.sprlaw.com/attorney/maggie-macdonald/">Maggie Macdonald</option><option value="http://www.sprlaw.com/attorney/dan-mach/">Daniel Mach</option><option value="http://www.sprlaw.com/attorney/devin-mcdougall/">Devin McDougall</option><option value="http://www.sprlaw.com/attorney/priya-murthy/">Priya Murthy*</option><option value="http://www.sprlaw.com/attorney/david-paget/">David Paget</option><option value="http://www.sprlaw.com/attorney/daniel-riesel/">Daniel Riesel</option><option value="http://www.sprlaw.com/attorney/edward-roggenkamp/">Edward Roggenkamp</option><option value="http://www.sprlaw.com/attorney/adam-stolorow/">Adam Stolorow</option><option value="http://www.sprlaw.com/attorney/victoria-s-treanor/">Victoria S. Treanor</option><option value="http://www.sprlaw.com/attorney/david-s-yudelson/">David S. Yudelson</option></select>



			</div>
		</div>
	</div>
</div>
