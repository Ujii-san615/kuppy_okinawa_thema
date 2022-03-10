<?php

/*

Template Name: アルバム
Template Post Type: page,post

*/

?>

<?php include ( dirname(__FILE__) . '/header.php' ); ?>

<body>
<main>
    <section>
        <div id="page-title">
            <img src="<?php bloginfo('template_directory'); ?>/images/title_album.png" alt="アルバム">
        </div>
    </section>
    <section>
        <div class="album_wrap">
            <div id="album_nav">
                <ul class="album_menu">
                    <li><a href="#album01">園児</a></li>
                    <li><a href="#album02">行事</a></li>
                    <li><a href="#album03">先生たち</a></li>
                    <li><a href="#album04">手作りおもちゃ</a></li>
                    <li><a href="#album05">施設</a></li>
                </ul>
            </div>

            <div id="album01">
                <h1 class="album_title">園児</h1>
                    <?php
                    $pageID = get_page_by_path('album_enji');
                    $pageID = $pageID->ID;

                    $PageContent = get_post( $pageID );
                    $PageContent = $PageContent -> post_content; //固定ページの内容

                    echo $PageContent;
                    ?>
                </div>
            
            <div id="album02">
                <h1 class="album_title">行事</h1>
                <?php
                        $pageID = get_page_by_path('album_gyouji');
                        $pageID = $pageID->ID;

                        $PageContent = get_post( $pageID );
                        $PageContent = $PageContent -> post_content; //固定ページの内容

                        echo $PageContent;
                        ?>
            </div>
            <div id="album03">
                <h1 class="album_title">先生たち</h1>
                    <?php
                    $pageID = get_page_by_path('album_teacher');
                    $pageID = $pageID->ID;

                    $PageContent = get_post( $pageID );
                    $PageContent = $PageContent -> post_content; //固定ページの内容

                    echo $PageContent;
                    ?>
            </div>
            <div id="album04">
                <h1 class="album_title">手作りおもちゃ</h1>
                    <?php
                    $pageID = get_page_by_path('album_toy');
                    $pageID = $pageID->ID;

                    $PageContent = get_post( $pageID );
                    $PageContent = $PageContent -> post_content; //固定ページの内容

                    echo $PageContent;
                    ?>
            </div>
            <div id="album05">
                <h1 class="album_title">施設</h1>
                    <?php
                    $pageID = get_page_by_path('album_shisetsu');
                    $pageID = $pageID->ID;

                    $PageContent = get_post( $pageID );
                    $PageContent = $PageContent -> post_content; //固定ページの内容

                    echo $PageContent;
                    ?>
            </div>
        </div>






</main>
    <?php include ( dirname(__FILE__) . '/footer.php' ); ?>