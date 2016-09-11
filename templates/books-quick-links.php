<?php 

/**
 * Template Name: Books Layout Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();

/*  Query the post  */

		$args = array( 'post_type' => 'books', 'posts_per_page' => -1 );

		$loop = new WP_Query( $args );

		while ( $loop->have_posts() ) : $loop->the_post(); 
		
		$price = get_post_meta( get_the_ID(), 'price', true );
		$link = get_post_meta( get_the_ID(), 'amazon_link', true );
		$publish_date = get_post_meta( get_the_ID(), 'publish_date', true );?>

			<div id="book-title" class="book-title">
			
				<table style="width:100%;">
					<tr style="margin-bottom:10px">
						<td class="event_date"><?php echo the_title(); ?></td>
							<td><a style="float:right;" href="<?php echo $link; ?>" target="_blank" class="-button --book-now book-link">Buy Now</a></td>
					</tr>
				</table>
			    	
			</div>
				
			<? endwhile; ?>
    <!-- end content -->