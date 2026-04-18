<div class="top-title">
  <div class="top-title__txt">
    <?php
    if (is_page('about')) {
      echo 'オーナー紹介';
    } elseif (is_page('location')) {
      echo 'ロケーション';
    } elseif (is_page('contact')) {
      echo 'お問い合わせ';
    } elseif (is_singular('property')) {
      echo 'お部屋紹介'; // カスタム投稿タイプ「property」に対するシングルページ
    } elseif (is_post_type_archive('property')) {
      echo 'お部屋一覧'; // カスタム投稿タイプ「property」のアーカイブページ
    } elseif (is_page('privacypolicy')) {
      echo 'プライバシーポリシー';
    } else {
      echo 'お知らせ'; // それ以外の場合のデフォルト
    }
    ?>
  </div>
</div>
<?php breadcrumb(); ?>