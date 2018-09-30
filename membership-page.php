<?php
/* Template Name: Membership Page Template */
require_once dirname(__FILE__) . '/core/resources/GymResourcesManager.php';
require_once dirname(__FILE__) . '/core/pages/GymPagesManager.php';
require_once dirname(__FILE__) . '/core/pages/GymPagesManager.php';
use GymCore\GymPages\GymPagesManager;
use GymCore\GymResources\GymResourcesManager;
?>
<!DOCTYPE html>
<html <?php language_attributes();?> class="no-js">
  <head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width">
    <?php wp_head();?>
  </head>
  <body <?php body_class();?>>
    <?php get_header();?>
    <aside class="sidebar">
      <?php wp_nav_menu(['theme_location' => 'sidebar-navigation', 'menu_class' => false, 'container' => false]);?>
    </aside>
    <main class="page-container">
      <?php $memberships_resource = GymResourcesManager::get_memberships_resource();?>
      <?php GymPagesManager::render_page(function () use ($memberships_resource) {
    echo '<article class="front-page-content-section">';
    echo '<div class="front-page-content-section__title">UNSERE MITGLIEDSCHAFTEN</div>';
    $memberships_resource->render_page();
    echo '</div>';
    echo '</article>';
    GymPagesManager::gym_info();
});?>
    </main>
  </body>
  <?php get_footer();?>
</html>