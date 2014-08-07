<?php

$ajax = $_GET['ajax'];
$all = $_GET['all'];

$content = '';
$table_content = '';
$mobile_content = '';
$list_post_type = 'result';

	if ($ajax == 'true' && $all != 'true'):
		$result_args = array(
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'DESC',
			'post_type'      => $list_post_type,
			'post_status' => 'publish',
			'meta_key'       => 'result_category',
			'meta_query' => array(
				array(
					'key' =>  'result_category',
					'value' => $category->cat_ID,
					'compare' => 'LIKE'
				),
				array(
					'key' =>  'result_show_in_menu',
					'value' => true,
					'compare' => '='
				)
			),

		);

	else:
		$result_args = array(
			'posts_per_page' => -1,
			'post_type'  => 'result',
			'post_status' => 'publish',
					'orderby'  => 'meta_value',
			'meta_key' => 'result_date',
			'order'    => 'DESC',
			'meta_query' => array(
				array(
					'key' =>  'result_category',
					'value' => $category->cat_ID,
					'compare' => 'LIKE'
				)
			)

		);
	endif;

	$myposts = get_posts($result_args);
	foreach ($myposts as $post) :  setup_postdata($post);
			$result_category     = get_field('result_category');

		if ($ajax == 'true'):
			$mobile_content .= '<option value="' . get_permalink() . '">' . get_the_title() . '</option>';
			$table_content .= '
			<tr>
				<td><a href="' . get_permalink() . '">' . get_the_title() . '</a></td>
				<td>' . $result_category . '</td>
				<td>' . get_field('result_date') . '</td>
				<td>' . str_replace(" ", "&nbsp;", get_field('result_location')) . '</td>
			</tr>';
		else:
			$the_listing = '<div class="row"><div class="span8"><h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2></div></div><div class="row"><div class="span6 result-content"><a href="' . get_permalink() . '">' . get_the_post_thumbnail($post->ID, 'list-page2') . '</a>' . get_the_content(). '</div>
			<div class="span2 info">';

			$location = get_field('result_location');
			$date = get_field('result_date');


			if ($location):
				$the_listing .= '<div><h5>Location</h5>' . $location . '</div>';
			endif;
			if ($date):
				$the_listing .= '<div><h5>Date</h5>' . $date . '</div>';
			endif;

			$i = 1;
			$plural = '';

			$associated_attorneys = get_post_meta( $post->ID, 'associated-attorneys' );
			$num_of_atty = count($associated_attorneys[0]);

			if (NULL != $associated_attorneys[0]):
				if ($num_of_atty > 1) { $plural = 's'; }
				$the_listing .= get_associated_attorneys($associated_attorneys, $num_of_atty);
			endif;



			$the_listing .= "</div></div><hr />";

			if($result_category == "Environmental Law and Litigation"):
				$ell_result .= $the_listing;
			elseif($result_category == "Solid and Hazardous Waste"):
				$solid_result .= $the_listing;
			elseif($result_category == "Climate Change"):
				$cc_result .= $the_listing;
			elseif($result_category == "Alternative Energy"):
				$ae_result .= $the_listing;
			elseif($result_category == "Federal and State Superfund"):
				$fss_result .= $the_listing;
			elseif($result_category == "Toxic Tort Litigation"):
				$ttl_result .= $the_listing;
			elseif($result_category == "Underground Storage Tanks and Oil Spill Litigation"):
				$ustospl_result .= $the_listing;
			elseif($result_category == "Enforcement, Criminal Prosecutions"):
				$ecp_result .= $the_listing;
			elseif($result_category == "Transactional Due Diligence"):
				$tdd_result .= $the_listing;
			elseif($result_category == "Compliance Audits"):
				$ca_result .= $the_listing;
			elseif($result_category == "Development and Land Use"):
				$dlu_result .= $the_listing;
			elseif($result_category == "Brownfields Redevelopment"):
				$br_result .= $the_listing;
			elseif($result_category == "Environmental Review, Permitting and Litigation for Private Commercial Developments"):
				$pcd_result .= $the_listing;
			elseif($result_category == "Environmental Review, Permitting and Litigation for Government-Sponsored Developments"):
				$gsd_result .= $the_listing;
			elseif($result_category == "Wetlands and Stormwater"):
				$ws_result .= $the_listing;
			elseif($result_category == "New York City (e) Designation Compliance"):
				$nycdc_result .= $the_listing;
			elseif($result_category == "Permitting for Industrial Facilities"):
				$pif_result .= $the_listing;
			elseif($result_category == "Zoning and Land Use"):
				$zlu_result .= $the_listing;
			elseif($result_category == "Municipal Law"):
				$ml_result .= $the_listing;
			elseif($result_category == "Code and Charter Revision"):
				$ccr_result .= $the_listing;
			elseif($result_category == "Civil Rights and Personnel Litigation"):
				$crpl_result .= $the_listing;
			elseif($result_category == "Intra-Governmental Disputes"):
				$igd_result .= $the_listing;
			elseif($result_category == "Special Districts"):
				$sd_result .= $the_listing;
			elseif($result_category == "Tort Liability"):
				$tl_result .= $the_listing;
			elseif($result_category == "Open Meetings/Freedom of Information"):
				$foi_result .= $the_listing;
			elseif($result_category == "Ethics"):
				$ethics_result .= $the_listing;
			elseif($result_category == "Other"):
				$other_result .= $the_listing;
			elseif($result_category == "General Litigation"):
				$general_result .= $the_listing;
			elseif($result_category == "Employment Litigation"):
				$el_result .= $the_listing;
			elseif($result_category == "Alternative Dispute Resolution"):
				$add_result .= $the_listing;
			elseif($result_category == "Indian Law"):
				$il_result .= $the_listing;
			endif;

		endif;

	endforeach;
	wp_reset_postdata();
//}

//Display content

if ($ajax == 'true'): ?>
	<html><body>
	<select name="result" class="mobile-select">
		<option value="">-- choose --</option>
		<?php echo $mobile_content; ?>
	</select>
	<table border="0" cellspacing="0" cellpadding="0" style="width: 100%" id="result_table" class="tablesorter table-spr"><thead><tr><th class="featured_results ">Featured Results</th><th class="category ">Category</th><th class="date ">Year</th><th class="location ">Location</th></tr></thead><tbody>
		<?php echo $table_content; ?>
	</tbody>
	<tfoot>
	<?php
	if ($all == 'true') {
		$how_many = '<tr><td colspan="4" class="show_less_results"><a href="/results/?ajax=true" id="less_results">- Less Results</a></td></tr>';
	} else {
		$how_many = '<tr><td colspan="4" class="show_more_results"><a href="/results/?ajax=true&all=true" id="more_results">+ More Results</a></td></tr>';
	}
	echo $how_many;
	?>
	</tfoot>
	</table>
	<hr />
	<a href="/results" class="view_all">View All On Single Page</a>
	</body></html>
<?php else:
	get_header(); ?>
	<div class="content-page"><div class="content-row"><div class="gradyizer"><div class="container hold row <?php if(is_mobile()){ echo 'mobile'; } ?><?php if(is_ipad()){ echo 'ipad'; } ?>">
	<div class="span2 collapse"> </div>
	<div class="span8">
	<h1 class="title-client">Results</h1>
	<?php the_content() ?>


	<?php

	if($ell_result) {
		echo '<a name="Environmental_Law_and_Litigation"></a>
		<h3>Environmental Law & Litigation</h3>' . $ell_result;
	} if($solid_result) {
		echo '<a name="Solid_and_Hazardous_Waste"></a>
		<h3>Solid and Hazardous Waste</h3>' . $solid_result;
	} if($cc_result) {
		echo '<a name="Climate_Change"></a>
		<h3>Climate Change</h3>' . $cc_result;
	} if($ae_result) {
		echo '<a name="Alternative_Energy"></a>
		<h3>Alternative Energy</h3>' . $ae_result;
	} if($fss_result) {
		echo '<a name="Federal_and_State_Superfund"></a>
		<h3>Federal and State Superfund</h3>' . $fss_result;
	} if($ttl_result) {
		echo '<a name="Toxic_Tort_Litigation"></a>
		<h3>Toxic Tort Litigation</h3>' . $ttl_result;
	} if($ustospl_result) {
		echo '<a name="Underground_Storage_Tanks_and_Oil_Spill_Litigation"></a>
		<h3>Underground Storage Tanks and Oil Spill Litigation</h3>' . $ustospl_result;
	} if($ecp_result) {
		echo '<a name="Enforcement_Criminal_Prosecutions"></a>
		<h3>Enforcement, Criminal Prosecutions</h3>' . $ecp_result;
	} if($tdd_result) {
		echo '<a name="Transactional_Due_Diligence"></a>
		<h3>Transactional Due Diligence</h3>' . $tdd_result;
	} if($ca_result) {
		echo '<a name="Compliance_Audits"></a>
		<h3>Compliance Audits</h3>' . $ca_result;
	} if($dlu_result) {
		echo '<a name="Development_and_Land_Use"></a>
		<h3>Development and Land Use</h3>' . $dlu_result;
	} if($br_result) {
		echo '<a name="Brownfields_Redevelopment"></a>
		<h3>Brownfields Redevelopment</h3>' . $br_result;
	} if($pcd_result) {
		echo '<a name="Environmental_Review_Permitting_and_Litigation_for_Private_Commercial_Developments"></a>
		<h3>Environmental Review, Permitting and Litigation for Private Commercial Developments</h3>' . $pcd_result;
	} if($gsd_result) {
		echo '<a name="Environmental_Review_Permitting_and_Litigation_for_Government-Sponsored_Developments"></a>
		<h3>Environmental Review, Permitting and Litigation for Government-Sponsored Developments</h3>' . $gsd_result;
	} if($ws_result) {
		echo '<a name="Wetlands_and_Stormwater"></a>
		<h3>Wetlands and Stormwater</h3>' . $ws_result;
	} if($nycdc_result) {
		echo '<a name="New_York_City_(e)_Designation_Compliance"></a>
		<h3>New York City (e) Designation Compliance</h3>' . $nycdc_result;
	} if($pif_result) {
		echo '<a name="Permitting_for_Industrial_Facilities"></a>
		<h3>Permitting for Industrial Facilities</h3>' . $pif_result;
	} if($zlu_result) {
		echo '<a name="Zoning_and_Land_Use"></a>
		<h3>Zoning and Land Use</h3>' . $zlu_result;
	} if($ml_result) {
		echo '<a name="Municipal_Law"></a>
		<h3>Municipal Law</h3>' . $ml_result;
	} if($ccr_result) {
		echo '<a name="Code_and_Charter_Revision"></a>
		<h3>Code and Charter Revision</h3>' . $ccr_result;
	} if($crpl_result) {
		echo '<a name="Civil_Rights_and_Personnel_Litigation"></a>
		<h3>Civil Rights and Personnel Litigation</h3>' . $crpl_result;
	} if($igd_result) {
		echo '<a name="Intra-Governmental_Disputes"></a>
		<h3>Intra-Governmental Disputes</h3>' . $igd_result;
	} if($sd_result) {
		echo '<a name="Special_Districts"></a>
		<h3>Special Districts</h3>' . $sd_result;
	} if($tl_result) {
		echo '<a name="Tort_Liability"></a>
		<h3>Tort Liability</h3>' . $tl_result;
	} if($foi_result) {
		echo '<a name="Open_Meetings/Freedom_of_Information"></a>
		<h3>Open Meetings/Freedom of Information</h3>' . $foi_result;
	} if($ethics_result) {
		echo '<a name="Ethics"></a>
		<h3>Ethics</h3>' . $ethics_result;
	} if($other_result) {
		echo '<a name="Other"></a>
		<h3>Other</h3>' . $other_result;
	} if($general_result) {
		echo '<a name="General_Litigation"></a>
		<h3>General Litigation</h3>' . $general_result;
	} if($el_result) {
		echo '<a name="Employment_Litigation"></a>
		<h3>Employment Litigation</h3>' . $el_result;
	} if($add_result) {
		echo '<a name="Alternative_Dispute_Resolution"></a>
		<h3>Alternative Dispute Resolution</h3>' . $add_result;
	} if($il_result) {
		echo '<a name="Indian_Law"></a>
		<h3>Indian Law</h3>' . $il_result;
	}


	?>

	</div>
	<div class="span2 collapse"> </div>
	</div></div></div></div></div>

	<?php
	get_footer();
endif; ?>