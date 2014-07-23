<a name="#secondary"></a>
<div id="sidebar">
	<?php include('searchform.php'); ?>
	<h5 class="sidebartitle"><?php _e('Categories'); ?></h5>
	<ul class="list-cat unstyled">
		<?php
		
		$cat_badge = wp_list_categories('echo=0&sort_column=name&hierarchical=0&show_count=1&title_li=&orderby=count&order=DESC');
		$cat_badge = preg_replace('~\((\d+)\)(?=\s*+<)~', '<span class="badge badge-info badge-count">$1</span>', $cat_badge);
		echo $cat_badge;
		?>
	</ul>

    <h5 class="sidebartitle"><?php _e('Authors'); ?></h5>
    <ul class="list-authors unstyled">
        <?php
		wp_list_authors('exclude=26,20,31,34'); ?>
    </ul>

    <h5 class="sidebartitle"><?php _e('Archives'); ?></h5>
	<ul class="list-archives unstyled">
		<?php wp_get_archives('type=yearly'); ?>
	</ul>


</div>