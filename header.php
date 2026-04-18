<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything
 * up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package grandeur-shinohara
 */
?>
<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header class="header" id="header">
      <div class="header-top">
        <?php
        if (is_home() || is_front_page()) {
          $title_tag = 'h1';
        } else {
          $title_tag = 'div';
        }
        ?>
        <div <?php echo $tag; ?>class="header-logo"><a href="<?php echo esc_url(home_url('/')); ?>">
            <h1 class="logo"> <?php bloginfo('name'); ?></h1>
            <span>Grandeur Shinohara</span>
          </a>
        </div <?php echo $tag; ?>>
        <?php
        $phone_number = get_theme_mod('phone_number');
        if ($phone_number):
          ?>
          <div class="header-tel-pc">
            <a href="tel:<?php echo esc_attr($phone_number); ?>">
              <i class="fa-solid fa-phone fa-lg"><?php echo esc_attr($phone_number); ?></i>
            </a>
          </div>
        </div>
      <?php endif; ?>
      <nav class="main-navigation">
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'header',
            'container' => false,
            'menu_class' => 'main-navigation__list',
            'add_li_class' => 'main-navigation__item',
            'add_a_class' => 'main-navigation__link',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 1,
          )
        );
        ?>
      </nav>
      <div id="nav-wrapper" class="nav-wrapper">
        <div class="hamburger" id="js-hamburger">
          <span class="hamburger__line hamburger__line-top"></span>
          <span class="hamburger__line hamburger__line-middle"></span>
          <span class="hamburger__line hamburger__line-bottom"></span>
        </div>
        <nav class="sp-main-navigation">
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'mobile',
              'container' => false,
              'menu_class' => 'sp-main-navigation__list',
              'add_li_class_sp' => 'main-navigation__item-sp',
              'add_a_class_sp' => 'main-navigation__item-sp',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth' => 1,
            )
          );
          ?>
          <?php
          $phone_number = get_theme_mod('phone_number');
          if ($phone_number):
            ?>
            <div class="header-tel-sp">
              <a href="tel:<?php echo esc_attr($phone_number); ?>">
                <i class="fa-solid fa-phone fa-lg"><?php echo esc_attr($phone_number); ?></i>
              </a>
            </div>
          <?php endif; ?>
        </nav>
        <div class="black-bg" id="js-black-bg"></div>
      </div>
    </header>
