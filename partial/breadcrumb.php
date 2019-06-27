<?php
global $hostingpress_options;

if ($hostingpress_options['display_image_header'] == '1')
{
?>

<section class="row page_header">
    <div class="container">
        <?php
        if(!empty($hostingpress_options['display_breadcrumb']) && $hostingpress_options['display_breadcrumb'] == '1')
        {
            echo hostingpress_breadcrumb($hostingpress_options['breadcrumb_separator']);
        } ?>
    </div>
</section>
<?php } ?>