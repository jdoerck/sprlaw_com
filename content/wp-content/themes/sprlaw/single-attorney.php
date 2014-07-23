<?php get_header();


if (get_post_type() == 'attorney'): ?>

    <?php if (have_posts()) : while (have_posts()) :
        the_post();
        get_template_part('/partials/content', get_post_type()); ?>
    <?php endwhile; else:
        get_template_part('/partials/content', 'not-found'); ?>
    <?php endif; ?>


<?php endif; ?>

<?php get_footer(); ?>