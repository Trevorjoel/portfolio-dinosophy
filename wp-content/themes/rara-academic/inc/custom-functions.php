<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Rara_Academic
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function rara_academic_body_classes( $classes ) {
    
    global $post;
	
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of custom-background-color to sites with a custom background color.
    if ( get_background_color() != 'ffffff' ) {
		$classes[] = 'custom-background-color';
	}
    
    if( is_404()){
        $classes[] = 'full-width';
    }

     if( !( is_active_sidebar( 'right-sidebar' ) ) ) {
        $classes[] = 'full-width'; 
    }
    if( rara_academic_is_woocommerce_activated() && ( is_shop() || is_product_category() || is_product_tag() || 'product' === get_post_type() ) && ! is_active_sidebar( 'shop-sidebar' ) ){
        $classes[] = 'full-width';
    }
    
    if( is_page() ){
        $sidebar_layout = rara_academic_sidebar_layout();
        if( $sidebar_layout == 'no-sidebar' )
        $classes[] = 'full-width';
    }

	return $classes;
}
add_filter( 'body_class', 'rara_academic_body_classes' );

/**
 * Hook to move comment text field to the bottom in WP 4.4
 * 
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-move-comment-text-field-to-bottom-in-wordpress-4-4/  
 */
function rara_academic_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'rara_academic_move_comment_field_to_bottom' );

/**
 * Return sidebar layouts for pages
*/
function rara_academic_sidebar_layout(){
    global $post;
    
    if( get_post_meta( $post->ID, 'rara_academic_sidebar_layout', true ) ){
        return get_post_meta( $post->ID, 'rara_academic_sidebar_layout', true );    
    }else{
        return 'right-sidebar';
    }
}

if( ! function_exists( 'rara_academic_pagination' ) ) :
/**
 * Pagination
*/
function rara_academic_pagination(){
    
    if( is_single() ){
        the_post_navigation();
    }else{
        the_posts_pagination( array(
			'prev_text'   => __( '<<', 'rara-academic' ),
			'next_text'   => __( '>>', 'rara-academic' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'rara-academic' ) . ' </span>',
		 ) );

    }
    
}
endif;


if( ! function_exists( 'rara_academic_get_social_links' ) ) :
/**
 * Get Social Links
*/
function rara_academic_get_social_links(){
    $facebook  = get_theme_mod( 'rara_academic_facebook' );
    $twitter   = get_theme_mod( 'rara_academic_twitter' );
    $pinterest = get_theme_mod( 'rara_academic_pinterest' );
    $linkedin  = get_theme_mod( 'rara_academic_linkedin' );
    $gplus     = get_theme_mod( 'rara_academic_gplus' );
    $instagram = get_theme_mod( 'rara_academic_instagram' );
    $youtube   = get_theme_mod( 'rara_academic_youtube' );
    
    if( $facebook || $twitter || $pinterest || $linkedin || $gplus || $instagram || $youtube ){
    ?>
    <ul class="social-networks">
        <?php if( $facebook ){ ?>
        <li><a href="<?php echo esc_url( $facebook ); ?>" class="fa fa-facebook" target="_blank" title="<?php esc_attr_e( 'Facebook', 'rara-academic' );?>"></a></li>
        <?php } if( $twitter ){ ?>
        <li><a href="<?php echo esc_url( $twitter ); ?>" class="fa fa-twitter" target="_blank" title="<?php esc_attr_e( 'Twitter', 'rara-academic' );?>"></a></li>
        <?php } if( $pinterest ){ ?>
        <li><a href="<?php echo esc_url( $pinterest ); ?>" class="fa fa-pinterest" target="_blank" title="<?php esc_attr_e( 'Pinterest', 'rara-academic' );?>"></a></li>
        <?php } if( $linkedin ){ ?>
        <li><a href="<?php echo esc_url( $linkedin ); ?>" class="fa fa-linkedin" target="_blank" title="<?php esc_attr_e( 'LinkedIn', 'rara-academic' );?>"></a></li>
        <?php } if( $gplus ){ ?>
        <li><a href="<?php echo esc_url( $gplus ); ?>" class="fa fa-google-plus" target="_blank" title="<?php esc_attr_e( 'Google Plus', 'rara-academic' );?>"></a></li>
        <?php } if( $instagram ){ ?>
        <li><a href="<?php echo esc_url( $instagram ); ?>" class="fa fa-instagram" target="_blank" title="<?php esc_attr_e( 'Instagram', 'rara-academic' );?>"></a></li>
        <?php } if( $youtube ){ ?>
        <li><a href="<?php echo esc_url( $youtube ); ?>" class="fa fa-youtube" target="_blank" title="<?php esc_attr_e( 'YouTube', 'rara-academic' );?>"></a></li>
        <?php } ?>
    </ul>
    <?php
    }
}
endif;