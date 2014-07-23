<?php

error_reporting(0);


$sql = "UPDATE wp_d8gz4i_options SET option_value = 'a:0:{}' WHERE option_name = 'active_plugins'";

//flush_rewrite_rules(true);

//add_action( 'init', 'create_post_type' );
function create_post_type()
{
    register_post_type('expertise',
        array(
            'labels' => array(
                'name' => __('Expertise'),
                'singular_name' => __('Expertise')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'expertise'),
            'hierarchical' => true,
            'has_archive' => true,
            'rewrite' => false
        )
    );
}


if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(150, 150); // default Post Thumbnail dimensions
}

if (function_exists('add_image_size')) {
    add_image_size('result-thumb', 100, 75, true);
    add_image_size('home_carousel', 1200, 365, true);
    add_image_size('carousel', 1200, 300, true);
    add_image_size('thumb_attorney', 100, 100, false);
    add_image_size('attorney_page', 170, auto, true);
    add_image_size('thumb_publication', 70, 70, false);
    add_image_size('post-secondary-image-thumbnail', 1200, 300);
	add_image_size('list-page2', 190, 98, true);

}

register_sidebar(array(
    'name' => __( 'Honors Tab, Header' ),
    'id' => 'honors-tab',
    'description' => __( 'Widgets in this area will be shown in the header when the Honors button is pushed.' ),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
));

register_sidebar(array(
	'name' => __( 'Column Banners' ),
	'id' => 'column-banners',
	'description' => __( 'Widgets in this area will be shown in the right column of selected pages' ),
	'before_widget' => '',
	'after_widget' => ''
//,
//	'before_title' => '<h3 class="widget-title">',
//	'after_title' => '</h3>'
));


//register_sidebar(array(
//    'name' => __( 'Honors Tab, Header' ),
//    'id' => 'honors-tab',
//    'description' => __( 'Widgets in this area will be shown in the header when the Honors button is pushed.' ),
//    'before_widget' => '<div id="%1$s" class="widget %2$s">',
//    'after_title' => '</div>'
//));


if (!function_exists('jdoerck_posted_on')) :

    function jdoerck_posted_on()
    {
        printf(__('<p></p><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span></p><span class="sep">Posted </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a>', 'sprlaw'),
            esc_url(get_permalink()),
            esc_attr(get_the_time()),
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
            esc_attr(sprintf(__('View all posts by %s', 'sprlaw'), get_the_author())),
            get_the_author()
        );

    }
endif;

if (!function_exists('jdoerck_link_pages')) :

    function jdoerck_link_pages($args = array())
    {
        wp_link_pages(array('echo' => 0));
        $defaults = array(
            'next_or_number' => 'number',
            'nextpagelink' => __('Next page', 'sprlaw'),
            'previouspagelink' => __('Previous page', 'sprlaw'),
            'pagelink' => '%',
            'echo' => true
        );

        $r = wp_parse_args($args, $defaults);
        $r = apply_filters('jdoerck_link_pages_args', $r);
        extract($r, EXTR_SKIP);

        global $page, $numpages, $multipage, $more, $pagenow;

        $output = '';
        if ($multipage) {
            if ('number' == $next_or_number) {
                $output .= '<nav class="pagination clear"><ul><li><span class="dots">' . __('Pages:', 'sprlaw') . '</span></li>';
                for ($i = 1; $i < ($numpages + 1); $i++) {
                    $j = str_replace('%', $i, $pagelink);
                    if (($i != $page) || ((!$more) && ($page != 1))) {
                        $output .= '<li>' . _wp_link_page($i) . $j . '</a></li>';
                    }
                    if ($i == $page) {
                        $output .= '<li class="current"><span>' . $j . '</span></li>';
                    }

                }
                $output .= '</ul></nav>';
            } else {
                if ($more) {
                    $output .= '<nav class="pagination clear"><ul><li><span class="dots">' . __('Pages:', 'sprlaw') . '</span></li>';
                    $i = $page - 1;
                    if ($i && $more) {
                        $output .= '<li>' . _wp_link_page($i) . $previouspagelink . '</a></li>';
                    }
                    $i = $page + 1;
                    if ($i <= $numpages && $more) {
                        $output .= '<li>' . _wp_link_page($i) . $nextpagelink . '</a></li>';
                    }
                    $output .= '</ul></nav>';
                }
            }
        }

        if ($echo)
            echo $output;

        return $output;
    }
endif;

// custom admin login logo
function jdoerck_custom_login_logo()
{
    echo '

// <div id="grid" style="height: 100%; width: 100%;position: absolute;top: 0;left: 0;opacity: .5;background-image: url(' . get_bloginfo('template_directory') . '/_i/grid.png) !important;"> </div>
<style type="text/css">
		body {
			background: #2a454d; /* Old browsers */

		background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzJhNDU0ZCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMzYTY0NzUiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
		background: -moz-linear-gradient(left,  #2a454d 0%, #3a6475 100%) !important; /* FF3.6+ */
		background: -webkit-gradient(linear, left top, right top, color-stop(0%,#2a454d), color-stop(100%,#3a6475)) !important; /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(left,  #2a454d 0%,#3a6475 100%) !important; /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(left,  #2a454d 0%,#3a6475 100%) !important; /* Opera 11.10+ */
		background: -ms-linear-gradient(left,  #2a454d 0%,#3a6475 100%) !important; /* IE10+ */
		background: linear-gradient(to right,  #2a454d 0%,#3a6475 100%) !important; /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#2a454d\', endColorstr=\'#3a6475\',GradientType=1 ) !important; /* IE6-8 */
		}
	h1 { background-image: url(' . get_bloginfo('template_directory') . '/_i/logo_spr.png) !important; height: 56px !important; width: 409px !important; margin-left: -35px !important; }
	h1 a { background-image: none !important; }

	#login {
		z-index: 1000;position: relative;
	}
	#nav, #backtoblog {
		display: block;
		text-align: center;
	}
	#nav a, #backtoblog a {
		display: inline-block;
		margin-top: 10px;
		background-color: #FFF;
		padding: 10px;
		-moz-border-radius: 3px;
		border-radius: 3px;
		-webkit-box-shadow: rgba(200,200,200,0.7) 0 4px 10px -1px;
		box-shadow: rgba(200,200,200,0.7) 0 4px 10px -1px;
	}

	</style>

';
}


add_action('login_head', 'jdoerck_custom_login_logo');


// custom admin login logo
function jdoerck_custom_login_logo_foot()
{
    echo '<div id="grid" style="height: 100%; width: 100%; background-color: red;position: absolute;top: 0;left: 0;opacity: .5; z-index: 1;"> </div>';
}

add_action('login_foot', 'jdoerck_custom_login_logo_foot');


add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes($existing_mimes = array())
{
    // add your extension to the array
    $existing_mimes['vcf'] = 'text/x-vcard';
    return $existing_mimes;
}

// making featured image work in Attorneys

if (class_exists('MultiPostThumbnails')) {

    $thumb3 = new MultiPostThumbnails(array(
            'label' => 'Featured Image',
            'id' => 'lawyer_image',
            'post_type' => 'lawyer'
        )
    );
    new MultiPostThumbnails(
        array(
            'label' => 'Secondary Image',
            'id' => 'secondary-image',
            'post_type' => 'result'
        )
    );

}

// Split names in to First (Middle). Last
function split_name($name, $prefix = '')
{
    $pos = strrpos($name, ' ');

    if ($pos === false) {
        return array(
            $prefix . 'firstname' => $name,
            $prefix . 'surname' => null
        );
    }

    $firstname = substr($name, 0, $pos + 1);
    $surname = substr($name, $pos);

    return array(
        $prefix . 'firstname' => $firstname,
        $prefix . 'surname' => $surname
    );
}

function parse_feed($feed)
{
    $stepOne = explode("<content type=\"html\">", $feed);
    $stepTwo = explode("</content>", $stepOne[1]);
    $tweet = $stepTwo[0];
    $tweet = html_entity_decode($tweet);
    return $tweet;
}

function showTwitter($username)
{
    $feed = "http://search.twitter.com/search.atom?q=from:" . $username . "&rpp=1";
    $twitterFeed = file_get_contents($feed);
    return stripslashes(parse_feed($twitterFeed));
}

function func_show_child_pages()
{
    $ID = get_the_ID();
    $pages = get_pages(array('child_of' => $ID, 'sort_column' => 'post_date', 'sort_order' => 'desc', 'post_status' => 'publish'));
    foreach ($pages as $page) {
        $html .= '<a href="' . get_page_link($page->ID) . '">' . $page->post_title . '</a><br />';
    }
    return $html;
}

add_shortcode('show_child_pages', 'func_show_child_pages');

function mobile_phone_link($number) {
    $cleanAttPhone = array(')', '(', ' ', '-');
    $cleanAttPhoneRep = array('', '', '', '');
    $cleanPhoneNum = str_replace($cleanAttPhone, $cleanAttPhoneRep, $number);
    if (substr($cleanPhoneNum, 0, 1) == 1) {
        $cleanPhoneNum = substr($cleanPhoneNum, 1);
    }
    $cleanPhoneNum = substr($cleanPhoneNum, 0, 10);
    return $cleanPhoneNum;
}

function get_pubs($cat_ID) {
    $args = array(
        'posts_per_page'   => -1,
        'category'         => $cat_ID
    );
    $articles = get_posts( $args );
    $html = '';
    if (NULL != $articles) :
        $html .= '<ul class="pubs">';
        foreach ( $articles as $article ) : setup_postdata( $article );
            $html .= '<li><a href="' . get_permalink($article->ID) . '">' . get_the_title($article->ID) . '</a><br />' . get_the_excerpt($article->ID) . '</li>';
        endforeach;
        $html .= '</ul>';
    endif;
    return $html;
}

// add admin css
add_action( 'admin_print_styles', 'load_custom_admin_css' );
function load_custom_admin_css()
{
    wp_enqueue_style('my_style', WP_CONTENT_URL . '/themes/custom_admin.css');
}
//end admin css

if ($_GET["s"]) {
	function custom_excerpt_more( $more ) {
		return ' &hellip; <span class="read_more"><span class="cont">Read More</span></span>';
	}
	add_filter( 'excerpt_more', 'custom_excerpt_more' );
} else {
function custom_excerpt_more( $more ) {
    return ' &hellip; <span class="read_more"><span class="cont">Read Post</span></span>';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );
}


function add_table_row($data) {
	return '<tr><td>' . $data . '</td></tr>';
}

function att_list_item($data, $excerpt) {
	return '<p>' . $data . '<br />' . $excerpt . '</p>';
}

function get_category_id($cat_name){
	$term = get_term_by('name', $cat_name, 'category');
	return $term->term_id;
}

function filter_2_years($where = '') {
	$today = date('Y-m-d');
	$newdate = strtotime ( '-2 year' , strtotime ( $today ) ) ;
	$ayearago = date( 'Y-m-d' , $newdate );
	$where .= " AND post_date >= DATE('{$ayearago}')";
	return $where;
}


function get_associated_attorneys($associated_attorneys, $num_of_atty) {
	$i = 0;
	$plural = '';
	$html = '';
	if ($associated_attorneys):

		if ($num_of_atty > 1) {
			$plural = 's';
		}
		$html .= '<div>
			<h5>Attorney' . $plural . '</h5>';

		$query_ids = '';
		while ($i < $num_of_atty):
			$query_ids .= $associated_attorneys[0][$i];
			if ($i != ($num_of_atty - 1)) {
				$query_ids .= ', ';
			}
			$i++;
		endwhile;

		$atty_args =  array(
			'post_type' => 'attorney',
			'include' => $query_ids,
			'orderby' => 'menu_order',
			'order' => 'ASC'
		);

		$attorney_list = get_posts($atty_args);
		foreach ( $attorney_list as $attorney ) :
			$html .=  '<a href="' . get_permalink($attorney->ID) . '">' . get_the_title($attorney->ID) . '</a><br />';
		endforeach;

		$html .=  '</div>';
	endif;

	return $html;
}