<?php
namespace GymCore\GymPages;

require_once dirname(__FILE__) . '/FrontPage.php';
require_once dirname(__FILE__) . '/Page.php';

use GymCore\GymPages\FrontPage;
use GymCore\GymPages\Page;

class GymPagesManager
{
    public static function init()
    {
        Page::init();
        FrontPage::init();
    }

    public static function render_front_page()
    {
        FrontPage::render();
    }

    public static function render_page($custom_content_render)
    {
        Page::render($custom_content_render);
    }
};
