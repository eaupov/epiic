<?php

/**
* Поддержка миниатюр
**/
add_theme_support( 'post-thumbnails' );

/**
* Подключение меню
**/
function register_my_menus() {
  register_nav_menus(
     array(
  'main-menu' => __( 'main-menu' ),
  'footer-menu1' => __( 'footer-menu1' ),
  'footer-menu2' => __( 'footer-menu2' ),
  'footer-menu3' => __( 'footer-menu3' ),
  'footer-menu4' => __( 'footer-menu4' ),
  'footer-menu5' => __( 'footer-menu5' )
	));
}
add_action( 'init', 'register_my_menus' );



function enqueue_styles() {
	//wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css');
	//wp_enqueue_style('owl.carousel', get_theme_file_uri('/libs/owl/owl.carousel.min.css'));
	//wp_enqueue_style('owl.theme', get_theme_file_uri('/libs/owl/owl.theme.default.min.css'));
	//wp_enqueue_style('bootstrap-select', get_theme_file_uri('/libs/bootstrap-select/bootstrap-select.min.css'));
	wp_enqueue_style('main', get_theme_file_uri('/css/main.css'));
	wp_enqueue_style('emil_style', get_theme_file_uri('/css/emil_style.css'));
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
	wp_deregister_script('jquery');
	wp_enqueue_script('all.min', get_theme_file_uri('/js/all.min.js'));
	//wp_enqueue_script('jquery', get_theme_file_uri('/libs/jquery/dist/jquery.min.js'));
	//wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js');
	//wp_enqueue_script('owl-carousel', get_theme_file_uri('/libs/owl/owl.carousel.min.js'));
	//wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
	//wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js');
	//wp_enqueue_script('bootstrap-select', get_theme_file_uri('/libs/bootstrap-select/bootstrap-select.min.js'));
	//wp_enqueue_script('app', get_theme_file_uri('/js/app.js'));
	wp_enqueue_script('emil_js', get_theme_file_uri('/js/emil_js.js'));
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

add_filter('script_loader_tag', 'add_async_attribute', 10, 2);

function add_async_attribute($tag, $handle)
{
    if(!is_admin()){
        if ('jquery-core' == $handle) {
            return $tag;
        }
        return str_replace(' src', ' defer src', $tag);
    }else{
        return $tag;
    }
}
/*
add_filter( 'style_loader_tag', 'add_rel_preload', 10, 4 );
function add_rel_preload($html, $handle, $href, $media) {
    
	if (!is_admin_bar_showing()){
     $html = <<<EOT
<link rel='preload' as='style' onload="this.onload=null;this.rel='stylesheet'" id='$handle' href='$href' type='text/css' media='all' />
EOT;
    return $html;}else{
		return $html;
	}
}
*/

function footer_enqueue_scripts(){
	remove_action('wp_head','wp_print_scripts');
	remove_action('wp_head','wp_print_head_scripts',9);
	remove_action('wp_head','wp_enqueue_scripts',1);
	add_action('wp_footer','wp_print_scripts',5);
	add_action('wp_footer','wp_enqueue_scripts',5);
	add_action('wp_footer','wp_print_head_scripts',5);
}
add_action('after_setup_theme','footer_enqueue_scripts');

//remove_filter( 'the_content', 'wpautop' );


function top_article_func($atts){
	//$atts['tag'];
	$code_final = '';
	$code_final = $code_final.'<section class="section section-gray top-articles"><div class="container"><div class="text-center"><h2>Top From The Blog</h2></div><div class="content-wrapper"><div class="top-articles-carousel owl-carousel carousel-nav">';
	$my_posts = get_posts(array('tag' => 'top'));
	foreach ($my_posts as $post){
		setup_postdata($post);
		$cat_need = wp_get_post_categories($post->ID, array('fields' => 'names'));
		$code_final = $code_final.'<div class="top-articles__card card-white"><div class="top-articles__card-img"><img src="'.get_the_post_thumbnail_url($post->ID, 'medium' ).'" alt="'.get_the_title($post->ID).'" loading="lazy"></div><div class="top-articles__card-text"><div class="hashtags"><div class="hashtags__item">'.$cat_need[0].'</div></div><div class="top-articles__card-head">'.get_the_title($post->ID).'</div><div><a href="'.get_permalink($post->ID).'" class="button outline small with-icon">Learn more</a></div></div></div>';
	};
	wp_reset_postdata();
	$code_final = $code_final.'</div><a href="/blog/" class="go-blog">Go to the blog <img src="/wp-content/themes/LastingTrend/images/go-blog.svg" alt="go-blog" loading="lazy"></a></div></div></section>';
	return $code_final;
}
add_shortcode('top_article', 'top_article_func');

function place_func($atts){
	//$atts['tag'];
	$code_final = '<div class="trends"><div class="section sertif-index"><div class="row m80"><div class="col-md-6 d-flex justify-content-center"><div class="sertif-index__container text-center"><div class="h3">9 th Place</div><div>Top 15 New York SEO Services<br> Companies – Leaders (Clutch)</div></div></div><div class="col-md-6 d-flex justify-content-center"><div class="sertif-index__container text-center"><div class="h3">15 th Place</div><div>Top 90 SEO Companies<br> in New York (The Manifest)</div></div></div></div><div class="sertif-index-container"><div class="row m80"><div class="col-md-6 text-center"><img class="sertif-index-img" src="/wp-content/themes/LastingTrend/images/googl-about.png" alt="googl" loading="lazy"><div class="text-center">We are Google Ads certified partner</div></div><div class="col-md-6 text-center"><img class="sertif-index-img" src="/wp-content/themes/LastingTrend/images/clutch5.png" alt="clutch" loading="lazy"><div class="text-center">5-star verified reviews profile on Clutch from real business owners</div></div></div></div></div></div>';
	return $code_final;
}
add_shortcode('places', 'place_func');

function my_custom_mime_types( $mimes ) {
 
	// New allowed mime types.
	$mimes['svg'] = 'image/svg+xml';
	// Optional. Remove a mime type.
	unset( $mimes['exe'] );
	 
	return $mimes;
	}
	add_filter( 'upload_mimes', 'my_custom_mime_types' );

	

add_action('acf/init', 'register_acf_block_types');

function register_acf_block_types() {
	acf_register_block_type(
		array(
			'name' => 'hero',
			'title' => _('Hero'),
			'description' => _('Hero block.'),
			'render_template' => 'inc/hero.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'best',
			'title' => _('Best'),
			'description' => _('Best block.'),
			'render_template' => 'inc/bet.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'give',
			'title' => _('Give'),
			'description' => _('Give block.'),
			'render_template' => 'inc/give.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'faq',
			'title' => _('Faq'),
			'description' => _('Faq block.'),
			'render_template' => 'inc/faq.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'count',
			'title' => _('Count'),
			'description' => _('Count block.'),
			'render_template' => 'inc/count.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'certificate',
			'title' => _('Certificate'),
			'description' => _('Certificate block.'),
			'render_template' => 'inc/certificate.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'about',
			'title' => _('About'),
			'description' => _('About block.'),
			'render_template' => 'inc/about.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'solutions',
			'title' => _('Solutions'),
			'description' => _('Solutions block.'),
			'render_template' => 'inc/solutions.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'performance',
			'title' => _('Performance'),
			'description' => _('Performance block.'),
			'render_template' => 'inc/performance.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'services',
			'title' => _('Services'),
			'description' => _('Services block.'),
			'render_template' => 'inc/services.php',
			'icon' => 'editor-paste-text',
		)
	);


	acf_register_block_type(
		array(
			'name' => 'contacts',
			'title' => _('Contacts'),
			'description' => _('Contacts block.'),
			'render_template' => 'inc/contacts.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'trends',
			'title' => _('Trends'),
			'description' => _('Trends block.'),
			'render_template' => 'inc/trends.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'our',
			'title' => _('Our'),
			'description' => _('Our block.'),
			'render_template' => 'inc/our.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'results',
			'title' => _('Results'),
			'description' => _('Results block.'),
			'render_template' => 'inc/results.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'tim',
			'title' => _('Tim'),
			'description' => _('Tim block.'),
			'render_template' => 'inc/tim.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'video',
			'title' => _('Video'),
			'description' => _('Video block.'),
			'render_template' => 'inc/youtube.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'get',
			'title' => _('Get'),
			'description' => _('Get block.'),
			'render_template' => 'inc/get.php',
			'icon' => 'editor-paste-text',
		)
	);


	acf_register_block_type(
		array(
			'name' => 'preims',
			'title' => _('Preims'),
			'description' => _('Preims block.'),
			'render_template' => 'inc/preims.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'counter',
			'title' => _('Counter'),
			'description' => _('Counter block.'),
			'render_template' => 'inc/counter.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'tip',
			'title' => _('Tip'),
			'description' => _('Tip block.'),
			'render_template' => 'inc/tip.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'check',
			'title' => _('Blocks with checks'),
			'description' => _('Row of Blocks with check icon above'),
			'render_template' => 'inc/check.php',
			'icon' => 'editor-paste-text',
		)
	);

	acf_register_block_type(
		array(
			'name' => 'separate_section',
			'title' => _('Separate section'),
			'description' => _('Separate section'),
			'render_template' => 'inc/separate_section.php',
			'icon' => 'editor-paste-text',
		)
	);
}

/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2019.03.03
 * лицензия: MIT
*/
function dimox_breadcrumbs() {

	/* === ОПЦИИ === */
	$text['home']     = 'Digital Marketing Agency NYC'; // текст ссылки "Главная"
	$text['category'] = '%s'; // текст для страницы рубрики
	$text['search']   = 'Results of search "%s"'; // текст для страницы с результатами поиска
	$text['tag']      = 'Post with tags "%s"'; // текст для страницы тега
	$text['author']   = 'Authors articles %s'; // текст для страницы автора
	$text['404']      = 'Error 404'; // текст для страницы 404
	$text['page']     = 'Page %s'; // текст 'Страница N'
	$text['cpage']    = 'Comments page %s'; // текст 'Страница комментариев N'

	$wrap_before    = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
	$wrap_after     = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
	$sep            = '<del>/</del>'; // разделитель между "крошками"
	$before         = '<span class="breadcrumbs__current">'; // тег перед текущей "крошкой"
	$after          = '</span>'; // тег после текущей "крошки"

	$show_on_home   = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
	$show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
	$show_current   = 1; // 1 - показывать название текущей страницы, 0 - не показывать
	$show_last_sep  = 1; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать
	/* === КОНЕЦ ОПЦИЙ === */

	global $post;
	$home_url       = home_url('/');
	$link           = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
	$link          .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item">%2$s</a>';
	$link          .= '<meta itemprop="position" content="%3$s" />';
    $link          .= '<meta itemprop="name" content="%2$s" />';  
	$link          .= '</span>';
	$parent_id      = ( $post ) ? $post->post_parent : '';
	$home_link      = sprintf( $link, $home_url, $text['home'], 1 );

	if ( is_home() || is_front_page() ) {

		if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;

	} else {

		$position = 0;

		echo $wrap_before;

		if ( $show_home_link ) {
			$position += 1;
			echo $home_link;
		}

		if ( is_category() ) {
			$parents = get_ancestors( get_query_var('cat'), 'category' );
			foreach ( array_reverse( $parents ) as $cat ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$cat = get_query_var('cat');
				echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) echo $sep;
					echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
				} elseif ( $show_last_sep ) echo $sep;
			}

		} elseif ( is_search() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $show_home_link ) echo $sep;
				echo sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) echo $sep;
					echo $before . sprintf( $text['search'], get_search_query() ) . $after;
				} elseif ( $show_last_sep ) echo $sep;
			}

		} elseif ( is_year() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . get_the_time('Y') . $after;
			elseif ( $show_home_link && $show_last_sep ) echo $sep;

		} elseif ( is_month() ) {
			if ( $show_home_link ) echo $sep;
			$position += 1;
			echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
			if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_day() ) {
			if ( $show_home_link ) echo $sep;
			$position += 1;
			echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
			$position += 1;
			echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
			if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_single() && ! is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$position += 1;
				$post_type = get_post_type_object( get_post_type() );
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
				if ( $show_current ) echo $sep . $before . get_the_title() . $after;
				elseif ( $show_last_sep ) echo $sep;
			} else {
				$cat = get_the_category(); $catID = $cat[0]->cat_ID;
				$parents = get_ancestors( $catID, 'category' );
				$parents = array_reverse( $parents );
				$parents[] = $catID;
				foreach ( $parents as $cat ) {
					$position += 1;
					if ( $position > 1 ) echo $sep;
					echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				}
				if ( get_query_var( 'cpage' ) ) {
					$position += 1;
					echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
					echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
				} else {
					if ( $show_current ) echo $sep . $before . get_the_title() . $after;
					elseif ( $show_last_sep ) echo $sep;
				}
			}

		} elseif ( is_post_type_archive() ) {
			$post_type = get_post_type_object( get_post_type() );
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . $post_type->label . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}

		} elseif ( is_attachment() ) {
			$parent = get_post( $parent_id );
			$cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
			$parents = get_ancestors( $catID, 'category' );
			$parents = array_reverse( $parents );
			$parents[] = $catID;
			foreach ( $parents as $cat ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			$position += 1;
			echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
			if ( $show_current ) echo $sep . $before . get_the_title() . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_page() && ! $parent_id ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . get_the_title() . $after;
			elseif ( $show_home_link && $show_last_sep ) echo $sep;

		} elseif ( is_page() && $parent_id ) {
			$parents = get_post_ancestors( get_the_ID() );
			foreach ( array_reverse( $parents ) as $pageID ) {
				if($pageID!=347){
					$position += 1;
					if ( $position > 1 ) echo $sep;
					echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
				}
			}
			if ( $show_current ) echo $sep . $before . get_the_title() . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_tag() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$tagID = get_query_var( 'tag_id' );
				echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}

		} elseif ( is_author() ) {
			$author = get_userdata( get_query_var( 'author' ) );
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}

		} elseif ( is_404() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . $text['404'] . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( has_post_format() && ! is_singular() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			echo get_post_format_string( get_post_format() );
		}

		echo $wrap_after;

	}
} // end of dimox_breadcrumbs()


/*редирект с wp-admin*/
// add_action( 'init', 'blockusers_init' );
// function blockusers_init() {
// if ( is_admin() && ! current_user_can( 'administrator' ) &&
// ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
// wp_redirect( home_url() );
// exit;
// }}

/*редирект с wp-login.php*/
// function redirect_login_page() {  
// $page_viewed = basename($_SERVER['REQUEST_URI']);  
// if( $page_viewed == "wp-login.php?pass=1" ) {  
// wp_redirect( home_url() );  
// exit;  
// }}
// add_action('init','redirect_login_page');

/*редирект после выхода из админ панели*/
// function logout_page() {  
// $login_page  = home_url( 'wp-admin' );  
// wp_redirect( $login_page . "?loggedout=true" );  
// exit;  
// }  
// add_action('wp_logout','logout_page');


// add_action('admin_init', function() {
// 	if (current_user_can('subscriber')) {
		
// 		wp_redirect(site_url());
// 		die();
// 	}
//   });

//   if (current_user_can('subscriber')) {		
// 	add_filter('show_admin_bar', '__return_false'); // отключить
// }


// add_action('wp_logout','auto_redirect_after_logout');

// function auto_redirect_after_logout(){
//   wp_safe_redirect( home_url() );
//   exit;
// }


add_filter('manage_posts_columns', 'posts_columns_id', 5);
add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
add_filter('manage_pages_columns', 'posts_columns_id', 5);
add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);

function posts_columns_id($defaults){
$defaults['wps_post_id'] = '<a href="/wp-admin/edit.php?orderby=ID&amp;order=asc"><span>ID</span><span class="sorting-indicator"></span></a>';
return $defaults;
}
function posts_custom_id_columns($column_name, $id){
if($column_name === 'wps_post_id'){
		echo $id;
}
}


function mytheme_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="div-comment-<?php comment_ID() ?>">
			<div id="<?php comment_ID() ?>" class="comment-body">
				<div class="comment-author vcard">
					<?php echo get_avatar($comment, 32, '', get_comment_author(), array('class' => 'media-object')) ?>			
					<cite class="fn"><?php echo get_comment_author_link() ?></cite> 
					<span class="says">says:</span>
				</div>

				<?php if ($comment->comment_approved == '0') : ?>
					<p class="awaiting">Your comment is awaiting moderation</p>
				<?php endif; ?>
			
				<div class="comment-meta commentmetadata">
					<span class="comment-meta commentmetadata">
						<?php printf( '%1$s в %2$s', get_comment_date(),  get_comment_time()) ?>
						<?php edit_comment_link('(Edit)', '  ', '') ?>
					</span>	
				</div>

				<p><?php comment_text() ?></p>

				<div class="reply">
					<?php
					
					comment_reply_link(array_merge( [ 'reply_text' => "reply", 'depth' => 3, 'add_below' => 'div-comment' ], array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

					
				</div>
			</div>
	</li>


<?php } 
	

	/* избавление от ссылки replytocom */

    function reply_to_com( $link ) {
	   return preg_replace( '/href=\'(.*(\?|&)replytocom=(\d+)#respond)/', 'href=\'#comment-$3', $link );
    }
    add_filter( 'comment_reply_link', 'reply_to_com' );


	/* древовидные комментарии */

	function scripts_styles() {
	   global $wp_styles;
	   if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	   wp_enqueue_script( 'comment-reply' );
    }
	add_action( 'wp_enqueue_scripts', 'scripts_styles' );


    /**/

	// add_action( 'init', 'blockusers_init' );
	// 	function blockusers_init() {
	// 		if(current_user_can( 'editor' )) {
				
	// 		} else {
	// 			if ( (is_admin() && ! current_user_can( 'administrator' )  &&! ( defined( 'DOING_AJAX' ) && DOING_AJAX )) ) {
	// 				wp_redirect( '/' );
	// 				exit;
	// 		}
	
	// 	}
	// } 