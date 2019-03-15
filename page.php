<?php get_header(); ?>

<div class="global-wrapper">
  <div class="global-inner">

    <!-- メイン -->
    <main>
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <section id="post-<?php the_ID(); ?>" <?php post_class('page mainSection-wrapper'); ?>>
            <h1 class="mainSection-heading--gray"><?php the_title(); ?></h1>
            <div class="mainSection-inner">
              <?php the_content(); ?>
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
