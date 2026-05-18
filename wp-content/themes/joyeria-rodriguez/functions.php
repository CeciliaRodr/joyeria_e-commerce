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

// Eliminar breadcrumb de WooCommerce
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'init', function() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
});

// Registrar usuario

// ==============================================
// SHORTCODE PARA PANEL DE MI CUENTA
// ==============================================
