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
  'footer-menu4' => __( 'footer-menu4' )
	));
}
add_action( 'init', 'register_my_menus' );



function enqueue_styles() {
	wp_enqueue_style('style', get_theme_file_uri('/assets/css/style.css'));
    wp_enqueue_style('style_resp', get_theme_file_uri('/assets/css/responsive.css'));
	wp_enqueue_style('style_lawyer', get_theme_file_uri('/assets/css/style_lawyer.css'));
    wp_enqueue_style('fontawesome', get_theme_file_uri('/assets/plugins/fontawesome-5/css/all.min.css'));
    wp_enqueue_style('opklim', get_theme_file_uri('/assets/plugins/opklim-icons/style.css'));
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', get_theme_file_uri('/assets/js/jquery.min.js'));
    wp_enqueue_script('lozad', get_theme_file_uri('/assets/js/lozad.min.js'));	
	wp_enqueue_script('scripts', get_theme_file_uri('/assets/js/scripts.js'));	
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

/*function footer_enqueue_scripts(){
	remove_action('wp_head','wp_print_scripts');
	remove_action('wp_head','wp_print_head_scripts',9);
	remove_action('wp_head','wp_enqueue_scripts',1);
	add_action('wp_footer','wp_print_scripts',5);
	add_action('wp_footer','wp_enqueue_scripts',5);
	add_action('wp_footer','wp_print_head_scripts',5);
}
add_action('after_setup_theme','footer_enqueue_scripts');*/

function my_deregister_scripts(){
	wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

add_action( 'wp', 'deactivate_rocket_lazyload_on_single' );
function deactivate_rocket_lazyload_on_single() {
    if ( is_page(196) || is_page(198) ) {
        add_filter( 'do_rocket_lazyload', '__return_false' );
    }
}

//remove_filter( 'the_content', 'wpautop' );

function dimox_breadcrumbs() {

	/* === ОПЦИИ === */
	$text['home']     = 'Home'; // текст ссылки "Главная"
	$text['category'] = '%s'; // текст для страницы рубрики
	$text['search']   = 'Result search of "%s"'; // текст для страницы с результатами поиска
	$text['tag']      = 'Post with tags "%s"'; // текст для страницы тега
	$text['author']   = 'Posts author %s'; // текст для страницы автора
	$text['404']      = 'Error 404'; // текст для страницы 404
	$text['page']     = 'Page %s'; // текст 'Страница N'
	$text['cpage']    = 'Comments pages %s'; // текст 'Страница комментариев N'

	$wrap_before    = '<ul class="list-unstyled thm-breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
	$wrap_after     = '</ul><!-- .breadcrumbs -->'; // закрывающий тег обертки
	$sep            = ''; // разделитель между "крошками"
	$before         = '<li>'; // тег перед текущей "крошкой"
	$after          = '</li>'; // тег после текущей "крошки"

	$show_on_home   = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
	$show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
	$show_current   = 1; // 1 - показывать название текущей страницы, 0 - не показывать
	$show_last_sep  = 1; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать
	/* === КОНЕЦ ОПЦИЙ === */

	global $post;
	$home_url       = home_url('/');
	$link           = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
	$link          .= '<a href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
	$link          .= '<meta itemprop="position" content="%3$s" />';
	$link          .= '</li>';
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
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
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

add_action( 'admin_head', 'admin_stylesheet' );
    function admin_stylesheet(){
        wp_enqueue_style("admin_css", get_bloginfo('stylesheet_directory') . "/assets/css/admin.css");
}


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

add_shortcode( 'myform', 'footag1' );
function footag1(){
	 return '<div class="form-wrap">
				<form action="#" id="contact">
					<div class="steps step1 act" >
						<div class="h2 h2-analog">Get a Free Case Evaluation</div>
						<div class="step1-flex">
							<div class="form-input form-half">
								<label for="name">Name</label>
								<input type="text" id="name" class="f_name" name="name">
							</div>
							<div class="form-input form-half">
								<label for="phone">Phone number</label>
								<input type="text" id="phone" class="f_phone" name="phone">
							</div>
							<div class="form-input form-full">
								<label for="email">Email</label>
								<input type="text" id="email" class="f_email" name="email">
							</div>
							<div class="form-input">
								<div class="form-step form-step1">GET A FREE CALL BACK </div>
							</div>
						</div>
					</div>
					<div class="steps step2">
						<h2>Additional questions to understand your situation better</h2>
						<div class="form-input radio-btn">
							<span>1. Are you a victim of sexual harassment at work?</span>
							<label for="q11"><input value="1" type="radio" name="q1" id="q11"> Yes</label>
							
							<label for="q12"><input value="0" type="radio" name="q1" id="q12"> No</label>
						</div>
						<div class="form-input radio-btn">
							<span>2. Did the sexual harassment occur within three years of today`s date?</span>
							<label for="q21"><input value="1" type="radio" name="q2" id="q21"> Yes</label>
							
							<label for="q22"><input value="0" type="radio" name="q2" id="q22"> No</label>
						</div>
						<div class="form-input">
							<div class="form-step form-step2">Ask Lawyer</div>
						</div>
					</div>
					<div class="steps notice">
						<h2 style="color:#333;">Please, visit <a target="_blank" href="https://www.eeoc.gov/sexual-harassment">eeoc.gov</a> to learn more about sexual harassment</h2>
						<div class="form-input">
								<div class="form-step form-ok">Ок</div>
							</div>
					</div>

					<div class="steps different">
						<h2 style="color:#333;">Please, visit <a target="_blank" href="https://www.eeoc.gov/sexual-harassment">eeoc.gov</a> to learn more about sexual harassment</h2>

						<div class="form-input">
							<div class="form-step form-ok">Ок</div>
						</div>
					</div>
					<div class="steps step3">
						<h2>Get a Free Case Evaluation</h2>
						<p>Contact us for a free and confidential consultation. You have nothing to lose.</p>
						<div class="form-input">
							<textarea name="" class="f_mess" id="msg" placeholder="Tell us a little bit about your matter."></textarea>
						</div>
						<div class="form-input">
							<div class="form-step form-step3">ASK Lawyer</div>
						</div>
					</div>
					<div class="steps finally">
						<h2>Thank you. Request has been sent successfully !</h2>
					</div>
				</form>
			</div>';
}


add_shortcode( 'myform2', 'footag2' );
function footag2(){
	 return '<div class="form-wrap">
				<form action="#" id="contact">
					<div class="steps step1 act" >
						<div class="h2 h2-analog">Get a Free Case Evaluation</div>
						<div class="step1-flex">
							<div class="form-input form-half">
								<label for="name">Name</label>
								<input type="text" id="name" class="f_name" name="name">
							</div>
							<div class="form-input form-half">
								<label for="phone">Phone number</label>
								<input type="text" id="phone" class="f_phone" name="phone">
							</div>
							<div class="form-input form-full">
								<label for="email">Email</label>
								<input type="text" id="email" class="f_email" name="email">
							</div>
							<div class="form-input">
								<div class="form-step form-step1">GET A FREE CALL BACK </div>
							</div>
						</div>
					</div>
					<div class="steps step2">
						<h2>Additional questions to understand your situation better</h2>
						<div class="form-input radio-btn">
							<span>1. Have you been discriminated against at work on the basis of Race, Gender, Religion, Disability, Sexual Orientation, Age, Pregnancy, Citizenship Status, Military Status, or Familial Status?</span>
							<label for="q11"><input value="1" type="radio" name="q1" id="q11"> Yes</label>
							
							<label for="q12"><input value="0" type="radio" name="q1" id="q12"> No</label>
						</div>
						<div class="form-input radio-btn">
							<span>2. Have you suffered economic damages?</span>
							<label for="q21"><input value="1" type="radio" name="q2" id="q21"> Yes</label>
							
							<label for="q22"><input value="0" type="radio" name="q2" id="q22"> No</label>
						</div>
						<div class="form-input">
							<div class="form-step form-step2">Ask Lawyer</div>
						</div>
					</div>
					<div class="steps notice">
						<h2 style="color:#333;">Please, visit <a target="_blank" href="https://www.eeoc.gov/youth/what-employment-discrimination">eeoc.gov</a> to learn more about employment discrimination</h2>
						<div class="form-input">
								<div class="form-step form-ok">Ок</div>
							</div>
					</div>

					<div class="steps different">
						<h2 style="color:#333;">Please, visit <a target="_blank" href="https://www.eeoc.gov/youth/what-employment-discrimination">eeoc.gov</a> to learn more about employment discrimination</h2>

						<div class="form-input">
							<div class="form-step form-ok">Ок</div>
						</div>
					</div>
					<div class="steps step3">
						<h2>Get a Free Case Evaluation</h2>
						<p>Contact us for a free and confidential consultation. You have nothing to lose.</p>
						<div class="form-input">
							<textarea name="" class="f_mess" id="msg" placeholder="Tell us a little bit about your matter."></textarea>
						</div>
						<div class="form-input">
							<div class="form-step form-step3">ASK Lawyer</div>
						</div>
					</div>
					<div class="steps finally">
						<h2>Thank you. Request has been sent successfully !</h2>
					</div>
				</form>
			</div>';
}



/*
* Creating a function to create our CPT
*/

function custom_post_type() {

	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Subs', 'Post Type General Name', 'twentythirteen' ),
			'singular_name'       => _x( 'Subs', 'Post Type Singular Name', 'twentythirteen' ),
			'menu_name'           => __( 'Subs', 'twentythirteen' ),
			'parent_item_colon'   => __( 'Subs', 'twentythirteen' ),
			'all_items'           => __( 'All Subs', 'twentythirteen' ),
			'view_item'           => __( 'Open', 'twentythirteen' ),
			'add_new_item'        => __( 'Add Subs', 'twentythirteen' ),
			'add_new'             => __( 'Add Subs', 'twentythirteen' ),
			'edit_item'           => __( 'Edit', 'twentythirteen' ),
			'update_item'         => __( 'Update', 'twentythirteen' ),
			'search_items'        => __( 'Search', 'twentythirteen' ),
			'not_found'           => __( 'Not found', 'twentythirteen' ),
			'not_found_in_trash'  => __( 'Not found', 'twentythirteen' ),
		);
	
	// Set other options for Custom Post Type
	
		$args = array(
			'label'               => __( 'Subs', 'twentythirteen' ),
			'description'         => __( 'Subs', 'twentythirteen' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor',  'author', 'thumbnail', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy.
			'taxonomies'          => array( 'subs' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		);
	
		// Registering your Custom Post Type
		register_post_type( 'subs', $args );
	
	}
	
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not
	* unnecessarily executed.
	*/
	
	add_action( 'init', 'custom_post_type', 0 );



	function roomble_ajax_create_order() {
			$postdate = date("Y-m-d H:i:s");
			
			$par1 = $_POST['param1'];
			$par2 = $_POST['param2'];
			$par3 = $_POST['param3'];
	
			$my_post =  array( // 'название_колонки' => 'значение'
	
				'post_title' => $par3,
				'post_status' => 'publish', 
				'post_type'=>'subs',
				'post_date' => $postdate,
				'post_content' =>$par1.'<br/>'.$par2.'<br/>'.$par4,
				'post_author' => '1',
			);
		
			$post_id = wp_insert_post( $my_post );
		}
		add_action( 'wp_ajax_create_order', 'roomble_ajax_create_order' );
		add_action( 'wp_ajax_nopriv_create_order', 'roomble_ajax_create_order' );
		
	
	/*Shortcode for current date (MM.DD.YYYY)*/
	function show_current_date_MoshesLaw() {
		$date = date('m-d-Y');
		return "Date: ".$date;
	}
	add_shortcode('show_current_date_MoshesLaw','show_current_date_MoshesLaw');
	
?>