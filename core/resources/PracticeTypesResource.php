<?php
namespace GymCore\GymResources;

require_once dirname(__FILE__) . '/GymResource.php';
require_once dirname(__FILE__) . '/../GymPostTypesManager.php';
require_once dirname(__FILE__) . '/../render.php';

use Carbon_Fields\Field;
use function GymCore\Render\render_switch_list;
use GymCore\GymPostTypesManager;
use GymCore\GymResource;

class PracticeTypesResource extends GymResource
{
    public function render_page()
    {
        $blocks = array_map(function ($post) {
            return [
                'title' => $post['block_title'],
                'text' => $post['block_description'],
                'image' => $post['block_image'],
            ];
        }, $this->get_posts());
        render_switch_list($blocks);
    }

    protected function get_post_type()
    {
        return GymPostTypesManager::get_practice_types_post_type();
    }

    protected function get_slug()
    {
        return 'practice_type';
    }

    protected function get_admin_ui_containers()
    {
        return [
            [
                'title' => 'Block Info',
                'fields' => [
                    Field::make('text', 'block_title', 'Block Title'),
                    Field::make('rich_text', 'block_description', 'Block Description'),
                    Field::make('image', 'block_image', 'Block Image')
                        ->set_value_type('url'),
                ],
            ],
        ];
    }
};
