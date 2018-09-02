<?php
require_once dirname(__FILE__) . '/core/resources/GymResourcesManager.php';
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
      <section class="front-page-container">
        <section class="front-page-content-container front-page-content-container--top">
          <div class="main-logo">
            <object type="image/svg+xml" data="/wp-content/themes/kardia/images/logo-white.svg">
                Your browser doesn't support SVG images.
            </object>
          </div>
          <span class="coral">\/</span>
          <span class="coral">\/</span>
          <span class="coral">\/</span>
          <span class="coral">\/</span>
          <button class="cta-button">TRAINIERE MIT UNS</button>
        </section>
        <section class="front-page-content-container front-page-content-container--bottom">
          <article class="front-page-about">
            <h1 class="front-page-about__header">WILLKOMMEN</h1>
            <h1 class="front-page-about__header">IM KARDIA GYM</h1>
            <h2 class="front-page-about__subheader">UEBER UNS</h2>
            <section class="front-page-about__description">
              <p>Kardia bezeichnet in der Anatomie das Herz. Als Metapher steht das Herz für das pulsierende Leben. Für Empatie, Liebe und Leidenschaft. In den besten Thaiboxer schlägt ein Jai Suu, ein großes Kämpferherz.</p>
              <p>Wir trainieren Muay Thai-Boxen und Functional Fitness im Herzen Berlins. Unser Gym liegt direkt am S- und U-Bahnhof Warschauer­ Straße.</p>
              <p>Das Trainingsangebot richtet sich sowohl an komplette Anfänger*Innen, als auch an Fortgeschrittene. Wir bieten ambitionierte Sportler*innen zudem, die Möglichkeit einer kompletten, professionellen Wettkampfvorbereitung an.</p>
              <p>Wir legen viel Wert auf ein hochwertiges Training und einem respektvollen Umgang. Wir wollen dazu anregen miteinander zu lernen jeweils eigene Wege zu finden, sich in Training und Kampf zu testen. Vor allem wollen wir den Spaß am Sport teilen.</p>
              <p>Kardia stehen auch für ein solidarisches Miteinander. Geflüchtete und Leute ohne Einkommen trainieren bei uns ermäßigt.</p>
            </section>
          </article>
        </section>
      </section>
      <section class="page-content-container">
        <article class="front-page-content-section">
          <div class="front-page-content-section__title">UNSER TEAM</div>
          <?php GymResourcesManager::get_trainers_resource()->render();?>
        </article>
        <article class="front-page-content-section">
          <div class="front-page-content-section__title front-page-content-section__title--border">UNSERE MITGLIEDSCHAFTEN</div>
          <?php GymResourcesManager::get_memberships_resource()->render();?>
        </article>
        <article class="front-page-content-section">
          <div class="front-page-content-section__title">UNSER TRAININGSANGEBOT</div>
          <?php GymResourcesManager::get_courses_resource()->render();?>
        </article>
      </section>
    </main>
  </body>
  <?php get_footer();?>
</html>