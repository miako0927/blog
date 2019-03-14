<?php if ( have_posts() ) : ?><!-- 現在のWordPressクエリにループできる記事があった場合 -->
	<?php while ( have_posts() ) : the_post(); ?><!-- 投稿数の数だけループ -->

		<article id="post-<?php the_ID(); ?>" <?php post_class('news'); ?>>
      <div class="visual">
        <!-- function.phpにadd_theme_support関数を使用 -->
        <?php if(has_post_thumbnail()): ?><!-- サムネイルがあった場合 -->
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('thumbnail'); ?>
          </a>
        <?php else: ?><!-- サムネイルがなかった場合 -->
          <a href="<?php the_permalink(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/images/noimage_180x180.png" height="180" width="180" alt="">
          </a>
        <?php endif; ?>
      </div>
			<div class="text">
				<div class="entryInfo">
				    <div class="categories">
					    <?php the_category(); ?>
				    </div>
				    <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_date('Y.m.d (D)') ?></time>
				</div>
				<h1 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			</div>

		</article>

	<?php endwhile; ?><!-- ループ終了 -->
<?php else : ?><!-- 記事がなかった場合 -->

	<?php if( is_search() ) : ?><!-- 検索ページの場合 -->
		<p>検索結果はありませんでした</p>
	<?php else : ?><!-- 検索ページ以外の場合 -->
		<p>記事はありません。</p>
	<?php endif; ?>

<?php endif; ?>
