<section class="comments">
<?php
//コメントフォームの表示方法を配列に格納
$comment_form_args = array(
    'title_reply' => 'コメント',
    'comment_notes_after' => '',//「次のHTMLタグと属性が使えます」の部分を削除
);
comment_form( $comment_form_args );//コメントフォームを表示
if ( have_comments() ) : //コメントが投稿されてる場合
?>
    <p><?php comments_number('コメントはありません。', 'コメント1件', 'コメント%件'); ?></p><!-- 投稿されてるコメント数とテキストを表示 -->
    <ol class="commentlist">
        <?php
				//コメント一覧の表示方法を配列に格納
        $wp_list_comments_args = array(
            'avatar_size' => '35'//アバターのサイズを50pxに設定（デフォルトは32px)
        );
        wp_list_comments( $wp_list_comments_args );//投稿されたコメント一覧を表示
        ?>
    </ol>
<?php
//ページングの表示方法を配列に格納
$paginate_comments_links_args = array(
    'prev_text' => '←前のコメントページ',
    'next_text' => '次のコメントページ→',
);
paginate_comments_links( $paginate_comments_links_args );//ページングを表示
endif;
?>
</section><!-- /.comments -->
