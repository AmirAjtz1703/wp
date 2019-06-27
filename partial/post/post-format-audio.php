
<?php
$post_meta = get_post_meta(get_the_ID());
$mp3_audio_file = isset($post_meta['mp3_audio_file'][0]) ? $post_meta['mp3_audio_file'][0] : '';
$mp3_audio_url = "";
if (!empty($mp3_audio_file)) {
$mp3_audio_url = wp_get_attachment_url($mp3_audio_file);
}

if (!empty($mp3_audio_file)) {
?>
<div id="jplayer_<?php the_ID(); ?>" class="jp-jplayer jp-jplayer-audio"></div>

<div class="jp-audio-container">
    <div class="jp-audio">
        <div id="jp_interface_<?php the_ID(); ?>" class="jp-interface">
            <ul class="jp-controls">
                <li><a href="#" class="jp-play" tabindex="1"><?php esc_html_e('play', 'hostingpress'); ?></a></li>
                <li><a href="#" class="jp-pause" tabindex="1"><?php esc_html_e('pause', 'hostingpress'); ?></a></li>
                <li><a href="#" class="jp-mute" tabindex="1"><?php esc_html_e('mute', 'hostingpress'); ?></a></li>
                <li><a href="#" class="jp-unmute" tabindex="1"><?php esc_html_e('unmute', 'hostingpress'); ?></a></li>
            </ul>
            <div class="jp-progress">
                <div class="jp-seek-bar">
                    <div class="jp-play-bar"></div>
                </div>
            </div>
            <div class="jp-volume-bar-container">
                <div class="jp-volume-bar">
                    <div class="jp-volume-bar-value"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        if (jQuery().jPlayer) {
            jQuery("#jplayer_<?php the_ID(); ?>").jPlayer({
                ready: function () {
                    $(this).jPlayer("setMedia", {
                        <?php
                        if( !empty($mp3_audio_url) ) {
                            ?>mp3: "<?php echo esc_url($mp3_audio_url); ?>" <?php
                            }
                            ?>
                    });
                },
                swfPath: "<?php echo get_template_directory_uri(); ?>/js",
                cssSelectorAncestor: "#jp_interface_<?php the_ID(); ?>",
                supplied: "<?php if( !empty($mp3_audio_url) ) : ?>mp3,<?php endif; ?>all"
            });
        }
    });
</script>
    <?php
} ?>