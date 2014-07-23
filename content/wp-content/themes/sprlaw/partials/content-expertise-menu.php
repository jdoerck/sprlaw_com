<?php


  if (is_mobile()) {
    $args = array('post_type' => 'expertise', 'posts_per_page' => -1, 'post_parent' => 0, 'orderby' => 'menu_order',
                  'order'     => 'ASC'
    );
    $loop = new WP_Query($args);
    ?>
    <select name="expertise-link" class="mobile-select">
      <option value="">-- choose an area of expertise --</option>

      <?
//      Environmental Law
        echo '<option value="' . get_permalink(2246) . '">' . get_the_title(2246) . '</option>';
      $environ_args = array('post_type' => 'expertise', 'posts_per_page' => -1, 'post_parent' => 2246, 'orderby' => 'menu_order',
          'order'     => 'ASC'
      );
      $environ_loop = new WP_Query($environ_args);
      while ($environ_loop->have_posts()) : $environ_loop->the_post();
          echo '<option value="' . get_permalink() . '"> - ' . get_the_title() . '</option>';
      endwhile;
      wp_reset_postdata();


      //      Development and Land Use
      echo '<option value="' . get_permalink(2253) . '">' . get_the_title(2253) . '</option>';
      $develop_args = array('post_type' => 'expertise', 'posts_per_page' => -1, 'post_parent' => 2253, 'orderby' => 'menu_order',
          'order'     => 'ASC'
      );
      $develop_loop = new WP_Query($develop_args);
      while ($develop_loop->have_posts()) : $develop_loop->the_post();
          echo '<option value="' . get_permalink() . '"> - ' . get_the_title() . '</option>';
      endwhile;
      wp_reset_postdata();

      //      Municipal Law
      echo '<option value="' . get_permalink(2256) . '">' . get_the_title(2256) . '</option>';
      $munic_args = array('post_type' => 'expertise', 'posts_per_page' => -1, 'post_parent' => 2256, 'orderby' => 'menu_order',
          'order'     => 'ASC'
      );
      $munic_loop = new WP_Query($munic_args);
      while ($munic_loop->have_posts()) : $munic_loop->the_post();
          echo '<option value="' . get_permalink() . '"> - ' . get_the_title() . '</option>';
      endwhile;
      wp_reset_postdata();

      //      Other
      echo '<option value="">Other</option>';
      $other_args = array('post_type' => 'expertise', 'posts_per_page' => -1, 'post_parent' => 0, 'post__not_in' => array( 2246, 2253, 2256 ), 'orderby' => 'menu_order',
          'order'     => 'ASC'
      );
      $other_loop = new WP_Query($other_args);
      while ($other_loop->have_posts()) : $other_loop->the_post();
          echo '<option value="' . get_permalink() . '"> - ' . get_the_title() . '</option>';
      endwhile;
      wp_reset_postdata();

      ?>
    </select>
    <?php
  } else { ?>
<?
    $environ_args = array('post_type' => 'expertise', 'posts_per_page' => -1, 'post_parent' => 2246, 'orderby' => 'menu_order',
                  'order'     => 'ASC'
    );
    $environ_loop = new WP_Query($environ_args);
    ?>

<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr expertise environmental">
    <thead>
        <tr><th>Environmental Law &amp; Litigation</th></tr>
    </thead>
      <?php while ($environ_loop->have_posts()) : $environ_loop->the_post();
          ?>
    <tr><td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td></tr>
        <?php endwhile;
      wp_reset_postdata();?>
</table>

  <?
  $develop_args = array('post_type' => 'expertise', 'posts_per_page' => -1, 'post_parent' => 2253, 'orderby' => 'menu_order',
      'order'     => 'ASC'
  );
  $develop_loop = new WP_Query($develop_args);
  ?>

  <table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr expertise develop">
      <thead>
      <tr><th>Development and Land Use</th></tr>
      </thead>
      <?php while ($develop_loop->have_posts()) : $develop_loop->the_post();
          ?>
          <tr><td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td></tr>
      <?php endwhile;
      wp_reset_postdata();?>
  </table>

  <?
  $munic_args = array('post_type' => 'expertise', 'posts_per_page' => -1, 'post_parent' => 2256, 'orderby' => 'menu_order',
      'order'     => 'ASC'
  );
  $munic_loop = new WP_Query($munic_args);
  ?>

  <table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr expertise municipal">
      <thead>
      <tr><th>Municipal Law</th></tr>
      </thead>
      <?php while ($munic_loop->have_posts()) : $munic_loop->the_post();
          ?>
          <tr><td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td></tr>
      <?php endwhile;
      wp_reset_postdata();?>
  </table>

  <?
  $other_args = array('post_type' => 'expertise', 'posts_per_page' => -1, 'post_parent' => 0, 'orderby' => 'menu_order',
      'order'     => 'ASC', 'post__not_in' => array( 2246, 2253, 2256 )
  );
  $other_loop = new WP_Query($other_args);
  ?>

  <table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr expertise other">
      <thead>
      <tr><th>Other</th></tr>
      </thead>
      <?php while ($other_loop->have_posts()) : $other_loop->the_post();
          ?>
          <tr><td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td></tr>
      <?php endwhile;
      wp_reset_postdata();?>
  </table>

<?php

  }

?>