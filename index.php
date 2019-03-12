<?php get_header(); ?>

	<div class="contentsWrap">
		<div class="mainContents">
			<?php if( is_month() ): ?><!-- 日付別ページの条件分岐 -->
				<h1 class="type-A"><?php the_time('Y年m月'); ?></h1>
			<?php else: ?>
				<h1 class="type-A"><?php wp_title(''); ?></h1>
			<?php endif; ?>
			<section class="newsBlock block">
				<?php get_template_part('loop', 'main'); ?>
			</section>
		</div>

		<aside class="subContents">
			<div class="wrapper">
				<?php get_sidebar('categories'); ?>
				<?php get_sidebar('archives'); ?>
			</div>
		</aside>
	</div>

<?php get_footer(); ?>
