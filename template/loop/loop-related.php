<?php
  // カテゴリーが複数設定されている場合は、どれかをランダムに取得
  $categories = wp_get_post_categories($post->ID, array('orderby'=>'rand'));
  //表示したい記事要素を設定
  if ($categories) {
      $args = array(
          'category__in' => array($categories[0]), // カテゴリーのIDで記事を取得
          'post__not_in' => array($post->ID), // 表示している記事は除外する
          'showposts'=>5, // 取得したい記事数
          'caller_get_posts'=>1, // 取得した記事を1番目から表示する
          'orderby'=> 'rand' // ランダムで取得する
      );
  $my_query = new WP_Query($args);
  if( $my_query->have_posts() ) {
    while ($my_query->have_posts()) { $my_query->the_post();
?>
  <div class="related-article">
    <div class="text">
      <h1 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
      <div class="entryInfo">
          <div class="categories">
            <?php the_category(); ?>
          </div>
          <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_date('Y.m.d (D)') ?></time>
      </div>
    </div>
  </div>
<?php
    } wp_reset_query();
  } else {
?>
  <p class="no-related">関連する記事はありません。</p>
<?php
  } }
?>
