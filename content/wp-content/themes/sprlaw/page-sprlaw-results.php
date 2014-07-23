<?php
/**
 * Template Name: Page - Results
 * Created by JetBrains PhpStorm.
 * User: jdoerck
 * Date: 8/13/13
 * Time: 3:33 PM
 */

get_header();

if (get_post_type() == 'post'): ?>

    <div class="content-page">
        <div class="container">
            <div id="main" class="row">
                <div class="span3" style="padding-top: 30px;">
                    <?php get_sidebar(); ?>
                </div>
                <section id="primary" class="span8"><a name="#primary"></a>

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
<?php else: ?>

    <div class="content-page">
        <div class="container">
            <div id="main" class="row">
                <div class="span2"></div>
                <section id="primary" class="span9"><a name="#primary"></a>

                    <div id="content">
                        <?php if (have_posts()) : while (have_posts()) :
                            the_post();
                            get_template_part('/partials/content', get_post_type()); ?>
                        <?php endwhile; else:
                            get_template_part('/partials/content', 'not-found'); ?>
                        <?php endif; ?>

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
<?php endif; ?>

<?php get_footer(); ?>