<?php

function show_template() {
	global $template;
	print_r($template);
}
add_action('wp_footer', 'show_template');

add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn(){
  if(!is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'dannex_scripts', 100);
function dannex_scripts(){
  wp_register_script(
    'bootstrap-script', 
    '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', 
    array('jquery'), 
    '', 
    true
  );
    
  wp_register_script(
    'google-maps',
    '//maps.googleapis.com/maps/api/js?key=AIzaSyATxZFODUTVGPygX9aS8tPy5u661OEbeGg',
    array('jquery'),
    '',
    false
  );

	wp_register_script(
		'lightbox',
		get_template_directory_uri() . '/js/lightbox.min.js',
		array('jquery'),
		'',
		true
	);

  wp_register_script(
    'dannex-scripts', 
    get_template_directory_uri() . '/js/dannex-scripts.js', 
    array('jquery'), 
    '', 
    true
  );
  
  wp_enqueue_script('bootstrap-script');
	wp_enqueue_script('google-maps');
	if(is_page('portfolio')){
		wp_enqueue_script('lightbox');
	}
  wp_enqueue_script('dannex-scripts');  
}

add_action('wp_enqueue_scripts', 'dannex_styles');
function dannex_styles(){
  wp_register_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
  wp_register_style('google-fonts', '//fonts.googleapis.com/css?family=Domine:400,700|Montserrat:300,400,700');
	wp_register_style('lightbox-css', get_template_directory_uri() . '/css/lightbox.min.css');
  wp_register_style('dannex', get_template_directory_uri() . '/style.css');
  
  wp_enqueue_style('bootstrap-css');
  wp_enqueue_style('google-fonts');
	wp_enqueue_style('lightbox-css');
  wp_enqueue_style('dannex');
}

/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class wp_bootstrap_navwalker extends Walker_Nav_Menu {

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

			if ( $args->has_children )
				$class_names .= ' dropdown';

			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';

			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				//$atts['href']   		= '#';
                                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
				//$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;

			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .' class="bold"><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .' class="bold">';

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {

			extract( $args );

			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;

				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';

				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';

				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';

			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';

			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';

			if ( $container )
				$fb_output .= '</' . $container . '>';

			echo $fb_output;
		}
	}
}

add_action('init', 'dannex_create_post_type');
function dannex_create_post_type(){
  $project_labels = array(
    'name' => 'Projects',
    'singular_name' => 'Project',
    'menu_name' => 'Projects',
    'add_new_item' => 'Add Project',
    'search_items' => 'Search Projects',
    'edit_items' => 'Edit Project',
    'new_items' => 'New Project',
    'not_found' => 'No Projects Found'
  );
  $project_args = array(
    'labels' => $project_labels,
    'capability_type' => 'post',
    'public' => true,
    'menu_position' => 5,
    'query_var' => 'dannex_projects',
    'supports' => array('title', 'editor', 'custom_fields')
  );
  register_post_type('dannex_projects', $project_args);

  $services_labels = array(
    'name' => 'Services',
    'singular_name' => 'Service',
    'menu_name' => 'Services',
    'add_new_item' => 'Add Service',
    'search_items' => 'Search Services',
    'edit_items' => 'Edit Services',
    'new_items' => 'New Services',
    'not_found' => 'No Service Found'
  );
  $services_args = array(
    'labels' => $services_labels,
    'capability_type' => 'post',
    'public' => true,
    'menu_position' => 5,
    'query_var' => 'dannex_services',
    'supports' => array('title', 'editor', 'custom_fields')
  );
  register_post_type('dannex_services', $services_args);

	$portfolios_labels = array(
		'name' => 'Portfolios',
    'singular_name' => 'Portfolio',
    'menu_name' => 'Portfolios',
    'add_new_item' => 'Add Portfolio',
    'search_items' => 'Search Portfolios',
    'edit_items' => 'Edit Portfolios',
    'new_items' => 'New Portfolios',
    'not_found' => 'No Portfolio Found'
	);
  $portfolios_args = array(
    'labels' => $portfolios_labels,
    'capability_type' => 'post',
    'public' => true,
    'menu_position' => 5,
    'query_var' => 'dannex_portfolios',
    'supports' => array('title', 'editor', 'custom_fields')
  );
  register_post_type('dannex_portfolios', $portfolios_args);
}

if(function_exists('acf_add_options_page')){
  acf_add_options_page(array(
    'page_title' => 'Global Site Settings',
    'menu_title' => 'Global Settings',
    'menu_slug' => 'global-settings',
    'capability' => 'edit_posts',
    'redirect' => false
  ));
}

add_action('acf/init', 'dannex_acf_init');
function dannex_acf_init(){
	acf_update_setting('google_api_key', 'AIzaSyATxZFODUTVGPygX9aS8tPy5u661OEbeGg');
}

add_filter('next_post_link', 'posts_link_attributes');
add_filter('previous_post_link', 'posts_link_attributes');
function posts_link_attributes($output) {
    //return 'class="btn-clear"';
		$code = 'class="btn-clear"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}