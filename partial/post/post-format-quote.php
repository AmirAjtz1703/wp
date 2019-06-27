<?php $post_meta = get_post_meta(get_the_ID()); ?>
<?php if (isset($post_meta['quote_text'][0]) && $post_meta['quote_text'][0]) { ?>
<div class="row m0 blog quote_blog">
    <div class="media">
        <div class="media-left"><i class="fa fa-quote-left"></i></div>
        <div class="media-body">
            <p><?php echo esc_html($post_meta['quote_text'][0]); ?></p>
            <div class="row m0 quote_writer">- <?php echo esc_html($post_meta['quote_author'][0]); ?></div>
        </div>
    </div>
</div>
<?php } ?>