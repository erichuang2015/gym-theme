<?php
namespace GymCore\GymPages;

require_once dirname(__FILE__) . '/../GymPostType.php';

use Carbon_Fields\Field;
use GymCore\GymPostType;

class Page
{
    private static $post_type;

    public static function init()
    {
        self::$post_type = new GymPostType('page');
        self::$post_type->add_admin_field_container([
            'title' => 'Gym Page Template Options',
            'fields' => [
                Field::make('image', 'background_image', 'Page Hero Background Image')
                    ->set_value_type('url'),
            ],
        ]);
    }

    private static function get_page_options()
    {
        return self::$post_type->get_post_by_id(get_the_ID());
    }

    public static function render_content()
    {
        echo '<section class="page-content-container">';
        echo '</section>';
    }

    public static function render()
    {
        $page_options = self::get_page_options();
        echo '<pre>';
        print_r($page_options);
        echo '</pre>';
        $title = $page_options['post_title'];
        $background_hero_image = $page_options['background_image'];
        echo "<section style=\"background-image:url({$background_hero_image});\" class=\"page-hero-container page-hero-container--centered\">";
        echo "<h1 class=\"page-title\">{$title}</h1>";
        echo '</section>';

    }
};
