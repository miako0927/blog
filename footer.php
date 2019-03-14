
<!-- トップへ戻るボタン -->
<div id="page_top" class="clearfix">
  <a href="javascript:void(0);" id="js-pagetop"></a>
</div>

<footer>
	<!-- フッター -->
	<div class="footer-inner">
    <!-- フッターナビ -->
    <nav class="footer-nav">
    <?php
    	$args = array(
    	    'menu' => 'footer-navigation', //管理画面で作成したメニューの名前
    	    'container' => false, //<ul>タグを囲んでいる<div>タグを削除
    	);
    	wp_nav_menu($args);
    ?>
    </nav>
		<p class="copyright">&copy; mizon-webdesign All Rights Reserved.</p>
	</div>
</footer>

<?php wp_footer(); ?><!-- フッターのお約束 -->

</body>
</html>
