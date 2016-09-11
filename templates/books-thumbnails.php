<?php 

/**
 * Template Name: Books Thumbnail Layout
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();

?>

<div class="row">

<?php

/*  Query the post  */

		$args = array( 'post_type' => 'books', 'posts_per_page' => -1 );

		$loop = new WP_Query( $args );

		while ( $loop->have_posts() ) : $loop->the_post();
		
		$price = get_post_meta( get_the_ID(), 'price', true );
		$link = get_post_meta( get_the_ID(), 'amazon_link', true );

?>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo the_post_thumbnail(); ?>" alt="<?php echo the_title();?>">
      <div class="caption">
        <h3><?php echo the_title(); ?></h3>
        <p><?php echo the_excerpt(); ?></p>
        <p>
        <a href="<?php echo $link; ?>" class="btn btn-primary" role="button">Buy Now</a>
        <a href="<?php echo get_the_permalink(); ?>" class="btn btn-default" role="button">More Info</a>
        </p>
      </div>
    </div>
  </div>
			
	<?php
		endwhile;
	?>
</div>
<!-- end content -->