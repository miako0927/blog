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

	<?php wp_head(); ?><!-- ヘッダーのお約束 -->

	<!-- css -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.css" type="text/css" />
	<!-- js -->
	<?php
		wp_enqueue_script('jquery');// jQuery読み込み
		wp_enqueue_script('hotel-common.js', get_template_directory_uri() . '/js/common.js');// js外部ファイル読み込み
	?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
</head>

<body <?php body_class(); ?>><!-- bodyタグのclass属性を表示 -->

<!-- グローバルヘッダー -->
<header class="globalHeader">
	<div class="inner">
		<h1>
			<a href="<?php echo home_url(); ?>"><!-- トップページのURLを返す -->
				<img src="<?php echo get_template_directory_uri(); ?>/images/common/logo01.png" height="40" width="300" alt="ホテル・技評リゾート石垣島">
			</a>
		</h1>
		<p class="description"><?php bloginfo('description'); ?></p>
		<?php get_search_form(); ?><!-- serachform.phpを読み込む -->
	</div>
</header>

<!-- ヒーローイメージ（トップのみ表示） -->
<?php if( is_home() ): ?>
	<div class="homeVisual"><span>石垣島でのんびりゆったりと。</span></div>
<?php endif; ?>

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
