<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div class="wrap" role="document">
        <div class="content row content-row">
          <?php if(!is_page(83)) { ?>
          <?php 
            $thumb_id = get_post_thumbnail_id();
            $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
            $thumb_url = $thumb_url_array[0];
            if($thumb_url && strlen($thumb_url) == 0) {
              $thumb_url = '/qure/wp-content/uploads/2016/05/page-header.jpg';
            }
            $title = get_the_title();
            if(is_front_page() || is_home()) {
              $title = "Blog";
            }
          ?>
          <div class="page-header">
            <img width="100%" src="<?php echo $thumb_url; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="meet-the-team" sizes="100vw, 1920px">
            <div class="container">
              <div class="page-title-container">
                <div class="page-title-wrap">
                  <div class="page-title"><?php echo $title; ?></div>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
          <?php } ?>
          <main class="main">
            <?php include Wrapper\template_path(); ?>
          </main><!-- /.main -->
          <?php if (Setup\display_sidebar()) : ?>
            <aside class="sidebar">
              <?php include Wrapper\sidebar_path(); ?>
            </aside><!-- /.sidebar -->
          <?php endif; ?>
        </div><!-- /.content -->
        <?php if(is_page(83)) { ?>
        </div><!-- /.container -->
        <?php } ?>
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
