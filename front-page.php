<?php get_header(); ?>


<div class="global-wrapper">
  <div class="global-inner">

    <!-- メイン -->
  	<main>
  		<section class="mainSection-wrapper">
  			<h1 class="mainSection-heading--blue">新着記事一覧</h1>
  			<div class="mainSection-inner">
  		    <?php get_template_part('loop', 'main'); ?>
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
