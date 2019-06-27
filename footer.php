<?php global $hostingpress_options; ?>

<footer class="row">
    <div class="top_footer m0">
        <div class="container">

            <?php
            if(!empty($hostingpress_options['display_quick_contact_info_bar']) && $hostingpress_options['display_quick_contact_info_bar'] == '1')
            { ?>
            <div class="row m0 quick_contact">
                <ul class="nav nav-pills">
                    <li><a href="tel:<?php echo esc_attr($hostingpress_options['quick_contact_phone_number']); ?>"><i class="lnr lnr-phone"></i><?php echo esc_html($hostingpress_options['quick_contact_phone_number']); ?></a></li>
                    <li><a href="mailto:<?php echo esc_attr($hostingpress_options['quick_contact_email_address']); ?>"><i class="lnr lnr-envelope"></i><?php echo esc_html($hostingpress_options['quick_contact_email_address']); ?></a></li>
                    <li><a href="<?php echo esc_url($hostingpress_options['quick_contact_chat_us_URL']); ?>"><i class="lnr lnr-bubble"></i><?php esc_html_e('chat with us', 'hostingpress'); ?></a></li>
                </ul>
            </div>
            <?php } ?>
            <div class="row shortKnowledge">
                <?php if(!empty($hostingpress_options['footer_about_txt'])) : ?>
                <div class="col-sm-6 about">
                    <?php
                    $logo = get_template_directory_uri() . '/images/logo2.png';
                    if (isset($hostingpress_options['logo_for_footer']['url']) && $hostingpress_options['logo_for_header']['url']) {
                        $logo = $hostingpress_options['logo_for_footer']['url'];
                    }
                    ?>
                    <h4><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url( $logo ); ?>" alt=""></a></h4>
                    <?php if($footer_about_txt = $hostingpress_options['footer_about_txt']) : ?>
                    <p><?php echo esc_html($footer_about_txt); ?></p>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <div class="col-sm-6 product">
                    <h4><?php esc_html_e('Quick Links', 'hostingpress'); ?></h4>

                    <?php
                    wp_nav_menu( array(
                            'theme_location'  => 'footer',
                            'menu_class'   => 'nav product_list',
                            'menu_id'   => '',
                            'depth' => 1,
			    'fallback_cb' => true

                        )
                    );
                    ?>
                </div>
            </div>
            <?php if($hostingpress_options['display_country_select_in_footer'] || $hostingpress_options['display_footer_social_icons']) : ?>
            <div class="row beInContact m0">
                <?php
                if(!empty($hostingpress_options['display_country_select_in_footer']) && $hostingpress_options['display_country_select_in_footer'] == '1')
                { ?>
                    <div class="btn-group country_select">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="flag"><img src="<?php echo get_template_directory_uri() ?>/images/icons/footer/flag.png" alt=""></span>India<i class="lnr lnr-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Nerthelands</a></li>
                            <li><a href="#">Russia</a></li>
                            <li><a href="#">United States</a></li>
               
                        </ul>
                    </div>
               <?php } ?>
                <?php if($hostingpress_options['display_footer_social_icons']) : ?>
                <div class="social_icos">

                    <ul class="nav">
                        <?php if($hostingpress_options['twitter_url']) : ?>
                            <li><a target="_blank" href="<?php echo esc_url($hostingpress_options['twitter_url']); ?>"><i class="fa fa-twitter"></i></a></li>
                        <?php endif; ?>
                        <?php if($hostingpress_options['facebook_url']) : ?>
                        <li><a target="_blank" href="<?php echo esc_url($hostingpress_options['facebook_url']); ?>"><i class="fa fa-facebook"></i></a></li>
                        <?php endif; ?>
                        <?php if($hostingpress_options['google_url']) : ?>
                            <li><a target="_blank" href="<?php echo esc_url($hostingpress_options['google_url']); ?>"><i class="fa fa-google"></i></a></li>
                        <?php endif; ?>
                        <?php if($hostingpress_options['linkedin_url']) : ?>
                            <li><a target="_blank" href="<?php echo esc_url($hostingpress_options['linkedin_url']); ?>"><i class="fa fa-linkedin"></i></a></li>
                        <?php endif; ?>
                    </ul>

                </div>
                <?php endif; ?>
                <div class="subscribe_form">
                    <?php
                    if ( shortcode_exists( 'contact-form-7' ) ) {
                        echo do_shortcode('[contact-form-7 id="2495" title="Subscribe" html_id="footer_newsletter" html_class="form-inline"]');
                    } ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if($copyright_txt = $hostingpress_options['footer_copyright']) : ?>
        <div class="m0 copyright_line"><?php echo esc_html($copyright_txt); ?></div>
    <?php endif; ?>
</footer>
<?php wp_footer(); ?>

</body>
</html>
