<?php
/*
Template Name: Location Page
*/

get_header();
?>
<main class="main">
  <?php get_template_part('template-parts/top-title'); ?>
  <div class="container">
    <?php if (have_posts()): ?>
    <?php while (have_posts()):
        the_post();
        ?>
    <section class="access">
      <div class="access-title__wrap">
        <h2 class="access-info"><?php echo strtoupper(get_the_title()); ?></h2>
      </div>
      <div class="location-access">
        <i class="fa-solid fa-location-dot">
          <?php echo get_field('address'); ?>
        </i>
        <i class="fa-solid fa-train-subway">
          <?php echo esc_html(get_field('nearest_station')); ?>
        </i>
      </div>
      <div class="gmap-container">
        <div id="gmap">
          <?php echo get_field('google_map_embed'); ?>
        </div>
      </div>
    </section>

    <section class="environment">
      <div class="environment__wrap">
        <h2 class="environment-title">周辺環境</h2>
      </div>

      <?php
      $env_types = [
          'supermarket'       => 'スーパーマーケット',
          'convenience_store'  => 'コンビニエンスストア',
          'drugstore'         => 'ドラッグストア',
          'home_center'       => 'ホームセンター',
          'post_office'       => '郵便局'
      ];

      foreach ($env_types as $field_name => $title):
          $content = get_field($field_name);

          if (!empty($content)):
      ?>
          <div class="environment__view">
            <h2><?php echo esc_html($title); ?></h2>
            <div class="environment__item-text">
              <?php
                // nl2br で改行を <br> に変換。安全のため esc_html を通してから変換します。
                echo nl2br(esc_html($content));
              ?>
            </div>
          </div>
      <?php
          endif;
      endforeach;
      ?>
    </section>
    <?php endwhile; ?>
    <?php endif; ?>

    <section class="contact">
      <?php get_template_part('template-parts/contact-info'); ?>
    </section>
  </div>
</main>

<?php
get_footer();
