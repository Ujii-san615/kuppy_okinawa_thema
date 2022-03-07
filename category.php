<?php
// カテゴリーのデータを取得
$cat = get_the_category();
$cat = $cat[0];

// カテゴリー名（どちらでもok）
echo $cat->name;
echo $cat->cat_name;

// ID
echo $cat->cat_ID;

// スラッグ（どちらでもok）
echo $cat->slug;
echo $cat->category_nicename;

?>