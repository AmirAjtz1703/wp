<?php
global $hostingpress_options;

if(!$favicon_url = $hostingpress_options['favicon']['url'])
{
    $favicon_url = get_template_directory_uri() .'/images/theme-options/favicon.ico';
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if(isset($hostingpress_options['theme_loader']) && $hostingpress_options['theme_loader']=='1')
{ ?>
<div class="preloader">
    <div class="dots-loader">Loading ...</div>
</div>
<?php } ?>

<?php
$header_style = false;
$topheaderCSS = "";
if(is_page() || is_single())
{
    global $post;
    $header_style = get_post_meta($post->ID, 'header_style', true);
    $header_style = $header_style ? $header_style : $hostingpress_options['default_header_option'];
}
if(isset($header_style) && $header_style=='2')
{
    $topheaderCSS = "navbar-right";
    $navCSS = "new_bar_header";
?>
    <div class="header-wrap">
<?php }
else{
    $navCSS = "fluid_header";
}?>

<?php if(isset($hostingpress_options['display_top_header_bar']) && $hostingpress_options['display_top_header_bar']=='1')
{ ?>
<section class="row top_header">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 wc_msg">
                <?php
                if (!empty($hostingpress_options['slogan_text_for_header'])) {
                    echo esc_html($hostingpress_options['slogan_text_for_header']);
                }
                ?>
            </div>
            <div class="col-sm-6">
                <ul class="nav nav-pills <?php echo esc_html($topheaderCSS) ?>">

                    <?php if(isset($hostingpress_options['contactus_phone_number']) && $hostingpress_options['contactus_phone_number']  && $header_style=='1') : ?>
                        <li><a href="tel:<?php echo esc_attr($hostingpress_options['contactus_phone_number']) ?>"><i class="icon-call-out"></i><?php echo esc_html($hostingpress_options['contactus_phone_number']); ?></a></li>
                    <?php endif; ?>
                    <?php if(isset($hostingpress_options['contactus_email_address']) && $hostingpress_options['contactus_email_address']  && $header_style=='1') : ?>
                        <li><a href="mailto:<?php echo esc_attr($hostingpress_options['contactus_email_address']); ?>"><i class="icon-envelope"></i><?php echo esc_html($hostingpress_options['contactus_email_address']); ?></a></li>
                    <?php endif; ?>
                    <?php if(isset($hostingpress_options['facebook_url']) && $hostingpress_options['facebook_url']) : ?>
                        <li><a target="_blank" href="<?php echo esc_url($hostingpress_options['facebook_url']); ?>"><i class="fa fa-facebook"></i></a></li>
                    <?php endif; ?>
                    <?php if(isset($hostingpress_options['twitter_url']) && $hostingpress_options['twitter_url']) : ?>
                        <li><a target="_blank" href="<?php echo esc_url($hostingpress_options['twitter_url']); ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php endif; ?>
                    <?php if(isset($hostingpress_options['linkedin_url']) && $hostingpress_options['linkedin_url']) : ?>
                        <li><a target="_blank" href="<?php echo esc_url($hostingpress_options['linkedin_url']); ?>"><i class="fa fa-linkedin"></i></a></li>
                    <?php endif; ?>
                    <?php if(isset($hostingpress_options['youtube_url']) && $hostingpress_options['youtube_url']) : ?>
                        <li><a target="_blank" href="<?php echo esc_url($hostingpress_options['youtube_url']); ?>"><i class="fa fa-youtube"></i></a></li>
                    <?php endif; ?>
                    <?php if(isset($header_style) && $header_style=='2' && $hostingpress_options['display_login_button']=='1' )
                    {
                    ?>
                        <li class="login-link"><a href="<?php echo esc_url($hostingpress_options['login_button_url']); ?>"><?php esc_html_e( 'Login', 'hostingpress' ); ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<nav class="navbar navbar-default navbar-static-top <?php echo esc_html($navCSS) ?> centered">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <?php
            $logo = get_template_directory_uri() . '/images/logo.png';
            if (isset($hostingpress_options['logo_for_header']['url']) && $hostingpress_options['logo_for_header']['url']) {
                $logo = $hostingpress_options['logo_for_header']['url'];
            }
            ?>
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url( $logo ); ?>" alt=""></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_navigation" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main_navigation">
            <?php if(isset($header_style) && $header_style=='2') { ?>
            <ul class="nav navbar-nav info-navbar navbar-right">
                <?php if(isset($hostingpress_options['contactus_phone_number']) && $hostingpress_options['contactus_phone_number']) : ?>
                    <li><a href="tel:<?php echo esc_attr($hostingpress_options['contactus_phone_number']) ?>"><i class="icon-call-out"></i><?php echo esc_html($hostingpress_options['contactus_phone_number']); ?></a></li>
                <?php endif; ?>
                <?php if(isset($hostingpress_options['contactus_email_address']) && $hostingpress_options['contactus_email_address']) : ?>
                    <li><a href="mailto:<?php echo esc_attr($hostingpress_options['contactus_email_address']); ?>"><i class="icon-envelope"></i><?php echo esc_html($hostingpress_options['contactus_email_address']); ?></a></li>
                <?php endif; ?>
            </ul>
            <?php } ?>
            <?php
            wp_nav_menu( array(
                    'theme_location'  => 'primary',
                    'menu_class'   => 'nav navbar-nav navbar-right',
                    'menu_id'   => '',
                    'fallback_cb' => true,
                    'depth' => 3,
                    'walker'    => new Hosting_Press_Walker_Nav_Menu()
                )
            );
            ?>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<?php if(isset($header_style) && $header_style=='2')
{ ?>
</div>
 <?php } ?>

