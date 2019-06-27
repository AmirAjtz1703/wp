<?php

if(!class_exists('hostingpress_Recent_Post_Widget'))
{
    class hostingpress_Recent_Post_Widget extends WP_Widget
    {

        function __construct()
        {
            parent::__construct('recent-post', esc_html__('Hostingpress Recent Post', 'hostingpress'), array('description' => esc_html__('Display Recent Post', 'hostingpress')));
        }

        function widget($args, $instance)
        {
            echo $args['before_widget'];

            $instance['showposts'] = (isset($instance['showposts']) && intval($instance['showposts']) && $instance['showposts'] > 0) ? $instance['showposts'] : 3;

            $recent_post = new WP_Query();
            $recent_post->query(array('post_type' => 'post', 'showposts' => $instance['showposts'], 'paged' => 1, 'ignore_sticky_posts' => 1));
            ?>


            <div class="row m0 recent_posts">
               <?php
                    if (isset($instance['title']) && !empty($instance['title'])) {
                        echo $args['before_title'] . apply_filters('widget_title', esc_html($instance['title'])) . $args['after_title'];
                    }

                    ?>
                <?php
                while ($recent_post->have_posts()) : $recent_post->the_post();
                ?>
                <div class="post media">
                    <?php if(has_post_thumbnail()) { ?>
                    <div class="media-left">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('hostingpress-post-thumb-widget', array('class' => 'img-responsive')); ?></a>
                    </div>
                    <?php } ?>
                    <div class="media-body">
                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <div class="row m0 date"><i class="fa fa-calendar"></i><?php the_time( get_option('date_format') ); ?></div>
                    </div>
                </div>
                <?php
                endwhile;
                wp_reset_postdata();
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
            $title = (isset($instance['title']) && !empty($instance['title'])) ? $instance['title'] : esc_html__('Recent Post', 'hostingpress');
            $showposts = (isset($instance['showposts']) && intval($instance['showposts']) && $instance['showposts'] > 0) ? $instance['showposts'] : 3;
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'hostingpress'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('showposts')); ?>"><?php _e('Number of posts to show:', 'hostingpress'); ?></label>
                <input id="<?php echo esc_attr($this->get_field_id('showposts')); ?>" name="<?php echo esc_attr($this->get_field_name('showposts')); ?>" type="text" value="<?php echo esc_attr($showposts); ?>" size="3">
            </p>
            <?php
        }
    }
}

if (!function_exists('hostingpress_recent_post_register_widget')) {
    function hostingpress_recent_post_register_widget()
    {
        register_widget('hostingpress_Recent_Post_Widget');
    }
}
add_action('widgets_init', 'hostingpress_recent_post_register_widget');