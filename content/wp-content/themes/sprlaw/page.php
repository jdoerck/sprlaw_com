<?php

get_header();

 ?>

	<div class="content-page">
		<div class="container hold<?php if(is_mobile()) { echo ' mobile'; } ?>">
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
			<div id="delimiter"></div>
		</div>
	</div>

<?php get_footer(); ?>