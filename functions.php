<?php
require __DIR__ . '/vendor/autoload.php';
require_once dirname(__FILE__) . '/kardia-resources/init.php';
require_once dirname(__FILE__) . '/style/load_styles.php';

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once 'vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action('carbon_fields_register_fields', 'init_admin_ui');
add_action('wp_enqueue_scripts', 'load_styles');
