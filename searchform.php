<form action="<?php echo home_url('/'); ?>" method="get" class="search-form">
	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="サイト内検索"><!-- 1列に並べるためのコメントアウト
   --><input type="submit" id="searchSubmit" value="">
</form>
