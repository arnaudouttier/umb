<?php
/**
 * The sidebars template file
 *
 * @package umb
 */

$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
$has_sidebar_2 = is_active_sidebar( 'sidebar-2' );
?>


<?php if ( $has_sidebar_1 || $has_sidebar_2 ) : ?>

	<aside class="sidebar-widgets-outer-wrapper" role="complementary">

		<?php if ( $has_sidebar_1 ) : ?>

			<div class="sidebar-widgets column-one grid-item">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>

		<?php endif ; ?>

		<?php if ( $has_sidebar_2 ) : ?>

			<div class="sidebar-widgets column-two grid-item">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>

		<?php endif ; ?>

	</aside><!-- .sidebar-widgets-outer-wrapper -->

<?php endif; ?>
		