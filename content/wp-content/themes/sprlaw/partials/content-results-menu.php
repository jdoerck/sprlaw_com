<?php

  $content = '';
  $table_content = '';

  $list_post_type = 'result';


  // Category Listing
  if ($list_post_type == 'result') {
    $args = array('child_of'   => get_field('listing_parent_id'), 'orderby' => 'title', 'include' => '5, 20, 60',
                  'hide_empty' => 0
    );
  } else {
    $args = array('child_of' => get_field('listing_parent_id'), 'orderby' => 'title'
    );
  }

  $args = array('child_of'   => get_field('listing_parent_id'), 'orderby' => 'title', 'include' => '5, 20, 60',
                'hide_empty' => 0
  );

  $categories = get_categories($args);

  if (is_mobile()) {
    ?>
    <select name="attorney" class="mobile-select">
      <option value="">-- choose --</option>
      <?php

        // The Loop
        foreach ($categories as $category) {

          if ($list_post_type == 'result') {
            $add_result_args = '
            \'meta_key\'          => \'result_category\',
            \'meta_compare\'      => \'LIKE\',
            \'meta_value\'        => ' . $category->cat_ID;
          } else {

          }

          $result_args = array('posts_per_page' => -1, 'orderby' => 'title', 'order' => 'DESC',
                               'post_type'      => $list_post_type, 'post_status' => 'publish',
            //            This is for Results
                               'meta_key'       => 'result_category', 'meta_compare' => 'LIKE',
                               'meta_value'     => $category->cat_ID

          );

          $myposts = get_posts($result_args);
          foreach ($myposts as $post) :  setup_postdata($post);
            $result_category     = get_field('result_category');
            $the_result_category = '';

			if (get_field('result_show_in_menu') == true):
            	foreach ($result_category as $a_category) {
              		$the_result_category .= get_cat_name($a_category);
            	}
            	echo '<option value="' . get_permalink() . '">' . get_the_title() . '</option>';
			endif;

          endforeach;
          wp_reset_postdata();

        }
      ?>
    </select>
  <?php
    wp_reset_query();
  } else {


    $table_content = '<table border="0" cellspacing="0" cellpadding="0" style="width: 100%" id="result_table" class="tablesorter table-spr"><thead><tr><th>Featured Results</th><th>Category</th><th>Location</th><th>Date</th></tr></thead><tbody>';

    // The Loop
    foreach ($categories as $category) {

      if ($list_post_type == 'result') {
        $add_result_args = '
            \'meta_key\'          => \'result_category\',
            \'meta_compare\'      => \'LIKE\',
            \'meta_value\'        => ' . $category->cat_ID;
      } else {

      }

      $result_args = array('posts_per_page' => -1, 'orderby' => 'title', 'order' => 'DESC',
                           'post_type'      => $list_post_type, 'post_status' => 'publish',
        //            This is for Results
                           'meta_key'       => 'result_category', 'meta_compare' => 'LIKE',
                           'meta_value'     => $category->cat_ID

      );

      $myposts = get_posts($result_args);
      foreach ($myposts as $post) :  setup_postdata($post);
		  if (get_field('result_show_in_menu') == true):
        	$result_category     = get_field('result_category');
        	$the_result_category = '';
        	foreach ($result_category as $a_category) {
          		$the_result_category .= get_cat_name($a_category);
        	}

        	$table_content .= '<tr>
          		<td><a href="' . get_permalink() . '">' . get_the_title() . '</a></td>
          		<td>' . $the_result_category . '</td>
          	<td>' . str_replace(" ", "&nbsp;", get_field('result_location')) . '</td>
          		<td>' . get_field('result_date') . '</td></tr>';
		  endif;
      endforeach;
      wp_reset_postdata();

    }
	$table_content .= '<tr><td colspan="4"><a href="/results/">More Results</a></td></tr>';
    $table_content .= '</tbody></table>';
  }

  echo $table_content;
?>