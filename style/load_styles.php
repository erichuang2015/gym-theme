<?php
function load_styles()
{
    $stylesheets = [
        'kardia-main-layout' => '/css/page-layout.css',
        'kardia-page' => '/css/page.css',
        'kardia-header' => '/css/header.css',
        'kardia-footer' => '/css/footer.css',
        'kardia-sidebar' => '/css/sidebar.css',
        'kardia-logo' => '/css/logo.css',
        'kardia-buttons' => '/css/buttons.css',
        'kardia-front-page' => '/css/front-page.css',
        'kardia-trainers' => '/css/trainers.css',
        'kardia-courses' => '/css/courses.css',
        'kardia-memberships' => '/css/memberships.css',
        'kardia-faqs' => '/css/faqs.css',
        'kardia-switch-list' => '/css/switch-list.css',
        'kardia-gym' => '/css/gym.css',
    ];

    foreach ($stylesheets as $style_key => $filename) {
        wp_enqueue_style(
            $style_key,
            get_template_directory_uri() . $filename
        );
    }
}
