<?php
$type = 'products';
$args=array(
  'post_type' => 'qure-faq',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'caller_get_posts'=> 1,
  'order' => 'asc',
 );

$my_query = null;
$my_query = new WP_Query($args);
$num = 1;
if( $my_query->have_posts() ) {
  while ($my_query->have_posts()) : $my_query->the_post(); ?>
  	<div class="accordion">
		<div class="accordion-section">
			<a class="accordion-section-title <?php echo($num == 1 ? 'active' : '');?>" href="#" data-toggle="collapse" data-target="#accordion-<?php echo $num; ?>"><i class="fa fa-<?php echo($num == 1 ? 'minus' : 'plus');?>-circle" style="padding-right: 15px;"></i><?php echo the_title(); ?></a>
			<div id="accordion-<?php echo $num; ?>" class="accordion-section-content">
	    		<p><?php the_content(); ?></p>
	    	</div>
	    </div>
	</div>
    <?php
    $num++;
  endwhile;
}
wp_reset_query();  // Restore global post data stomped by the_post().
?>