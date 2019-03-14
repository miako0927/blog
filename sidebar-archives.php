<section class="sidebar-wrapper">
	<h4 class="sidebar-title">月別アーカイブ</h4>
	<ul class="archives sidebar-inner">
		<?php
			$args = array(
				'type' => 'monthly', //月別を指定
				'show_post_count' => true, //投稿数を表示
			);
			wp_get_archives( $args );//アーカイブページへのリンク一覧を表示
		?>
	</ul>
</section>
