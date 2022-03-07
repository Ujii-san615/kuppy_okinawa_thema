<?php
$categories = get_categories();
foreach($categories as $category) :
?>
<div><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->cat_name; ?></a></div>
<ul>
<?php
query_posts('cat='.$category->cat_ID);
if (have_posts()) : while (have_posts()) : the_post();
?>
<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
<?php endwhile; endif; ?>
</ul>
<?php endforeach; ?>