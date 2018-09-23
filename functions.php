<?php
require __DIR__ . '/vendor/autoload.php';
require_once dirname(__FILE__) . '/style/load_styles.php';
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

add_action('after_setup_theme', 'crb_load');
add_action('init', 'register_menus');
add_action('carbon_fields_register_fields', 'init_gym_entities');
add_action('wp_enqueue_scripts', 'load_styles');
