<?php get_header(); ?>
    <div class="container">
    <div id="breadcrumb" class="bread">
        <ol>
        <li>
            <a href="<?php echo home_url(); ?>">
            <i class="fa fa-home"></i><span>TOP</span>
            </a>
        </li>
        <li>
            <a><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></a>
        </li>
        </ol>
    </div>

    <div class="contents">

        <h1><?php echo esc_html(get_post_type_object(get_post_type())->label); ?>の記事一覧</h1>

        <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <article <?php post_class( 'kiji-list' ); ?>>
        <a href="<?php the_permalink(); ?>">
            <!--画像を追加-->
            <?php if( has_post_thumbnail() ): ?>
            <?php the_post_thumbnail('medium'); ?>
            <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.gif" alt="no-img"/>
            <?php endif; ?>
            <div class="text">
            <!--タイトル-->
            <h2><?php the_title(); ?></h2>
            <!--投稿日を表示-->
            <span class="kiji-date">
                <i class="fas fa-pencil-alt"></i>
                <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
                <?php echo get_the_date(); ?>
                </time>
            </span>
            <!--タクソノミー『info-cat』のタームを一つだけ取得-->
            <?php if( has_term('','info-cat',$post->ID) ): ?>
                <span class="cat-data">
                <?php $post_term = get_the_terms($post->ID,'info-cat'); echo $post_term[0]->name; ?>
                </span>
            <?php endif; ?>
            <!--抜粋-->
            <?php the_excerpt(); ?>
            </div>
        </a>
        </article>

        <?php endwhile; endif; ?><!--ループ終了-->

        <div class="pagination">
        <?php echo paginate_links( array(
        'type' => 'list',
        'mid_size' => '1',
        'prev_text' => '&laquo;',
        'next_text' => '&raquo;'
        ) ); ?>
        </div>

    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
