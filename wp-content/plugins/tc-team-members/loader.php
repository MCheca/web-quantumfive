<?php
/*
Require  all lib files , functions

*/
 require_once(plugin_dir_path( __FILE__ ).'/lib/cpt.php' );
 require_once(plugin_dir_path( __FILE__ ).'/public/teamview.php' );
 // Add the metabox class (CMB2)
 if ( file_exists( dirname( __FILE__ ) . '/lib/metaboxes/init.php' ) ) {
     require_once dirname( __FILE__ ) . '/lib/metaboxes/init.php';
 } elseif ( file_exists( dirname( __FILE__ ) . '/lib/metaboxes/init.php' ) ) {
     require_once dirname( __FILE__ ) . '/lib/metaboxes/init.php';
 }

 // Create the metabox class (CMB2)
 require_once('lib/functions/metaboxes.php');
 // Enqueue admin styles
 require_once('lib/functions/scripts.php');
 require_once('lib/functions/customcolumn.php');

 // Sub Menu Page


 add_action('admin_menu', 'tc_teammember_menu_init');



 function tc_teammember_menu_help(){
   include('lib/tc-teammember-help-upgrade.php');
 }





 function tc_teammember_menu_init()
   {

     add_submenu_page('edit.php?post_type=tcmembers', __('Help & Upgrade','team-members'), __('Help & Upgrade','team-members'), 'manage_options', 'tc_teammember_menu_help', 'tc_teammember_menu_help');

   }




 ?>
