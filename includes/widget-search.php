<?php

if(!class_exists('hostingpress_Search_Widget'))
{
    class hostingpress_Search_Widget extends WP_Widget
    {

        function __construct()
        {
            parent::__construct('HP-Search', esc_html__('Hostingpress Search', 'hostingpress'), array('description' => esc_html__('Display Search', 'hostingpress')));
        }

        function widget($args, $instance)
        {
            echo $args['before_widget'];

            ?>

            <form role="search" method="get" action="<?php echo esc_url(home_url('/')) ?>" class="row m0 search_form">
                <?php
                    if (isset($instance['title']) && !empty($instance['title'])) {
                        echo $args['before_title'] . apply_filters('widget_title', esc_html($instance['title'])) . $args['after_title'];
                    }
                    ?>


                <div class="input-group">
                    <input type="search" id="s" name="s" class="form-control" placeholder="<?php echo esc_html__('Search', 'hostingpress') ?>">
                    <span class="input-group-addon">
                        <button type="submit"><i class="fa fa-search"></i></button></span>
                </div>
            </form>


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

if (!function_exists('hostingpress_search_register_widget')) {
    function hostingpress_search_register_widget()
    {
        register_widget('hostingpress_Search_Widget');
    }
}
add_action('widgets_init', 'hostingpress_search_register_widget');