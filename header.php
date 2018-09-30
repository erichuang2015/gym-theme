
<header class="header">
  <nav id="header-nav-full" class="header__nav header__nav--full">
    <?php
require_once dirname(__FILE__) . '/core/render.php';

use function GymCore\Render\render_main_logo;

wp_nav_menu(['theme_location' => 'top-navigation', 'menu_class' => false, 'container' => false]);
?>
  </nav>
  <nav id="header-nav-mobile" class="header__nav header__nav--mobile">
    <div class="header__nav--mobile__control-bar">
      <?php render_main_logo();?>
      <i id="header-nav-closed" class="header__nav--mobile__icon fas fa-bars" onclick="toggleMenuShow();"></i>
      <i id="header-nav-opened" class="header__nav--mobile__icon fas fa-times" onclick="toggleMenuShow();"></i>
    </div>
    <?php
$menu_locations = get_nav_menu_locations();
$top_bar_items = wp_get_nav_menu_items($menu_locations['top-navigation']);
$side_bar_items = wp_get_nav_menu_items($menu_locations['sidebar-navigation']);
$menu_items = array_merge($top_bar_items, $side_bar_items);
?>
<ul>
  <?php
foreach ($menu_items as $menu_item) {
    echo '<li>';
    echo "<a href=\"{$menu_item->url}\">{$menu_item->title}</a>";
    echo '</li>';
}
?>
</ul>
  </nav>
</header>