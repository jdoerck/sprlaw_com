
<?php
$i = 0;


$post_objects = get_field('home_carousel_items');

//echo '<pre>';
//print_r($post_objects);
//echo '</pre>';


if ($post_objects): ?>
    <?php foreach ($post_objects as $post): // variable must be called $post (IMPORTANT)
        if ($i == 0) {
            $active = ' active';
        }
        $thisID = $post->ID;
        $link = get_permalink($thisID);
        if (strlen(get_field('headline_url')) > 0) {
            $link = get_field('headline_url');

        }
//            $carousel_inner .= '<div class="item' . $active . '" style="height:360px;"><div class="carousel-caption"><a href="' . get_permalink($headline->ID) . '"><h4>' . $headline->post_title . '</h4><p>' . $headline->post_excerpt . '</p></div></div>';
        $carousel_inner .= '<div class="item' . $active . '">' .get_the_post_thumbnail($thisID, 'full') . '<div class="carousel-caption"><h4><a href="' . $link . '">' . $post->post_title . '</a></h4></div></div>';
        $carousel_indicators .= '<li data-target="#home_carousel" data-slide-to="' . $i . '" class="' . $active . '"></li>';
        $i++;
        $active = '';
    endforeach; ?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
endif;

wp_reset_postdata();?>

<div id="home_carousel" class="carousel slide">
    <ol class="carousel-indicators">
        <?php echo $carousel_indicators; ?>
    </ol>
    <div class="carousel-inner">
        <?php echo $carousel_inner; ?>
    </div>
        <!--
        <a class="carousel-control left" href="#home_carousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#home_carousel" data-slide="next">&rsaquo;</a>
        -->
    </div>
    <?php // $publication_attorney = get_post_meta(get_the_ID(), 'publication_attorney', true);
    the_post();

?>