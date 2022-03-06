
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/common.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/hoiku.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/news.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/schedule.css">
    <title>クッピー乳児園 TOPページ</title>
    <?php wp_head(); ?>
</head>
<header>
        <div class="header">
            <div class="header_back">
                <div class="header_left">
                    <img src="<?php bloginfo('template_directory'); ?>/images/left_flag.png" alt="">
            </div>
                <div class="header_right">
                    <img src="<?php bloginfo('template_directory'); ?>/images/right_flag.png" alt="">
                </div>
                <div class="header_logo">
                    <img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="クッピー乳児園">
                </div>
            </div>
        </div>
<!-- pc menu -->
        <div class="nav_menu pc">
            <div class="g-nav-list">
                <ul class="clearfix">
                    <li><a href="<?php echo get_permalink( get_page_by_path( '' )->ID ); ?>"><i class="fa fa-solid fa-crown"></i></br>TOP</a></li>  
                    <li><a href="<?php echo get_permalink( get_page_by_path( 'news' )->ID ); ?>"><i class="fa fa-regular fa-lightbulb"></i></br>お知らせ</a></li>  
                    <li><a href="<?php echo get_permalink( get_page_by_path( 'hoiku' )->ID ); ?>">
                        <i class="fa fa-brands fa-itunes-note"></i></br>保育内容</a></li>  
                    <li><a href="<?php echo get_permalink( get_page_by_path( 'introduce' )->ID ); ?>"><i class="fa fa-solid fa-palette"></i></br>園の紹介</a></li>  
                    <li><a href="<?php echo get_permalink( get_page_by_path( 'schedule' )->ID ); ?>">
                    <i class="fa fa-solid fa-paw"></i></br>園の生活</a></li>
                    <li><a href="<?php echo get_permalink( get_page_by_path( 'album' )->ID ); ?>">
                    <i class="fa fa-solid fa-image"></i></br>アルバム</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/news#recruit">
                    <i class="fa fa-solid fa-tree"></i></br>採用情報</a></li>
                </ul>
            </div>
            <div id="article">
            <!-- /#article --></div>
        </div>

<!-- sp menu -->        
        <div class="nav_menu sp">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="globalMenuSp">
                <ul>
                    <li><a href="/index.html"><i class="fa fa-solid fa-crown"></i></br>TOP</a></li>  
                    <li><a href="/news.html"><i class="fa fa-regular fa-lightbulb"></i></br>お知らせ</a></li>  
                    <li><a href="/hoiku.html"><i class="fa fa-brands fa-itunes-note"></i></br>保育内容</a></li>  
                    <li><a href="/introduce.html"><i class="fa fa-solid fa-palette"></i></br>園の紹介</a></li>  
                    <li><a href="/schedule.html"><i class="fa fa-solid fa-paw"></i></br>園の生活</a></li>
                    <li><a href="/album.html"><i class="fa fa-solid fa-image"></i></br>アルバム</a></li>
                    <li><a href="/album.html"><i class="fa fa-solid fa-tree"></i></br>採用情報</a></li>
                </ul>
            </nav>
        </div>
    </header>