<?php
/**
 * Template Name: Page - Features
 * Created by JetBrains PhpStorm.
 * User: jdoerck
 * Date: 8/13/13
 * Time: 3:33 PM
 */
?>
<?php get_header();

$subtitle = "Feature";

if (get_post_meta(get_the_ID(), 'is_attorney_feature-1') == true) {
    $subtitle = "Attorney Spotlight";
}

?>

<?php

get_header();

?>

	<div class="content-page">
		<div class="container">
			<div id="main" class="row">
				<section id="primary" class="span12"><a name="#primary"></a>
					<div id="content">
						<?php if (have_posts()) : while (have_posts()) :
							the_post();
							get_template_part('/partials/content', get_post_type()); ?>
						<?php endwhile; else:
							get_template_part('/partials/content', 'not-found'); ?>
						<?php endif; ?>

					</div>
				</section>
			</div>

		</div>
	</div>

<?php get_footer(); ?>