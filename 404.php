<?php
/**
 * The 404 template file
 *
 * @package umb
 */

get_header();

?>

<main class="site-content" role="main">

		<h1 class="entry-title"><?php esc_html_e( 'Page Not Found', 'umb' ); ?></h1>

		<div class="intro-text"><p><?php esc_html_e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'umb' ); ?></p></div>

		<?php
		get_search_form(
			array(
				'label' => __( '404 not found', 'umb' ),
			)
		);
		?>

<?php
get_footer();