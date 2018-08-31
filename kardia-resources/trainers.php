<?php

namespace Trainers {
    require_once dirname(__FILE__) . '/courses.php';
    use Carbon_Fields\Container;
    use Carbon_Fields\Field;
    use PostTypes\PostType;

    function init_admin_ui()
    {
        $post_type_slug = 'trainer';
        $post_type_trainers = new PostType($post_type_slug, [
            'supports' => ['title'],
        ]);
        $post_type_trainers->register();

        Container::make('post_meta', 'Trainer Info')
            ->where('post_type', '=', $post_type_slug)
            ->add_fields(array(
                Field::make('text', 'name', 'Full Name'),
                Field::make('association', 'courses')
                    ->set_types(array(
                        array(
                            'type' => 'post',
                            'post_type' => 'course',
                        ),
                    )),
            ));
        Container::make('post_meta', 'Trainer Profile Photo')
            ->set_context('side')
            ->where('post_type', '=', $post_type_slug)
            ->add_fields(array(
                Field::make('image', 'image', 'Photo')
                    ->set_value_type('url'),
            ));
    }

    function get_trainer_info_by_id($trainer_id)
    {
        $trainer_courses = carbon_get_post_meta($trainer_id, 'courses');
        $trainer_courses_info = array_map(function ($trainer_course) {
            return \Courses\get_course_info_by_id($trainer_course['id']);
        }, $trainer_courses);
        return array(
            'name' => carbon_get_post_meta($trainer_id, 'name'),
            'courses' => $trainer_courses_info,
            'image' => carbon_get_post_meta($trainer_id, 'image'),
        );
    }

    function get_trainers()
    {
        $trainers_query = new \WP_Query(array('post_type' => 'trainer'));
        return array_map(function ($trainer_post) {
            return get_trainer_info_by_id($trainer_post->ID);
        }, $trainers_query->posts);
    }

    function render_trainer_inlay_courses($trainer)
    {
        $course_titles = '';
        $last_course = end($trainer['courses']);
        foreach ($trainer['courses'] as $course) {
            if ($course == $last_course) {
                $course_titles .= $course['name'];
            } else {
                $course_titles .= $course['name'] . ' • ';
            }
        }
        echo "<span class=\"trainer-inlay__subtitle\">{$course_titles}</span>";
    }

    function render_trainer($trainer)
    {
        echo "<div style=\"background-image:url({$trainer['image']});\">";
        echo '<div class="trainer-inlay">';
        echo "<span class=\"trainer-inlay__title\">{$trainer['name']}</span>";
        render_trainer_inlay_courses($trainer);
        echo '</div>';
        echo '</div>';
    }

    function render_trainers_overview()
    {
        echo '<div class="trainers-overview">';
        $trainers = get_trainers();
        foreach ($trainers as $trainer) {
            render_trainer($trainer);
        }
        echo '</div>';
    }
}
