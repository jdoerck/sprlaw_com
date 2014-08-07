<a name="#secondary"></a>
<div id="sidebar">

		<form id="searchform" class="form-search feedburner" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=sprlaw', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
			<label for="s" class="assistive-text hidden">Receive Blog Updates via email</label>
			<div class="input-append">
				<input id="s" class="form-control search-field span2 search-query" type="text" value="email" onfocus="if(this.value=='Your email here')this.value='';" onblur="if(this.value=='')this.value='email'" name="email">
				<button type="submit" id="searchsubmit" class="btn btn-default btn-submit btn btn-primary">Subscribe</button>
				<input type="hidden" value="sprlaw" name="uri">
				<input type="hidden" name="loc" value="en_US">
			</div>
			<h5 class="sidebartitle updates">Receive Blog Updates via email</h5>
		</form>

	<hr />

	<p><a href="http://feeds.feedburner.com/sprlaw" rel="alternate" type="application/rss+xml"><img src="//feedburner.google.com/fb/images/pub/feed-icon16x16.png" alt="" style="vertical-align:middle;border:0"/></a>&nbsp;<a href="http://feeds.feedburner.com/sprlaw" rel="alternate" type="application/rss+xml">Subscribe to the blog</a></p>

	<hr />

	<?php


	// dynamic_sidebar('Feedburner');

	include('searchform.php');

	?>

	<hr />

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