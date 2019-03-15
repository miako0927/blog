
<!-- 全ページに表示 -->
<?php get_template_part('template/sidebar/sidebar-profile'); ?>
<?php get_template_part('template/sidebar/sidebar-archives'); ?>
<?php get_template_part('template/sidebar/sidebar-categories'); ?>
<?php get_template_part('template/sidebar/sidebar-searchform'); ?>

<!-- フロントページだけ表示 -->
<?php if( is_home() ): ?>
  <?php get_template_part('template/sidebar/sidebar-twitter'); ?>
<?php endif; ?>

<!-- フロントページ以外に表示 -->
<?php if( !is_home() ): ?>
  <?php get_template_part('template/sidebar/sidebar-recently'); ?>
<?php endif; ?>
