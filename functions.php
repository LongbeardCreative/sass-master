<?php

// enqueue the child theme stylesheet

Function wp_schools_enqueue_scripts() {
wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
wp_enqueue_style( 'childstyle' );
wp_enqueue_script( 'lb_custom-js', get_stylesheet_directory_uri() . '/js/lb_custom.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'wp_schools_enqueue_scripts', 11);

// add lb_ classes to all applicable VC elements
add_action( 'vc_after_init', 'add_lb_custom_class' );/* Note: here we are using vc_after_init because WPBMap::GetParam and mutateParame are available only when default content elements are "mapped" into the system */
function add_lb_custom_class() {
    //Get array of vc elements minus 'vc_' that support custom class "el_class"
    $elements = array(
        'vc_column_text'    => 'lb-column_text',
        'vc_empty_space'    => 'lb-empty_space',
        'vc_row'            => 'lb-row',
        'vc_column'         => 'lb-column',
        'vc_row_inner'      => 'lb-row_inner',
        'vc_column_inner'   => 'lb-column_inner'
        );

    //Loop over each element in array
    foreach ($elements as $oldEl => $newClass) {
        //Get current values stored in the class param in element
        $param = WPBMap::getParam( $oldEl, 'el_class' );
        //Append new value to the 'value' array
        $param['value'][__( 'el_class', $newClass )] = $newClass;
        //Finally "mutate" param with new values
        vc_update_shortcode_param( $oldEl, $param );
    }
}
