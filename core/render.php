<?php
namespace GymCore\Render;

function render_switch_list($blocks)
{
    echo '<div class="switch-list">';
    if (!empty($blocks)) {
        foreach ($blocks as $block) {
            echo '<article class="switch-list-block">';
            echo '<div class="switch-list-block__text">';
            echo "<h1>{$block['title']}</h1>";
            echo $block['text'];
            echo '</div>';
            echo "<div class=\"switch-list-block__image\" style=\"background-image:url({$block['image']});\"></div>";
            echo '</article>';
        }
    }
    echo '</div>';
}
