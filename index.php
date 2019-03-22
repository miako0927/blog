<?php get_header(); ?>

<div class="global-wrapper">
  <div class="global-inner">

    <!-- メイン -->
  	<main>
  		<section class="mainSection-wrapper">

        <!-- 日付別ページの条件分岐 -->
        <?php if( is_month() ): ?>
          <h2 class="mainSection-heading--blue"><?php the_time('Y年m月'); ?></h2>
        <?php else: ?>
          <h2 class="mainSection-heading--blue"><?php wp_title(''); ?></h2>
        <?php endif; ?>

  			<div class="mainSection-inner">
          <?php get_template_part('template/loop/loop-main'); ?>
  			</div>
  		</section>

      <!-- ページナビ -->
      <?php if( function_exists( 'wp_pagenavi' )){ wp_pagenavi(); } ?>
  	</main>

    <!-- サイドバー -->
  	<aside>
      <?php get_sidebar(); ?>
  	</aside>

  </div>
</div>

<?php get_footer(); ?>
