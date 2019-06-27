<?php
global $post;
$gallery_images = get_post_meta($post->ID,'gallery',true);
if (!empty($gallery_images))
{ ?>
    <div id="gallery-post" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php
                $count = 0;
                $activeFlag = "";
                foreach($gallery_images as $gallery_image)
                {
                    if($count == 0)
                    {
                        $activeFlag = "active";
                    }
                    else{
                        $activeFlag = "";
                    }
                    echo '<div class="item '.$activeFlag.'">';
                    echo '<img src="' . esc_url($gallery_image) . '" alt="' . esc_url($gallery_image) . '" />';
                    echo '</div>';
                    $count = $count + 1;
                } ?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#gallery-post" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only"><?php esc_html_e('Previous', 'hostingpress'); ?></span>
        </a>
        <a class="right carousel-control" href="#gallery-post" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only"><?php esc_html_e('Next', 'hostingpress'); ?></span>
        </a>
    </div>
<?php
}
else if(has_post_thumbnail($post->ID))
{ ?>
    <div class="row m0 image">
    <a href="<?php esc_url(the_permalink()); ?>">
        <?php the_post_thumbnail();?>
    </a>
    </div>

<?php }
?>


