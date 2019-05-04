<?php get_header(); ?>

<div class="global-wrapper">
  <div class="global-inner">

    <!-- メイン -->
  	<main>
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
      		<section class="mainSection-wrapper">

    				<article id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>
    					<h1 class="title"><span><?php the_title(); ?></span></h1>
              <div class="entryInfo">
                <div class="categories">
                  <?php the_category(); ?>
                </div>
                <time datetime="<?php the_time('Y-m-d'); ?>">
                  <?php the_date('Y.m.d(D)'); ?>
                </time>
              </div>

              <div class="mainSection-inner">
      					<section class="content">
      						<?php the_content(); ?>
      					</section>
                <!-- ソーシャルボタンを出力（プラグイン WP Social Bookmarking Lightの位置は「none」にする -->
                <?php
                if( function_exists("wp_social_bookmarking_light_output_e")){
                  wp_social_bookmarking_light_output_e();
                }
                ?>
              </div>

              <div class="mainSection-inner">
      					<!-- comments.phpをインクルード -->
      					<?php comments_template(); ?>
              </div>
    				</article>

      		</section>

					<!-- 前後の記事ページへのリンク -->
					<nav class="postNavi">
						<span class="prev"><?php previous_post_link(); ?></span>
						<span class="next"><?php next_post_link(); ?></span>
					</nav>

					<!-- 関連記事 -->
          <section class="related mainSection-wrapper">
            <h3 class="related-heading">関連する記事</h3>
            <div class="related-inner mainSection-inner">
              <?php get_template_part('template/loop/loop-related'); ?>
            </div>
          </section>

        <?php endwhile; ?>
  		<?php endif; ?>
  	</main>

    <!-- サイドバー -->
  	<aside>
      <?php get_sidebar(); ?>
  	</aside>

  </div>
</div>

<?php get_footer(); ?>
