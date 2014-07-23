<?php
/** content-expertise.php
 *
 * The template for displaying content in the single.php template
 *
 * @author        J Doerck
 * @package        SPRLaw
 * @since        1.0.0
 */

$ID = get_the_ID();

$theID = get_the_ID();
$expertise_category = wp_get_post_parent_id();



global $post;

?>

    <div class="content-page">
        <div class="content-row">
            <div id="content" class="gradyizer">
                <div class="container hold <?php if(is_mobile()){ echo 'mobile'; } ?><?php if(is_ipad()){ echo 'ipad'; } ?>">
                        <?php
                          if ($post->post_parent) {
                            $parent_title = get_the_title($post->post_parent);
							  echo '<h4 class="expertise-title">' . $parent_title . '</h4>';
                            the_title('<h1 class="expertise-title">', '</h2>');
                          } else {
                            // Show Parent Title
                            the_title('<h1 class="entry-title">', '</h1>');
                          }
                        ?>

                </div>
              <div class="container hold <?php if(is_mobile()){ echo 'mobile'; } ?><?php if(is_ipad()){ echo 'ipad'; } ?>">
                  <div class="expertise-content">
                    <?php the_content();

//					$parent_post_id = wp_get_post_parent_id($post->ID);
//					$parent_post = get_post($parent_post_id);
//					$parent_post_title = $post->post_title;

					$category_ID = get_category_id($post->post_title);

					if (NULL != $category_ID):

						$blog_query = 'post_type=post&post_status=publish&cat=' . $category_ID . '&orderby=post_date&posts_per_page=-1';
						add_filter('posts_where', 'filter_2_years');
						query_posts($blog_query);
						if (have_posts()):
							echo '<hr /><h5>Blog Posts</h5><ul class="blog_posts">';

							while (have_posts()) : the_post();
								echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
							endwhile;

							echo '</ul>';
						endif;
						wp_reset_query();
					endif; ?>
                  </div>
			</div>

        </div>
    </div>
    </div>

<?php

/* End of file content-expertise.php */
/* Location: ./wp-content/themes/the-bootstrap/partials/content-attorney.php */