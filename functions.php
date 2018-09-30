<?php
require __DIR__ . '/vendor/autoload.php';
require_once dirname(__FILE__) . '/style/load_styles.php';
require_once dirname(__FILE__) . '/js/load_js.php';
require_once dirname(__FILE__) . '/core/resources/GymResourcesManager.php';
require_once dirname(__FILE__) . '/core/pages/GymPagesManager.php';

use GymCore\GymPages\GymPagesManager;
use GymCore\GymResources\GymResourcesManager;

function crb_load()
{
    require_once 'vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
}

function init_gym_entities()
{
    GymResourcesManager::init();
    GymPagesManager::init();
}

function register_menus()
{
    register_nav_menus(
        [
            'top-navigation' => __('Top Navigation Menu'),
            'sidebar-navigation' => __('Sidebar Navigation Menu'),
        ]
    );
}

function hook_javascript()
{
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jump.js/1.0.2/jump.min.js"></script>';
    echo '<script src="https://use.fontawesome.com/45f9febe0c.js"></script>';
    echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">';
}
add_action('wp_head', 'hook_javascript');

add_action('after_setup_theme', 'crb_load');
add_action('init', 'register_menus');
add_action('carbon_fields_register_fields', 'init_gym_entities');
add_action('wp_enqueue_scripts', 'load_styles');
add_action('wp_enqueue_scripts', 'load_js');
