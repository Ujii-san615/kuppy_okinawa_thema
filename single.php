<?php get_header(); ?>

<body>
<main>
    <section>
        <div id="page-title">
            <img src="<?php bloginfo('template_directory'); ?>/images/title_news_main.png" alt="お知らせ">
        </div>
    </section>

    <div class="container_news_single">
        <!--パンくずリスト-->
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php if(function_exists('bcn_display'))
            {
                bcn_display();
            }?>
        </div>
    </div>

    <div class="contents_news">
        <?php if(have_posts()): the_post(); ?>
        <article <?php post_class( 'kiji' ); ?>>
        <!--投稿日・著者を表示-->
        <div class="kiji-info">
            <!--投稿日を取得-->
            <span class="kiji-date">
                <i class="fas fa-pencil-alt"></i>
                <time
                    datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
                    <?php echo get_the_date(); ?>
                </time>
            </span>
            <!--お知らせカテゴリを追加-->
            <?php
                if(has_term('','info-cat',$post->ID)) {
                echo get_the_term_list($post->ID,'info-cat','<span class="cat-data">','</span><span class="cat-data">','</span>');
                }
            ?>
        </div>
        <!--タイトル-->
        <h1><?php the_title(); ?></h1>

        <!--本文取得-->
        <?php the_content(); ?>
        <!--お知らせタグを追加-->
        <?php
        if(has_term('','info-tag',$post->ID)) {
            the_terms($post->ID, 'info-tag','<div class="kiji-tag"><ul><li>タグ： </li><li>','</li><li>','</li></ul></div>'
            );
        }
        ?>
        </article>
        <?php endif; ?>

    </div>
</div>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		$this_categories = get_the_category();
		if ( $this_categories ) {
			$this_category_color = get_field( 'color', 'category_' . $this_categories[0]->term_id );
			$this_category_name  = $this_categories[0]->name;
			echo '<span class="entry-label" style="' . esc_attr( 'background:' . $this_category_color ) . ';">' . esc_html( $this_category_name ) . '</span>';
		}

endwhile;
endif;
?>

<?php if( get_previous_post() || get_next_post() ) : ?>
    <ul class="p-pagenation">
        <?php if ( get_previous_post() ) : ?>
            <li class="prevpostslink"><?php previous_post_link( '%link', 'Prev' ); ?></li>
        <?php endif; ?>
        <?php if( get_next_post() ): ?>
            <li class="prevpostslink"><?php next_post_link( '%link', 'Next' ); ?></li>

        
        <?php endif; ?>
    </ul>
<?php endif; ?>
<?php
            the_posts_pagination(
                array(
                    'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
                    'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
                    'prev_text'     => __( '前へ'), // 「前へ」リンクのテキスト
                    'next_text'     => __( '次へ'), // 「次へ」リンクのテキスト
                    'type'          => 'list', // 戻り値の指定 (plain/list)
                )
            ); 
        ;?>

<?php get_footer(); ?>
​

