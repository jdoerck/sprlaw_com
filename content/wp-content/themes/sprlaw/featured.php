<?php
  $i = 0;

  $post_objects = get_field('home_featured_items');
    $scheduled = '';

  if ($post_objects): ?>
    <?php foreach ($post_objects as $post): // variable must be called $post (IMPORTANT)
      if ($i < 2): ?>
        <?php setup_postdata($post);
          $item = '';

        $subtitle = "Featured Post";
        $type = get_post_type( $post->ID );
            switch ($type) {
                case "features":
                    $subtitle = "Feature";
                    break;
                case "page":
                    $subtitle = "Feature";
                    break;
                case "attorney":
                    $subtitle = "Attorney Spotlight";
                    break;
                case "result":
                    $subtitle = "Featured Result";
                    break;
                case "expertise":
                    $subtitle = "Feature";
            }

            $atty_feature = get_post_meta($post->ID, 'is_attorney_feature');
          if ($atty_feature[0] == true) {
              $subtitle = "Attorney Spotlight";
          }


          $class = '';
          if (is_mobile()) {
              $class = 'mobile';
          } if (is_ipad()) {
              $class = 'ipad';
          }
	      if (get_field('headline_url') > 0) {
		      $link = get_field('headline_url');
	      } else {
		      $link = get_permalink($post->ID);
	      }

          $title = get_the_title($post->ID);

          $item .= "<div class=\"span4\"><div class=\"featured-box $class\"><h5>$subtitle</h5><h3><a href=\"$link\">$title</a></h3></div></div>\n";

          if ($subtitle == "Attorney Spotlight") {
            $scheduled = $item . $scheduled;
          } else {
              $scheduled .= $item;
          }
        $i++;
      endif;
    endforeach; ?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
  <?php endif;

echo $scheduled;


$args = array('posts_per_page' => 1);
$latest_post = get_posts($args);
foreach ( $latest_post as $post ) : setup_postdata( $post ); ?>
    <div class="span4">
        <div class="featured-box <?php if (is_mobile()) {
            echo 'mobile';
        } ?><?php if (is_ipad()) {
            echo 'ipad';
        } ?>">
            <h5>From The Blog</h5>
            <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
        </div>
    </div>
<?php endforeach;
wp_reset_postdata();?>
