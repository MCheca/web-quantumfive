<?php

add_filter('manage_edit-tcmembers_columns', 'add_new_tcmembers_columns');
function add_new_tcmembers_columns($tcmembers_columns) {


  $new_columns= array(
    'cb' => '<input type="checkbox" />',
    'title' => __( 'Title' ),
    'shortcode' => __( 'shortcode' ),
    'author' => __( 'Author' ),
    'date' => __( 'Date' )
  );


    return $new_columns;
}

add_action('manage_tcmembers_posts_custom_column', 'manage_tcmembers_columns', 10, 2);

function manage_tcmembers_columns( $column,$post_ID) {
    switch ( $column ) {
	case 'shortcode' :
		global $post;
		$slug = '' ;
		$slug = $post->ID;
    $shortcode = '[tc-team-members teamid="'.$slug.'"]';
    echo $shortcode;
    break;
    }
}


 ?>
