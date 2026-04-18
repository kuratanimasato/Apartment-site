<?php
/**
 * grandeur-shinohara functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package grandeur-shinohara
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * テーマのデフォルトを設定し、さまざまな WordPress 機能のサポートを登録します。
 *
 * この関数は after_setup_theme フックにフックされていることに注意してください。
 * は初期化フックの前に実行されます。 init フックは一部の機能には遅すぎます。
 * は投稿サムネイルのサポートを示します。
 */

/**
 * トップページのお知らせ表示件数を変更する
 */
function grandeur_shinohara_change_posts_per_page($query)
{
	if (is_admin() || !$query->is_main_query()) {
		return;
	}
	// トップページの場合
	if ($query->is_home()) {
		$query->set('posts_per_page', 5);
	}
	// カスタム投稿タイプ "information" のアーカイブページ
	if ($query->is_post_type_archive('information')) {
		$query->set('posts_per_page', 10);
	}
}
add_action('pre_get_posts', 'grandeur_shinohara_change_posts_per_page');
function grandeur_shinohara_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on grandeur-shinohara, use a find and replace
	 * to change 'grandeur-shinohara' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('grandeur-shinohara', get_template_directory() . '/languages');

	// デフォルトの投稿とコメントの RSS フィード リンクを head に追加します。
	add_theme_support('automatic-feed-links');

	/*
	 * WordPress にドキュメントのタイトルを管理させます。
	 * テーマのサポートを追加することにより、このテーマは
	 * ドキュメントのヘッドにハードコーディングされた <title> タグ。WordPress が次のことを行うことを期待します。
	 *私たちに提供してください。
	 */
	add_theme_support('title-tag');

	/*
	 * 投稿およびページでの投稿サムネイルのサポートを有効にします。
	 */
	add_theme_support('post-thumbnails');

	// このテーマは 1 つの場所で wp_nav_menu() を使用します。
	register_nav_menus(
		array(
			'header' => esc_html__('ヘッダー', 'grandeur-shinohara'),
			'mobile' => esc_html__('モバイル', 'grandeur-shinohara'),
			'footer' => esc_html__('フッター', 'grandeur-shinohara'),
		)
	);

	/*
	 * 検索フォーム、コメントフォーム、コメントのデフォルトのコアマークアップを切り替える
	 * 有効な HTML5 を出力します。
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// WordPress コアのカスタム背景機能を設定します。
	add_theme_support(
		'custom-background',
		apply_filters(
			'grandeur_shinohara_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// ウィジェットの選択的更新のためのテーマのサポートを追加します。
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * コアカスタムロゴのサポートを追加します。
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'grandeur_shinohara_setup');

/**
 * テーマのデザインとスタイルシートに基づいて、コンテンツの幅をピクセル単位で設定します。
 *
 * 優先度 0 は、優先度の低いコールバックで使用できるようにします。
 *
 * @global int $content_width
 */
function grandeur_shinohara_content_width()
{
	$GLOBALS['content_width'] = apply_filters('grandeur_shinohara_content_width', 640);
}
add_action('after_setup_theme', 'grandeur_shinohara_content_width', 0);

/**
 * ウィジェットエリアを登録します。
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function grandeur_shinohara_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'grandeur-shinohara'),
			'id' => 'side-widget',
			'description' => esc_html__('ここがウェジェットエリア', 'grandeur-shinohara'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
	add_filter('widget_title', 'remove_widget_title_all');
	function remove_widget_title_all($widget_title)
	{
		return '';
	}
}
add_action('widgets_init', 'grandeur_shinohara_widgets_init');


/**
 *カスタムヘッダー機能を実装します。
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * このテーマのカスタム テンプレート タグ。
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * WordPressと連動してテーマを強化する機能。
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * カスタマイザーの追加。
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Jetpack互換性ファイルをロードします。
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * クラッシックウェジェット
 */

add_filter('use_widgets_block_editor', '__return_false');
/**
 *googlefonts
 */
// Enqueue WebFontLoader script
function enqueue_webfont_loader()
{
	wp_enqueue_script(
		'webfont-loader',
		'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js',
		array(), // Dependencies
		null,    // Version
		true     // Load script in footer
	);
}
add_action('wp_enqueue_scripts', 'enqueue_webfont_loader');

// WebFontConfig の初期化
function initialize_webfont_config()
{
	?>
	<script>
		window.WebFontConfig = {
			google: {
				families: ['Noto+Sans+JP']
			},
			active: function () {
				sessionStorage.fonts = true;
			}
		};

		(function () {
			var wf = document.createElement('script');
			wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
			wf.type = 'text/javascript';
			wf.async = true;
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(wf, s);
		})();
	</script>
	<?php
}
add_action('wp_head', 'initialize_webfont_config');


/**
 *CSS/JSファイル読み込み
 */


function myTheme_enqueue_style_script()
{
	wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v6.2.0/css/all.css', array(), null);
	wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), null);
	wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css', array(), null);
	wp_enqueue_style('reset-style', get_template_directory_uri() . '/css/reset.css', array(), null);
	wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), null, true, true);
	wp_enqueue_script('scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array('gsap'), null, true, true);
	wp_enqueue_script('smooth-scroll', 'https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.3/smooth-scroll.polyfills.min.js', array('gsap'), null, true, true);
	wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true, true);
	wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/script.js', array('gsap', 'scrolltrigger', 'swiper'), null, true);
}
add_action('wp_enqueue_scripts', 'myTheme_enqueue_style_script');

// /wp-content/themes/your-theme/functions.php
function enqueue_structured_data_script()
{
	wp_enqueue_script('structured-data', get_template_directory_uri() . '/js/structured-data.js', array(), null, false);
}
add_action('wp_enqueue_scripts', 'enqueue_structured_data_script');


/**
 *Jquery削除
 */
function no_jQuery()
{
	if (!is_admin()) {
		wp_deregister_script('jquery');
	}
}
add_action('init', 'no_jQuery');


/* ========================================================
フロント：ブロックエディタ用CSSの追加
=========================================================*/
function wpdocs_theme_add_editor_styles()
{
	add_theme_support('editor-styles');
	add_editor_style('editor-style.css');
}

add_action('after_setup_theme', 'wpdocs_theme_add_editor_styles');

function wpdocs_enqueue_styles()
{
	wp_enqueue_style('editor-style', get_template_directory_uri() . '/css/editor-styles.css');
}

add_action('wp_enqueue_scripts', 'wpdocs_enqueue_styles');


/**************************************************
ファビコンの設定
**************************************************/

// 使用例：テーマ内の /img/favicon.png を指定
add_filter('get_site_icon_url', 'my_site_icon_url');

function my_site_icon_url($url)
{
	return get_theme_file_uri('/favicon.ico');
}
/**************************************************
ナビゲーションメニュー（カスタムメニュー）の<li>タグに、クラスを付与
**************************************************/
function add_additional_class_on_li($classes, $item, $args)
{
	if (isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function mobile_add_additional_class_on_li($classes, $item, $args)
{
	if (isset($args->add_li_class_sp)) {
		$classes[] = $args->add_li_class_sp;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'mobile_add_additional_class_on_li', 1, 3);

function footer__add_additional_class_on_li($classes, $item, $args)
{
	if (isset($args->footer_add_li_class)) {
		$classes[] = $args->footer_add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'footer__add_additional_class_on_li', 1, 3);

/**************************************************
ナビゲーションメニュー（カスタムメニュー）の<a>タグに、クラスを付与
**************************************************/
function add_additional_class_on_a($atts, $item, $args)
{
	if (isset($args->add_a_class)) {
		$atts['class'] = $args->add_a_class;
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

function footer__add_additional_class_on_a($atts, $item, $args)
{
	if (isset($args->footer_add_a_class)) {
		$atts['class'] = $args->footer_add_a_class;
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'footer__add_additional_class_on_a', 1, 3);

/**************************************************
ナビゲーションメニュー（カスタムメニュースマホ）の<a>タグに、クラスを付与
**************************************************/
function add_sp_additional_class_on_a($atts, $item, $args)
{
	if (isset($args->add_a_class_sp)) {
		$atts['class'] = $args->add_a_class_sp;
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_sp_additional_class_on_a', 1, 3);



/**************************************************
 * 部屋タグのリンクを変更
 **************************************************/
function custom_term_link($link, $term, $taxonomy)
{
	if ($taxonomy == 'residential-apartment') {
		return add_query_arg('apartment', $term->slug, get_permalink(get_page_by_path('property')));
	}
	return $link;
}
add_filter('term_link', 'custom_term_link', 10, 3);

/**************************************************
 * パンくずリスト
 **************************************************/
function breadcrumb()
{
	$home = '<li><a href="' . get_bloginfo('url') . '" >ホーム</a></li>';
	echo '<ul class="breadcrumb">';
	if (is_front_page()) {

	}

	// アーカイブ・タグページ
	else if (is_post_type_archive()) {
		echo $home;
		$title = post_type_archive_title('', false);
		the_title('<li>', '</li>');
		return $title;
	}
	// 投稿ページ
	else if (is_single()) {
		echo $home;
		$tags = get_the_tags();
		$tag_list = array();
		if ($tags) {
			foreach ($tags as $tag) {
				$tag_link = get_tag_link($tag->term_id);
				$tag_list[] = '<li><a href="' . $tag_link . '">' . $tag->name . '</a></li>';
			}
		}
		foreach ($tag_list as $value) {
			echo $value;
		}
		the_title('<li>', '</li>');
	}
	// 固定ページ
	else if (is_page()) {
		echo $home;
		the_title('<li>', '</li>');
	}
	// 404ページの場合
	else if (is_404()) {
		echo $home;
		echo '<li>ページが見つかりません</li>';
	}
	echo "</ul>";
}
// アーカイブのタイトルを削除
add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_month()) {
		$title = single_month_title('', false);
	} elseif (is_post_type_archive('', false)) {
		$title = post_type_archive_title('', false);
	}
	return $title;
});

add_action('init', function() {
    register_post_type('property', array(
        'labels' => array(
            'name'          => 'お部屋情報',
            'singular_name' => 'property',
            'menu_name'     => 'お部屋情報',
            'add_new'       => '新規追加',
            'add_new_item'  => '新しいお部屋情報を追加',
            'edit_item'     => 'お部屋情報を編集',
        ),
        'public'        => true,
        'has_archive'   => true, // アーカイブページを有効化
        'menu_icon'     => 'dashicons-admin-home', // アイコンを家に変更
        'show_in_rest'  => true, // ブロックエディタ(Gutenberg)対応
        'supports'      => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'taxonomies'    => array('post_tag'), // 必要に応じて追加
        'rewrite'       => array('slug' => 'property'),
    ));
});
add_action('init', function() {
    register_taxonomy('property_category', 'property', array(
        'labels' => array(
            'name'              => '物件種別',
            'singular_name'     => 'property_category',
            'search_items'      => '物件種別を検索',
            'all_items'         => 'すべての物件種別',
            'parent_item'       => '親の種別',
            'parent_item_colon' => '親の種別:',
            'edit_item'         => '物件種別を編集',
            'update_item'       => '物件種別を更新',
            'add_new_item'      => '新しい物件種別を追加',
            'new_item_name'     => '新規物件種別名',
            'menu_name'         => '物件種別',
        ),
        'hierarchical'      => true, // trueでカテゴリー形式（親子あり）、falseでタグ形式
        'show_ui'           => true,
        'show_admin_column' => true, // 投稿一覧画面に分類を表示する
        'show_in_rest'      => true, // ブロックエディタで表示するために必須
        'query_var'         => true,
        'rewrite'           => array('slug' => 'property-type'),
    ));
});
