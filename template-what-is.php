<?php
/**
 * Template Name: What Is page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'what-is'); ?>
<?php endwhile; ?>
