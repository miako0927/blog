<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>
		<?php if( !is_home() ){ wp_title(' - ', true, 'right'); } ?>
		<?php bloginfo('name'); ?>
	</title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="apple-mobile-web-app-capable" content="yes" /><!-- Safariで全画面表示を許可 -->
  <meta name="format-detection" content="telephone=no" /><!-- 電話番号、メールアドレスのリンクの自動検出設定 -->

	<?php wp_head(); ?><!-- ヘッダーのお約束 -->

	<!-- css -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.css" type="text/css" />
	<!-- js -->
	<?php
		wp_enqueue_script('jquery');// jQuery読み込み
		wp_enqueue_script('hotel-common.js', get_template_directory_uri() . '/js/common.js');// js外部ファイル読み込み
	?>

  <!--  favicon homeicon -->
  <link rel="icon" type="image/png" href="images/favicon.ico">
  <link rel="apple-touch-icon-precomposed" href="icon.png">

  <!--  OGP -->
  <meta property="og:url" content="URL" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="ページタイトル" />
  <meta property="og:description" content="説明" />
  <meta property="og:site_name" content="サイトネーム" />
  <meta property="og:image" content="https://balloon.chatfiction.me/images/ogp.jpg" />
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111432210-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-111432210-1');
  </script>

</head>

<body <?php body_class(); ?>><!-- bodyタグのclass属性を表示 -->

<!-- グローバルヘッダー -->
<header class="globalHeader">
	<div class="inner">
		<h1>
			<a href="<?php echo home_url(); ?>"><!-- トップページのURLを返す -->
				web design supplement
			</a>
		</h1>
		<p class="description"><?php bloginfo('description'); ?></p>
	</div>

  <!-- グローバルナビ -->
  <nav class="globalNavi">
  <?php
  	$args = array(
  	    'menu' => 'global-navigation', //管理画面で作成したメニューの名前
  	    'container' => false, //<ul>タグを囲んでいる<div>タグを削除
  	);
  	wp_nav_menu($args);
  ?>
  </nav>
</header>

<!-- ヒーローイメージ（トップのみ表示） -->
<?php if( is_home() ): ?>
	<div class="homeVisual"></div>
<?php endif; ?>


<!-- パンくずリスト（TOP以外で表示） -->
<?php if( !is_home() ): ?>
	<div class="breadcrumbs">
		<?php
			if ( function_exists( 'bcn_display' ) ) {//指定した関数が定義されているかを調べる
				bcn_display();
			}
		?>
	</div>
<?php endif; ?>
