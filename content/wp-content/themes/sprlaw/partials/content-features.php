<?php
/** content-features.php
 *
 * The template for displaying content in the single.php template
 *
 * @author        J Doerck
 * @package        SPRLaw
 * @since        1.0.0
 */


$ID = get_the_ID();

$associated_attorneys = get_field('associated-attorneys');
$location = get_field('result_location');
$date = get_field('result_date');

?>
<div class="content-page results">
	<div class="content-row">
		<div class="container hold  <?php if(is_mobile()){ echo 'mobile'; } ?><?php if(is_ipad()){ echo 'ipad'; } ?>" >
			<div class="row" style="margin-bottom:30px; ">
				<div class="span12">
					<?php the_title('<h1 class="expertise-title">', '</h1>'); ?>

					<?php the_content(); ?>

				</div>

			</div>
		</div>
	</div>
</div>

<?php

/* End of file content-result.php */
/* Location: ./wp-content/themes/the-bootstrap/partials/content-attorney.php */