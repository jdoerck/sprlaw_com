<?php get_header();

  if (get_post_type() == 'post'): ?>
<!-- index.php -->

    <div class="content-page">
      <div class="content-row">
        <div class="gradyizer">
          <div class="container hold row <?php if (is_mobile()) {
            echo 'mobile';
          } ?><?php if (is_ipad()) {
            echo 'ipad';
          } ?>">
            <section id="primary" class="span9"><a name="#primary"></a>
                <?php
                if (is_mobile()):
                    include('searchform.php');
                endif; ?>

               <?php if (is_category()) { ?>
                  <h1 class="listing_title">Posts marked "<?php single_cat_title(); ?>"</h1>
              <?php } elseif (is_author()) { ?>
				   <h1 class="listing_title">Posts by <?php wp_title(); ?></h1>
			   <?php } elseif (is_archive()) { ?>
                   <h1 class="listing_title">Posts added in "<?php echo get_the_time(__('F Y'), 'f2'); ?>"</h1>
               <?php }  ?>

              <div id="content" style="padding-top: 30px;">

                <?php if (have_posts()) : while (have_posts()) :
                  the_post();
                  get_template_part('/partials/content', get_post_type()); ?>
                <?php endwhile; else:
                  get_template_part('/partials/content', 'not-found'); ?>
                <?php endif;
                if ( $wp_query->max_num_pages > 1 ) : ?>
                    <nav class="navigation" role="navigation">
                        <h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
                        <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?></div>
                        <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
                    </nav><!-- #<?php echo $html_id; ?> .navigation -->
                <?php endif; ?>

              </div>
            </section>
              <div class="span3" style="padding-top: 30px;">
                  <?php
                  if (!is_mobile()) {
                      get_sidebar();
                  }
                  ?>
              </div>
          </div>
        </div>

      </div>
    </div>
  <?php else: ?>
    <div class="content-page">
      <div class="content-row">
        <div class="gradyizer">
          <div class="container hold <?php if (is_mobile()) {
            echo 'mobile';
          } ?><?php if (is_ipad()) {
            echo 'ipad';
          } ?>">

            <div class="span1"></div>
            <div class="span7 expertise-title-row">
              <header class="page-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
              </header>
            </div>

          </div>
          <div class="container hold <?php if (is_mobile()) {
            echo 'mobile';
          } ?><?php if (is_ipad()) {
            echo 'ipad';
          } ?>">
            <div class="span3">

            </div>

            <section id="primary" class="span9"><a name="#primary"></a>
              <div id="content">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
                  <!-- .entry-header -->
                  <div class="entry-content clearfix">
                    <?php
                      the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'the-bootstrap'));
                    ?>
                  </div>
                  <!-- .entry-content -->
                </article>
                <!-- #post-<?php the_ID(); ?> -->
                <?php /*
              <?php if (have_posts()) : while (have_posts()) :
                the_post();
                get_template_part('/partials/content', get_post_type()); ?>
              <?php endwhile; else:
                get_template_part('/partials/content', 'not-found'); ?>
              <?php endif; ?>
              */
                ?>
              </div>
            </section>

            <?php
              if (get_post_type() == post):
                get_sidebar();
              endif; ?>

          </div>

          <div id="delimiter"></div>
        </div>
      </div>
    </div>
  <?php endif; ?>

<?php get_footer(); ?>
<script type="text/javascript">
  $(".entry-content img").addClass('img-rounded');
</script>