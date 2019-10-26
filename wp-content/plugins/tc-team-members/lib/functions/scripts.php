<?php
 function tc_team_enqueue_scripts() {
 		//Plugin Main CSS File.
  wp_enqueue_style('tc-team-members', plugins_url('/../../assets/css/tc-plugin.css', __FILE__ ) );
  wp_enqueue_style('tc-font-awesome', plugins_url('/../../vendors/font-awesome/css/font-awesome.css', __FILE__ ) );

  }
 //This hook ensures our scripts and styles are only loaded in the admin.
 add_action( 'wp_enqueue_scripts', 'tc_team_enqueue_scripts' );

 if ( function_exists( 'add_theme_support' ) ) {
     add_theme_support( 'post-thumbnails' );
 }

 add_action( 'admin_enqueue_scripts', 'tc_team_admin_style' );

 function tc_team_admin_style() {

  wp_enqueue_style( 'tc_team_admin', plugins_url('/../../assets/css/tc-admin.css',__FILE__ ));

 }

 ?>
