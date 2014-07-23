<?php
/** content-result.php
 *
 * The template for displaying content in the single.php template
 *
 * @author        J Doerck
 * @package        SPRLaw
 * @since        1.0.0
 */


$ID = get_the_ID();

$location = get_field('result_location');
$date = get_field('result_date');

?>
    <div class="content-page results">
        <div class="content-row">
            <?php
            $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
            if (NULL != $imgsrc[0]) {
            ?>
            <div class="gradyizer">
                <div class="container hold  <?php if(is_mobile()){ echo 'mobile'; } ?><?php if(is_ipad()){ echo 'ipad'; } ?>" >
                    <div class="row" style="margin-bottom:30px; ">
						<div class="span12">
							<?php the_title('<h1 class="title-client">', '</h1>'); ?>
                        	<div class="result_img"><img src="<?php echo $imgsrc[0]; ?>"></div>
						</div>

                    </div>
                </div>
            </div>
            <?php } ?>
            <div style="padding-top: 20px;" class="container <?php if(is_mobile()){ echo 'mobile'; } ?><?php if(is_ipad()){ echo 'ipad'; } ?>">

                <div class="row expertise-row">
					<div class="span10 result-content">
						<?php the_content(); ?>
					</div>
					<div class="span2 details info">

						<?php if ($location): ?>
						<div>
							<h5>Location</h5>
							<h3 class="title-location"><?php echo $location ?></h3>
						</div>
						<?php endif;
						if ($date): ?>
						<div>
							<h5>Year</h5>
							<h3 class="title-location"><?php echo $date ?></h3>
						</div>
						<?php endif; ?>
						<div>
							<h5>Category</h5>
						<?php
						echo '<a href="/results/#' . str_replace(' ', '_', get_field('result_category')) . '">' . get_field('result_category') . '</a>';
						echo '</div>';

						$associated_attorneys = get_post_meta( $ID, 'associated-attorneys' );
						$num_of_atty = count($associated_attorneys[0]);

						if (NULL != $associated_attorneys[0]):
							echo get_associated_attorneys($associated_attorneys, $num_of_atty);
						endif;

						?>
					</div>
                </div>



            </div>

            <div id="delimiter"></div>
        </div>
    </div>
    </div>

<?php

/* End of file content-result.php */
/* Location: ./wp-content/themes/the-bootstrap/partials/content-attorney.php */