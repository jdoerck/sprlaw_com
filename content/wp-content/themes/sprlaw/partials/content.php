

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header">
	<?php if ( is_sticky() AND is_home() ) : ?>
		<hgroup>
			<?php the_title( '<h1 class="entry-title"><a href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'the-bootstrap' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark">', '</a></h1>' ); ?>
			<h3 class="entry-format"><?php _e( 'Featured', 'the-bootstrap' ); ?></h3>
		</hgroup>
	<?php
		else :
			the_title( '<h1 class="entry-title"><a href="' . get_permalink() .'" title="' . sprintf( esc_attr__( 'Permalink to %s', 'the-bootstrap' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark">', '</a></h1>' );
		endif;

		if ( 'post' == get_post_type() ) : ?>
			<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php userphoto_the_author_thumbnail() ?></a>
		<div class="entry-meta">
            <p><?php jdoerck_posted_on();

            $categories_list = get_the_category_list( _x( ', ', 'used between list items, there is a space after the comma', 'jdoerck' ) );

            if ( 'post' == get_post_type() AND $categories_list ) // Hide category text for pages on Search
                printf( '<span class="cat-links block">' . __( ' in %1$s.', 'jdoerck' ) . '</span>', $categories_list );
            ?></p>

		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( !is_single() ) : // Only display the excerpt unless this is a single page ?>
	<div class="entry-summary clearfix">
        <a href="<?php echo get_permalink(); ?>"><?php the_excerpt(); ?></a
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content clearfix">
		<?php if ( has_post_thumbnail() ) : ?>
		<a class="thumbnail post-thumbnail span2" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail( 'thumbnail' ); ?>
		</a>
		<?php endif;
		the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'jdoerck' ) );
		jdoerck_link_pages(); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php
		// $categories_list = get_the_category_list( _x( ', ', 'used between list items, there is a space after the comma', 'jdoerck' ) );

		//if ( 'post' == get_post_type() AND $categories_list ) // Hide category text for pages on Search
			//printf( '<span class="cat-links block">' . __( 'Posted in %1$s.', 'jdoerck' ) . '</span>', $categories_list );
		?>
	</footer><!-- #entry-meta -->
	<?php

	if ( is_single() ) :
//		comment_form();
	endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->

<hr class="puff-n-stuff" />
