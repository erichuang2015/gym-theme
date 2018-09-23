<?php
namespace GymCore\GymResources;

require_once dirname(__FILE__) . '/GymResource.php';
require_once dirname(__FILE__) . '/CoursesResource.php';
require_once dirname(__FILE__) . '/../GymPostTypesManager.php';

use Carbon_Fields\Field;
use GymCore\GymPostTypesManager;

class TrainersResource extends \GymCore\GymResource
{
    public function render_trainer_inlay_courses($trainer_post)
    {
        $trainer_courses = $trainer_post['courses'];
        $trainer_courses_names = array_map(function ($trainer_course) {
            $course_id = $trainer_course['id'];
            $course_data = GymPostTypesManager::get_courses_post_type()->get_post_by_id($course_id);
            return $course_data['name'];
        }, $trainer_courses);

        $course_display_titles = '';
        $last_course_name = end($trainer_courses_names);
        foreach ($trainer_courses_names as $course_name) {
            if ($course_name == $last_course_name) {
                $course_display_titles .= $course_name;
            } else {
                $course_display_titles .= $course_name . ' • ';
            }
        }
        echo "<span class=\"trainer-inlay__subtitle\">{$course_display_titles}</span>";
    }

    public function render_trainer($trainer_post)
    {
        echo "<div style=\"background-image:url({$trainer_post['image']});\">";
        echo '<div class="trainer-inlay">';
        echo "<div class=\"trainer-inlay__title\">{$trainer_post['name']}</div>";
        $this->render_trainer_inlay_courses($trainer_post);
        echo '</div>';
        echo '</div>';
    }

    protected function get_post_type()
    {
        return GymPostTypesManager::get_trainers_post_type();
    }

    public function render_front_page()
    {
        echo '<div class="trainers-overview">';
        foreach ($this->get_posts() as $trainer_post) {
            $this->render_trainer($trainer_post);
        }
        echo '</div>';
    }

    public function render_page()
    {
        echo '<div class="trainers-overview">';
        foreach ($this->get_posts() as $trainer_post) {
            $this->render_trainer($trainer_post);
        }
        echo '</div>';
    }

    protected function get_slug()
    {
        return 'trainer';
    }

    protected function get_admin_ui_containers()
    {
        return [
            [
                'title' => 'Trainer Info',
                'fields' => [
                    Field::make('text', 'name', 'Full Name'),
                    Field::make('association', 'courses')
                        ->set_types(array(
                            array(
                                'type' => 'post',
                                'post_type' => 'course',
                            ),
                        )),
                ],
            ],
            [
                'title' => 'Trainer Profile Image',
                'fields' => [
                    'image' => Field::make('image', 'image', 'Photo')
                        ->set_value_type('url'),
                ],
                'context' => 'side',
            ],
        ];
    }
};
