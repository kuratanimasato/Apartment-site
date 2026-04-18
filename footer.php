<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package grandeur-shinohara
 */

?>

<footer class="footer">
  <?php
  wp_nav_menu(
    array(
      'theme_location' => 'footer',
      'container' => false,
      'menu_class' => 'footer-navigation__list',
      'footer_add_li_class' => 'footer-navigation__item',
      'footer_add_a_class' => 'footer-navigation__link',
      'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      'depth' => 1,
    )
  );
  ?>
  <div class="footer-btn__wrap">
    <div class="footer-btn" id="page-top">
      <div class="footer__tel">
        <?php if ($phone_number = get_theme_mod('phone_number')): ?>
        <a href="tel:<?php echo esc_attr($phone_number); ?>">
          <i class="fa-solid fa-phone fa-lg tel"><?php echo esc_html($phone_number); ?></i>
        </a>
        <?php endif; ?>
        <div class="holidays-sp__title">
          <span>営業時間 平日 9:00～17:00</span>
          <span>定休日 水曜日・祭日</span>
        </div>
      </div>
      <button class="close-btn">&times;</button>
    </div>
  </div>
 <p class="footer__text">&copy;<?php echo date('Y'); ?> グランドールシノハラ</p>
</footer>

<?php wp_footer(); ?>
</body>

</html>