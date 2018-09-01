<?php
namespace GymCore\GymResources;

require_once dirname(__FILE__) . '/TrainersResource.php';
require_once dirname(__FILE__) . '/CoursesResource.php';
require_once dirname(__FILE__) . '/MembershipsResource.php';
require_once dirname(__FILE__) . '/GymPostTypesManager.php';

use GymCore\GymPostTypesManager;
use GymCore\GymResources\CoursesResource;
use GymCore\GymResources\MembershipsResource;
use GymCore\GymResources\TrainersResource;

class GymResourcesManager
{
    private static $trainers_resource = null;
    private static $courses_resource = null;
    private static $memberships_resource = null;

    public static function init()
    {
        GymPostTypesManager::init();
        self::$trainers_resource = new TrainersResource();
        self::$courses_resource = new CoursesResource();
        self::$memberships_resource = new MembershipsResource();
    }

    public static function get_trainers_resource()
    {
        return self::$trainers_resource;
    }

    public static function get_courses_resource()
    {
        return self::$courses_resource;
    }

    public static function get_memberships_resource()
    {
        return self::$memberships_resource;
    }
};
