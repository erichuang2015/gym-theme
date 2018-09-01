<?php
namespace GymCore;

require_once dirname(__FILE__) . '/GymPostType.php';

class GymPostTypesManager
{
    private static $trainers_post_type = null;
    private static $courses_post_type = null;
    private static $memberships_post_type = null;

    public static function init()
    {
        self::$trainers_post_type = new GymPostType('trainer');
        self::$courses_post_type = new GymPostType('course');
        self::$memberships_post_type = new GymPostType('membership');
    }

    public static function get_trainers_post_type()
    {
        return self::$trainers_post_type;
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
