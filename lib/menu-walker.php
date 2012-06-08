<?php 

class GSNM_Menu_Walker extends Walker_Nav_Menu {

	function start_el(&$output, $item, $depth, $args) {
			global $wp_query;


        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		// get user defined attributes for thumbnail images
		$attr_defaults = array( 'class' => 'nav_thumb' , 'alt' => esc_attr( $item->attr_title ) , 'title' => esc_attr( $item->attr_title ) );
		$attr = isset( $args->thumbnail_attr ) ? $args->thumbnail_attr : '';
		$attr = wp_parse_args( $attr , $attr_defaults );

		$custom = get_post_custom($item->ID);


        $item_output = $args->before;

		// thumbnail image output
		$item_output .= ( $args->desc_depth == $depth && isset( $args->thumbnail_link ) && $args->thumbnail_link ) ? '<a' . $attributes . '>' : '';
		$item_output .= ( $args->desc_depth == $depth ) ? apply_filters( 'menu_item_thumbnail' , ( isset( $args->thumbnail ) && $args->thumbnail ) ? get_the_post_thumbnail( $item->object_id , ( isset( $args->thumbnail_size ) ) ? $args->thumbnail_size : 'thumbnail' , $attr ) : '' , $item , $args , $depth ) : '';
		$item_output .= ( $args->desc_depth == $depth && isset( $args->thumbnail_link ) && $args->thumbnail_link ) ? '</a>' : '';

		// menu link output
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		// close menu link anchor
        $item_output .= '</a>';
		// menu description output based on depth
        $item_output .= ( $args->desc_depth == $depth ) ? '<span class="sub"></span>' : '';


        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}
}
