<?php
namespace GymCore\GymResources;

require_once dirname(__FILE__) . '/TrainersResource.php';
require_once dirname(__FILE__) . '/CoursesResource.php';
require_once dirname(__FILE__) . '/MembershipsResource.php';
require_once dirname(__FILE__) . '/PracticeTypesResource.php';
require_once dirname(__FILE__) . '/FAQsResource.php';
require_once dirname(__FILE__) . '/../GymPostTypesManager.php';

use GymCore\GymPostTypesManager;
use GymCore\GymResources\CoursesResource;
use GymCore\GymResources\FAQsResource;
use GymCore\GymResources\MembershipsResource;
use GymCore\GymResources\PracticeTypesResource;
use GymCore\GymResources\TrainersResource;

class GymResourcesManager
{
    private static $trainers_resource = null;
    private static $courses_resource = null;
    private static $memberships_resource = null;
    private static $practice_types_resource = null;
    private static $faqs_resource = null;

    public static function init()
    {
        GymPostTypesManager::init();
        self::$trainers_resource = new TrainersResource();
        self::$courses_resource = new CoursesResource();
        self::$memberships_resource = new MembershipsResource();
        self::$practice_types_resource = new PracticeTypesResource();
        self::$faqs_resource = new FAQsResource();
    }

    public static function get_faqs_resource()
    {
        return self::$faqs_resource;
    }

    public static function get_trainers_resource()
    {
        return self::$trainers_resource;
    }

    public static function get_practice_types_resource()
    {
        return self::$practice_types_resource;
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
