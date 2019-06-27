<?php if(has_post_thumbnail()) { ?>
    <div class="row m0 image">
        <a href="<?php esc_url(the_permalink()); ?>">
            <?php the_post_thumbnail();?>
        </a>
    </div>
<?php } ?>