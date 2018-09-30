<?php
namespace GymCore\GymResources;

require_once dirname(__FILE__) . '/GymResource.php';
require_once dirname(__FILE__) . '/../GymPostTypesManager.php';
require_once dirname(__FILE__) . '/../pages/GymPagesManager.php';
require_once dirname(__FILE__) . '/../render.php';

use Carbon_Fields\Field;
use function GymCore\Render\render_arrow_block;
use function GymCore\Render\render_cta_button;
use GymCore\GymPages\GymPagesManager;
use GymCore\GymPostTypesManager;

class MembershipsResource extends \GymCore\GymResource
{
    private function render_membership_courses($membership_post)
    {
        $membership_courses = $membership_post['courses'];
        $membership_courses_names = array_map(function ($membership_course) {
            $course_id = $membership_course['id'];
            $course_data = GymPostTypesManager::get_courses_post_type()->get_post_by_id($course_id);
            return $course_data['name'];
        }, $membership_courses);

        echo '<div class="membership-container__block">';
        foreach ($membership_courses_names as $course_name) {
            echo "<span>{$course_name}</span>";
        }
        echo '</div>';
    }

    private function render_membership_prices($membership_post)
    {
        $price = $membership_post['price'];
        $price_reduced = $membership_post['price_reduced'];

        echo '<div class="membership-container__block membership-container__block--bold">';
        echo "<span>{$price}</span>";
        if ($price_reduced) {
            echo "<span>{$membership_post['price_reduced']}</span>";
        }
        echo '</div>';
    }

    public function render_membership($membership_post, $cta_label, $cta_url)
    {
        echo '<div class="membership-container">';
        render_arrow_block('#fff', -90, 3, 4, false, true);
        echo "<span class=\"membership-container__title\">{$membership_post['name']}</span>";
        $this->render_membership_courses($membership_post);
        $this->render_membership_prices($membership_post);
        render_cta_button($cta_label, $cta_url, 'cta-button--white');
        echo '</div>';
    }

    public function render_front_page()
    {
        $cta_label = carbon_get_theme_option('cta_label');
        $cta_url = carbon_get_theme_option('cta_url');
        echo '<div class="memberships-overview">';
        foreach ($this->get_posts() as $membership_post) {
            $this->render_membership($membership_post, $cta_label, $cta_url);
        }
        echo '</div>';
    }

    public function render_page()
    {
        $page_options = GymPagesManager::get_current_page_options();
        $cta_label = $page_options['cta_label'];
        $cta_url = $page_options['cta_url'];
        echo '<div class="memberships-overview">';
        foreach ($this->get_posts() as $membership_post) {
            $this->render_membership($membership_post, $cta_label, $cta_url);
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
                    Field::make('text', 'name', 'Membership Name'),
                    Field::make('text', 'price', 'Membership Price'),
                    Field::make('text', 'price_reduced', 'Membership Price (Reduced)'),
                    Field::make('association', 'courses')
                        ->set_types(array(
                            array(
                                'type' => 'post',
                                'post_type' => 'course',
                            ),
                        )),
                ],
            ],
        ];
    }
};
