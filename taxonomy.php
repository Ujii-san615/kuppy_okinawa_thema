<?php get_header(); ?>
<div class="container">
    <div id="breadcrumb" class="bread">
        <ol>
        <li>
            <a href="<?php echo home_url(); ?>">
            <i class="fa fa-home"></i><span>TOP</span>
            </a>
        </li>
        <?php
        $term_id = get_queried_object_id();
        $term_data = get_term($term_id);
        $tax = $term_data->taxonomy;
        $ancestors = get_ancestors($term_id, $tax);
        $ancestors = array_reverse($ancestors); // 子親の順番で表示されるので、親子の順番に変更
        foreach( $ancestors as $ancestor ) { // 配列から個々の値を取り出す
            $term = get_term( $ancestor, $tax );
            echo '<li><a href="'.get_term_link( $ancestor, $tax ).'">'. $term->name.'</a></li>';
        }
        ?>
        <li>
            <a><?php single_term_title() ?>の記事一覧</a>
        </li>
        </ol>
    </div>

    <div class="contents">

        <h1><?php single_term_title(); ?>の記事一覧</h1>

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
