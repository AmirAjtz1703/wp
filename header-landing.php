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
<nav class="navbar navbar-default navbar-static-top fluid_header centered">
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
            <ul class="nav navbar-nav info-navbar navbar-right">

                <?php if(isset($hostingpress_options['contactus_phone_number']) && $hostingpress_options['contactus_phone_number']) : ?>
                    <li><a href="tel:<?php echo esc_attr($hostingpress_options['contactus_phone_number']) ?>"><i class="icon-call-out"></i><?php echo esc_html($hostingpress_options['contactus_phone_number']); ?></a></li>
                <?php endif; ?>
                <?php if(isset($hostingpress_options['contactus_email_address']) && $hostingpress_options['contactus_email_address']) : ?>
                    <li><a href="mailto:<?php echo esc_attr($hostingpress_options['contactus_email_address']); ?>"><i class="icon-envelope"></i><?php echo esc_html($hostingpress_options['contactus_email_address']) ?></a></li>
                <?php endif; ?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

