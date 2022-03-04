<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post();?>
<?php the_content(); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>


<?php 記事一覧ページに特定カテゴリーのみの記事を出力する ?>

<?php query_posts('showposts=10&cat=カテゴリーID'); while(have_posts()) : the_post(); ?>
<p><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
<?php endwhile;?>
<?php wp_reset_query();?>