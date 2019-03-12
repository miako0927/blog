<?php
/*
 * アイキャッチ画像を使用可能にする
 */
add_theme_support( 'post-thumbnails' );

/*
 * カスタムメニュー機能を使用可能にする
 */
add_theme_support( 'menus' );

/*
 * 管理画面にWordPress標準のカスタムフィールドを使用可能にする
 */
add_filter('acf/settings/remove_wp_meta_box', '__return_false');


/*
 * 管理画面に [外観] > [ウィジェット] を表示
 */
if ( function_exists( 'register_sidebar' ) ) {
  register_sidebar( array(
  'name' => 'ウィジェットエリア01',
  'id' => 'widget_area01',
  'before_widget' => '<div class=”widget”>',
  'after_widget' => '</div>',
  'before_title' => '<h3>',
  'after_title' => '</h3>'
  ) );
}

/*
 * コメント投稿フォームの「名前」「メールアドレス」「ウェブサイト」の項目を削除する
 */
add_filter('comment_form_default_fields', 'my_comment_form_default_fields');//フィルターフックを使う
function my_comment_form_default_fields( $args ) {
    $args['author'] = ''; // 「名前」を削除
    $args['email'] = ''; // 「メールアドレス」を削除
    $args['url'] = ''; // 「ウェブサイト」を削除
    return $args;
}

/*
 * <head>内にRSSのlink要素を出力する
 */
add_theme_support( 'automatic-feed-links' );

/*
 * RSSに配信する文字数を設定する
 */
add_filter('excerpt_mblength', 'my_excerpt_mblength');
function my_excerpt_mblength( $length ) {
     return 100; //抜粋に出力する文字数
}

/**
 * RSSに「続きを読む」のリンクを追加する
 */
add_filter('excerpt_more', 'my_excerpt_more');
function my_excerpt_more() {
    return '...<a href="'. get_permalink() . '">続きを読む→</a>';
}

/**
 * 記事一覧をカスタマイズする
 */
//アクションフック（WordPressで発生する特定のイベントに合わせて実行できる）
add_action( 'pre_get_posts', 'my_pre_get_posts' );//WordPressがクエリを取得する前に、関数を実行
function my_pre_get_posts($query) {
    // 管理画面、メインクエリー以外には設定しない
    if ( is_admin() || ! $query->is_main_query() ){
        return;
    }
    //トップページの場合
    if ( $query->is_home() ) {
        $query->set( 'posts_per_page', 3 );
        return;
    }
}

/*
 * コンタクトフォーム送信完了後の完了画面を追加
 */

add_action( 'wp_footer', 'mycustom_wp_footer' );

function mycustom_wp_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = 'http://localhost/wordpress/contact/thanks/';
}, false );
</script>
<?php
}



/*
 * スラッグが未入力の場合は、アラート
 */
function enqueue_post_slug_validation_script( $hook ) {
	if ( $hook !== 'post.php' && $hook !== 'post-new.php' )
		return;

$script = <<<SCRIPT
jQuery(function($) {
  if ($('#post_type').val() == 'post' || $('#post_type').val() == 'page') {
    $('#post').submit(function(e) {
      if (adminpage == 'post-new-php') {
        // 新規追加
        slug = $('#post_name').val();
        if (slug == '') {
          // 新規追加でスラッグが空の場合はタイトルを検証する
          slug = $('#title').val();
          if (slug.match(/[^A-Za-z0-9]+/)) {
            alert('スラッグを入力してください。');
            return false;
          }
        } else {
          if (slug.match(/[^A-Za-z0-9-]+/)) {
            alert('スラッグを「半角英数字」か「-」で入力してください。');
            return false;
          }
        }
      } else {
        // 更新
        slug = $('#post_name').val();
        if (slug.match(/[^A-Za-z0-9-]+/)) {
          alert('スラッグを「半角英数字」か「-」で入力してください。');
          return false;
        }
      }
    });
  }
});
SCRIPT;

	wp_add_inline_script( 'post', $script );
}

add_action( 'admin_enqueue_scripts', 'enqueue_post_slug_validation_script' );


/*
 * タイトル・コンテンツ・抜粋・カテゴリ・タグ・アイキャッチ画像が未入力の場合は、アラート
 */
// 新規投稿画面でのみ
add_action( 'admin_head-post-new.php', 'post_edit_required' );
// 投稿の編集画面
add_action( 'admin_head-post.php', 'post_edit_required' );
function post_edit_required() {
?>
<script type="text/javascript">
jQuery(function($) {
  if( 'post' == $('#post_type').val() ) {
    $('#post').submit(function(e) {
      // タイトル
      if ( '' == $('#title').val() ) {
        alert('タイトルを入力してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#title').focus();
        return false;
      }
      // コンテンツ（エディタ）
      if ( $('.wp-editor-area').val().length < 1 ) {
        alert('コンテンツを入力してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        return false;
      }
      // 抜粋
      if ( '' == $('#excerpt').val() ) {
        alert('抜粋を入力してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#excerpt').focus();
        return false;
      }
      // カテゴリー
      if ( $('#taxonomy-category input:checked').length < 1 ) {
        alert('カテゴリーを選択してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#taxonomy-category a[href="#category-all"]').focus();
        return false;
      }
      // タグ
      if ( $('#tagsdiv-post_tag .tagchecklist span').length < 1 ) {
        alert('タグを選択してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#new-tag-post_tag').focus();
        return false;
      }
      // アイキャッチ
      if ( $('#set-post-thumbnail img').length < 1 ) {
        alert('アイキャッチ画像を設定してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#set-post-thumbnail').focus();
        return false;
      }
    });
  }
});
</script>
<?php
}

?>
