<?php

namespace Courses {
    use Carbon_Fields\Container;
    use Carbon_Fields\Field;
    use PostTypes\PostType;

    function init_admin_ui()
    {
        $post_type_slug = 'course';
        $post_type_courses = new PostType($post_type_slug, [
            'supports' => ['title'],
        ]);
        $post_type_courses->register();

        Container::make('post_meta', 'Course Info')
            ->where('post_type', '=', $post_type_slug)
            ->add_fields(array(
                Field::make('text', 'name', 'Course Name'),
            ));

        Container::make('post_meta', 'Course Photo')
            ->set_context('side')
            ->where('post_type', '=', $post_type_slug)
            ->add_fields(array(
                Field::make('image', 'image', 'Photo')
                    ->set_value_type('url'),
            ));
    }

    function get_course_info_by_id($course_id)
    {
        return array(
            'name' => carbon_get_post_meta($course_id, 'name'),
            'image' => carbon_get_post_meta($course_id, 'image'),
        );
    }

    function get_courses()
    {
        $courses_query = new \WP_Query(array('post_type' => 'course'));
        return array_map(function ($course_post) {
            return get_course_info_by_id($course_post->ID);
        }, $courses_query->posts);
    }

    function render_course($course)
    {
        echo "<div class=\"course-container\" style=\"background-image:url({$course['image']});\">";
        echo "<span class=\"course-container__title\">{$course['name']}</span>";
        echo '</div>';
    }

    function render_courses_overview()
    {
        echo '<div class="courses-overview">';
        $courses = get_courses();
        foreach ($courses as $course) {
            render_course($course);
        }
        echo '</div>';
    }

}
