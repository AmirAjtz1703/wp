<?php

/*-----------------------------------------------------------------------------------*/
/*	WP Enqueue CSS and JavaScript
/*-----------------------------------------------------------------------------------*/

if(!function_exists('hostingpress_custom_page_style'))
{

    function hostingpress_custom_page_style()
    {
        global $hostingpress_options;
        wp_enqueue_style('base-style', get_stylesheet_uri(), false, null );

        wp_enqueue_style( 'google-fonts', hostingpress_fonts_url(), array(),null);

        if ($hostingpress_options['minify_css'] == '0') {
            wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, null);
            wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array('bootstrap'), null);

            wp_enqueue_style('spinners', get_template_directory_uri() . '/css/spinners.css', false, null);

            wp_enqueue_style('carousel', get_template_directory_uri() . '/vendors/owl.carousel/owl.carousel.css', false, 'all');
            wp_enqueue_style('simple-line-icon', get_template_directory_uri() . '/vendors/simple-line-icons/css/simple-line-icons.css', false, 'all');
            wp_enqueue_style('bootstrap-select', get_template_directory_uri() . '/vendors/bootstrap-select/css/bootstrap-select.min.css', false, 'screen');
            wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', false, null);
            wp_enqueue_style('linearicon-style', get_template_directory_uri() . '/vendors/lineariconsfree/style.css', false, 'screen');
            wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', false, null);

            wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick.css', false, null);
            wp_enqueue_style('slick-theme', get_template_directory_uri() . '/css/slick-theme.css', false, null);

            wp_enqueue_style('hostingpress-style', get_template_directory_uri() . '/css/default/style.css', false, null);
            wp_enqueue_style('hostingpress-responsive-style', get_template_directory_uri() . '/css/responsive/responsive.css', false, null);
        }
        else
        {
            wp_enqueue_style('hostingpress-style', get_template_directory_uri() . '/css/master-min.php', false, null);
        }
		wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery-2.1.4.min.js', null, null, true, true);
        wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), null, true, true);

        wp_enqueue_script('owl-carousel', get_template_directory_uri().'/vendors/owl.carousel/owl.carousel.min.js', null, null, true, true);
        wp_enqueue_script('waypoints', get_template_directory_uri().'/vendors/waypoints/waypoints.min.js', null, null, true, true);
        wp_enqueue_script('jquery-counterup', get_template_directory_uri().'/vendors/counterup/jquery.counterup.min.js', array('jquery'), null, true, true);

        wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri().'/js/jquery.magnific-popup.min.js',  array('jquery'), null, true, true);
        wp_enqueue_script('isotope', get_template_directory_uri().'/vendors/isotope/isotope.min.js', null, null, true, true);
        wp_enqueue_script('jquery-infinitescroll', get_template_directory_uri().'/vendors/infinitescrol/jquery.infinitescroll.min.js', array('jquery', 'bootstrap'), null, true, true);
        wp_enqueue_script('flexslider', get_template_directory_uri().'/vendors/flexslider/jquery.flexslider-min.js', array('jquery'), null, true, true);
        wp_enqueue_script('slick-min-js', get_template_directory_uri().'/js/slick.min.js', array('jquery', 'bootstrap'), null, true, true);
        wp_enqueue_script('jplayer', get_template_directory_uri().'/js/jquery.jplayer.min.js', array('jquery'), null, true, true);
        wp_enqueue_script('jquery-form', get_template_directory_uri().'/js/jquery.form.js', array('jquery'), null, true, true);
        wp_enqueue_script('form-validation', get_template_directory_uri().'/js/jquery.validate.min.js', array('jquery'), null, true, true);
        wp_enqueue_script('hostingpress-contact', get_template_directory_uri().'/js/contact.js', array('jquery', 'jquery-form', 'form-validation'), null, true, true);
		
		wp_enqueue_script('product-jquery-mobile-custom', get_template_directory_uri().'/js/product-jquery.mobile.custom.min.js', array('jquery', 'bootstrap'), null, true, true);
		
		wp_enqueue_script('product-jquery-ui', get_template_directory_uri().'/js/product-jquery-ui.js', array('jquery', 'bootstrap'), null, true, true);
		//wp_enqueue_script('waypoints11', get_template_directory_uri().'/js/waypoints.js', array('jquery', 'bootstrap'), null, true, true);
		wp_enqueue_script('product-uncapped-js', get_template_directory_uri().'/js/product-uncapped.1.0.0.js', array('jquery', 'bootstrap'), null, true, true);
        wp_enqueue_script('hostingpress-theme-js', get_template_directory_uri().'/js/theme.js', array('jquery', 'bootstrap'), null, true, true);
	
	wp_localize_script('hostingpress-theme-js', 'MyAjax', array('ajaxurl' => esc_url(admin_url('admin-ajax.php'))));
        wp_enqueue_script('hostingpress-theme-js');

        if(is_singular() && comments_open())
        {
            wp_enqueue_script('comment-reply');
        }


        $customCSS = '';
        if(isset($hostingpress_options['sticky_header']) && $hostingpress_options['sticky_header'] == '1')
        {
            $customCSS .= ".navbar.affix { width: 100%; top: 0; position: fixed;z-index: 9999;}";
        }

        if(isset($hostingpress_options['header_padding_top']) && $hostingpress_options['header_padding_top'] != '')
        {
            $customCSS .= ".fluid_header{padding-top: {$hostingpress_options['header_padding_top']}px;}";
        }

        if(isset($hostingpress_options['header_padding_bottom']) && $hostingpress_options['header_padding_bottom'] != '')
        {
            $customCSS .= ".fluid_header{padding-bottom: {$hostingpress_options['header_padding_bottom']}px;}";
        }

        if(isset($hostingpress_options['header_min_height']) && $hostingpress_options['header_min_height'] != '')
        {
            $customCSS .= ".fluid_header {min-height: {$hostingpress_options['header_min_height']}px;}";
        }

        if(empty($hostingpress_options['display_country_select_in_footer']) || $hostingpress_options['display_country_select_in_footer'] != '1')
        {
            $customCSS .= "footer .top_footer .beInContact .country_select {
                            width: 0px;
                            border-right: 0px solid #1a2140;
                        }
                        footer .top_footer .beInContact .social_icos {
                            width: 509px;
                            border-right: 1px solid #1a2140;
                        }";
        }

        $header_img = "";
        if ($hostingpress_options['display_image_header'] == '1' && !empty($hostingpress_options['header_background_image']['url']))
        {
            $header_img = $hostingpress_options['header_background_image']['url'];
        }

        if($header_img != "")
        {
            $customCSS .= ".page_header {background: url({$header_img}) repeat-x scroll center center;}";
        }

        wp_add_inline_style('hostingpress-style',$customCSS);
		
    }

}
add_action( 'wp_enqueue_scripts', 'hostingpress_custom_page_style',150 );

if (!function_exists('hostingpress_fonts_url'))
{
    function hostingpress_fonts_url()
    {
        $fonts_url = '';
        $opensans = _x('on', 'Open Sans font: on or off', 'hostingpress');
        $josefinsans = _x('on', 'Josefin Sans font: on or off', 'hostingpress');
        $roboto = _x('on', 'Roboto font: on or off', 'hostingpress');

        if ('off' !== $opensans || 'off' !== $josefinsans || 'off' !== $roboto) {
            $font_families = array();

            if ('off' !== $opensans) {
                $font_families[] = 'Open Sans:300';
            }

            if ('off' !== $josefinsans) {
                $font_families[] = 'Josefin Sans:400,100,300,400italic,600,700';
            }

            if ('off' !== $roboto) {
                $font_families[] = 'Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic';
            }

            $query_args = array(
                'family' => urlencode(implode('|', $font_families)),
            );

            $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
        }
        return esc_url_raw($fonts_url);
    }
}


/*-----------------------------------------------------------------------------------*/
/*	Register and load admin javascript
/*-----------------------------------------------------------------------------------*/
if (!function_exists('hostingpress_admin_script')) {
    function hostingpress_admin_script($hook){
        if ($hook == 'post.php' || $hook == 'post-new.php') {
            $post_id = intval(@$_GET['post']);
            if ("post" == get_post_type($post_id)) {
                wp_enqueue_script('hostingpress-admin-js', get_template_directory_uri() . '/js/admin.js', 'jquery');
               
               
            }
        }
    }
}
add_action('admin_enqueue_scripts', 'hostingpress_admin_script', 10, 1);

/*-----------------------------------------------------------------------------------*/
/*	Register and load admin javascript
/*-----------------------------------------------------------------------------------*/
if (!function_exists('hostingpress_get_number_of_comment')) {
    function hostingpress_get_number_of_comment(){
        $num_comments = get_comments_number(); // get_comments_number returns only a numeric value
        if ( comments_open() ) {
            if ( $num_comments == 0 ) {
                $comments = 0;
            } elseif ( $num_comments > 1 ) {
                $comments = $num_comments;
            } else {
                $comments = 1;
            }
            return $comments;
        } else {
            $comments = 0;
            return $comments;
        }
    }
}
/*-----------------------------------------------------------------------------------*/
/*	List Post Comments
/*-----------------------------------------------------------------------------------*/
if(!function_exists('hostingpress_list_comments'))
{
    function hostingpress_list_comments()
    {
        if(!have_comments())
        {
            return;
        }
        ?>
        <h4><?php esc_html_e('Comments', 'hostingpress'); ?></h4>
        <?php

        wp_list_comments( array(
            'style'       => 'div',
            'max_depth' => '2',
            'short_ping'  => true,
            'callback'  => 'hostingpress_list_comments_walker',
            'avatar_size' => 110,
        ) );

        echo '<div class="pagination">';
        paginate_comments_links();
        echo '</div>';
    }
}


/*-----------------------------------------------------------------------------------*/
/*	List Post Comments Walker
/*-----------------------------------------------------------------------------------*/
if(!function_exists('hostingpress_list_comments_walker'))
{
    function hostingpress_list_comments_walker($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);

        $comment_class = array('media', 'comment');
        if($comment->comment_approved == '0')
        {
            $comment_class[] = 'comment-awaiting-moderation';
        }

        if($args['has_children'])
        {
            $comment_class[] = 'reply_comment';
        }
        ?>

        <<?php echo esc_attr($args['style']); ?> <?php comment_class($comment_class); ?> id="comment-<?php comment_ID() ?>">

        <div class="media-left"><a href="<?php comment_author_link(); ?>"><?php echo get_avatar( $comment, $args['avatar_size'] );?></a></div>

        <div class="media-body">

            <?php if ( $comment->comment_approved == '0' ) : ?>
                <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'hostingpress'); ?></em>
                <br />
            <?php endif; ?>

            <div class="row m0 heading">
                <h5><a href="#"><?php comment_author(); ?></a> </h5>
                <ul class="nav nav-pills">
                    <li><a href="#"><?php comment_date('j F,Y'); ?></a></li>
                    <li><a href="#"><?php comment_time('l'); ?></a></li>
                </ul>
                <?php
                comment_text();
                comment_reply_link( array_merge( $args, array( 'add_below' => 'reply_btn', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
                edit_comment_link( esc_html__('Edit', 'hostingpress'), '  ', '' );  ?>


            </div>





        </div>
    <?php
    }
}


/*-----------------------------------------------------------------------------------*/
/*	Comments Form
/*-----------------------------------------------------------------------------------*/
if(!function_exists('hostingpress_comment_form'))
{
    function hostingpress_comment_form()
    {
        if (!comments_open())
        {
            return;
        }
        ?>
            <?php
            $fields =  array(
                'author' =>'<input id="author" placeholder="'.esc_html__('Your Name', 'hostingpress').'" name="author" type="text" class="form-control" required="required" />',
                'email' => '<input id="email" placeholder="'.esc_html__('E-Mail', 'hostingpress').'" name="email" type="email" class="form-control" required="required" />',

            );

            $args = array(
                'class_submit' => 'btn btn-red',
                'comment_field' => '<textarea placeholder="'.esc_html__('Comment', 'hostingpress').'" id="comment" name="comment" class="form-control" required="required"></textarea>',
                'fields' => apply_filters('comment_form_default_fields', $fields),
                'comment_notes_before' => '',
                'comment_notes_after' => ''
            );
            comment_form($args);
            ?>

        <?php
    }
}

/*-----------------------------------------------------------------------------------*/
/*	Hostingpress Theme Pagination
/*-----------------------------------------------------------------------------------*/
if (!function_exists('hostingpress_pagination'))
{
    function hostingpress_pagination($query){
        echo "<nav class='pagination_nav'><div class='pagination'>";
        $big = 999999999; // need an unlikely integer
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'prev_text' => esc_html__(' < ', 'hostingpress'),
            'next_text' => esc_html__(' > ', 'hostingpress'),
            'current' => max(1, get_query_var('paged')),
            'total' => $query->max_num_pages
        ));
        echo "</div></nav>";
    }
}

/*-----------------------------------------------------------------------------------*/
/*	Hostingpress the excerpt
/*-----------------------------------------------------------------------------------*/
if (!function_exists('hostingpress_excerpt'))
{
    function hostingpress_excerpt($length = 300){
       return substr(get_the_excerpt(),0,$length);
    }
}


/*-----------------------------------------------------------------------------------*/
/*	Hostingpress page breadcrumb
/*-----------------------------------------------------------------------------------*/
if (!function_exists('hostingpress_breadcrumb'))
{
    function hostingpress_breadcrumb($separator = '>')
    {

        echo '<ol class="breadcrumb">';

        /* For all pages other than front page */
        if (!is_front_page()) {
            echo '<li><a href="' . esc_url(home_url('/')) . '">'.esc_html__('Home', 'hostingpress').'</a></li>';
        }

        /* For index.php OR blog posts page */
        if (is_home()) {

            $page_for_posts = get_option('page_for_posts');
            if ($page_for_posts) {
                $blog = get_post($page_for_posts);
                echo '<li class="active">';
                echo esc_html($blog->post_title);

                echo '</li>';
            } else {
                echo '<li class="active">';
                echo esc_html__('Blog', 'hostingpress');

                echo '<li>';
            }
        }

        if (is_category() || is_singular('post')) {
            $category = get_the_category();
            $ID = $category[0]->cat_ID;
            echo '<li>';
            echo get_category_parents($ID, TRUE, ' </li>', FALSE);
        }

        if (is_tax('gallery-item-type') || is_tax('department')) {

            $current_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
            if (!empty($current_term->name)) {
                echo '<li class="active">';
                echo esc_html($current_term->name);
                echo  '</li>';
            }
        }

        if(is_page('shop') )
        {
            echo '<li class="active"><a href="' . esc_url(home_url('/shop')) . '">Shop</a></li>';
        }
        if (is_singular('post') || is_page())
        {
            echo '<li class="active">' .the_title("","",false) . '</li>';
        }

        if (is_tag()) {
            echo '<li class="active">';
            echo esc_html__('Tag: ', 'hostingpress');
            echo single_tag_title('', FALSE);
            echo '</li>';
        }

        if (is_404()) {
            echo '<li class="active">';
            echo esc_html__('404 - Page not Found', 'hostingpress');
            echo '</li>';


        }

        if (is_search()) {
            echo '<li class="active">';
            echo  esc_html__('Search', 'hostingpress');
            echo '</li>';
        }

        if (is_year()) {
            echo '</li class="active">';
            echo get_the_time('Y');
            echo '</li>';
        }


        echo "</ol>";

        ?>
        <style>
        .page_header .breadcrumb li + li:before
        {
            content: '<?php echo $separator; ?>';
        }
        </style>
        <?php
    }
}

if (!function_exists('hostingpress_faq_texonomy')) {
    function hostingpress_faq_texonomy()
    {
        $faqTaxonomy = array("All" => "All");
        $taxonomies = get_terms( 'faqcategory', array(
            'orderby'    => 'count',
            'hide_empty' => 1
        ) );
        if ($taxonomies) {
            foreach ($taxonomies as $taxonomy)
            {
                $faqTaxonomy[$taxonomy->slug] = $taxonomy->slug;


            }
        }
        return $faqTaxonomy;
    }
}
if (!function_exists('hostingpress_pricing_texonomy')) {
    function hostingpress_pricing_texonomy()
    {
        $pricingTaxonomy = array("All" => "All");
        $priceTaxonomies = get_terms( 'pricing_category', array(
            'orderby'    => 'count',
            'hide_empty' => 1
        ) );
        if ($priceTaxonomies) {
            foreach ($priceTaxonomies as $pricetaxonomy)
            {

                $pricingTaxonomy[$pricetaxonomy->slug] = $pricetaxonomy->slug;

            }
        }
        return $pricingTaxonomy;
    }
}

if (!function_exists('hostingpress_service_texonomy')) {
    function hostingpress_service_texonomy()
    {
        $serviceTaxonomy = array("All" => "All");
        $serviceTaxonomies = get_terms( 'service_category', array(
            'orderby'    => 'count',
            'hide_empty' => 1
        ) );
        if ($serviceTaxonomies) {
            foreach ($serviceTaxonomies as $servicetaxonomy)
            {

                $serviceTaxonomy[$servicetaxonomy->slug] = $servicetaxonomy->slug;

            }
        }
        return $serviceTaxonomy;
    }
}

function hostingpress_inline_script() {
    if ( wp_script_is( 'jquery', 'done' ) ) {
    global $hostingpress_options;
    if(isset($hostingpress_options['sticky_header']) && $hostingpress_options['sticky_header']=='1'){ ?>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery(".navbar").affix({
                    offset: {
                        top: jQuery('.top_header').height()
                    }
                });
            });
        </script>
        <?php }
    }
}
add_action( 'wp_footer', 'hostingpress_inline_script' );
?>
