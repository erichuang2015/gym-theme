<?php

namespace GymCore;

use \Carbon_Fields\Container;
use \PostTypes\PostType;

class GymPostType
{
    private $post_type_slug;
    private $post_type;
    private $supports = ['title'];
    private $fields = [];

    private function _init_custom_post_type($post_type_slug)
    {
        $this->post_type_slug = $post_type_slug;
        $this->post_type = new PostType($this->post_type_slug, [
            'supports' => $this->supports,
        ]);
        $this->post_type->register();
    }

    public function add_admin_field_container($container_opts)
    {
        $title = $container_opts['title'];
        $fields = $container_opts['fields'];
        $carbon_fields = array_values($fields);
        $field_names = array_map(function ($carbon_field) {
            return $carbon_field->get_base_name();
        }, $carbon_fields);
        $this->fields = array_merge($this->fields, $field_names);
        $container = Container::make('post_meta', $title)
            ->where('post_type', '=', $this->post_type_slug)
            ->add_fields($carbon_fields);
        if (isset($container_opts['context'])) {
            $container->set_context($container_opts['context']);
        }
    }

    private function get_post_ids()
    {
        $query = new \WP_Query(array('post_type' => $this->post_type_slug));
        $ids = array_map(function ($entity_post) {
            return $entity_post->ID;
        }, $query->posts);
        return $ids;
    }

    public function get_post_by_id($post_id)
    {
        $base_fields = (array) get_post($post_id);
        $custom_fields = array_reduce($this->fields, function ($result, $field_slug) use ($post_id) {
            $result[$field_slug] = carbon_get_post_meta($post_id, $field_slug);
            return $result;
        }, []);
        return array_merge($base_fields, $custom_fields);
    }

    public function get_posts()
    {
        return array_map(function ($post_id) {
            return $this->get_post_by_id($post_id);
        }, $this->get_post_ids());
    }

    public function __construct($post_type_slug)
    {
        $this->_init_custom_post_type($post_type_slug);
    }
}
