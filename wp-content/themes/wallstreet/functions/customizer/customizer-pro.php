<?php
//Pro Button
function wallstreet_pro_customizer( $wp_customize ) {
class WP_Pro_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-box">
       <a href="<?php echo 'http://webriti.com/wallstreet/';?>" target="_blank" class="upgrade" id="review_pro"><?php _e('Upgrade to pro','wallstreet' ); ?></a>
		
	</div>
    <?php
    }
}
$wp_customize->add_section( 'wallstreet_pro_section' , array(
		'title'      => __('Upgrade to pro', 'wallstreet'),
		'priority'   => 1000,
   	) );

$wp_customize->add_setting(
    'upgrade_pro',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Pro_Customize_Control( $wp_customize, 'upgrade_pro', array(
		'section' => 'wallstreet_pro_section',
		'setting' => 'upgrade_pro',
    ))
);


class WP_Review_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	  <div class="pro-box">
     <a href="<?php echo 'https://wordpress.org/support/view/theme-reviews/wallstreet#postform/';?>" target="_blank" class="review" id="review_pro"><?php _e('ADD YOUR REVIEW','wallstreet' ); ?></a>
	 </div>
    <?php
    }
}

$wp_customize->add_setting(
    'pro_Review',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Review_Customize_Control( $wp_customize, 'pro_Review', array(	
		'section' => 'wallstreet_pro_section',
		'setting' => 'pro_Review',
    ))
);

class WP_document_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="pro-box">
	 <a href="<?php echo 'http://webriti.com/help/';?>" target="_blank" class="document" id="review_pro"><?php _e( 'DOCUMENTATION','wallstreet' ); ?></a>
	 
	 <div>
	 <div class="pro-vesrion">
	 <?php _e('The Pro Version gives you more opportunities to enhance your site and business. In order to create effective online presence one have to showcase their wide range of products, have to use contact us enquiry form, have to make effective about us page, have to introduce team members, etc etc . The pro version will give it all. Buy the pro version and give us a chance to serve you better.','wallstreet');?>
	 </div>
    <?php
    }
}

$wp_customize->add_setting(
    'doc_Review',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_document_Customize_Control( $wp_customize, 'doc_Review', array(	
		'section' => 'wallstreet_pro_section',
		'setting' => 'doc_Review',
    ))
);

}
add_action( 'customize_register', 'wallstreet_pro_customizer' );
?>