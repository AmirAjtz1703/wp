<?php

if(!class_exists('hostingpress_archives_Widget'))
{
    class hostingpress_archives_Widget extends WP_Widget
    {

        function __construct()
        {
            parent::__construct('HP-Archvies', esc_html__('Hostingpress Archives', 'hostingpress'), array('description' => esc_html__('Display Tag Archives', 'hostingpress')));
        }

        function widget($args, $instance)
        {
            echo $args['before_widget'];

            ?>

            <div class="row m0 archives">
                <?php
                    if (isset($instance['title']) && !empty($instance['title'])) {
                        echo $args['before_title'] . apply_filters('widget_title', esc_html($instance['title'])) . $args['after_title'];
                    }
                    ?>
                <ul class="nav archives_list">
                    <?php
                    $my_archives=wp_get_archives(array(
                        'type'=>'monthly',
                        'show_post_count'=>true,
                        'limit'=>20,
                        'post_type'=>'post',
                        'format'=>'html'
                    ));
                    print_r($my_archives);
                    ?>
                </ul>
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
            $title = (isset($instance['title']) && !empty($instance['title'])) ? $instance['title'] : esc_html__('ARCHIVES', 'hostingpress');
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

if (!function_exists('hostingpress_archives_register_widget')) {
    function hostingpress_archives_register_widget()
    {
        register_widget('hostingpress_archives_Widget');
    }
}
add_action('widgets_init', 'hostingpress_archives_register_widget');