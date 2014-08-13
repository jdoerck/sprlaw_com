<?php

$ajax = $_GET['ajax'];

	$args = array(
		'post_type'			=> 'expertise',
		'posts_per_page'	=> -1,
		'orderby' 			=> 'title',
		'order'     		=> 'ASC',
		'post__not_in'		=> array( 2246, 2253, 2256 )
	);
	$loop = new WP_Query($args);
$environ_expertise = '';
$mobile_environ_expertise = '';
$develop_expertise = '';
$mobile_develop_expertise = '';
$munic_expertise = '';
$mobile_munic_expertise = '';
$other_expertise = '';
$mobile_other_expertise = '';
	while ($loop->have_posts()) : $loop->the_post();

		$the_link = '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';

		if ($ajax == 'true'):
			$the_option = '<option value="' . (get_permalink()) . '">' . get_the_title() . '</option>';
			if(wp_get_post_parent_id($loop->ID) == 2246):
				$environ_expertise .= add_table_row($the_link);
				$mobile_environ_expertise .= $the_option;
			elseif(wp_get_post_parent_id($loop->ID) == 2253):
				$develop_expertise .= add_table_row($the_link);
				$mobile_develop_expertise .= $the_option;
			elseif(wp_get_post_parent_id($loop->ID) == 2256):
				$munic_expertise .= add_table_row($the_link);
				$mobile_munic_expertise .= $the_option;
			else:
				$other_expertise .= add_table_row($the_link);
				$mobile_other_expertise .= $the_option;
			endif;
		else:
			if(wp_get_post_parent_id($loop->ID) == 2246):
				$environ_expertise .= '<p>' . $the_link . '</p>';
			elseif(wp_get_post_parent_id($loop->ID) == 2253):
				$develop_expertise .= '<p>' . $the_link . '</p>';
			elseif(wp_get_post_parent_id($loop->ID) == 2256):
				$munic_expertise .= '<p>' . $the_link . '</p>';
			else:
				$other_expertise .= '<p>' . $the_link . '</p>';
			endif;
		endif;
	endwhile;
wp_reset_postdata();

if($ajax == 'true'): ?>
<html><body>
<select name="expertise-link" class="mobile-select">
	<option value="">-- choose an area of expertise --</option>
	<option value="">- Environmental Law &amp; Litigation -</option>
	<?php echo $mobile_environ_expertise; ?>
	<option value="">- Development and Land Use -</option>
	<?php echo $mobile_develop_expertise; ?>
	<option value="">- Municipal Law -</option>
	<?php echo $mobile_munic_expertise; ?>
	<option value="">- Other -</option>
	<?php echo $mobile_other_expertise; ?>
</select>
	<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr expertise environmental">
		<thead>
		<tr><th>Environmental Law &amp; Litigation</th></tr>
		</thead>
			<?php echo $environ_expertise; ?>
	</table>

	<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr expertise develop">
		<thead>
		<tr><th>Development and Land Use</th></tr>
		</thead>
		<?php echo $develop_expertise; ?>
	</table>

	<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr expertise municipal">
		<thead>
		<tr><th>Municipal Law</th></tr>
		</thead>
		<?php echo $munic_expertise; ?>
	</table>

	<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr expertise other">
		<thead>
		<tr><th>Other</th></tr>
		</thead>
		<?php echo $other_expertise; ?>
	</table>
</body></html>
<?php
else:
get_header(); ?>
<div class="content-page"><div class="content-row"><div class="gradyizer"><div class="container hold row <?php if(is_mobile()){ echo 'mobile'; } ?><?php if(is_ipad()){ echo 'ipad'; } ?>">
	<div class="span2"> </div>
	<div class="span8">
	<h1 class="title-client">Expertise</h1>
	<?php the_content(); ?>

	<h3>Environmental Law &amp; Litigation</h3>
	<?php echo $environ_expertise; ?>
	<h3>Development and Land Use</h3>
	<?php echo $develop_expertise; ?>
	<h3>Municipal Law</h3>
	<?php echo $munic_expertise; ?>
	<h3>Other</h3>
	<?php echo $other_expertise; ?>
	</div>
	<div class="span2"> </div>

</div></div></div></div></div>

	<?php
	get_footer();
endif; ?>
