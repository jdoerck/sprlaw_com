<?php get_header();


    global $wp_query;
    $total_results = $wp_query->found_posts;
    if ($total_results == 1) {
        $plural = '';
    } else {
        $plural = "s";
    }

    ?>

    <div class="content-page">
        <div class="content-row">
            <div class="gradyizer">
                <div class="container hold row <?php if (is_mobile()) {
                    echo 'mobile';
                } ?><?php if (is_ipad()) {
                    echo 'ipad';
                } ?>">
                    <?php
                    if (is_mobile()):
                        include('searchform.php');
                    endif; ?>
                    <section id="primary" class="span9"><a name="#primary"></a>
                        <h1 class="listing_title">Your Search Results for "<?php the_search_query(); ?>" Returned <?php echo $total_results; ?> Result<?php echo $plural; ?></h1>
                        <div id="content" style="padding-top: 30px;">

                            <?php if (have_posts()) : while (have_posts()) :
                                the_post();
                                get_template_part('/partials/content', 'excerpt'); ?>
                            <?php endwhile; else:
                                get_template_part('/partials/content', 'not-found'); ?>
                            <?php endif; ?>

                        </div>
                        <? if ( $wp_query->max_num_pages > 1 ) : ?>
                            <nav class="navigation" role="navigation">
                                <h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
                                <div class="nav-next"><?php previous_posts_link( __( 'Go Back <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
                                <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> More Results', 'twentytwelve' ) ); ?></div>

                            </nav><!-- #<?php echo $html_id; ?> .navigation -->
                        <?php endif; ?>
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


<?php get_footer(); ?>
<script type="text/javascript">
    $(".entry-content img").addClass('img-rounded');
</script>