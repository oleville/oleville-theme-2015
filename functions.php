<?php
/**
 * oleville functions and definitions
 *
 * @package oleville
 */

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

class description_walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '<br /><span class="sub">' . $item->description . '</span>';
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

class branch_walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= '<div class="branch-short">'.$args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after . '</div>';
		$item_output .= '<div class="branch-info"><h2 class="branch-full">' . $item->attr_title. '</h2><div class="branch-description">' . $item->description . '</div></div>';
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}


function gce_after_widget_stuff( $params ) {
	if ( ! is_admin() ) {
		if ( 'Google Calendar Events' == $params[0]['widget_name'] ) {
			$params[0]['after_widget'] = '<div class="read-more"><a href="/events">more events »</a></div>' . $params[0]['after_widget'];
		}
	}

	return $params;
}

add_filter( 'dynamic_sidebar_params', 'gce_after_widget_stuff' );


if ( ! function_exists( 'oleville_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function oleville_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on oleville, use a find and replace
	 * to change 'oleville' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'oleville', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'latest_front', 200, 200, true ); //(not cropped)
	add_image_size( 'latest_thumb', 260, 260, true);

	add_theme_support( 'menus' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'oleville' ),
		'internal-navigation' => 'Internal Navigation',
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'oleville_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // oleville_setup
add_action( 'after_setup_theme', 'oleville_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function oleville_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'oleville' ),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

}
add_action( 'widgets_init', 'oleville_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function oleville_scripts() {
	wp_enqueue_style( 'oleville-style', get_stylesheet_uri() );
	wp_enqueue_style( 'oleville-mmods', get_template_directory_uri() . '/mods.css');
	wp_enqueue_style( 'oleville-colors', get_template_directory_uri() . '/colors.css');
	wp_enqueue_style( 'oleville-icons', get_template_directory_uri() . '/css/font-awesome.min.css');

	wp_enqueue_style( 'oleville-pause', get_template_directory_uri() . '/pause.css');

	wp_enqueue_script( 'oleville-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'oleville-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'oleville-js', get_template_directory_uri() . '/js/oleville.js', array(), '20140904', true );
	if(is_front_page() && is_main_site())
		wp_enqueue_script( 'oleville-slider', get_template_directory_uri() . '/js/slider.js', array(), '20140904', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'oleville_scripts', 99);


/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function oleville_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= "Oleville";

	if(is_multisite())
		if(!is_main_site()) {
			$sub = get_bloginfo( 'name', 'display' );
			$title .= " $sep $sub";
		}

	// Add the blog description for the home/front page.
	$site_description = str_replace('- ', '', get_bloginfo( 'description'));
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'oleville_wp_title', 10, 2 );

function add_my_custom_fonts_to_slidedeck( $fonts, $slidedeck ) {
    $fonts['RalewayExtraBold'] = array(

        // The name of the font displayed to the user in the drop-down
        'label' => "Raleway Extra Bold",

        // The CSS font stack used
        'stack' => "RalewayExtraBold, sans-serif",

        // The location of the CSS file that describes the web font
        'import' => "",

        // The CSS font weight used when this font is chosen
        'weight' => 'normal'
    );

    return $fonts;
}

add_filter( 'slidedeck_get_font', 'add_my_custom_fonts_to_slidedeck', 10, 2 );

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '... <div class="morelinks"><a class="moretag" href="'. get_permalink($post->ID) . '"> read more »</a></div>'; //// <a class="archivemore" href="/archive"> read other stories »</a>
}
add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_length($length) {
    return 85;
}
add_filter('excerpt_length', 'new_excerpt_length');


/**
 * WPPizza Plugin (Pause Ordering) function to send emails to customer
   when order status has changed.  This set labels, from, subject, message and
   header variables as appropriate in wpp4711_orderhistory_hidden_e_mail AND
   function wpp7811_pizza_status_change_email editable things are marked
   with: | EDITABLE |
 */

/**
 *	[admin order history: add hidden email input field - if exist - after notes to be used in js action]
 */
add_filter('wppizza_filter_orderhistory_actions', 'wpp4711_orderhistory_hidden_email',10,3);
function wpp4711_orderhistory_hidden_email($actions, $orderId, $customerDetails) {
	if(isset($customerDetails['cemail']) && $customerDetails['cemail']!=''){
		$actions['notes'].="<input type='hidden' id='wppizza-delivering-order-email-".$orderId."' value='".trim($customerDetails['cemail'])."' />";
	}else{
		$actions['notes'].="".__('no email supplied')."";/* | EDITABLE |*/
	}
	return $actions;
}

/**
 *
 *	[admin order history: call javascript/ajax on change of status]
 */
add_action('admin_footer', 'wpp4711_status_update_change');
function wpp4711_status_update_change(){
    global $current_screen;
    /**only add script to relevant page**/
    if(isset($current_screen) && $current_screen->id=='wppizza_page_wppizza-order-history'){
		echo"<script type='text/javascript'>
			/* <![CDATA[ */
			jQuery(document).ready(function($){
				$(document).on('change', '.wppizza_order_status', function(e){
					var self=$(this);
					self.attr('disabled',true);
					var selId=self.attr('id').split('-').pop(-1);
					var email=$('#wppizza-delivering-order-email-'+selId+'').val();
					jQuery.post(ajaxurl , {action :'wppizza_admin_json',vars:{'type':'statusupdate','email':email,'id':selId, 'status':self.val()}}, function(response) {
						alert(response);
						self.attr('disabled',false);
					},'text').error(function(jqXHR, textStatus, errorThrown) {alert('error : ' + errorThrown);});
				});
			});
			/* ]]> */
		</script>";
    }
}



/**
 * Play sound on new order in order history.
 * repeats every 5 sec (5000 ms) until there's no
 * new order anymore (just change the status)....
 * set timeout (5000) to whatever timeinterval is required
 * set soundfile (notifySound)  to whatever sound is supposed to be played
 * if using IE, use an mp3 file instead of .wav
 */
add_action('admin_footer', 'wppizza_notify_new_orders');
function wppizza_notify_new_orders(){
	global $current_screen;
	if(isset($current_screen) && $current_screen->id=='wppizza_page_wppizza-order-history'){

	echo"<script type='text/javascript'>
		/* <![CDATA[ */
		jQuery(document).ready(function($){
				var notifySound = '".get_template_directory_uri()."/resources/alert.mp3';
				var notifyNewOrders = new Audio(notifySound);
				var notifyNewOrdersInterval=setInterval(function(){
				if($('.wppizza-ord-status-new').length>0){
					notifyNewOrders.play();
				}},(5000));

		});
		/* ]]> */
	</script>";
	}
}

add_filter('sitewide_tags_thumb_size', 'ov_sitewide_tags_thumb_size');

function ov_sitewide_tags_thumb_size()
{
	return 'latest_thumb';

}

/**
 *
 *	[admin order history: send email to customer on status change via ajax call]
 */
add_action( 'wppizza_ajax_action_admin', 'wpp7811_pizza_status_change_email');
function wpp7811_pizza_status_change_email($postdata) {
	if($postdata['vars']['type']=='statusupdate'){// could also add a " && in_array($postdata['vars']['type'],array('PROCESSED','REJECTED','REFUNDED'))" to only send when status changed to those
		$status = $postdata['vars']['status'];
		$to = $postdata['vars']['email'];/*who to send to*/

		/**check to see if we are updating the time to NEW**/
		if($status == "NEW") {
			//do nothing...for now
		}
		/**check to see if we are updating the time to REJECTED**/
		else if($status == "REJECTED") {

			/*** get order details ***/
			global $wpdb;
			$getOrderDetails 	   = $wpdb->get_row("SELECT order_details FROM " .$wpdb->prefix . "wppizza_orders WHERE id=".$postdata['vars']['id']." ");
			$status  			   = $postdata['vars']['status'];
			$subject 	  		   = 'Pause Order Status Update';/*subject line ->edit as required*/

			/* message -> edit as required */
			$message = 'Hello,';
			$message.= PHP_EOL.PHP_EOL . 'The status of the Pause Order to ' . $to .' has changed to ' . $status . '.';
			$message.= PHP_EOL.PHP_EOL.$getOrderDetails->order_details;/*attach plaintext order underneath - > edit (omit, add linebreaks before and after) as required  | EDITABLE| * */
			$message.= PHP_EOL.PHP_EOL . 'Sincerely,';
			$message.= PHP_EOL . 'The Pause';

			/* headers */
			$headers   = array();
			$headers[] = "MIME-Version: 1.0";
			$headers[] = "Content-type: text/plain; charset=utf-8";
			$headers[] = "From: Pause Kitchen <pause-no-reply@stolaf.edu>";/**who its from->edit as required  | EDITABLE|**/
			$headers[] = "X-Mailer: PHP/".phpversion();

			/*send the email*/
			$mailSent=mail('pauseonlineorders@gmail.com', $subject, $message, implode("\r\n", $headers));

			if($mailSent){
				print "Email sent to pauseonlineorders@gmail.com" . PHP_EOL . "Status: " . $status ."";/*alert on successful sending->edit as required  | EDITABLE|*/
			}else{
				print "Error sending email ";/*alert on error sending->edit as required  | EDITABLE|*/
			}

		}
		else {
			/**if only dealing with latin character domains/emails,  else comment out**/
			if(!filter_var($to , FILTER_VALIDATE_EMAIL)){
				$txt=__("invalid email");/*alert if invalid email ->edit as required | EDITABLE| */
				$txt.=PHP_EOL.$to;

				print"".$to;
				exit();
			}

			/*** get order details ***/
			global $wpdb;
			$getOrderDetails 	   = $wpdb->get_row("SELECT order_details FROM " .$wpdb->prefix . "wppizza_orders WHERE id=".$postdata['vars']['id']." ");
			$status  			   = $postdata['vars']['status'];
			$subject 	  		   = 'Pause Order Status Update';/*subject line ->edit as required*/

			/* message -> edit as required */
			$message = 'Hello,';
			$message.= PHP_EOL.PHP_EOL . 'The status of your Pause Order has changed to ' . $status . '.';
			$message.= PHP_EOL.PHP_EOL . 'Sincerely,';
			$message.= PHP_EOL . 'The Pause';
			//$message.= PHP_EOL.PHP_EOL.$getOrderDetails->order_details;/*attach plaintext order underneath - > edit (omit, add linebreaks before and after) as required  | EDITABLE| * */

			/* headers */
			$headers   = array();
			$headers[] = "MIME-Version: 1.0";
			$headers[] = "Content-type: text/plain; charset=utf-8";
			$headers[] = "From: Pause Kitchen <pause-no-reply@stolaf.edu>";/**who its from->edit as required  | EDITABLE|**/
			$headers[] = "X-Mailer: PHP/".phpversion();

			/*send the email*/
			$mailSent=mail($to, $subject, $message, implode("\r\n", $headers));

			if($mailSent){
				print "Email sent to " . $to . PHP_EOL . "Status: " . $status ."";/*alert on successful sending->edit as required  | EDITABLE|*/
			}else{
				print "Error sending email ";/*alert on error sending->edit as required  | EDITABLE|*/
			}
		}
	}
}

function oleville_save_post($post_id) {

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
	error_log('SavePost Called start:' . get_post_meta($post_id, 'start_date', true) . ' time: ' . get_post_meta($post_id, 'start_time', true));

	if(isset($_POST['post_type']) && $_POST['post_type'] == 'post' && (get_post_meta($post_id, 'start_date', true) == '' || get_post_meta($post_id, 'start_time', true) == '' )) {
	$date = get_the_date( 'Y-m-d', $post_id );
	$time = get_the_date( 'G:i', $post_id );

	error_log('saving fields');

    //add the $timestamp variable to the meta_key for this post
    update_post_meta($post_id, 'start_date', $date);
	update_post_meta($post_id, 'start_time', $time);
	}
}

add_action( 'save_post', 'oleville_save_post', 10, 2 );

header("X-XSS-Protection: 0");


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
