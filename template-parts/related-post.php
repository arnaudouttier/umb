<?php
/**
 * The related post template file
 *
 * @package umb
 */

/* Get count */
$count = get_theme_mod( 'post_related_count', '3' );
if ( ! $count || 0 == $count ) {
	return;
}

/* Prevent stupid shit */
if ( $count > 99 ) {
	$count = 10;
}

/* Get Current post */
$Current_post_id = get_the_ID();

/* What should be displayed? */
$display = get_theme_mod( 'post_related_displays', 'related_category' );

/* Related query arguments */
$args = array(
	'posts_per_page' => $count,
	'post__not_in'   => array( $Current_post_id ),
	'tax_query' => array(
		array(
			'taxonomy' => 'post_format',
			'field'    => 'slug',
			'terms'    => array( 'post-format-quote' ),
			'operator' => 'NOT IN',
		)
	 )
);
if ( 'related_category' == $display ) {
	$cats = wp_get_post_terms( $Current_post_id, 'category' ); 
	$cats_ids = array();
	foreach( $cats as $umb_related_cat ) {
		$cats_ids[] = $umb_related_cat->term_id; 
	}
	if ( ! empty( $cats_ids ) ) {
		$args['category__in'] = $cats_ids;
	}
} elseif ( 'random' == $display ) {
	$args['orderby'] = 'rand';
}

/* Run Query */
$umb_query = new wp_query( $args );

/* Display related items */
if ( $umb_query->have_posts() ) {
?>

	<section class="umb-related-posts-wrapper">

		<div class="umb-related-post-title">
			<h2><?php esc_html_e('Related Posts'  , 'umb') ?></h2>
		</div>
				
		<div class="umb-related-posts-wrapper-inner">

			<?php
			/* Loop through related posts */
			$count = 0;
			 while (  $umb_query->have_posts() ) :  $umb_query->the_post();
			$count ++; 
			?>

			<div class="umb-related-post">
				
				<?php if ( has_post_thumbnail() ) : ?>
					<a  class="hover-rotate-scale" href="<?php the_permalink(); ?>">
						<img src="<?php echo esc_url(get_the_post_thumbnail_url()) ?>" alt="">
					</a>
				<?php else : ?>
					<a class="hover-rotate-scale" href="<?php the_permalink(); ?>">
						<img src="<?php echo esc_attr(umb_catch_that_image()) ?>" alt="">
					</a>
				<?php endif; ?>

				<div class="umb-related-post-content">
					<h3 class="umb-related-post-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
					<div class="umb-related-post-meta">
						<?php echo get_the_date(); ?>
					</div>
				</div><!-- .related-post-content -->
			
			</div><!-- .umb-related-post -->

			<?php endwhile; ?>

		</div><!-- umb-related-posts-wrap-inner	  -->

	</section><!-- .umb-related-posts-wrapper -->

<?php } /* End related items */

/* Reset post data */
wp_reset_postdata();