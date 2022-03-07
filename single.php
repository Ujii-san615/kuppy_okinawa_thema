<?php get_header(); ?>
    <div class="container">
    <!--パンくずリスト-->
    <div class="bread">
        <ol>
        <li>
            <a href="<?php echo home_url(); ?>">
            <i class="fa fa-home"></i><span>TOP</span>
            </a>
        </li>
        <li>
            <a href="<?php echo get_post_type_archive_link($post_type); ?>">
            <?php echo esc_html(get_post_type_object(get_post_type())->label); ?>
            </a>
        </li>
        <?php
        //カスタム投稿に親子関係を持たせるときのみ記述
        foreach (array_reverse(get_post_ancestors($post->ID)) as $parentid) {
            echo '<li><a href="',get_the_permalink($parentid),'">'.get_the_title($parentid).'</a></li>';
        }
        ?>
        <li>
            <a>
            <?php the_title(); ?>
            </a>
        </li>
        </ol>
    </div>
    <div class="contents">
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
        <!--アイキャッチ取得-->
        <?php if( has_post_thumbnail() ): ?>
        <div class="kiji-img">
            <?php the_post_thumbnail( 'large' ); ?>
        </div>
        <?php endif; ?>
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
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
​

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

