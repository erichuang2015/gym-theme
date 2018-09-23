<?php
namespace GymCore\GymPages;

require_once dirname(__FILE__) . '/../resources/GymResourcesManager.php';
require_once dirname(__FILE__) . '/OptionsPage.php';

use Carbon_Fields\Field;
use GymCore\GymPages\OptionsPage;
use GymCore\GymResources\GymResourcesManager;

class FrontPage
{
    private static $optionsPage = null;

    public static function init()
    {
        self::$optionsPage = new OptionsPage('Front Page Options', [
            Field::make('image', 'front_page_background_image', 'Hero Background Image')
                ->set_value_type('url'),
            Field::make('complex', 'front_page_about_title', 'About Info Title Lines')
                ->add_fields(array(
                    Field::make('text', 'line_text'),
                )),
            Field::make('complex', 'front_page_about_subtitle', 'About Info Subtitle Lines')
                ->add_fields(array(
                    Field::make('text', 'line_text'),
                )),
            Field::make('rich_text', 'front_page_about_description', 'About Info Description'),
        ]);
    }

    public static function render()
    {
        self::render_hero();
        self::render_content();
    }

    private static function render_logo()
    {
        echo '<div class="main-logo">';
        echo '<object type="image/svg+xml" data="/wp-content/themes/kardia/images/logo-white.svg">';
        echo "Your browser doesn't support SVG images.";
        echo '</object>';
        echo '</div>';
    }

    private static function render_cta()
    {
        echo '
            <span class="coral">\/</span>
            <span class="coral">\/</span>
            <span class="coral">\/</span>
            <span class="coral">\/</span>
            <button class="cta-button">TRAINIERE MIT UNS</button>
        ';
    }

    private static function render_about_headline()
    {
        $title_lines = carbon_get_theme_option('front_page_about_title');
        if (!empty($title_lines)) {
            foreach ($title_lines as $title_line) {
                echo "<h1 class=\"front-page-about__header\">{$title_line['line_text']}</h1>";
            }
        }
        $subtitle_lines = carbon_get_theme_option('front_page_about_subtitle');
        if (!empty($subtitle_lines)) {
            foreach ($subtitle_lines as $subtitle_line) {
                echo "<h2 class=\"front-page-about__subheader\">{$subtitle_line['line_text']}</h2>";
            }
        }
    }

    private static function render_about_description()
    {
        $description = carbon_get_theme_option('front_page_about_description');
        if (!empty($description)) {
            echo "<section class=\"front-page-about__description\">{$description}</section>";
        }
    }

    private static function render_about()
    {
        echo '<article class="front-page-about">';
        self::render_about_headline();
        self::render_about_description();
        echo '</article>';
    }

    private static function render_hero()
    {
        $background_hero_image = carbon_get_theme_option('front_page_background_image');
        echo "<section style=\"background-image:url({$background_hero_image});\" class=\"page-hero-container\">";
        echo '<section class="front-page-content-container front-page-content-container--top">';
        self::render_logo();
        self::render_cta();
        echo '</section>';
        echo '<section class="front-page-content-container front-page-content-container--bottom">';
        self::render_about();
        echo '</section>';
        echo '</section>';
    }

    private static function render_trainers()
    {
        echo '<article class="front-page-content-section">';
        echo '<div class="front-page-content-section__title">UNSER TEAM</div>';
        GymResourcesManager::get_trainers_resource()->render_front_page();
        echo '</article>';
    }

    private static function render_memberships()
    {
        echo '<article class="front-page-content-section">';
        echo '<div class="front-page-content-section__title">UNSERE MITGLIEDSCHAFTEN</div>';
        GymResourcesManager::get_memberships_resource()->render_front_page();
        echo '</article>';
    }

    private static function render_courses()
    {
        echo '<article class="front-page-content-section">';
        echo '<div class="front-page-content-section__title front-page-content-section__title--black">UNSER TRAININGSANGEBOT</div>';
        GymResourcesManager::get_courses_resource()->render_front_page();
        echo '</article>';
    }

    private static function render_content()
    {
        echo '<section class="page-content-container">';
        self::render_trainers();
        self::render_memberships();
        self::render_courses();
        echo '</section>';
    }
};
