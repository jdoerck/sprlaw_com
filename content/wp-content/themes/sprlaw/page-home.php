<?php
  /**
   * Template Name: Page - Home
   * Created by JetBrains PhpStorm.
   * User: jdoerck
   * Date: 8/13/13
   * Time: 3:33 PM
   */

  get_header();

?>

  <?php include "carousel.php" ?>

<div class="content-page">
  <div class="container">
    <div class="row">
      <section id="primary" class="span12">
        <div id="content">
          <div id="latest" class="row">
            <?php include "featured.php" ?>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<?php get_footer(); ?>


