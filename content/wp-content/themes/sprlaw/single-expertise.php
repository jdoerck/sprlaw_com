<?php get_header();

  /*
   * As it seems a CPT can not have the same name as a template file or a page. I can't seem to figure out why that is though.
   */

if (get_post_type() == 'expertise'): ?>

    <?php if (have_posts()) : while (have_posts()) :
        the_post();
        get_template_part('/partials/content', get_post_type()); ?>
    <?php endwhile; else:
        get_template_part('/partials/content', 'not-found'); ?>
    <?php endif; ?>


<?php endif; ?>

<?php get_footer(); ?>