<?php
if ( ! isset( $content_width ) ) $content_width = 900;
function hosting_press_theme_setup()
{

    // Make theme available for translation, translations can be filed in the /languages/ directory
    load_theme_textdomain('hostingpress', get_template_directory() . '/languages');

    // This theme uses post format support.
    add_theme_support('post-formats', array('gallery', 'image', 'quote', 'video','audio'));

    /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
    add_theme_support('title-tag');

    /* Add Post Thumbnails Support and Related Image Sizes */
    add_theme_support('post-thumbnails');

    // This theme uses woocommerce
    add_theme_support('woocommerce');
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );


    add_image_size('hostingpress-thumb-related', 230, 132, true);
    add_image_size('hostingpress-thumb-large', 750, 300, true);
    add_image_size('hostingpress-thumb-small', 112, 74, true);
    add_image_size('hostingpress-service-thumb', 456, 586, true);
    add_image_size('hostingpress-service-thumb', 456, 586, true);
    add_image_size('hostingpress-team-thumb', 116, 115, true);
    add_image_size('hostingpress-portfolio-thumb', 360, 219, true);
    add_image_size('hostingpress-portfolio-largethumb', 555, 275, true);
    add_image_size('hostingpress-post-thumb-widget', 73, 68, true);
    add_image_size('hostingpress-slider-thumb', 369, 370, true);

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
        'primary' => esc_html__('Primary Navigation', 'hostingpress'),
        'footer' => esc_html__('Footer Navigation', 'hostingpress'),
    ));

    add_editor_style(array('css/default/style.css'));

}
add_action('after_setup_theme', 'hosting_press_theme_setup');

/*-----------------------------------------------------------------------------------*/
/*	Theme required plugin list
/*-----------------------------------------------------------------------------------*/
require_once ( get_template_directory() .'/includes/plugins/class-tgm-plugin-activation.php');
require_once ( get_template_directory() .'/includes/plugins/plugin_list.php');

/*-----------------------------------------------------------------------------------*/
/*	Theme option configuration
/*-----------------------------------------------------------------------------------*/
require_once ( get_template_directory() .'/includes/theme-options.php');

/*-----------------------------------------------------------------------------------*/
/*	Theme General functions
/*-----------------------------------------------------------------------------------*/
require_once ( get_template_directory() .'/includes/theme-functions.php');

/*-----------------------------------------------------------------------------------*/
/*	Domain Checker plugin
/*-----------------------------------------------------------------------------------*/
if (class_exists('WPBakeryVisualComposerAbstract')) {
    require_once(get_template_directory() . '/includes/domain-checker.php');
$dir = get_template_directory() . '/includes/';
vc_set_shortcodes_templates_dir( $dir );
	  require_once(get_template_directory() . '/includes/vc-update.php');
    require_once(get_template_directory() . '/includes/tablepress_table.php');
}

/*-----------------------------------------------------------------------------------*/
/*	Widgets
/*-----------------------------------------------------------------------------------*/

require_once ( get_template_directory() .'/includes/widget-recent-post.php');
require_once ( get_template_directory() .'/includes/widget-search.php');
require_once ( get_template_directory() .'/includes/widget-categories.php');
require_once ( get_template_directory() .'/includes/widget-tagcloud.php');
require_once ( get_template_directory() .'/includes/widget-archives.php');

require_once ( get_template_directory() .'/includes/walker-nav-menu.php');

require_once ( get_template_directory() .'/includes/vc_templates.php');

/*-----------------------------------------------------------------------------------*/
/*	WooCommerce functions and hook
/*-----------------------------------------------------------------------------------*/
//require_once ( get_template_directory() .'/includes/woocommerce.php');



/*-----------------------------------------------------------------------------------*/
/*	Add Widget Areas
/*-----------------------------------------------------------------------------------*/
if (function_exists('register_sidebar')) {

    // Blog Sidebar
    register_sidebar(array(
        'id' => 'blog-post',
        'name' => esc_html__('Blog Post',  'hostingpress'),
        'description' => esc_html__('This sidebar is for blog posts.',  'hostingpress'),
        'before_widget' => '<div id="%1$s" class="row m0 widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget_heading">',
        'after_title' => '</h4>'
    ));

    // WooCommerce
    register_sidebar(array(
        'id' => 'shop',
        'name' => esc_html__('Shop', 'hostingpress'),
        'description' => esc_html__('This widget is for Shop.', 'hostingpress'),
        'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar-block-title"><h3>',
        'after_title' => '</h3></div>'
    ));

}

if ( !function_exists( 'hostingpress_render_title' ) )
{
    /**
     * Render Title
     */
    if (!function_exists('_wp_render_title_tag'))
    {
        function hostingpress_render_title()
        {
            ?>
            <title><?php wp_title('|', true, 'right'); ?></title>
        <?php
        }

        add_action('wp_head', 'hostingpress_render_title');
    }
}

if ( !function_exists( 'hostingpress_render_favicon' ) )
{
    /**
     * Render favicon
     */
    if (!function_exists('has_site_icon') || !has_site_icon())
    {
        function hostingpress_render_favicon()
        {
            global $hostingpress_options;

            if(!$favicon_url = $hostingpress_options['favicon']['url'])
            {
                $favicon_url = get_template_directory_uri() .'/favicon/favicon.ico';
            }
            ?>

            <link rel="shortcut icon" href="<?php echo esc_url($favicon_url); ?>" />
        <?php

        }
		 add_action('wp_head', 'hostingpress_render_favicon');
    }
   
}

/*
* Function return styles array from string font param of VC
*
*
*/

function hostingpress_get_styles($font_container_data) {
    $styles = array();
    if ( ! empty( $font_container_data ) && isset( $font_container_data['values'] ) ) {
        foreach ( $font_container_data['values'] as $key => $value ) {
            if ( $key !== 'tag' && strlen( $value ) > 0 ) {
                if ( preg_match( '/description/', $key ) ) {
                    continue;
                }
                if ( $key === 'font_size' || $key === 'line_height' ) {
                    $value = preg_replace( '/\s+/', '', $value );
                }
                if ( $key === 'font_size' ) {
                    $pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
                    // allowed metrics: http://www.w3schools.com/cssref/css_units.asp
                    $regexr = preg_match( $pattern, $value, $matches );
                    $value = isset( $matches[1] ) ? (float) $matches[1] : (float) $value;
                    $unit = isset( $matches[2] ) ? $matches[2] : 'px';
                    $value = $value . $unit;
                }
                if ( strlen( $value ) > 0 ) {
                    $styles[] = str_replace( '_', '-', $key ) . ': ' . $value;
                }
            }
        }
    }
    return $styles;
}

/*-----------------------------------------------------------------------------------*/
//	Generate Quick CSS
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'hostingpress_generate_quick_css' ) ){
    function hostingpress_generate_quick_css(){
        global $hostingpress_options;

        if(isset($hostingpress_options['hostingpress_quick_css']) && $hostingpress_options['hostingpress_quick_css']){
            // Quick CSS from Theme Options
            $quick_css = stripslashes($hostingpress_options['hostingpress_quick_css']);

            if(!empty($quick_css)){
                echo "\n<style type='text/css' id='quick-css'>\n";
                echo $quick_css . "\n";
                echo "</style>". "\n\n";
            }
        }
    }
}
add_action('wp_head', 'hostingpress_generate_quick_css',151);


function  hostingpress_body_classes( $classes ) {

    $classes[] =  esc_attr( ' smooth-scroll' );
	
	if ( get_option('cc_whmcs_bridge_template') ) :
		$classes[] = get_option('cc_whmcs_bridge_template') == 'five' ? esc_attr( ' hostingpress-whmcs-t5' ) : esc_attr( ' hostingpress-whmcs-t6' );
	endif;
	return $classes;
}

add_filter('body_class', 'hostingpress_body_classes');