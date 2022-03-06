<?php

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
wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/common.css' );
wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/schedule.css' );
wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/hoiku.css' );
wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/news.css' );
wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/schedule.css' );
}
add_action( 'wp_enqueue_scripts', 'my_script_init' );

function add_files() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'add_files' );



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