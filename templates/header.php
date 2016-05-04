<header class="banner">
  <div class="container">
    <div class="row-fluid">
    <div class="logo-wrap col-lg-2">
      <a class="brand" href="<?= esc_url(home_url('/')); ?>"><img src="/qure/wp-content/themes/qure-water/dist/images/qure-logo.png" /></a>
    </div>
    <div class="col-lg-8">
      <nav class="nav-primary">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
        endif;
        ?>
      </nav>
    </div>
    <div class="col-lg-2">
      Social icons
    </div>
    </div>
  </div>
</header>
