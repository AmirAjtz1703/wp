<?php $post_meta = get_post_meta(get_the_ID());
$embed_code = isset($post_meta['video_embed_code'][0]) ? $post_meta['video_embed_code'][0] : '';
?>
<?php
if (!empty($embed_code)) {
?>
    <div class="row m0 image">
        <a href="<?php esc_url(the_permalink()); ?>">
            <div class="embed-responsive embed-responsive-16by9 image_row">
                <iframe class="embed-responsive-item" src="<?php echo esc_url($embed_code); ?>"></iframe>
            </div>
        </a>
    </div>
<?php }  ?>