<?php
// Custom Post Type Setup
add_action( 'init', 'tc_team_members_post_type' );
function tc_team_members_post_type() {
	$labels = array(
		'name' => __('TC Team Members', 'tc-team-members'),
		'singular_name' => __('TC Team Member', 'tc-team-members'),
		'all_items' => __('All Teams', 'tc-team-members' ),
		'add_new' => __('Add New Member', 'tc-team-members'),
		'add_new_item' => __('Add New Team Member', 'tc-team-members'),
		'edit_item' => __('Edit Team Member', 'tc-team-members'),
		'new_item' => __('New Team Member', 'tc-team-members'),
		'view_item' => __('View Team Member', 'tc-team-members'),
		'search_items' => __('Search Team Members', 'tc-team-members'),
		'not_found' => __('No Team Member', 'tc-team-members'),
		'not_found_in_trash' => __('No Team Members found in Trash', 'tc-team-members'),
		'parent_item_colon' => '',
		'menu_name' => __('TC Team Members', 'tc-team-members') // this name will be shown on the menu
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 21,
		'menu_icon' => 'dashicons-groups',
		'supports' => array('title')
	);
	register_post_type('tcmembers', $args);
}
