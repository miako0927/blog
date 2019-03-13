<footer class="globalFooter">
	<!-- トップへ戻るボタン -->
	<div class="pageTop">
		<p><a href="javascript:void(0);" id="js-pagetop">
			<img src="<?php echo get_template_directory_uri(); ?>/images/common/pagetop01.png" height="41" width="41" alt="">
		</a></p>
	</div>
	<!-- フッター -->
	<div class="inner">
    <!-- フッターナビ -->
    <nav class="fotterNavi">
    <?php
    	$args = array(
    	    'menu' => 'footer-navigation', //管理画面で作成したメニューの名前
    	    'container' => false, //<ul>タグを囲んでいる<div>タグを削除
    	);
    	wp_nav_menu($args);
    ?>
    </nav>
		<small>&copy; mizon-webdesign All Rights Reserved.</small>
	</div>
</footer>

<?php wp_footer(); ?><!-- フッターのお約束 -->

</body>
</html>
