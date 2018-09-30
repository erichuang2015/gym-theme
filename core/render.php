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

function render_arrow_row($color = '#e5434a', $number_of_arrows = 3, $rotation = 0)
{
    foreach (range(1, $number_of_arrows) as $index) {
        echo "<span class=\"pseudo-arrow\" style=\"color: {$color}; transform: rotate({$rotation}deg)\">\/</span>";
    }
}

function render_arrow_block($color = '#e5434a', $rotation = 0, $number_of_arrows = 3, $number_of_rows = 3)
{

    echo '<div class="arrow-block">';
    foreach (range(1, $number_of_rows) as $index) {
        echo '<div class="arrow-block__row">';
        render_arrow_row($color, $number_of_arrows, $rotation);
        echo '</div>';
    }
    echo '</div>';
}

function render_cta_button($label, $url, $class = '')
{
    echo "<a href=\"{$url}\" class=\"cta-button {$class}\">{$label}</a>";
}

function render_gym_info($gym_info_fee_order, $gym_info_cancellation, $gym_info_statute)
{
    echo '<div class="gym-info">';
    echo '<div class="gym-info__block">';
    echo $gym_info_fee_order;
    echo '</div>';
    echo '<div class="gym-info__block">';
    echo $gym_info_cancellation;
    echo '</div>';
    echo '<div class="gym-info__block">';
    echo $gym_info_statute;
    echo '</div>';
    echo '</div>';
}
