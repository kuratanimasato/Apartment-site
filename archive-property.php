<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package grandeur-shinohara
 */

get_header();
?>
<main class="main">
  <?php get_template_part('template-parts/top-title'); ?>
  <div class="container">
    <section class="news">
      <div class="room__wrap">
        <h2 class="room-title">現在募集中のお部屋</h2>
      </div>
      <div class="wrapper">
        <ul class="room__list">
          <!-- メインループ -->
          <?php if (have_posts()): ?>
            <?php while (have_posts()):
              the_post(); ?>
              <?php get_template_part('template-parts/loop-room'); ?>
            <?php endwhile; ?>
          <?php else: ?>
            <p>現在、募集中のお部屋はありません。</p>
          <?php endif; ?>
        </ul>
        <div class="pagination">
          <?php
          global $wp_rewrite;
          $paginate_base = get_pagenum_link(1);
          if (strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()) {
            $paginate_format = '';
            $paginate_base = add_query_arg('paged', '%#%');
          } else {
            $paginate_format = (substr($paginate_base, -1, 1) == '/' ? '' : '/') .
              user_trailingslashit('page/%#%/', 'paged');
            $paginate_base .= '%_%';
          }
          echo paginate_links(
            array(
              'base' => $paginate_base,
              'format' => $paginate_format,
              'total' => $wp_query->max_num_pages,
              'mid_size' => 3,
              'current' => ($paged ? $paged : 1),
              'prev_text' => ' <i class="fa-solid fa-angles-right fa-lg"></i>',
              'next_text' => '<i class="fa-solid fa-angles-right fa-lg"></i>',
            )
          );
          ?>
        </div>
    </section>
    <section class="contact">
      <?php get_template_part('template-parts/contact-info'); ?>
    </section>
  </div>
  </div>
</main>

<?php
get_footer();