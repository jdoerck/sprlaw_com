<?php

$ajax = $_GET['ajax'];

//if (is_mobile()) {

//		//      Environmental Law
//		echo '<option value="' . get_permalink(2246) . '">' . get_the_title(2246) . '</option>';
//		$environ_args = array('post_type' => 'expertise', 'posts_per_page' => -1, 'post_parent' => 2246, 'orderby' => 'menu_order',
//			'order'     => 'ASC'
//		);
//		$environ_loop = new WP_Query($environ_args);
//		while ($environ_loop->have_posts()) : $environ_loop->the_post();
//			echo '<option value="' . get_permalink() . '"> - ' . get_the_title() . '</option>';
//		endwhile;
//		wp_reset_postdata();
//
//
//		//      Development and Land Use
//		echo '<option value="' . get_permalink(2253) . '">' . get_the_title(2253) . '</option>';
//		$develop_args = array('post_type' => 'expertise', 'posts_per_page' => -1, 'post_parent' => 2253, 'orderby' => 'menu_order',
//			'order'     => 'ASC'
//		);
//		$develop_loop = new WP_Query($develop_args);
//		while ($develop_loop->have_posts()) : $develop_loop->the_post();
//			echo '<option value="' . get_permalink() . '"> - ' . get_the_title() . '</option>';
//		endwhile;
//		wp_reset_postdata();
//
//		//      Municipal Law
//		echo '<option value="' . get_permalink(2256) . '">' . get_the_title(2256) . '</option>';
//		$munic_args = array('post_type' => 'expertise', 'posts_per_page' => -1, 'post_parent' => 2256, 'orderby' => 'menu_order',
//			'order'     => 'ASC'
//		);
//		$munic_loop = new WP_Query($munic_args);
//		while ($munic_loop->have_posts()) : $munic_loop->the_post();
//			echo '<option value="' . get_permalink() . '"> - ' . get_the_title() . '</option>';
//		endwhile;
//		wp_reset_postdata();
//
//		//      Other
//		echo '<option value="">Other</option>';
//		$other_args = array('post_type' => 'expertise', 'posts_per_page' => -1, 'post_parent' => 0, 'post__not_in' => array( 2246, 2253, 2256 ), 'orderby' => 'menu_order',
//			'order'     => 'ASC'
//		);
//		$other_loop = new WP_Query($other_args);
//		while ($other_loop->have_posts()) : $other_loop->the_post();
//			echo '<option value="' . get_permalink() . '"> - ' . get_the_title() . '</option>';
//		endwhile;
//		wp_reset_postdata();
//
//		?>
<!--	</select>-->
<?php
	$args = array(
		'post_type'			=> 'expertise',
		'posts_per_page'	=> -1,
		'orderby' 			=> 'menu_order',
		'order'     		=> 'ASC',
		'post__not_in'		=> array( 2246, 2253, 2256 )
	);
	$loop = new WP_Query($args);
	$environ_expertise = '';
	while ($loop->have_posts()) : $loop->the_post();

		$the_link = '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';

		if (is_mobile() && $ajax == 'true'):
			$the_option = '<option value="' . (get_permalink()) . '">' . get_the_title() . '</option>';
			if(wp_get_post_parent_id($loop->ID) == 2246):
				$environ_expertise .= $the_option;
			elseif(wp_get_post_parent_id($loop->ID) == 2253):
				$develop_expertise .= $the_option;
			elseif(wp_get_post_parent_id($loop->ID) == 2256):
				$munic_expertise .= $the_option;
			else:
				$other_expertise .= $the_option;
			endif;

		elseif ($ajax == 'true'):
			if(wp_get_post_parent_id($loop->ID) == 2246):
				$environ_expertise .= add_table_row($the_link);
			elseif(wp_get_post_parent_id($loop->ID) == 2253):
				$develop_expertise .= add_table_row($the_link);
			elseif(wp_get_post_parent_id($loop->ID) == 2256):
				$munic_expertise .= add_table_row($the_link);
			else:
				$other_expertise .= add_table_row($the_link);
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

if ($ajax == 'true' && is_mobile()): ?>

	<select name="expertise-link" class="mobile-select">
		<option value="">-- choose an area of expertise --</option>
		<option value="">Environmental Law &amp; Litigation</option>
		<?php echo $environ_expertise; ?>
		<option value="">Development and Land Use</option>
		<?php echo $develop_expertise; ?>
		<option value="">Municipal Law</option>
		<?php echo $munic_expertise; ?>
		<option value="">Other</option>
		<?php echo $other_expertise; ?>
	</select>

<?php elseif($ajax == 'true'): ?>

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
