<?php 

/**
 * Template Name: Team Directory Layout Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();

/*  Query the post  */

		$args = array( 'post_type' => 'team', 'posts_per_page' => -1 );

		$loop = new WP_Query( $args );

		while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
			<div class="row">
			
				<div class="media">
			
					<div class="media-left">
			
						<img class="media-object" src="<?php echo the_post_thumbnail_url( 'thumbnail' ); ?>">
			
					</div> <!-- /.media-left-->
			
					<div class="media-body">
			
						<h4 class="media-heading"> <?php echo the_title(); ?> </h3>
						<?php echo the_content(); ?>	
					
					</div> <!-- /.media-body -->
			
				</div> <!-- /.media -->
			
			</div> <!-- /.row -->
			
		<?php endwhile; ?>
    <!-- end content -->