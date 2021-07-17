<?php
/**
 * The featured post template file
 *
 * @package umb
 */
	
function umb_custom_meta() 
{
    add_meta_box( 'umb_meta', __( 'Featured Posts', 'umb' ), 'umb_meta_callback', 'post' );
}

function umb_meta_callback( $post ) 
{
    $featured = get_post_meta( $post->ID );
    ?>
 
    <p>
        <div class="umb-row-content">
            <label for="meta-checkbox">
                <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['meta-checkbox'] ) ) checked( $featured['meta-checkbox'][0], 'yes' ); ?> />
                <?php  esc_html_e( 'Featured this post', 'umb' )?>
            </label>
            
        </div>
    </p>
 
    <?php
}
add_action( 'add_meta_boxes', 'umb_custom_meta' );


/**
 * Saves the custom meta input
 */
function umb_meta_save( $post_id ) {
 
    /* Checks save status */
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
 
    /* Exits script depending on save status */
    if ( $is_autosave || $is_revision  ) {
        return;
    }
 
    /* Checks for input and saves */
    if( isset( $_POST[ 'meta-checkbox' ] ) ) {
        update_post_meta( $post_id, 'meta-checkbox', 'yes' );
    } else {
        update_post_meta( $post_id, 'meta-checkbox', '' );
    }
 
}
add_action( 'save_post', 'umb_meta_save' );