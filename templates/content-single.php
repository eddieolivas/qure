<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <?php if(get_post_type() != 'qure-faq') { ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php get_template_part('templates/entry-meta'); ?>
      <?php } ?>
    </header>
    <div class="entry-content">
      <?php if(get_post_type() == 'qure-faq') { ?>
        <hr/>
      <?php } ?>
      <?php the_content(); ?>
      <?php if(get_post_type() == 'qure-faq') { ?>
        <a href="/qure-product/faq">&lt;&lt;Back to FAQs</a>
      <?php } ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
