<?php

class Hosting_Press_Walker_Nav_Menu extends Walker_Nav_Menu {

    public function start_lvl( &$output , $depth = 0, $args = array()) {

        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu hosting-dropdown mega-menu\">\n";

    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $yam = ' yam-fwr';

        $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
        foreach( $children as $child ){
            $obj = get_post_meta( $child->ID, '_menu_item_object' );
            if( $obj[0] == 'mega_menu' ){
                $yam = ' mega-drop';
            }
        }
        if(  $depth == 0 ){
            $classes[] = 'dropdown menu-item-' . $item->ID . $yam;
        }else{
            if( !empty( $children ) ){
                $classes[] = 'dropdown-submenu mul';
            }
        }

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        $output .= $indent . '<li' . $id . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';


        if( is_object( $args )){
            $args->before = $args->before||'';
            $args->after = $args->after||'';
            $args->link_before = $args->link_before||'';
            $args->link_after = $args->link_after||'';
        }else{
            $args = new stdClass();
            $args->before = '';
            $args->after = '';
            $args->link_before = '';
            $args->link_after = '';
        }

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        if( strpos( $class_names, 'current-page-ancestor' ) !== FALSE ){
            if( !empty( $atts['class'] ) ){
                $atts['class'] .= ' active';
            }else{
                $atts['class'] = 'active';
            }
        }

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';

        if( strpos( $item->description, 'icon:') !== false ){
            $item_output .= '<i class="fa fa-'.trim(str_replace( 'icon:', '', $item->description )).'"></i> ';
        }

        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        if( $item->object == 'mega_menu' ) {
            $getPost = get_post($item->object_id);
            $output .= do_shortcode( $getPost->post_content);
        }else{
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }

    }

    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= "</li>\n";
    }

}