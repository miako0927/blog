<section class="sidebar-wrapper">
	<h4 class="sidebar-title">profile</h4>
  <div class="sidebar-profile sidebar-inner">
  	<div class="profile-summary">
      <div class="profile-image">
        <img src="<?php echo get_template_directory_uri(); ?>/images/profile100x100.png" alt="プロフィール画像">
      </div>
      <div class="profile-name">mizon</div>
    </div>
    <p class="profile-disc">
      テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
    </p>
    <a class="profile-morebtn" href="<?php echo home_url( 'profile', 'relative' ); ?>">more</a>
    <ul class="profile-sns">
      <li>
        <a href="https://twitter.com/mi_zo_n" target="_blank" class="twitter-icon">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
      <li>
        <a href="https://feedly.com/i/subscription/feed/http://mizon.wpblog.jp/feed" target="_blank" class="rss-icon">
          <i class="fas fa-rss"></i>
        </a></li>
      <li>
        <a href="<?php echo home_url( 'contact', 'relative' ); ?>" class="mail-icon">
          <i class="fas fa-envelope"></i>
        </a>
      </li>
    </ul>
  </div>
</section>
