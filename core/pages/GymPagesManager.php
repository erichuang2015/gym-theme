<?php
namespace GymCore\GymPages;

require_once dirname(__FILE__) . '/FrontPage.php';

use GymCore\GymPages\FrontPage;

class GymPagesManager
{
    public static function init()
    {
        FrontPage::init();
    }

    public static function render_front_page()
    {
        FrontPage::render();
    }
};
