<?php
add_action( 'wp_enqueue_scripts', 'sfbap1_enqueue_styles', 10);
add_action( 'admin_enqueue_scripts', 'sfbap1_admin_enqueue_styles', 10);

function sfbap1_enqueue_styles() {
	
		wp_enqueue_script('jquery');
		
		wp_register_script( 'sfbap1_jquery', plugin_dir_url( __FILE__ ) . '../bower_components/jquery/dist/jquery.min.js', array( 'jquery' ) );
		wp_register_script( 'sfbap1_codebird', plugin_dir_url( __FILE__ ) . '../bower_components/codebird-js/codebird.js', array( 'jquery' ) );
		wp_register_script( 'sfbap1_doT', plugin_dir_url( __FILE__ ) . '../bower_components/doT/doT.min.js', array( 'jquery' ) );
		wp_register_script( 'sfbap1_moment', plugin_dir_url( __FILE__ ) . '../bower_components/moment/min/moment.min.js', array( 'jquery' ) );
		wp_register_script( 'sfbap1_socialfeed', plugin_dir_url( __FILE__ ) . '../bower_components/social-feed/js/jquery.socialfeed.js', array( 'jquery' ));
		wp_register_style( 'sfbap1_socialfeed_style', plugin_dir_url( __FILE__ )  . '../bower_components/social-feed/css/jquery.socialfeed.css', false, '1.0.0' );

		wp_enqueue_style( 'sfbap1_jquery');
		wp_enqueue_style( 'sfbap1_socialfeed_style');
		wp_enqueue_style( 'sfbap1_fontawesome_style');
   		wp_enqueue_script( 'sfbap1_codebird');
   		wp_enqueue_script( 'sfbap1_doT');
   		wp_enqueue_script( 'sfbap1_moment');
   		wp_enqueue_script( 'sfbap1_socialfeed');



   			wp_register_script( 'sfbap1_en', plugin_dir_url( __FILE__ ) . '../bower_components/moment/locale/en-ca.js', array( 'jquery' ) );
	   		wp_enqueue_script( 'sfbap1_en');
		
			

}


function sfbap1_admin_enqueue_styles() {
	
		wp_enqueue_script('jquery');
		wp_register_script( 'sfbap1_script', plugin_dir_url( __FILE__ ) . '../js/sfbap1-script.js', array( 'jquery' ) );
		wp_enqueue_script( 'sfbap1_script');
		 wp_enqueue_style( 'wp-color-picker' );
    	wp_enqueue_script( 'wp-color-picker-script',  plugin_dir_url(__FILE__) .'../js/colorpicker.js', array( 'wp-color-picker' ), false, true );
		
}

add_action( 'admin_enqueue_scripts', function(){

    wp_enqueue_script( 'sfbap1-scriptjs', 'js/sfbap1-script.js', array() );
    wp_enqueue_media();
});