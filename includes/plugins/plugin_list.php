<?php
/*
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */


//Register the required plugins for this theme.
if(!function_exists('hostingpress_register_required_plugins'))
{
    function hostingpress_register_required_plugins() {
        /*
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(
            array(
                'name' => 'Redux Framework',
                'slug' => 'redux-framework',
                'required' => true,
                'force_activation' => false,
                'force_deactivation' => false
            ),
            array(
                'name' => 'cmb2 Metabox',
                'slug' => 'cmb2',
				'source'    => get_template_directory() . '/includes/plugins/cmb2.tar', // The plugin source.
                'required' => true,
                'force_activation' => false,
                'force_deactivation' => false
            ),
            array(
                'name'      => 'Hostingpress Helper',
                'slug'      => 'hostingpress-helper',
                'source'    => get_template_directory() . '/includes/plugins/hostingpress-helper.tar', // The plugin source.
                'required'  => true,
                'force_activation' => false,
                'force_deactivation' => false
            ),
            array(
                'name'      => 'Hostingpress Importer',
                'slug'      => 'hostingpress-importer',
                'source'    => get_template_directory() . '/includes/plugins/hostingpress-importer.tar', // The plugin source.
                'required'  => true,
                'force_activation' => false,
                'force_deactivation' => false
            ),
            array(
                'name'      => 'Revolution Slider',
                'slug'      => 'revslider',
                'source'    => get_template_directory() . '/includes/plugins/revslider.tar', // The plugin source.
                'required'  => true,
                'force_activation' => false,
                'force_deactivation' => false
            ),

            array(
                'name'      => 'WPBakery Visual Composer',
                'slug'      => 'js_composer',
                'source'    => get_template_directory() . '/includes/plugins/js_composer.tar', // The plugin source.
                'required'  => true,
                'force_activation' => false,
                'force_deactivation' => false
            ),
			array(
                'name'      => 'WP Domain Checker',
                'slug'      => 'wp-domain-checker',
                'source'    => get_template_directory() . '/includes/plugins/wp-domain-checker.tar', // The plugin source.
                'required'  => true,
                'force_activation' => false,
                'force_deactivation' => false
            ),
			
			
            array(
                'name' => 'WHMCS Bridge',
                'slug' => 'whmcs-bridge',
                'required' => true,
                'force_activation' => false,
                'force_deactivation' => false
            ),
			array(
                'name' => 'Contact Form 7',
                'slug' => 'contact-form-7',
                'required' => true,
                'force_activation' => false,
                'force_deactivation' => false
            ),
			array(
                'name' => 'TablePress',
                'slug' => 'tablepress',
                'required' => false,
                'force_activation' => false,
                'force_deactivation' => false
            ),
			 array(
                'name' => 'WooCommerce',
                'slug' => 'woocommerce',
                'required' => false,
                'force_activation' => false,
                'force_deactivation' => false
            ),
            array(
                'name'      => 'WordPress Importer',
                'slug'      => 'wordpress-importer',
                'required'  => false,
            )
        );

        //Array of configuration settings. Amend each line as needed.
        $config = array(
            'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'parent_slug'  => 'themes.php',            // Parent menu slug.
            'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            //'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
        );

        tgmpa( $plugins, $config );
    }
}


add_action( 'tgmpa_register', 'hostingpress_register_required_plugins' );