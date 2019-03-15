<?php get_header(); ?>

<div class="global-wrapper">
  <div class="global-inner">

    <!-- メイン -->
  	<main>
  		<section class="mainSection-wrapper">
  			<h1 class="mainSection-heading--blue">404 Not Found</h1>
  			<div class="main-404 mainSection-inner">
          <p class="no-result">お探しのページが見つかりませんでした。</p>
          <p class="404">申し訳ございませんが、<a href="<?php echo home_url('/'); ?>">こちらのリンク</a>からトップページにお戻りください。</p>
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
