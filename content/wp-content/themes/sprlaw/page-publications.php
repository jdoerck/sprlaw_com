<?php
/**
 * Template Name: Page - Publications
 * Created by JetBrains PhpStorm.
 * User: jdoerck
 * Date: 8/13/13
 * Time: 3:33 PM
 */

get_header(); ?>

<div class="content-page">
    <div class="content-row">
        <div class="gradyizer">
            <div class="container hold <?php if(is_mobile()){ echo 'mobile'; } ?><?php if(is_ipad()){ echo 'ipad'; } ?>">
                <div class="row expertise-title-row">
                    <h1 class="title-client"><?php the_title(); ?></h1>
					<?php the_content(); ?>
                </div>
                <div class="row expertise-row">
                    <div class="span2"><h5>Articles</h5></div>
                    <div class="span10">
                        <?php echo get_pubs(44); ?>
                    </div>
                </div>
                <div class="row expertise-row">
                    <div class="span2"><h5>Case Studies</h5></div>
                    <div class="span10 expertise-content">
                        <?php echo get_pubs(45); ?>
                    </div>
                </div>
                <div class="row expertise-row">
                    <div class="span2"><h5>Periodicals</h5></div>
                    <div class="span10 expertise-content">
                        <?php echo get_pubs(46); ?>
                    </div>
                </div>
                <div class="row expertise-row">
                    <div class="span2"><h5>Books</h5></div>
                    <div class="span10 expertise-content">
                        <?php echo get_pubs(47); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
