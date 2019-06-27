<?php

if ( ! class_exists( 'Redux' ) ) {
    return;
}


// This is your option name where all the Redux data is stored.
$opt_name = "hostingpress_options";

// If Redux is running as a plugin, this will remove the demo notice and links
add_action( 'redux/loaded', 'redux_framework_remove_demo' );


/*-----------------------------------------------------------------------------------*/
/*	SET ARGUMENTS
/*  All the possible arguments for Redux.
/*  For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
/*-----------------------------------------------------------------------------------*/


$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.

    'display_name'         => $theme->get( 'Name' ),
    // Name that appears at the top of your panel

    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel

    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)

    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not

    'menu_title'           => esc_html__( 'HostingPress Options', 'hostingpress' ),

    'page_title'           => esc_html__( 'HostingPress Options', 'hostingpress' ),

    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',

    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module

    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string

    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader

    'admin_bar'            => true,
    // Show the panel pages on the admin bar

    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu

    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu

    'global_variable'      => 'hostingpress_options',
    // Set a different name for your global variable other than the opt_name

    'dev_mode'             => false,
    // Show the time the page took to load, etc

    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo

    'customizer'           => true,
    // Enable basic customizer support

    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.

    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.

    'page_parent'          => 'themes.php',

    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.

    'menu_icon'            => '',
    // Specify a custom URL to an icon

    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)

    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title

    'page_slug'            => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided

    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not

    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.

    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *

    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,

    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output

    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',

    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'system_info'          => false,

   // 'compiler'             => true,

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    )
);

Redux::setArgs( $opt_name, $args );



/*-----------------------------------------------------------------------------------*/
/*	Home page options
/*-----------------------------------------------------------------------------------*/
Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Home', 'hostingpress' ),
    'id'         => 'home',
    'subsection' => false,
    'fields'     => array(
        array(
            'id'       => 'logo_for_header',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__('Logo', 'hostingpress'),
            'subtitle' => esc_html__('Upload logo image for your Website. Otherwise site title will be displayed in place of logo.', 'hostingpress'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/images/logo.png'
            )
        ),
        array(
            'id'=>'favicon',
            'type' => 'media',
            'title' => esc_html__('Favicon', 'hostingpress'),
            'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'default'=>array('url' => get_template_directory_uri() .'/favicon/favicon.ico'),
            'subtitle' => esc_html__('Add/Upload Your Website Favicon here', 'hostingpress'),
        ),
        array(
            'id'       => 'display_top_header_bar',
            'type'     => 'switch',
            'title'    => esc_html__( 'Display Top Header Bar on Header', 'hostingpress' ),
            'subtitle' => esc_html__( 'Do you want to display Top Header Bar above Menu ?', 'hostingpress' ),
            'default'  => 1,
            'on'       => 'Display',
            'off'      => 'Hide',
        ),
        array(
            'id' => 'slogan_text_for_header',
            'type' => 'text',
            'title' => esc_html__('Slogan Text', 'hostingpress'),
            'subtitle' => esc_html__('Provide the Slog text to display in header top bar', 'hostingpress'),
            'default'   => 'WELCOME TO HOSTPRESS WORDPRESS THEME',
            'required'  => array( 'display_top_header_bar', '=', '1' ),

        ),
        array(
            'id'        => 'sticky_header',
            'type'      => 'switch',
            'title'     => __('Sticky Header', 'hostingpress'),
            'subtitle' => __('Enable or disable Sticky Header', 'hostingpress'),
            'default'   => true,
        ),
        array(
            'id'        => 'theme_loader',
            'type'      => 'switch',
            'title'     => esc_html__('Loader Enable', 'hostingpress'),
            'subtitle' => esc_html__('Enable or disable Loader', 'hostingpress'),
            'default'   => true,
        ),

        array(
            'id'        => 'header_padding_top',
            'type'      => 'text',
            'title'     => __('Header Top Padding', 'hostingpress'),
            'subtitle' => __('Enter custom header top padding', 'hostingpress'),
            'default'   => '0',

        ),

        array(
            'id'        => 'header_padding_bottom',
            'type'      => 'text',
            'title'     => __('Header Bottom Padding', 'hostingpress'),
            'subtitle' => __('Enter custom header bottom padding', 'hostingpress'),
            'default'   => '0',
        ),

        array(
            'id'        => 'header_min_height',
            'type'      => 'text',
            'title'     => __('Header Height ex. 76', 'hostingpress'),
            'subtitle' => __('Enter custom header Height', 'hostingpress'),
            'default'   => '76',
        ),
        array(
            'id'        => 'default_header_option',
            'type'      => 'image_select',
            'title'     => esc_html__('Default Header', 'hostingpress'),
            'subtitle'  => esc_html__('Select Header you want to display on page if header is not select while page creation.', 'hostingpress'),
            'options'   => array(
                '1' => array('title' => esc_html__('1st Variation', 'hostingpress'), 'img' => get_template_directory_uri().'/images/theme-options/header_style1.png'),
                '2' => array('title' => esc_html__('2nd Variation', 'hostingpress'), 'img' => get_template_directory_uri().'/images/theme-options/header_style2.png'),
            ),
            'default'   => '1',
        ),
        array(
            'id'       => 'display_login_button',
            'type'     => 'switch',
            'title'    => esc_html__( 'Display Login button on Top Header Bar', 'hostingpress' ),
            'subtitle' => esc_html__( 'Do you want to display Login button on Top Header Bar?', 'hostingpress' ),
            'default'  => 1,
            'on'       => 'Display',
            'off'      => 'Hide',
        ),
        array(
            'id' => 'login_button_url',
            'type' => 'text',
            'title' => esc_html__('Login URL', 'hostingpress'),
            'subtitle' => esc_html__('Provide Login button URL', 'hostingpress'),
            'default'   => 'LOGIN',
            'required'  => array( 'display_login_button', '=', '1' ),

        ),
        array(
            'id'       => 'minify_css',
            'type'     => 'switch',
            'title'    => esc_html__( 'CSS Minify', 'hostingpress' ),
            'subtitle' => esc_html__( 'Do you want to minify the CSS file?', 'hostingpress' ),
            'default'  => 1,
            'on'       => 'Active',
            'off'      => 'Disable',
        ),
    )
) );


Redux::setSection( $opt_name, array(
    'title' => __( 'Styling Option', 'hostingpress'),
    'id'    => 'style-options',
    'desc'  => __('This section contains header styles options.', 'hostingpress' ),
    'subsection' => false,
    'fields'=> array (





    ) ) );


Redux::setSection( $opt_name, array(
    'title' => __( 'Header Style', 'hostingpress'),
    'id'    => 'header-style-options',
    'desc'  => __('This section contains Header theme styles options.', 'hostingpress' ),
    'subsection' => true,
    'fields'=> array (

        /*
        * Main menu
        */
        array(
            'id'        => 'hostingpress_header_menu_color',
            'type'      => 'color',
            'title'     => __( 'Menu Color', 'hostingpress' ),
            'desc'      => 'default: #19506d',
            'default'   => '#19506d',
            'transparent' => false,
            'output'    => array('background-color' => '',
                'color' => '.fluid_header .navbar-nav.navbar-right li a')
        ),
        array(
            'id'        => 'hostingpress_header_menu_hover_color',
            'type'      => 'color',
            'title'     => __( 'Menu hover Color', 'hostingpress' ),
            'desc'      => 'default: #267ae9',
            'default'   => '#267ae9',
            'transparent' => false,
            'output'    => array('background-color' => '',
                'color' => '.fluid_header .navbar-nav.navbar-right li a:hover, .fluid_header .navbar-nav.navbar-right li a:focus')
        ),
        array(
            'id'        => 'hostingpress_header_submenu_color',
            'type'      => 'color_rgba',
            'output'    => array( '.book_banner,.default .navbar #main_nav .nav li.book a' ),
            'title'     => __( 'Sub-Menu Color', 'hostingpress' ),
            'desc'      => 'default: #19506d',
            'default'   => array(
                'color'     => '#19506d',
                'alpha'     => 1
            ),
            'transparent' => false,
            'output'    => array('background-color' => '',
                'color' => '.fluid_header .navbar-nav.navbar-right li.dropdown .dropdown-menu li a')
        ),
        array(
            'id'        => 'hostingpress_header_submenu_hover_color',
            'type'      => 'color',
            'title'     => __( 'Sub-Menu hover Color', 'hostingpress' ),
            'desc'      => 'default: #267ae9',
            'default'   => '#267ae9',
            'transparent' => false,
            'output'    => array('background-color' => '',
                'color' => '.fluid_header .navbar-nav.navbar-right li.dropdown .dropdown-menu li a:hover')
        ),
        array(
            'id'        => 'hostingpress_menu_font',
            'type'      => 'typography',
            'title'     => __( 'Menu Font', 'hostingpress' ),
            'subtitle'  => __( 'Select the font for headings.', 'hostingpress' ),
            'desc'      => __( 'Lato is default font.', 'hostingpress' ),
            'google'    => true,
            'font-style'    => false,
            'font-weight'   => false,
            'font-size'     => false,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,
            'output'        => array( '.fluid_header .navbar-nav.navbar-right li a,.top_header .wc_msg,.top_header .nav li a,footer .top_footer .quick_contact .nav li a' ),
            'default'       => array(
                'font-family' => 'Lato',
                'google'      => true
            )
        ),
        array(
            'id'        => 'hostingpress_topbar_font_color',
            'type'      => 'color',
            'title'     => __( 'Header Top bar font Color', 'hostingpress' ),
            'desc'      => 'default: #333',
            'default'   => '#333',
            'transparent' => false,
            'output'    => array('background-color' => '',
                'color' => '.top_header')
        ),
        array(
            'id'        => 'hostingpress_topbar_background_color',
            'type'      => 'color',
            'title'     => __( 'Header Top bar Background Color', 'hostingpress' ),
            'desc'      => 'default: #fff',
            'default'   => '#fff',
            'transparent' => false,
            'output'    => array('background-color' => '',
                'color' => '')
        ),
        array(
            'id'        => 'hostingpress_topbar_font',
            'type'      => 'typography',
            'title'     => __( 'Topbar Font', 'hostingpress' ),
            'subtitle'  => __( 'Select the font for headings.', 'hostingpress' ),
            'desc'      => __( 'top_header is default font.', 'hostingpress' ),
            'google'    => true,
            'font-style'    => false,
            'font-weight'   => false,
            'font-size'     => false,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,
            'output'        => array( '.top_header' ),
            'default'       => array(
                'font-family' => 'Helvetica Neue',
                'google'      => true
            )
        ),
        array(
            'id'        => 'hostingpress_header_link_color',
            'type'      => 'link_color',
            'title'     => __( 'Top Bar Link Color', 'hostingpress' ),
            'active'    => true,
            'output'    => array( '.top_header .nav li a' ),
            'default'   => array(
                'regular' => '#4a4a4a',
                'hover'   => '#19506d',
                'active'  => '#19506d',
            )
        ),


    ) ) );

Redux::setSection( $opt_name, array(
    'title' => __( 'Basic Style', 'hostingpress'),
    'id'    => 'basic-style-options',
    'desc'  => __('This section contains Basic theme styles options.', 'hostingpress' ),
    'subsection' => true,
    'fields'=> array (

        /*
        * Main menu
        */
        array(
            'id'        => 'hostingpress_primary_color',
            'type'      => 'color',
            'title'     => __( 'Primary Color', 'hostingpress' ),
            'desc'      => 'default: #267ae9',
            'default'   => '#267ae9',
            'transparent' => false,
            'output'    => array('background-color' => '.btn.btn-primary,#exampleTab .exampleTabNav li.active a,.tags_row a:hover,.fluid_header .navbar-nav.navbar-right li.dropdown.mega-drop .mega-menu li.start_offer .inner,footer .top_footer .quick_contact,
            footer .top_footer .beInContact .subscribe_form .form-inline .form-group .input-group .input-group-addon input:hover,.serviceTab .service_tab_menu .nav li a:before,.team_member .inner:hover,.pricing.row,.pricing_slider_row .pricing_slider .owl-controls .owl-dots .owl-dot.active,.pricing_plan_cell .pricing_row,.blog .blog_infos li + li:before,
            .pagination_nav .pagination li a:hover,.single-blog .blog .img_cap .media-left a .caption,.find_domain.find_domain2,.find_domain.find_domain3 .domain_search,.search_form .input-group .form-control + .input-group-addon button,.post_author,.contact_content .form_row .detail_address .media .media-left i,.contact_content .we_support .col-sm-4 .media .media-left i,.home_slider .owl-controls .owl-nav div:hover,
            #home_slider3 .carousel-inner .item .carousel-caption .container .media .media-body .btn,#home_slider3 .carousel-control:hover,.portfolio .image a,.featureTab .feature_tab_menu .nav li a:before,.pagination a:hover,
.pagination span:hover,.pagination span.current,.page-links a:hover,.searchform input[type="submit"]',

                'color' => 'page_header .breadcrumb li + li:before,.page_header .breadcrumb li a,.faqs_accordion .panel .panel-heading .panel-title a:before,.faqs_accordion .panel .media .media-left,.fluid_header .navbar-nav.navbar-right li a:focus,
                .fluid_header .navbar-nav.navbar-right li.dropdown .dropdown-menu li a:hover,.fluid_header .navbar-nav.navbar-right li.dropdown.mega-drop .mega-menu li.service_list .service .media .media-body a:hover,.error_mark h4,.error_msg h1,.team_member .inner h6,
                .pricing_plan .owl-item .item .plan .price,.price_plan .inner .plan_intro .price,.pricing_slider_row .pricing_slider .owl-item .item .price,.pricing_plan_cell .pricing_row .price,.blog .blog_infos li a,.blog.quote_blog .media .media-left,.about_us_content .col-sm-7 ul li,.categories_list li a span,
.archives_list li a span,.categories_list li a:hover,.archives_list li a:hover,.pager li a,.comment .media-body .nav li a,.contact_content .part_number,.contact_content .form_row .detail_address .media .media-body a,.contact_content .form_row .detail_address .media .media-body .nav li a:hover,.faqs_content .faq_content .faq .media-left,
.aboutHostpressUnList li,.tags a:hover',

                'border-color' => '.faqs_accordion .panel .panel-heading .panel-title a:before,.team_member .inner,.pricing_slider_row .pricing_slider .owl-item .item .domain_ext,.comment .media-body .nav li + li',
                'border-left-color'=>'.single-blog .blog .quote_row blockquote,blockquote')
        ),
        array(
            'id'        => 'hostingpress_secondary_color',
            'type'      => 'color',
            'title'     => __( 'Secondary Color', 'hostingpress' ),
            'desc'      => 'default: #f1f6f8',
            'default'   => '#f1f6f8',
            'transparent' => false,
            'output'    => array('background-color' => '.tags_row a,.team_member .inner,.pricing_bottom.row,.pricing_slider_row .pricing_slider .owl-item .item,.domain_price_list .p_list_content,.facts,.clients,.testimonial_slider .item .slide,
.testimonial_slider2 .item .slide,.blog.quote_blog .media,.pagination_nav .pagination li a,.single-blog .blog .quote_row blockquote,.search_form .input-group .form-control,.comment_reply .form-control,.this_top_features .this_top_feature:nth-child(even),.comment-form .form-control,.page-links a,blockquote',

                'color' => '',
                'border-color' =>'.page-links a')
        ),
        array(
            'id'        => 'hostingpress_third_color',
            'type'      => 'color',
            'title'     => __( 'Third Color', 'hostingpress' ),
            'desc'      => 'default: #42b6ff',
            'default'   => '#42b6ff',
            'transparent' => false,
            'output'    => array('background-color' => '.serviceTab .serviceTab_contents .tab-content .tab-pane .rent,.serviceTab.serviceTab_byside .service_tab_menu .nav li.active a,.service_tabs_list .service_tab .ico_price .rent,
            .price_plan.best_plan .inner .plan_intro,.price_plan.best_plan .inner .plan_intro:after,.price_plan.best_plan .inner .service_provide_row .btn,.pricing_slider_row .pricing_slider .owl-item .item .btn:hover,
.pricing_slider_row .pricing_slider .owl-item .item .btn:focus,.domain_price_list ul.nav-tabs > li > a:hover,
.domain_price_list ul.nav-tabs > li > a:focus,.domain_price_list ul.nav-tabs > li.active a,.pricing_plan_cell .plan_type span,.pricing_plan_cell .btn:hover,
.pricing_plan_cell .btn:focus,.find_domain .domain_search .input-group .input-group-addon .searchFilters .btn + ul li a:hover,.find_domain .domain_search .input-group .input-group-addon input,.find_domain.find_domain3 .domain_search .input-group .input-group-addon input,.find_domain.find_domain_drop + .drop_icon .domain_search_drop,
.contact_content .form_row .detail_address .media + .media .media-left i,.contact_content .we_support .col-sm-4:nth-child(2) .media .media-left i,.faqs_content .faq_category .nav li.active a,.home_slider.home_slider2 .item .slide_caption .sTexts .btn,
#home_slider3 .carousel-inner .item .carousel-caption .container .media .media-body .btn + .pkg_price',


                'color' => 'a,button,.blog .image a:hover,.blog h3 a:hover,.find_domain .domain_search .form_title h2,.recent_posts .post .media-body h5 a:hover,.related_posts .post h5 a:hover,.contact_banner h4 span,.portfolio:hover h5 a')
        ),
        array(
            'id'        => 'hostingpress_fourth_color',
            'type'      => 'color',
            'title'     => __( 'Fourth Color', 'hostingpress' ),
            'desc'      => 'default: #f95732',
            'default'   => '#f95732',
            'transparent' => false,
            'output'    => array('background-color' => '.btn.btn-red,.fluid_header.centered .navbar-collapse .navbar-nav.navbar-right li.login-link a,.contact_content .form_row .detail_address .media + .media + .media .media-left i,
            .contact_content .we_support .col-sm-4:nth-child(3) .media .media-left i',
                'color' => '.contactForm #error')
        ),




        array(
            'id'        => 'hostingpress_change_font',
            'type'      => 'switch',
            'title'     => __( 'Do you want to change fonts?', 'hostingpress' ),
            'default'   => '1',
            'on'    => __( 'Yes', 'hostingpress' ),
            'off'   => __( 'No', 'hostingpress' )
        ),
        array(
            'id'        => 'hostingpress_headings_font',
            'type'      => 'typography',
            'title'     => __( 'Headings Font', 'hostingpress' ),
            'subtitle'  => __( 'Select the font for headings.', 'hostingpress' ),
            'desc'      => __( 'Roboto is default font.', 'hostingpress' ),
            'required'  => array( 'hostingpress_change_font', '=', '1' ),
            'google'    => true,
            'font-style'    => false,
            'font-weight'   => false,
            'font-size'     => false,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,
            'output'        => array( 'h1','h2','h3','h4','h5','h6', '.h1','.h2','.h3','.h4','.h5','.h6' ),
            'default'       => array(
                'font-family' => 'Roboto',
                'google'      => true
            )
        ),
        array(
            'id'        => 'hostingpress_body_font',
            'type'      => 'typography',
            'title'     => __( 'Text Font', 'hostingpress' ),
            'subtitle'  => __( 'Select the font for body text.', 'hostingpress' ),
            'desc'      => __( 'Roboto is default font.', 'hostingpress' ),
            'required'  => array( 'hostingpress_change_font', '=', '1' ),
            'google'    => true,
            'font-style'    => false,
            'font-weight'   => false,
            'font-size'     => false,
            'line-height'   => false,
            'color'         => false,
            'text-align'    => false,
            'output'        => array( 'body' ),
            'default'       => array(
                'font-family' => 'Roboto',
                'google'      => true
            )
        ),
        array(
            'id'        => 'hostingpress_headings_color',
            'type'      => 'color',
            'output'    => array( 'h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6' ),
            'title'     => __( 'Headings Color', 'hostingpress' ),
            'default'   => '#443a44',
            'validate'  => 'color',
            'transparent' => false,
            'desc'  => 'default: #443a44',
        ),
        array(
            'id'        => 'hostingpress_text_color',
            'type'      => 'color',
            'transparent' => false,
            'output'    => array( 'body' ),
            'title'     => __( 'Text Color', 'hostingpress' ),
            'desc'  => 'default: #443a44',
            'default'   => '#443a44',
            'validate'  => 'color'
        ),

        array(
            'id'        => 'hostingpress_link_color',
            'type'      => 'link_color',
            'title'     => __( 'Link Color', 'hostingpress' ),
            'active'    => true,
            'output'    => array( 'a' ),
            'default'   => array(
                'regular' => '#443a44',
                'hover'   => '#0186d5',
                'active'  => '#0186d5',
            )
        ),
        array(
            'id'        => 'hostingpress_quick_css',
            'type'      => 'ace_editor',
            'title'     => __( 'Quick CSS', 'hostingpress' ),
            'desc'      => __( 'You can use this box for some quick css changes. For big changes, Use the custom.css file in css folder. In case of child theme please use style.css file in child theme.', 'hostingpress' ),
            'mode'      => 'css',

        )

    ) ) );

/*-----------------------------------------------------------------------------------*/
/*	Home page options
/*-----------------------------------------------------------------------------------*/
Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Header', 'hostingpress' ),
    'id'         => 'header',
    'subsection' => false,
    'fields'     => array(
        array(
            'id' 		=> 'display_image_header',
            'type' 		=> 'switch',
            'title' 	=> esc_html__('Display Header Bar', 'hostingpress'),
            'subtitle' 	=> esc_html__('Do you want to display header?', 'hostingpress'),
            'default' 	=> '1',
            'on' 		=> esc_html__('Display','hostingpress'),
            'off' 		=> esc_html__('Hide','hostingpress')
        ),
        array(
            'id'       => 'header_background_image',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__('Background Image', 'hostingpress'),
            'subtitle' => esc_html__('Upload Background Image.', 'hostingpress'),
            'required'  => array('display_image_header', '=', '1'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/images/page_cover/bg.jpg'
            )
        ),
        array(
            'id' 		=> 'display_breadcrumb',
            'type' 		=> 'switch',
            'title' 	=> esc_html__('Display Breadcrumb on header', 'hostingpress'),
            'subtitle' 	=> esc_html__('Do you want to display Breadcrumb on header?', 'hostingpress'),
            'default' 	=> '1',
            'required'  => array('display_image_header', '=', '1'),
            'on' 		=> esc_html__('Display','hostingpress'),
            'off' 		=> esc_html__('Hide','hostingpress')
        ),
        array(
            'id' => 'breadcrumb_separator',
            'type' => 'text',
            'title' => esc_html__('Breadcrumb Separator', 'hostingpress'),
            'subtitle' => esc_html__('Provide the Breadcrumb Separator', 'hostingpress'),
            'default'   => '>',
             'required'  => array('display_breadcrumb', '=', '1'),
        )
    )
) );

/*-----------------------------------------------------------------------------------*/
/*	Contact Us Options
/*-----------------------------------------------------------------------------------*/
Redux::setSection( $opt_name, array(
    'title'      => esc_html__('Contact Us', 'hostingpress'),
    'id'         => 'conactus',
    'subsection' => false,
    'fields'     => array(
        array(
            'id' => 'contactus_address',
            'type' => 'textarea',
            'title' => esc_html__('Address', 'hostingpress'),
            'subtitle' => esc_html__('Provide the Address to display under address section', 'hostingpress'),
            'default' => 'Area 51 , Some near unknown,
USA 000000'
        ),
        array(
            'id' => 'contactus_email_address',
            'type' => 'text',
            'title' => esc_html__('Email Address', 'hostingpress'),
            'subtitle' => esc_html__('Provide the Email Address to display under address section', 'hostingpress'),
            'default' => 'info@hostingpress.com'
        ),
        array(
            'id' => 'contactus_phone_number',
            'type' => 'text',
            'title' => esc_html__('Phone No.', 'hostingpress'),
            'subtitle' => esc_html__('Provide the Phone No. to display under address section', 'hostingpress'),
            'default' => '123 7890 456'
        ),
        array(
            'id' => 'contactus_fax_number',
            'type' => 'text',
            'title' => esc_html__('Fax No.', 'hostingpress'),
            'subtitle' => esc_html__('Provide the Fax No. to display under address section', 'hostingpress'),
            'default' => '123 7890 456'
        ),

    )
) );

/*-----------------------------------------------------------------------------------*/
/*	Footer Options
/*-----------------------------------------------------------------------------------*/
Redux::setSection( $opt_name, array(
	'title' => esc_html__('Footer', 'hostingpress'),
	'id'    => 'footer',
	'desc' => esc_html__('This section contains footer related options.', 'hostingpress'),
	'fields' => array(
        array(
            'id' 		=> 'display_quick_contact_info_bar',
            'type' 		=> 'switch',
            'title' 	=> esc_html__('Display Quick Contact Bar', 'hostingpress'),
            'subtitle' 	=> esc_html__('Do you want to Display Quick Contact Bar?', 'hostingpress'),
            'default' 	=> '0',
            'on' 		=> esc_html__('Display','hostingpress'),
            'off' 		=> esc_html__('Hide','hostingpress')
        ),
        array(
            'id' => 'quick_contact_email_address',
            'type' => 'text',
            'title' => esc_html__('Quick Contact Email Address', 'hostingpress'),
            'subtitle' => esc_html__('Provide the Email Address to display on Quick Contact Bar', 'hostingpress'),
            'required'  => array('display_quick_contact_info_bar', '=', '1'),
            'default' => 'info@hostingpress.com'
        ),
        array(
            'id' => 'quick_contact_phone_number',
            'type' => 'text',
            'title' => esc_html__('Quick Contact Phone No.', 'hostingpress'),
            'subtitle' => esc_html__('Provide the Phone No. to display on Quick Contact Bar', 'hostingpress'),
            'required'  => array('display_quick_contact_info_bar', '=', '1'),
            'default' => '123 7890 456'
        ),
        array(
            'id' => 'quick_contact_chat_us_URL',
            'type' => 'text',
            'title' => esc_html__('Quick Contact Chat URL.', 'hostingpress'),
            'subtitle' => esc_html__('Provide the URL of Chat for Quick Contact Bar', 'hostingpress'),
            'required'  => array('display_quick_contact_info_bar', '=', '1'),
            'default' => '#'
        ),
        array(
            'id'       => 'logo_for_footer',
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__('Logo', 'hostingpress'),
            'subtitle' => esc_html__('Upload logo image for your Website. Otherwise site title will be displayed in place of logo.', 'hostingpress'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/images/logo2.png'
            )
        ),
        array(
            'id' => 'footer_about_txt',
            'type' => 'textarea',
            'title' => esc_html__('About Text', 'hostingpress'),
            'subtitle' => esc_html__('Provide the about text to display under footer section', 'hostingpress'),
            'default' => esc_html__('Lorem ipsum dolor sit amet, ectetur adipiscing elit.viverra tellus. Vivamus finibus, quam vitae pulvinar euismod, Lorem ipsum dolor sit amet, ectetur adipiscing elit.ectetur adipiscing elit.viverra tellusivamus finibus, quam vitae pulvinar euismod,', 'hostingpress')
        ),
        array(
            'id'		=>'footer_copyright',
            'type' 		=> 'text',
            'title' 	=> esc_html__('Copyright Text', 'hostingpress'),
            'default'   => esc_html__('Copyright &copy; 1999 - 2015 hostpress.com. All Rights Reserved', 'hostingpress'),
        ),
        array(
			'id' 		=> 'display_footer_social_icons',
			'type' 		=> 'switch',
			'title' 	=> esc_html__('Social Icons', 'hostingpress'),
			'subtitle' 	=> esc_html__('Do you want to display social icons in footer ?', 'hostingpress'),
			'default' 	=> '1',
			'on' 		=> esc_html__('Display','hostingpress'),
			'off' 		=> esc_html__('Hide','hostingpress')
		),
		array(
			'id'		=>'skype_username',
			'type' 		=> 'text',
			'title' 	=> esc_html__('Skype Username', 'hostingpress'),
			'subtitle' 	=> esc_html__('Provide skype username to display its icon.', 'hostingpress'),
			'required'  => array('display_footer_social_icons', '=', '1'),
            'default'   => 'hostingpress'
		),
		array(
			'id'		=>'twitter_url',
			'type' 		=> 'text',
			'title' 	=> esc_html__('Twitter', 'hostingpress'),
			'subtitle' 	=> esc_html__('Provide twitter url to display its icon.', 'hostingpress'),
			'required'  => array('display_footer_social_icons', '=', '1'),
            'default'   => 'https://www.twitter.com/'
		),
		array(
			'id'		=>'facebook_url',
			'type' 		=> 'text',
			'title' 	=> esc_html__('Facebook', 'hostingpress'),
			'subtitle' 	=> esc_html__('Provide facebook url to display its icon.', 'hostingpress'),
			'required'  => array('display_footer_social_icons', '=', '1'),
            'default'   => 'https://www.facebook.com/'
		),
		array(
			'id'		=>'google_url',
			'type' 		=> 'text',
			'title' 	=> esc_html__('Google+', 'hostingpress'),
			'subtitle' 	=> esc_html__('Provide google+ url to display its icon.', 'hostingpress'),
			'required'  => array('display_footer_social_icons', '=', '1'),
            'default'   => 'https://plus.google.com/'
		),
		array(
			'id'		=>'linkedin_url',
			'type' 		=> 'text',
			'title' 	=> esc_html__('LinkedIn', 'hostingpress'),
			'subtitle' 	=> esc_html__('Provide LinkedIn url to display its icon.', 'hostingpress'),
			'required'  => array('display_footer_social_icons', '=', '1'),
            'default'   => 'https://www.linkedin.com/'
		),
		array(
			'id'		=>'pinterest_url',
			'type' 		=> 'text',
			'title' 	=> esc_html__('Pinterest', 'hostingpress'),
			'subtitle' 	=> esc_html__('Provide Pinterest url to display its icon.', 'hostingpress'),
			'required'  => array('display_footer_social_icons', '=', '1'),
            'default'   => 'https://www.pinterest.com/'
		),
        array(
            'id'		=>'instagram_url',
            'type' 		=> 'text',
            'title' 	=> esc_html__('Instagram', 'hostingpress'),
            'subtitle' 	=> esc_html__('Provide Instagram url to display its icon.', 'hostingpress'),
            'required'  => array('display_footer_social_icons', '=', '1'),
            'default'   => 'https://instagram.com/'
        ),
		array(
			'id'		=>'youtube_url',
			'type' 		=> 'text',
			'title' 	=> esc_html__('YouTube', 'hostingpress'),
			'subtitle' 	=> esc_html__('Provide YouTube url to display its icon.', 'hostingpress'),
			'required'  => array('display_footer_social_icons', '=', '1'),
            'default'   => 'https://www.youtube.com/'
		),
		array(
			'id'		=>'rss_url',
			'type' 		=> 'text',
			'title' 	=> esc_html__('RSS', 'hostingpress'),
			'subtitle' 	=> esc_html__('Provide RSS feed url to display its icon.', 'hostingpress'),
			'required'  => array('display_footer_social_icons', '=', '1'),
            'default'   => esc_url(get_feed_link())
		),
        array(
             'id' 		=> 'display_country_select_in_footer',
             'type' 		=> 'switch',
             'title' 	=> esc_html__('Display Country Dropdown', 'hostingpress'),
             'subtitle' 	=> esc_html__('Do you want to Display Country Dropdown?', 'hostingpress'),
             'default' 	=> '0',
             'on' 		=> esc_html__('Display','hostingpress'),
             'off' 		=> esc_html__('Hide','hostingpress')
         ),
	)
));



/*-----------------------------------------------------------------------------------*/
/*	Remove the demo link and the notice of integrated demo from the redux-framework plugin
/*-----------------------------------------------------------------------------------*/
if(!function_exists('redux_framework_remove_demo'))
{
    function redux_framework_remove_demo() {

        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }
}
