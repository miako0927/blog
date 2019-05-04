<?php if ( have_posts() ) : ?><!-- 現在のWordPressクエリにループできる記事があった場合 -->
	<?php while ( have_posts() ) : the_post(); ?><!-- 投稿数の数だけループ -->

		<article id="post-<?php the_ID(); ?>" <?php post_class('loop-main'); ?>>
			<div class="text">
				<div class="entryInfo">
          <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_date('Y.m.d (D)') ?></time>
			    <div class="categories">
				    <?php the_category(); ?>
			    </div>
				</div>
				<h3 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="article-excerpt"><?php the_excerpt(); ?></div>
			</div>

		</article>

	<?php endwhile; ?><!-- ループ終了 -->
<?php else : ?><!-- 記事がなかった場合 -->

	<?php if( is_search() ) : ?><!-- 検索ページの場合 -->
		<p class="no-result">検索結果はありませんでした</p>
	<?php else : ?><!-- 検索ページ以外の場合 -->
		<p class="no-article">記事はありません。</p>
	<?php endif; ?>

<?php endif; ?>
