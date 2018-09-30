<?php
namespace GymCore\GymPages;

require_once dirname(__FILE__) . '/FrontPage.php';
require_once dirname(__FILE__) . '/Page.php';
require_once dirname(__FILE__) . '/OptionsPage.php';
require_once dirname(__FILE__) . '/../render.php';

use Carbon_Fields\Field;
use function GymCore\Render\render_gym_info;
use GymCore\GymPages\FrontPage;
use GymCore\GymPages\Page;

class GymPagesManager
{
    public static function init()
    {
        Page::init();
        FrontPage::init();
        new OptionsPage('Memberships and fees options', [
            Field::make('rich_text', 'gym_info_fee_order', 'Gym Fees Info'),
            Field::make('rich_text', 'gym_info_cancellation', 'Membership Cancellation Info'),
            Field::make('rich_text', 'gym_info_statute', 'Club Statute Info'),
        ]);
    }

    public static function get_current_page_options()
    {
        return Page::get_page_options();
    }

    public static function render_front_page()
    {
        FrontPage::render();
    }

    public static function gym_info()
    {
        $gym_info_fee_order = carbon_get_theme_option('gym_info_fee_order');
        $gym_info_cancellation = carbon_get_theme_option('gym_info_cancellation');
        $gym_info_statute = carbon_get_theme_option('gym_info_statute');
        render_gym_info($gym_info_fee_order, $gym_info_cancellation, $gym_info_statute);
    }

    public static function render_page($custom_content_render = null)
    {
        Page::render($custom_content_render);
    }
};
