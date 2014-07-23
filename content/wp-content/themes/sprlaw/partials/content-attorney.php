<?php
/** content-attorney.php
 *
 * The template for displaying content in the single.php template
 *
 * @author        J Doerck
 * @package        SPRLaw
 * @since        1.0.0
 */

$ID = get_the_ID();

// Get Attorney Info
$attorney_title = get_field('attorney_title');
$attorney_email = get_field('attorney_email');
$attorney_phone = get_field('attorney_phone');
$attorney_linked_in = get_field('attorney_linked_in');
$attorney_vcard = get_field('attorney_vcard');


$attorney_recognitions = get_field('attorney_recognitions');
$attorney_experience = get_field('attorney_experience');
//$attorney_results = get_field('expertise-results');
$attorney_clients = get_field('attorney_clients');
$attorney_username = get_field('attorney_username');
$attorney_affiliations = get_field('attorney_affiliations');
$attorney_affiliations_activities = get_field('attorney_affiliations_activities');
$attorney_activities = get_field('attorney_activities');
$attorney_admissions = get_field('attorney_admissions');
$attorney_public_offices = get_field('attorney_public_offices');
$attorney_lectures = get_field('attorney_lectures');
$attorney_lectures_seminars = get_field('attorney_lectures_seminars');
$attorney_seminars = get_field('attorney_seminars');
$attorney_military_service = get_field('attorney_military_service');
$attorney_presentations = get_field('attorney_presentations');
$attorney_presentations_panels = get_field('attorney_presentations_panels');
$attorney_presentations = get_field('attorney_presentations');
$attorney_publications = get_field('attorney_publications');
$attorney_education = get_field('attorney_education');
$attorney_clerkship = get_field('attorney_clerkship');
$attorney_community = get_field('attorney_community');


$expertise_list = get_field('expertise-list');



//$user_info = get_userdata(1);
//echo $user_info->user_email .  ", " . $user_info->first_name



$attorney_blogposts = '';

if (strlen($attorney_username) > 0):
	$blog_query = 'posts_per_page=-1&author_name=' . $attorney_username;
	add_filter('posts_where', 'filter_2_years');
	query_posts($blog_query);
	while (have_posts()) : the_post();
		$user_info = get_userdata(1);
		$attorney_blogposts .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
	endwhile;
	wp_reset_query();
endif;




?>

<div class="content-page"><div class="content-row"><div class="gradyizer">

<div class="container hold  <?php if(is_mobile()){ echo 'mobile'; } ?><?php if(is_ipad()){ echo 'ipad'; } ?>">
	<div class="row">
		<div class="span2 img">
			<?php
			$thumb_ID = get_post_thumbnail_id($ID);
			$src = wp_get_attachment_image_src($thumb_ID, 'attorney_page');
			?>
			<img src="<?php echo $src[0]; ?>" alt="<?php echo get_the_title(); ?>" class="bio_pic">
		</div>
		<div class="span6 content">
			<div class="title-content">
				<h1 class="expertise-title"><?php echo get_the_title(); ?></h1>
				<h4 class="expertise-title"><?php echo $attorney_title; ?></h4>
			</div>
			<div>
				<div class="expertise-content main-content content-toggle">
					<?php the_content(); ?>
				</div>
			</div>
			<div id="attorney-accordion">
			<?php if (strlen($attorney_experience) > 0): ?>
				<h3>Results</h3>
				<div class="expertise-content results">
					<?php echo $attorney_experience; ?>
				</div>
				<?php endif;
				if (strlen($attorney_recognitions) > 0): ?>
				<h3>Recognitions</h3>
				<div class="expertise-content recognitions">
					<p>
					<?php echo $attorney_recognitions; ?>
					</p>
				</div>
			<?php endif;

			if (strlen($attorney_clients) > 0): ?>
				<h3>Clients</h3>
				<div class="expertise-content clients">
					<?php echo $attorney_clients; ?>
				</div>
			<?php endif;
			if (strlen($attorney_affiliations) > 0): ?>
				<h3>Affiliations</h3>
				<div class="expertise-content affiliations">
					<?php echo $attorney_affiliations; ?>
				</div>
			<?php endif;
			if (strlen($attorney_affiliations_activities) > 0): ?>
				<h3>Affiliations/Activities</h3>
				<div class="expertise-content affil_activ">
					<?php echo $attorney_affiliations_activities; ?>
				</div>
			<?php endif;
			if (strlen($attorney_activities) > 0): ?>
				<h3>Activities</h3>
				<div class="expertise-content activities">
					<?php echo $attorney_activities; ?>
				</div>
			<?php endif;
			if (strlen($attorney_admissions) > 0): ?>
				<h3>Admissions</h3>
				<div class="expertise-content admissions">
					<?php echo $attorney_admissions; ?>
				</div>
			<?php endif;
			if (strlen($attorney_public_offices) > 0): ?>
				<h3>Public Offices</h3>
				<div class="expertise-content public">
					<?php echo $attorney_public_offices; ?>
				</div>
			<?php endif;
			if (strlen($attorney_seminars) > 0): ?>
				<h3>Seminars</h3>
				<div class="expertise-content seminars">
					<?php echo $attorney_seminars; ?>
				</div>
			<?php endif;
			if (strlen($attorney_lectures_seminars) > 0): ?>
				<h3>Lectures &amp; Seminars</h3>
				<div class="expertise-content lectures_seminars">
					<?php echo $attorney_lectures_seminars; ?>
				</div>
			<?php endif;
			if (strlen($attorney_military_service) > 0): ?>
				<h3>Military Service</h3>
				<div class="expertise-content military">
					<?php echo $attorney_military_service; ?>
				</div>
			<?php endif;
			if (strlen($attorney_presentations) > 0): ?>
				<h3>Presentations</h3>
				<div class="expertise-content presentations">
					<?php echo $attorney_presentations; ?>
				</div>
			<?php endif;
			if (strlen($attorney_presentations_panels) > 0): ?>
					<h3>Presentations and Panels</h3>
					<div class="expertise-content pres_panel">
						<?php echo $attorney_presentations_panels; ?>
					</div>
			<?php endif;
			if (strlen($attorney_publications) > 0): ?>
					<h3>Publications</h3>
					<div class="expertise-content publications">
						<?php echo $attorney_publications; ?>
					</div>
			<?php endif; ?>
			<?php if (strlen($attorney_education) > 0): ?>
				<h3>Education</h3>
				<div class="expertise-content education">
					<?php echo $attorney_education; ?>
				</div>
			<?php endif;
			if (strlen($attorney_clerkship) > 0): ?>

				<h3>Clerkship</h3>
				<div class="expertise-content clerkship">
					<?php echo $attorney_clerkship; ?>
				</div>

			<?php endif;
			if (strlen($attorney_community) > 0): ?>

				<h3>Community</h3>
				<div class="expertise-content community">
					<?php echo $attorney_community; ?>
				</div>

			<?php endif;
			if (strlen($attorney_blogposts) > 0): ?>

				<h3>Blog Posts</h3>
				<div class="expertise-content blogposts">
					<ul class="blog_posts">
					<?php echo $attorney_blogposts; ?>
					</ul>
				</div>

			<?php endif;
			if ($attorney_results): ?>
				<h3>Results</h3>
				<div class="expertise-content results">
				<ul class="unstyled">
					<?php foreach ($attorney_results as $post): // variable must be called $post (IMPORTANT) ?>
						<?php setup_postdata($post); ?>
						<li><a href="<?php the_permalink(); ?>" class="blue-link"><?php the_title(); ?></a></li>
					<?php endforeach; ?>
				</ul>
				</div>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>
				</div>

		</div>
		<div class="span4 contact">
			<div class="items">
			<?php if ($attorney_email): ?>
				<div class="contact_info email">
					<a href="mailto:<?php echo $attorney_email; ?>"><span></span> <?php echo $attorney_email; ?></a>
				</div>
			<?php endif; ?>
			<?php if ($attorney_phone): ?>
				<div class="contact_info phone">
					<a href="tel:<?php echo mobile_phone_link($attorney_phone); ?>"><span></span> <?php echo $attorney_phone; ?></a>
				</div>
			<?php endif; ?>
			<?php if ($attorney_vcard): ?>
				<div class="contact_info vcard">
					<a href="<?php echo wp_get_attachment_url($attorney_vcard); ?>"><span></span> vCard</a>
				</div>
			<?php endif; ?>


			<?php if ($attorney_linked_in): ?>
				<div><a href="<?php echo $attorney_linked_in; ?>" target="linkedin"><img src="<?php echo get_template_directory_uri(); ?>/_i/in-follow_05.png"></a></div>
			<?php endif ?>
			</div>
		</div>
	</div>




</div></div></div>

<!-- #post-<?php the_ID(); ?> -->

<?php

/* End of file content-attorney.php */
/* Location: ./wp-content/themes/the-bootstrap/partials/content-attorney.php */