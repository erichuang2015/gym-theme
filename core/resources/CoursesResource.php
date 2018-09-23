<?php
namespace GymCore\GymResources;

require_once dirname(__FILE__) . '/GymResource.php';
require_once dirname(__FILE__) . '/../GymPostTypesManager.php';

use Carbon_Fields\Field;
use GymCore\GymPostTypesManager;

class CoursesResource extends \GymCore\GymResource
{
    public function render_course($course_post)
    {
        echo "<div class=\"course-container\" style=\"background-image:url({$course_post['image']});\">";
        echo '<div>';
        echo "<span class=\"course-container__title\">{$course_post['name']}</span>";
        echo '</div>';
        echo '</div>';
    }

    public function render_front_page()
    {
        echo '<div class="courses-overview">';
        foreach ($this->get_posts() as $course_post) {
            $this->render_course($course_post);
        }
        echo '</div>';
    }

    public function render_page()
    {
        echo '<div class="courses-overview">';
        foreach ($this->get_posts() as $course_post) {
            $this->render_course($course_post);
        }
        echo '</div>';
    }

    protected function get_slug()
    {
        return 'course';
    }

    protected function get_post_type()
    {
        return GymPostTypesManager::get_courses_post_type();
    }

    protected function get_admin_ui_containers()
    {
        return [
            [
                'title' => 'Course Info',
                'fields' => [
                    'name' => Field::make('text', 'name', 'Course Name'),
                ],
            ],
            [
                'title' => 'Course Image',
                'fields' => [
                    'image' => Field::make('image', 'image', 'Photo')
                        ->set_value_type('url'),
                ],
                'context' => 'side',
            ],
        ];
    }
};
