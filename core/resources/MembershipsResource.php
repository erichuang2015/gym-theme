<?php
namespace GymCore\GymResources;

require_once dirname(__FILE__) . '/GymResource.php';
require_once dirname(__FILE__) . '/../GymPostTypesManager.php';

use Carbon_Fields\Field;
use GymCore\GymPostTypesManager;

class MembershipsResource extends \GymCore\GymResource
{
    public function render_membership($membership_post)
    {
        echo '<div class="membership-container">';
        echo '<div>';
        echo "<span class=\"membership-container__title\">{$membership_post['name']}</span>";
        echo "<span class=\"membership-container__subtitle\">{$membership_post['price']}</span>";
        if ($membership_post['price_reduced']) {
            echo "<span class=\"membership-container__subtitle\">({$membership_post['price_reduced']} ermäßigt)</span>";
        }
        echo '</div>';
        echo '</div>';
    }

    public function render_front_page()
    {
        echo '<div class="memberships-overview">';
        foreach ($this->get_posts() as $membership_post) {
            $this->render_membership($membership_post);
        }
        echo '</div>';
    }

    public function render_page()
    {
        echo '<div class="memberships-overview">';
        foreach ($this->get_posts() as $membership_post) {
            $this->render_membership($membership_post);
        }
        echo '</div>';
    }

    protected function get_post_type()
    {
        return GymPostTypesManager::get_memberships_post_type();
    }

    protected function get_slug()
    {
        return 'membership';
    }

    protected function get_admin_ui_containers()
    {
        return [
            [
                'title' => 'Membership Info',
                'fields' => [
                    'name' => Field::make('text', 'name', 'Membership Name'),
                    'price' => Field::make('text', 'price', 'Membership Price'),
                    'price_reduced' => Field::make('text', 'price_reduced', 'Membership Price (Reduced)'),
                ],
            ],
        ];
    }
};
