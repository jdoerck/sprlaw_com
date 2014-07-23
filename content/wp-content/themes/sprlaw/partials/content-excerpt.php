<?php
/** content-excerpt.php
 *
 * The template for displaying page content in the page.php template
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0 - 07.02.2012
 */


?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="page-header">
        <a href="<?php echo get_permalink(); ?>"><?php userphoto_the_author_thumbnail() ?></a>
        <h1 class="entry-title"><a href="<?php echo get_permalink(); ?>" rel="bookmark"><?php echo get_the_title(); ?></a></h1>
        <div class="entry-meta">
            <?php
            if (get_post_type() == 'post'): ?>
                <span class="sep">Posted on </span>
                <a href="<?php echo get_permalink(); ?>" rel="bookmark">
                    <time class="entry-date"><?php the_date() ?></time>
                </a>
                <span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta(ID)); ?>" title="View all posts by Willis Hon" rel="author"><?php the_author() ?></a></span></span>
                <p>
                    Filed under:
                    <?php
                    $categories = get_the_category();
                    $separator = ' ';
                    $output = '';
                    $counter = 0;
                    if($categories){
                        foreach($categories as $category) {
                            if($counter > 0){
                                $output .= ', ';
                            }
                            $output .= ' <a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
                            $counter++;
                        }

                        echo trim($output, $separator);
                    }
                    ?>
                </p>
            <?php
            else:
                if (get_post_type() == 'attorney') {
                    echo '<p>Attorney Bio</p>';
                } elseif (get_post_type() == 'expertise') {
                    echo '<p>Expertise</p>';
                } elseif (get_post_type() == 'result') {
                    echo '<p>Result</p>';
                }
            endif; ?>
        </div>
	</header><!-- .entry-header -->

	<div class="entry-summary clearfix">
        <a href="<?php echo get_permalink(); ?>"><?php the_excerpt(); ?></a>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

<hr class="puff-n-stuff"/>


<?php
/* End of file content-excerpt.php */
/* Location: ./wp-content/themes/the-bootstrap/partials/content-page.php */
?>