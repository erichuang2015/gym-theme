<?php
function load_js()
{
    $scripts = [
        'menu' => '/js/menu.js',
    ];

    foreach ($scripts as $script_key => $filename) {
        wp_enqueue_script(
            $script_key,
            get_template_directory_uri() . $filename
        );
    }
}
