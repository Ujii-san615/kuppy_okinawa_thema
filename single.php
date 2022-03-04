<?php // ブログ記事を表示する start ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php // タイトルを表示する start ?>
    <h1 class="blog-detail__title"><?php the_title(); ?></h1>
    <?php // タイトルを表示する end ?>

    <?php // アイキャッチ画像を表示する start ?>
    <?php if(has_post_thumbnail()): ?>
    <div class="blog-detail__image">
        <img src="<?php the_post_thumbnail_url('large'); ?>">
    </div>
    <?php endif; ?>
    <?php // アイキャッチ画像を表示する end ?>

    <?php // 本文を表示する start ?>
    <div class="blog-detail__body">
        <div class="blog-content"><?php echo the_content(); ?></div>
    </div>
    <?php // 本文を表示する end ?>

<?php endwhile; endif; ?>
<?php // ブログ記事を表示する end ?>

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