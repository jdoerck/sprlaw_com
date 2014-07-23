<form method="get" id="searchform" class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="hidden" name="post_type" value="post" />
	<label for="s" class="assistive-text hidden"><?php _e( 'Search Blog', 'sprlaw' ); ?></label>
	<div class="input-append">
		<input id="s" class="span2 search-query" type="search" name="s" placeholder="<?php esc_attr_e( 'Search Blog', 'sprlaw' ); ?>">
        <button class="btn btn-primary" name="submit" id="searchsubmit" type="submit"><?php _e( 'Go', 'sprlaw' ); ?></button>
   	</div>
</form>