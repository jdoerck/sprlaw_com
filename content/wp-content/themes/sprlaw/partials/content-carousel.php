<?php
/** content-carousel.php
 */


$image_counter = 0;

$carousel_images = array();

$carousel_images[] = get_the_post_thumbnail(get_the_ID(),'carousel');

if (class_exists('MultiPostThumbnails')):
    $carousel_images[] = MultiPostThumbnails::get_the_post_thumbnail(get_post_type(), 'secondary-image', null, 'post-secondary-image-thumbnail');
endif;
?>

    <div id="" class="carousel-sprlaw carousel slide">
        <ol class="carousel-indicators">

        </ol>
        <!-- Carousel items -->
        <div class="carousel-inner">
            <?php foreach($carousel_images as $image): ?>
                <div class="item <?php if ($image_counter == 0):?>active<?php endif; ?>"><?php echo $image ?><div class="carousel-caption"></div></div>
                <?php $image_counter++ ?>
            <?php endforeach ?>
        </div>

    </div>
<?php
/* End of file content-carousel.php */
/* Location: ./wp-content/themes/the-bootstrap/partials/content-gallery.php */