<?php

get_header();
?>
<main class="main">
  <?php get_template_part('template-parts/top-title'); ?>
  <div class="container">
    <section class="news">
      <div class="news__wrap">
        <h1 class="news-title">
          <?php if (is_month()): ?>
            <?php echo get_query_var('year') . '年' . get_query_var('monthnum') . '月'; ?>
          <?php else: ?>
            <?php wp_title(""); ?>
          <?php endif; ?>
        </h1>
      </div>
      <div class="wrapper">
        <ul class="news__list">
          <?php
          $paged = get_query_var('paged') ? get_query_var('paged') : 1;
          $year = get_query_var('year');
          $monthnum = get_query_var('monthnum');
          $args = array(
            'post_type' => 'post',
            'posts_per_page' => 10,
            'paged' => $paged,
            'year' => $year,
            'monthnum' => $monthnum,
          );
          $the_query = new WP_Query($args);
          ?>
          <?php if ($the_query->have_posts()): ?>
            <?php while ($the_query->have_posts()):
              $the_query->the_post(); ?>
              <?php get_template_part('template-parts/loop-content'); ?>
            <?php endwhile; ?>
          <?php else: ?>
            <p>お知らせはありません</p>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
        <?php get_sidebar('archives'); ?>
      </div>
  </div>
  </section>
  <section class="contact">
    <?php get_template_part('template-parts/contact-info'); ?>
  </section>
  </div>
</main>

<?php
get_footer();