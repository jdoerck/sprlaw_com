<?php


  $table_content = '';

  $list_post_type = 'attorney';

  // Category Listing

$args = array(
    'posts_per_page' => -1,
    'post_type'      => 'attorney',
    'post_status'    => 'publish',
    'meta_query'     => array(
        array(
            'key'       => 'attorney_title',
            'value'     => 'Principal',
            'compare'   => '=='
        )
    ),
    'orderby'  => 'meta_value',
    'meta_key' => 'attorney_alphabetize',
    'order'    => 'ASC',
);

$args2 = array(
    'posts_per_page' => -1,
    'post_type'      => 'attorney',
    'post_status'    => 'publish',
    'meta_query'     => array(
        array(
            'key'       => 'attorney_title',
            'value'     => 'Associate',
            'compare'   => '=='
        )
    ),
    'orderby'  => 'meta_value',
    'meta_key' => 'attorney_alphabetize',
    'order'    => 'ASC',
);

$args3 = array(
    'posts_per_page' => -1,
    'post_type'      => 'attorney',
    'post_status'    => 'publish',
    'meta_query'     => array(
        array(
            'key'       => 'attorney_title',
            'value'     => 'Of Counsel',
            'compare'   => '=='
        )
    ),
    'orderby'  => 'meta_value',
    'meta_key' => 'attorney_alphabetize',
    'order'    => 'ASC',
);


     $prin_content = '';
     $prin_content2 = '';
     $asso_content = '';
        $counsel_content = '';
     $mobile_content = '';
     $loop = new WP_Query($args);

    $count = sizeof($loop->posts);
    $split = round($count * .5);
    $i = 1;

    // The Loop
    while ($loop->have_posts()) : $loop->the_post();
        if ($i <= $split) {
            $prin_content .= '
                <tr class="principals">
                <td><a href="' . get_permalink() . '">' . get_the_title() . '</a></td>
            </tr>';
        } else {
            $prin_content2 .= '
                <tr class="principals">
                    <td><a href="' . get_permalink() . '">' . get_the_title() . '</a></td>
                </tr>';
        }
        $i++;

        $mobile_content .= '<option value="' . (get_permalink()) . '">' . get_the_title() . '</option>';

    endwhile;
    wp_reset_query();
    $loop = new WP_Query($args2);

      // The Loop
      while ($loop->have_posts()) : $loop->the_post();

        $asso_content .= '
        <tr class="associates">
            <td><a href="' . get_permalink() . '">' . get_the_title() . '</a></td>
        </tr>';
        $mobile_content .= '<option value="' . (get_permalink()) . '">' . get_the_title() . '</option>';

      endwhile;
      wp_reset_query();

    $loop = new WP_Query($args3);

    // The Loop
    while ($loop->have_posts()) : $loop->the_post();

        $counsel_content .= '
            <tr class="of_counsel">
                <td><a href="' . get_permalink() . '">' . get_the_title() . '</a></td>
            </tr>';
        $mobile_content .= '<option value="' . (get_permalink()) . '">' . get_the_title() . '</option>';

    endwhile;
    wp_reset_query(); ?>

<select name="attorney" class="mobile-select">
	<option value="">-- choose an attorney --</option>
	<?php echo $mobile_content; ?>
</select>

<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr attorney principal first">
    <thead>
        <th>Principals</th>
    </thead>
    <tbody>
    <?php echo $prin_content; ?>
    </tbody>
</table>
<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr attorney principal second">
    <thead>
        <th>&nbsp;</th>
    </thead>
    <tbody>
    <?php echo $prin_content2; ?>
    </tbody>
</table>
<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr attorney associate">
    <thead>
        <th>Associates</th>
    </thead>
    <tbody>
    <?php echo $asso_content; ?>
    </tbody>
</table>
<table border="0" cellspacing="0" cellpadding="0" id="result_table" class="table-spr attorney counsel">
    <thead>
        <th>Of Counsel</th>
    </thead>
    <tbody>
    <?php echo $counsel_content; ?>
    </tbody>
</table>


