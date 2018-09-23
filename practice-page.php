<?php
/* Template Name: Practice Page Template */
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
      <ul>
        <li>
          <a href="#">Verein</a>
        </li>
        <li>
          <a href="#">Partner</a>
        </li>
      </ul>
    </aside>
    <main class="page-container">
      <?php $practice_types_resource = GymResourcesManager::get_practice_types_resource();?>
      <?php GymPagesManager::render_page([$practice_types_resource, 'render_page']);?>
    </main>
  </body>
  <?php get_footer();?>
</html>