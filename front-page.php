<?php get_header(); ?>

<!-- メインコンテンツ -->
<div class="contentsWrap">

	<!-- メインコンテンツ -->
	<div class="mainContents">
		<!-- 固定ページへのバナーリンク -->
		<div class="aboutBlock block">
			<div class="banners">
				<ul>
					<li>
						<a href="<?php echo home_url( 'about', 'relative' ); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/images/home/bnr_about.png" height="97" width="320" alt="ホテル紹介">
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( 70 ); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/images/home/bnr_access.png" height="97" width="320" alt="アクセス">
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- 新着情報 -->
		<section class="newsBlock block">
		    <h1 class="type-B"><span>新着情報</span></h1>
		    <?php get_template_part('loop', 'main'); ?>
		</section>

    <?php echo do_shortcode('[instashow]'); ?>
	</div>

	<!-- サイドバー -->
	<aside class="subContents">
		<?php get_sidebar(); ?>
	</aside>

</div>

<?php get_footer(); ?>
