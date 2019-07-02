<?php
function sm_custom_meta() {
    add_meta_box( 'sm_meta', __( 'المنشورات المميزة', 'sm-textdomain' ), 'sm_meta_callback', 'blogs' , 'side');
}
function sm_meta_callback( $post ) {
    $featured = get_post_meta( $post->ID );
    ?>

	<p>
    <div class="sm-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="featured-blog" id="featured-blog" value="yes" <?php if ( isset ( $featured['featured-blog'] ) ) checked( $featured['featured-blog'][0], 'yes' ); ?> />
            <?php _e( 'تحديد هذا التدوينة كمميزة', 'sm-textdomain' )?>
        </label>

    </div>
</p>

    <?php
}
add_action( 'add_meta_boxes', 'sm_custom_meta' );

/**
 * Saves the custom meta input
 */
function sm_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // Checks for input and saves
    if( isset( $_POST[ 'featured-blog' ] ) ) {
        update_post_meta( $post_id, 'featured-blog', 'yes' );
    } else {
        update_post_meta( $post_id, 'featured-blog', '' );
    }

}
add_action( 'save_post', 'sm_meta_save' );