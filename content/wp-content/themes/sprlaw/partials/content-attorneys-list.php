<?php

$ajax = $_GET['ajax'];
$table_content = '';

// Category Listing

$args = array(
	'posts_per_page' => -1,
	'post_type' => 'attorney',
	'post_status' => 'publish',
	'orderby' => 'meta_value',
	'meta_key' => 'attorney_alphabetize',
	'order' => 'ASC'
);

$loop = new WP_Query($args);
$mobile_content = '';

$prin_content = '';
$prin_content2 = '';
$asso_content = '';
$counsel_content = '';

// The Loop
while ($loop->have_posts()) : $loop->the_post();
	$the_link = '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
	if ($ajax == true):
		if (get_field('attorney_title') == 'Principal'):
			$prin_content .= add_table_row($the_link);
			$i++;
		elseif (get_field('attorney_title') == 'Associate'):
			$asso_content .= add_table_row($the_link);
		elseif (get_field('attorney_title') == 'Of Counsel'):
			$counsel_content .= add_table_row($the_link);
		endif;
	else:
		if (get_field('attorney_title') == 'Principal'):
			$prin_content .= att_list_item($the_link, get_the_excerpt());
		elseif (get_field('attorney_title') == 'Associate'):
			$asso_content .= att_list_item($the_link, get_the_excerpt());
		elseif (get_field('attorney_title') == 'Of Counsel'):
			$counsel_content .= att_list_item($the_link, get_the_excerpt());
		endif;
	endif;

	$mobile_content .= '<option value="' . (get_permalink()) . '">' . get_the_title() . '</option>';


endwhile;
wp_reset_query();

$mobile_dropdown = '
<select name="attorney" class="mobile-select">
	<option value="">-- choose an attorney --</option>
	' . $mobile_content . '
</select>';
?>

<?php if ($ajax == true):
	$split_trs = explode('<tr>', $prin_content);
	$count = count($split_trs);
	$split = round($count * .5);
	$prin_split1 = '';
	$prin_split2 = '';
	$i = 1;

	while ($i < $count) {
		if ($i <= $split) {
			$prin_split1 .= $split_trs[$i];
		} else {
			$prin_split2 .= $split_trs[$i];
		}
		$i++;
	}
	?>
	<html>
	<body>
	<?= $mobile_dropdown ?>
	<div class="atty_list">
		<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr attorney principal first">
			<thead>
			<th>Principals</th>
			</thead>
			<tbody>
			<?php echo $prin_split1; ?>
			</tbody>
		</table>
		<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr attorney principal second">
			<thead>
			<th>&nbsp;</th>
			</thead>
			<tbody>
			<?php echo $prin_split2; ?>
			</tbody>
		</table>
	</div>
	<div class="atty_list">
		<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr attorney associate">
			<thead>
			<th>Associates</th>
			</thead>
			<tbody>
			<?php echo $asso_content; ?>
			</tbody>
		</table>
		<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr attorney counsel">
			<thead>
			<th>Of Counsel</th>
			</thead>
			<tbody>
			<?php echo $counsel_content; ?>
			</tbody>
		</table>
	</div>
	</body>
	</html>
<?php
else :
	get_header(); ?>
	<div class="content-page">
		<div class="content-row">
			<div class="gradyizer">
				<div class="container hold row <?php if (is_mobile()) {
					echo 'mobile';
				} ?><?php if (is_ipad()) {
					echo 'ipad';
				} ?>">
					<div class="span2"></div>
					<div class="span8">
						<h1 class="title-client">Attorneys</h1>
						<?php the_content() ?>

						<h3>Principals</h3>
						<?php echo $prin_content; ?>

						<h3>Associates</h3>
						<?php echo $asso_content; ?>

						<h3>Of Counsel</h3>
						<?php echo $counsel_content; ?>
					</div>
					<div class="span2"></div>
				</div>
			</div>
		</div>
	</div></div>

	<?php
	get_footer();
endif; ?>