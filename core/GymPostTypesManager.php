<?php
namespace GymCore;

require_once dirname(__FILE__) . '/GymPostType.php';

use GymCore\GymPostType;

class GymPostTypesManager
{
    private static $trainers_post_type = null;
    private static $courses_post_type = null;
    private static $memberships_post_type = null;
    private static $practice_types_post_type = null;
    private static $faqs_post_type = null;

    public static function init()
    {
        self::$trainers_post_type = new GymPostType('trainer');
        self::$courses_post_type = new GymPostType('course');
        self::$memberships_post_type = new GymPostType('membership');
        self::$practice_types_post_type = new GymPostType('practice_type');
        self::$faqs_post_type = new GymPostType('faq');
    }

    public static function get_trainers_post_type()
    {
        return self::$trainers_post_type;
    }

    public static function get_faqs_post_type()
    {
        return self::$faqs_post_type;
    }

    public static function get_practice_types_post_type()
    {
        return self::$practice_types_post_type;
    }

    public static function get_courses_post_type()
    {
        return self::$courses_post_type;
    }

    public static function get_memberships_post_type()
    {
        return self::$memberships_post_type;
    }
};
