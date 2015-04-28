<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );

}


# Agregado el currency de venezuela al tema

add_filter( 'woocommerce_currencies', 'add_my_currency' );
 
function add_my_currency( $currencies ) {
     $currencies['VEF'] = __( 'Bolivares Venezuela', 'woocommerce' );
     return $currencies;
}
 
add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
 
function add_my_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'VEF': $currency_symbol = 'Bs'; break;
     }
     return $currency_symbol;
}
