<?php
	$args = array(
		'post_type' => 'post', //投稿記事だけを指定
		'posts_per_page' => 3, //最新記事を3件表示
	);
	$the_query = new WP_Query( $args );//独自のクエリを定義して、変数に格納
	if ( $the_query->have_posts() ) ://もし$the_queryの記事があるなら
?>

  <ul>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <li>
        <a href="<?php the_permalink() ?>"  class="clearfix">
          <h5><?php the_title(); ?></h5>
          <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d (D)'); ?></time>
        </a>
      </li>
    <?php endwhile; ?>
  </ul><!-- /.entry -->

<?php
  endif;
?>
