<section class="sidebar-wrapper">
	<h4 class="sidebar-title">カテゴリ</h4>
  <ul class="sidebar-categories sidebar-inner">
    <?php
			$args = array(
				'title_li' => '', //liの見出しを削除（省略時はカテゴリー）
				'show_count' => true, //投稿数を表示
			);
			wp_list_categories( $args );//カテゴリページへのリンク一覧を表示
		?>
	</ul>
</section>
