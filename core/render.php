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

function render_arrow_column($color = '#e5434a', $number_of_arrows = 3, $rotation = 0)
{
    echo '<div class="arrow-block__column">';
    foreach (range(1, $number_of_arrows) as $index) {
        echo "<span class=\"pseudo-arrow\" style=\"color: {$color}; transform: rotate({$rotation}deg)\">\/</span>";
    }
    echo '</div>';
}

function render_arrow_block($color = '#e5434a', $rotation = 0, $number_of_arrows = 3, $number_of_rows = 3, $with_jump = false, $compact = false)
{
    $compact_class = $compact ? 'arrow-block arrow-block--compact' : 'arrow-block';
    if ($with_jump) {
        echo "<div class=\"{$compact_class} arrow-block--clickable\" onclick=\"arrow_jump();\">";
    } else {
        echo "<div class=\"{$compact_class}\">";
    }
    foreach (range(1, $number_of_rows) as $index) {
        render_arrow_column($color, $number_of_arrows, $rotation);
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

function render_main_logo($with_link = true, $subtitle = null)
{
    $logo = carbon_get_theme_option('gym_logo');
    $logo_url = carbon_get_theme_option('gym_logo_url');
    if ($subtitle) {
        echo "<div class=\"main-logo\">";
        if ($with_link) {
            echo "<a href=\"{$logo_url}\"></a>";
        }
        echo "<object type=\"image/svg+xml\" data=\"{$logo}\">";
        echo "Your browser doesn't support SVG images.";
        echo '</object>';
        echo '<div class="main-logo__subtitle">';
        echo "<h2>{$subtitle}</h2>";
        echo '</div>';
        echo '</div>';
    } else {
        echo "<div class=\"main-logo\">";
        if ($with_link) {
            echo "<a href=\"{$logo_url}\"></a>";
        }
        echo "<object type=\"image/svg+xml\" data=\"{$logo}\">";
        echo "Your browser doesn't support SVG images.";
        echo '</object>';
        echo '</div>';
    }
}
