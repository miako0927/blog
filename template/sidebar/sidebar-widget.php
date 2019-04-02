<section class="sidebar-wrapper">
  <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
    <ul id="sidebar">
      <?php dynamic_sidebar( 'sidebar-2' ); ?>
    </ul>
  <?php endif; ?>
</section>
