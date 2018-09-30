<?php
namespace GymCore\GymPages;

require_once dirname(__FILE__) . '/../GymPostType.php';
require_once dirname(__FILE__) . '/../render.php';

use Carbon_Fields\Field;
use function GymCore\Render\render_arrow_row;
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
                Field::make('text', 'cta_label', 'CTA Button Label'),
                Field::make('text', 'cta_url', 'CTA Button Link URL'),
            ],
        ]);
    }

    public static function get_page_options()
    {
        return self::$post_type->get_post_by_id(get_the_ID());
    }

    private static function render_cta_button()
    {
        $page_options = self::get_page_options();
        $label = $page_options['cta_label'];
        $url = $page_options['cta_url'];
        echo "<a href=\"{$url}\" class=\"cta-button cta-button--white\">{$label}</a>";
    }

    private static function render_cta()
    {
        render_arrow_row("#fff");
        self::render_cta_button();
    }

    public static function render_content()
    {
        the_content();
    }

    public static function render($custom_content_render)
    {
        $page_options = self::get_page_options();
        $title = $page_options['post_title'];
        $background_hero_image = $page_options['background_image'];
        echo "<section style=\"background-image:url({$background_hero_image});\" class=\"page-hero-container page-hero-container--centered\">";
        echo "<h1 class=\"page-title\">{$title}</h1>";
        self::render_cta();
        echo '</section>';
        echo '<section class=\"page-content-container">';
        if (!empty($custom_content_render)) {
            $custom_content_render();
        } else {
            self::render_content();
        }
        echo '</section>';
    }
};
