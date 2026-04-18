<?php
// 最新の部屋情報を取得
$args = array(
  'post_type' => 'property',
  'posts_per_page' => 1,
  'orderby' => 'date',
  'order' => 'DESC',
);
$latest_room = new WP_Query($args);
if ($latest_room->have_posts()) {
  while ($latest_room->have_posts()) {
    $latest_room->the_post();
    ?>
    <a href="<?php the_permalink(); ?>" class="features__button-link">詳しく空室物件を見る
      <div class="features-arrow">
        <svg class="background_features__button-line" width="48" height="12" viewBox="0 0 48 12" fill="none"
          xmlns="http://www.w3.org/2000/svg">
          <line x1="0.5" y1="5.63672" x2="58.5" y2="5.63672" stroke="#fff" stroke-width="3" stroke-linecap="round"></line>
          <path d="M53.8633 1L58.7954 5.93209L53.8633 10.864" stroke="#fff" stroke-linecap="round" stroke-width="3"
            stroke-linejoin="round"></path>
        </svg>
      </div>
    </a>
    <?php
  }
  wp_reset_postdata();
} else {
  // 部屋情報がない場合
  ?>
  <span class="features__button-link">現在募集中のお部屋はありません</span>
  <?php
}
?>