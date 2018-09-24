<?php
namespace GymCore\GymResources;

require_once dirname(__FILE__) . '/GymResource.php';
require_once dirname(__FILE__) . '/../GymPostTypesManager.php';

use Carbon_Fields\Field;
use GymCore\GymPostTypesManager;

class FAQsResource extends \GymCore\GymResource
{
    public function render_faq_page($faq_post)
    {
        echo '<div class="faq-container">';
        echo '<div class="faq-container__question">';
        echo $faq_post['question'];
        echo '</div>';
        echo '<div class="faq-container__answer">';
        echo $faq_post['answer'];
        echo '</div>';
        echo '</div>';
    }

    public function render_page()
    {
        echo '<div class="faqs-container">';
        foreach ($this->get_posts() as $faq_post) {
            $this->render_faq_page($faq_post);
        }
        echo '</div>';
    }

    protected function get_post_type()
    {
        return GymPostTypesManager::get_faqs_post_type();
    }

    protected function get_slug()
    {
        return 'faq';
    }

    protected function get_admin_ui_containers()
    {
        return [
            [
                'title' => 'FAQ Question',
                'fields' => [
                    Field::make('text', 'question', 'Question'),
                    Field::make('rich_text', 'answer', 'Answer'),
                ],
            ],
        ];
    }
};
