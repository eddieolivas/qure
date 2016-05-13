<header class="banner">
  <div class="container">
    <div class="row-fluid">
    <div class="logo-wrap col-lg-2">
      <a class="brand" href="<?= esc_url(home_url('/')); ?>"><img src="/wp-content/themes/qure/dist/images/qure-logo.png" /></a>
    </div>
    <div class="col-lg-8">
      <nav class="nav-primary" role="navigation">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
        endif;
        ?>
      </nav>
    </div>
    <div class="col-lg-2">
      <div id="footer-social">
        <a id="facebook" href="https://www.facebook.com/qurewater" title="Connect with us on Facebook" target="_blank">Facebook</a> <a id="twitter" href="https://twitter.com/QureWater" title="Follow us on Twitter" target="_blank">Twitter</a>
        <a id="pinterest" href="https://www.pinterest.com/qurewater/" title="Visit us on Pinterest" target="_blank">Pinterest</a>
        <a id="instagram" href="https://www.instagram.com/qurewater/" title="Connect with us on Instagram" target="_blank">Instagram</a>
        <a id="youtube" href="https://www.youtube.com/user/qurewater1" title="Connect with us on Instagram" target="_blank">Youtube</a>
      </div>
    </div>
    </div>
  </div>
</header>
