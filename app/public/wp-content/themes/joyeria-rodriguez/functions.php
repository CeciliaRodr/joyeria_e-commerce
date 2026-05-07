<?php
function joyeria_enqueue_styles() {
    wp_enqueue_style(
        'joyeria-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'joyeria_enqueue_styles' );
