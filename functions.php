<?php
add_theme_support( 'menus' );

//タイトル出力
function wpbeg_title( $title ) {
  if ( is_front_page() && is_home() ) { //トップページなら
      $title = get_bloginfo( 'name', 'display' );
  } elseif ( is_singular() ) { //シングルページなら
      $title = single_post_title( '', false );
  }
  return $title;
}
add_filter( 'pre_get_document_title', 'wpbeg_title' );

// style.cssを読み込む
function read_enqueue_styles() {
  wp_enqueue_style( 'main-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'read_enqueue_styles' );

// ↓ ここから追記
// rel="prev"とrel=“next"表示の削除
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');



// WordPressバージョン表示の削除
remove_action('wp_head', 'wp_generator');

// 絵文字表示のための記述削除（絵文字を使用しないとき）
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// アイキャッチ画像の有効化
add_theme_support('post-thumbnails');

// カスタムメニューの「場所」を設定
register_nav_menu( 'header-navi', 'ヘッダーナビ' );

/* ---------------------------------------
* CSS / JavaScriptの読み込み
* -------------------------------------- */
function my_script_init() {
wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');
wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/reset.css');
wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/common.css');
wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/schedule.css');
wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/hoiku.css');
wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/news.css');
wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/schedule.css');
wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/album.css');
wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/slick.css');
wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/slick-theme.css');
}
add_action( 'wp_enqueue_scripts', 'my_script_init' );

function add_files() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'add_files' );

//ビジュアルエディタ用スタイル適用
add_editor_style('editor-style.css');

// imagesフォルダの構文短縮
function imagepassshort($arg) {
  $content = str_replace('" images/', '"' . get_bloginfo('template_directory') . '/images/', $arg);
  return $content;
  }
  add_action('the_content', 'imagepassshort');


// phpを読み込めるショートコード追加
function Include_my_php($params = array()) {
  extract(shortcode_atts(array(
      'file' => 'default'
  ), $params));
  ob_start();
  include(get_theme_root() . '/' . get_template() . "/$file.php");
  return ob_get_clean();
}

add_shortcode('myphp', 'Include_my_php');

//本体ギャラリーCSS停止
add_filter( 'use_default_gallery_style', '__return_false' );


//カスタム投稿の追加
function add_custom_post() {
  register_post_type(
    'infopage',
    array(
      'label' => 'お知らせ',
      'public' => true,
      'has_archive' => true,
      'menu_position' => 5,
      'supports' => array(
                      'title',
                      'editor',
                      'thumbnail',
                      'revisions',
                      'excerpt',
                      'custom-fields',
                      )
    )
  );

  //複数追加する場合は、register_post_type(～)の内容をここに追加

  //カテゴリを投稿と共通設定にする
  //register_taxonomy_for_object_type('category', 'infopage');
  //タグを投稿と共通設定にする
  //register_taxonomy_for_object_type('post_tag', 'infopage');

}
add_action('init', 'add_custom_post');

//カスタムタクソノミー
function add_taxonomy() {
  //カスタムタクソノミー（お知らせカテゴリ）
  register_taxonomy(
  'info-cat',
  'infopage',
  array(
    'label' => 'お知らせカテゴリ',
    'singular_label' => 'お知らせカテゴリ',
    'labels' => array(
      'all_items' => 'お知らせカテゴリ一覧',
      'add_new_item' => 'お知らせカテゴリを追加'
    ),
    'public' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'hierarchical' => true
    )
  );

  //カスタムタクソノミー（お知らせタグ）
  register_taxonomy(
  'info-tag',
  'infopage',
  array(
    'label' => 'お知らせのタグ',
    'singular_label' => 'お知らせのタグ',
    'labels' => array(
      'add_new_item' => 'お知らせのタグを追加'
    ),
    'public' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'hierarchical' => false
    )
  );
}
add_action( 'init', 'add_taxonomy' );

  //editor-style.css

function wpbeg_theme_add_editor_styles() {
  add_editor_style( get_template_directory_uri() . "/assets/css/editor-style.css" );
}
add_action( 'admin_init', 'wpbeg_theme_add_editor_styles' );