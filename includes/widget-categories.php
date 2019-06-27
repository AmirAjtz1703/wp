<?php

if(!class_exists('hostingpress_Categories_Widget'))
{
    class hostingpress_Categories_Widget extends WP_Widget
    {

        function __construct()
        {
            parent::__construct('HP-Categories', esc_html__('Hostingpress Categories', 'hostingpress'), array('description' => esc_html__('Display Categories', 'hostingpress')));
        }

        function widget($args, $instance)
        {
           echo $args['before_widget'];

            ?>


                <div class="row m0 categories">
                    <?php
                        if (isset($instance['title']) && !empty($instance['title'])) {
                            echo $args['before_title'] . apply_filters('widget_title', esc_html($instance['title'])) . $args['after_title'];
                        }
                        ?>
                    <ul class="nav categories_list">
                        <?php $categories = get_the_category();
                        foreach ( $categories as $category )
                        { ?>

                        <li><a href="<?php echo esc_url( get_category_link( $category->term_id ) ) ?>"><?php echo esc_html($category->name); ?> <span>(<?php echo esc_html($category->count); ?>)</span></a></li>
                        <?php }
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

if (!function_exists('hostingpress_categories_register_widget')) {
    function hostingpress_categories_register_widget()
    {
        register_widget('hostingpress_Categories_Widget');
    }
}
add_action('widgets_init', 'hostingpress_categories_register_widget');