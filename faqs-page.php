<?php
/* Template Name: FAQs Page Template */
require_once dirname(__FILE__) . '/core/resources/GymResourcesManager.php';
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
      <?php $faqs_resource = GymResourcesManager::get_faqs_resource();?>
      <?php GymPagesManager::render_page([$faqs_resource, 'render_page']);?>
    </main>
  </body>
  <?php get_footer();?>
</html>