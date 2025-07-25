<?php
add_action('wp_enqueue_scripts', 'shin_scripts');

function shin_scripts()
{
    $version = time();

    wp_enqueue_style('main-style-css', THEME_URL . '-child' . '/assets/dist/css/main.min.css', array(), $version, 'all');
    wp_enqueue_style('swiper-css', THEME_URL . '-child' . '/assets/lib/swiper/swiper-bundle.min.css', array(), $version, 'all');

    wp_enqueue_script('main-scripts-js', THEME_URL . '-child' . '/assets/dist/js/main.min.js', array('jquery'), $version, true);
    wp_enqueue_script('swiper-js', THEME_URL . '-child' . '/assets/lib/swiper/swiper-bundle.min.js', array('jquery'), $version, true);
}

add_filter('woocommerce_breadcrumb_defaults', function ($defaults) {
    $defaults['delimiter'] = ' <span class="breadcrumb_ic"></span> ';
    return $defaults;
});