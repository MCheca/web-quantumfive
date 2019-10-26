<?php
add_action( 'cmb2_admin_init', 'tc_team_metaboxes' );
function tc_team_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_tcode_';

    /**
     * Initiate the metabox
     */
    $tc_team= new_cmb2_box( array(
        'id'            => 'tcode-tm-meta',
        'title'         => __('Team Members', 'tc-team-members' ),
        'object_types'  => array('tcmembers'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );
 $group_field_id = $tc_team->add_field( array(
    'id'          => $prefix .'teammeta',
    'type'        => 'group',
    'description' => __( 'Generates reusable form entries', 'tc-team-members' ),
    'options'     => array(
        'group_title'   => __( 'Team Member {#}', 'tc-team-members' ),
        'add_button'    => __( 'Add New Member', 'tc-team-members' ),
        'remove_button' => __( 'Remove Member', 'tc-team-members' ),
        'sortable'      => true, // beta
        // 'closed'     => true, // true to have the groups closed by default
    ),
) );

// Id's for group's fields only need to be unique for the group. Prefix is not needed.
$tc_team->add_group_field( $group_field_id,array(
    'name' => 'Personal Info',
    'desc' => '',
    'type' => 'title',
    'id'   => 'personal_info'
) );
$tc_team->add_group_field( $group_field_id, array(
    'name' => 'Full Name',
    'id'   => 'full_name',
    'type' => 'text',
    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
) );
$tc_team->add_group_field( $group_field_id, array(
    'name' => 'Job Role',
    'id'   => 'job_role',
    'type' => 'text',
    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
) );
$tc_team->add_group_field( $group_field_id, array(
    'name' => 'Description',
    'description' => '',
    'id'   => 'description',
    'type' => 'textarea_small',
    'row_classes' => 'de_first',
) );

$tc_team->add_group_field( $group_field_id, array(
    'name' => 'Member Image'.' <a class="tc_tooltip" title="'.__( 'Recomended 270x300 px', 'tc-team-members' ).'"><span class="tc-help dashicons dashicons-editor-help"></span></a>',
    'id'   => 'member_image',
    'type' => 'file',
) );
$tc_team->add_group_field( $group_field_id,array(
    'name' => 'Social Profile',
    'desc' => 'Add Yours Social Links in the following fields to show up on Member Image Hover.',
    'type' => 'title',
    'id'   => 'social_profile'
) );
$tc_team->add_group_field( $group_field_id, array(
    'name' => 'Facebook',
    'id'   => 'facebook_url',
    'type' => 'text',
    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
) );
$tc_team->add_group_field( $group_field_id, array(
    'name' => 'Twiter',
    'id'   => 'twitter_url',
    'type' => 'text',
    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
) );
$tc_team->add_group_field( $group_field_id, array(
    'name' => 'Linked In',
    'id'   => 'linkedin_url',
    'type' => 'text',
    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
) );

$tc_team->add_group_field( $group_field_id, array(
    'name' => 'Google +',
    'id'   => 'google-plus_url',
    'type' => 'text',
    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
) );

// PRO version
// Typography
$setting_group = new_cmb2_box( array(
    'id' => $prefix . 'typo_settings_head',
    'title' => '<span style="font-weight:600; font-size:18px;">'.__( 'General Settings', 'team-members' ).'</span>',
    'object_types' => array( 'tcmembers' ),
    'context' => 'side',
    'priority' => 'low',
));

$setting_group->add_field( array(
    'name' => __( 'Transparent Background color', 'tc-team-members' ),
    'id' => $prefix . 'bgcolor',
    'desc' =>'It will change hover overlay Transparent background color.',
    'type' => 'colorpicker',
    'row_classes' => 'de_first de_hundred de_color de_input',
    'default'=>'#000000',
));

$setting_group->add_field( array(
    'name' => __( 'Description Characters Number', 'tc-team-members' ),
    'id' => $prefix . 'dschrnum',
    'desc' =>'Number of Characters shows on Description.',
    'type' => 'text',
    'row_classes' => 'de_first de_hundred de_color de_input',
    'default'=>'110',
));

$setting_group->add_field( array(

      'name'    =>__( 'Members Box Column Height(px)', 'tc-team-members' ),
      'default' => '390',
      'id'      => $prefix.'mcolumnheight',
      'desc' =>'Adjust Members Box Column Height.',
      'type'    => 'text_small',
      'attributes' => array(
          'type' => 'number',
        ),
    ) );

$pro_group = new_cmb2_box( array(
    'id' => $prefix . 'pro_metabox',
    'title' => '<span><strong>PRO Version is Best for You.</strong></span>',
    'object_types' => array( 'tcmembers' ),
    'context' => 'side',
    'priority' => 'low',
    'row_classes' => 'de_hundred de_heading',
));

    $pro_group->add_field( array(
        'name' => '',
            'desc' => '<div>
             <span class="dashicons dashicons-arrow-right-alt2"></span> 8 Different Layout Style.</strong> <br/>
			 <span class="dashicons dashicons-arrow-right-alt2"></span> 5 Nice Image Hover Effects. <br/>
			 <span class="dashicons dashicons-arrow-right-alt2"></span> Overlay effects for Layout Style 5 & 6.. <br/>
			 <span class="dashicons dashicons-arrow-right-alt2"></span> Background & Titles Color Hover Effects. <br/>
             <span class="dashicons dashicons-arrow-right-alt2"></span> 6 Different Social Icon Style. <br/>
             <span class="dashicons dashicons-arrow-right-alt2"></span> Support within 6 hours. <br/>
             <span class="dashicons dashicons-arrow-right-alt2"></span> Price is very Reasonable. <br/>
             <span class="dashicons dashicons-arrow-right-alt2"></span> Amazing setting panel. <br/>
             <span class="dashicons dashicons-arrow-right-alt2"></span> Unlimited items. <br/>
             <span class="dashicons dashicons-arrow-right-alt2"></span> Background Color Changeable. <br/>
             <span class="dashicons dashicons-arrow-right-alt2"></span> Text Color Changeable. <br/>
             <span class="dashicons dashicons-arrow-right-alt2"></span> Text Align changeable <br/>
             <span class="dashicons dashicons-arrow-right-alt2"></span> Social Icon Align changeable <br/>
             <span class="dashicons dashicons-arrow-right-alt2"></span> Unlimited Team Member Generate. <br/>
             <span class="dashicons dashicons-arrow-right-alt2"></span> And more...<br/><br/>
             <a class="tc-button tc-btn-red"
               target="_blank" href="https://www.themescode.com/items/tc-team-members/">PRO Features</a><br/>

               </div>',

            'id'   => $prefix . 'pro_desc',
            'type' => 'title',
            'row_classes' => 'de_hundred de_info de_info_side',
    ));

    $pro_group = new_cmb2_box( array(
        'id' => $prefix . 'pro_metabox',
        'title' => '<span><strong>Learn WordPress.</strong></span>',
        'object_types' => array( 'tcmembers' ),
        'context' => 'side',
        'priority' => 'low',
        'row_classes' => 'de_hundred de_heading',
    ));

    $pro_group->add_field( array(
        'name' => '',
            'desc' => '',
            'id'   => $prefix . 'wpbrim_learn_wp',
            'type' => 'title',
            'row_classes' => 'de_hundred de_info de_info_side',
    ));

    // Video Tutorials

    $tc_video_group = new_cmb2_box( array(
        'id' => $prefix . 'tc_video_metabox',
        'title' => '<span style="font-weight:bold;">'.__( 'Video Tutorials', 'team-members' ).'</span>',
        'object_types' => array( 'tcmembers' ),
        'context' => 'side',
        'priority' => 'low',
        'row_classes' => 'de_hundred de_heading',
    ));

        $tc_video_group->add_field( array(
            'name' => '',
                'desc' => 'Watch wpbrim Online Courses on Youtube and brush up your wordpress skills. Ready ?

                	 <p><a class="ph-button ph-btn-orange" href="https://goo.gl/PFkmUu" target="_blank">Watch Video Tutorials</a></p>',
                'id'   => $prefix . 'tc_video__desc',
                'type' => 'title',
                'row_classes' => 'de_hundred de_info de_info_side',
        ));



}
 ?>
