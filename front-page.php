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
  <div class="container">
    <div id="wrapper">
      <div class="swiper-wrap">
        <div class="swiper-container-4">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="slide-img">
                <picture>
                  <source srcset="<?php echo get_template_directory_uri() ?>/images/livingroom.webp" type="image/webp">
                  <img src="<?php echo get_template_directory_uri() ?>/images/livingroom.jpg" alt="リビングルーム"
                    loading="lazy">
                </picture>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-img">
                <picture>
                  <source srcset="<?php echo get_template_directory_uri() ?>/images/livingroom2.webp" type="image/webp">
                  <img src="<?php echo get_template_directory_uri() ?>/images/livingroom2.jpg" alt="リビングルーム2"
                    loading="lazy">
                </picture>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-img">
                <picture>
                  <source srcset="<?php echo get_template_directory_uri() ?>/images/outside.webp" type="image/webp">
                  <img src="<?php echo get_template_directory_uri() ?>/images/outside.jpg" alt="外の風景" loading="lazy">
                </picture>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-img">
                <picture>
                  <source srcset="<?php echo get_template_directory_uri() ?>/images/exterior.webp" type="image/webp">
                  <img src="<?php echo get_template_directory_uri() ?>/images/exterior.jpg" alt="外観" loading="lazy">
                </picture>
              </div>
            </div>
            <div class="slide-copy1">
              <p class="slide-title">群馬県大泉町の広々ワンルーム！！
              </p>
              <p class="slide__title-tow">一人暮らしをより豊かに！
              </p>
            </div>
            <div class="slide-copy2">
              <div class="copy2"><a href="https://www.athome.co.jp/ahst/sakusesu.html" target="_blank"
                  rel="noopener noreferrer">
                  <?php echo esc_html(get_theme_mod('company_name', 'サクセス不動産')); ?></a>
              </div>
              <p class="copy-text">内見の際はお気軽にお問い合わせください。</p>
              <div class="top-fastview__tel">
                <?php if ($phone_number = get_theme_mod('phone_number')): ?>
                  <a href="tel:<?php echo esc_attr($phone_number); ?>">
                    <i class="fa-solid fa-phone fa-lg tel"><?php echo esc_html($phone_number); ?></i>
                  </a>
                <?php endif; ?>
                <div class="hours-holidays">
                  <p class="hours-holidays__title">営業時間:</p>
                  <p class="hours-holidays__text">平日 9:00～17:00</p>
                  <p class="hours-holidays__text">定休日 水曜日、祭日</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="concept">
        <div class="concept__wrap">
          <div id="concept">
            <h2 class="concept__title  concept-title">広さで選ぶなら、グランドールシノハラ。</h2>
            <h3 class="concept__subtitle  concept-subtitle">仕事もプライベートもこの1室で</h3>
          </div>
         <div class="concept__text">
			  <p><strong>■ フリーレント（賃料無料）で初期費用をカット！</strong><br>
				今なら期間限定で賃料無料キャンペーンを実施中。<br>家具や家電を自分好みにグレードアップするチャンスです。</p>

			  <p><strong>■ 「仕事部屋」も作れる圧倒的な開放感</strong><br>
				ワンルーム＝狭い、はもう古い。リノベーション済みの広い室内なら、<br>デスクを置いても在宅ワークや趣味を快適に楽しめます。</p>

			  <p><strong>■ 徒歩圏内で完結！タイパ＆コスパ最強</strong><br>
				スーパー・100均・薬局がすぐそば。移動時間をカットし、<br>毎日の生活費も賢く節約できる好立地です。</p>

			  <p style="text-align:left; margin-top: 20px;">
				<strong>＼ ただいま内見予約受付中！ ／</strong><br>
				即日入居も可能です。お気軽にお問い合わせください。
			  </p>
		</div>
          <div class="concept__heading"></div>
          <div class="concept__image-wrap">
            <figure>
              <picture>
                <source srcset="<?php echo get_template_directory_uri() ?>/images/housing.webp" type="image/webp">
                <img class="concept__picture-1" src="<?php echo get_template_directory_uri() ?>/images/housing.jpeg"
                  alt="住宅街のイメージ" loading="lazy" width="640" height="500">
              </picture>
            </figure>
          </div>
        </div>
      </section>
      <section class="features">
        <h2 class="features__title features-title">
          グランドールシノハラの特徴
        </h2>
        <div class="features__wrap">
          <div class="features__box">
            <div class="features__box-item">
              <picture>
                <source srcset="<?php echo get_template_directory_uri() ?>/images/schedule.webp" type="image/webp">
                <img class="features-img" src="<?php echo get_template_directory_uri() ?>/images/schedule.jpg"
                  alt="即日入居可のイメージ" loading="lazy" width="460" height="300">
              </picture>
              <div class="features__txt">
				  <h4 class="features__title">🚀審査後、即入居OK！<br>お急ぎの方も大歓迎</h4>
               <p class="features__description">
				   即入居OK！最短距離で新生活へ。<br>面倒な手続きもスムーズに、あなたの一人暮らしをスピーディに開始できます。
				  </p>
              </div>
            </div>
            <div class="features__box-item">
              <picture>
                <source srcset="<?php echo get_template_directory_uri() ?>/images/shopping.webp" type="image/webp">
                <img class="features-img" src="<?php echo get_template_directory_uri() ?>/images/shopping.jpeg"
                  alt="商業施設のイメージ" loading="lazy" width="460" height="300">
              </picture>
              <div class="features__txt">
				  <h4 class="features__title">🛒 スーパー・100均至近！<br>「賢く節約」が自然に叶う</h4>
  				<p class="features__description">
				  徒歩圏内で買い物が完結。生活コストを抑えて、ワンランク上の暮らしを叶えます。
				  </p>
              </div>
            </div>
            <div class="features__box-item">
              <picture>
                <source srcset="<?php echo get_template_directory_uri() ?>/images/renovation.webp" type="image/webp">
                <img class="features-img" src="<?php echo get_template_directory_uri() ?>/images/renovation.jpeg"
                  alt="リノベーション済みのイメージ" loading="lazy" width="460" height="300">
              </picture>
              <div class="features__txt">
				  <h4 class="features__title">✨ 職住一体を叶える<br>「広々リノベーション」</h4>
				  	<p class="features__description">
				ワンルームの常識を変える広さ。仕事とプライベートを賢く切り分けられます。
				  </p>
              </div>
            </div>
          </div>
          <div class="features-button">
            <?php echo get_template_part('template-parts/room-feature'); ?>
          </div>
        </div>
      </section>
      <section class="information">
        <h2 class="information-title">お知らせ</h2>
        <!-- メインループ -->
        <?php if (have_posts()): ?>
          <ul class="information__list">
            <?php while (have_posts()):
              the_post(); ?>
              <li id="information-<?php the_ID(); ?>" <?php post_class('information__list__item'); ?>>
                <a href="<?php the_permalink(); ?> ">
                  <div class="information__list__date">
                    <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                    <p><?php the_title(); ?></p>
                    <span class="arrow"></span>
                  </div>
                </a>
              </li>
            <?php endwhile; ?>
          </ul>
        <?php else: ?>
          <p>現在お知らせはありません。</p>
        <?php endif; ?>
      </section>
    </div>
    <section class="contact">
      <?php get_template_part('template-parts/contact-info'); ?>
    </section>
  </div>
</main>

<?php
get_footer();