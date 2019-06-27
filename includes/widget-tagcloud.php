<?php

if(!class_exists('hostingpress_tagcloud_Widget'))
{
    class hostingpress_tagcloud_Widget extends WP_Widget
    {

        function __construct()
        {
            parent::__construct('HP-tags', esc_html__('Hostingpress Tags', 'hostingpress'), array('description' => esc_html__('Display Tag Clouds', 'hostingpress')));
        }

        function widget($args, $instance)
        {
            echo $args['before_widget'];

            ?>


            <div class="row m0 tags_row">

                    <?php
                    if (isset($instance['title']) && !empty($instance['title'])) {
                        echo $args['before_title'] . apply_filters('widget_title', esc_html($instance['title'])) . $args['after_title'];
                    }
                    ?>

                    <?php $tags = wp_tag_cloud( 'format=array&smallest=10.5&largest=10.5' );
                    foreach ( $tags as $tag )
                    {
                        echo esc_html($tag);
                        ?>

                    <?php }
                    ?>

                </div>
            <?php
            echo $args['after_widget'];
        }

        function update($new_instance, $old_instance)
        {
            return $new_instance;
        }

        function form($instance)
        {
            $title = (isset($instance['title']) && !empty($instance['title'])) ? $instance['title'] : esc_html__('Search', 'hostingpress');
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'hostingpress'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                       value="<?php echo esc_attr($title); ?>">
            </p>
            <?php
        }
    }
}

if (!function_exists('hostingpress_tagcloud_register_widget')) {
    function hostingpress_tagcloud_register_widget()
    {
        register_widget('hostingpress_tagcloud_Widget');
    }
}
add_action('widgets_init', 'hostingpress_tagcloud_register_widget');