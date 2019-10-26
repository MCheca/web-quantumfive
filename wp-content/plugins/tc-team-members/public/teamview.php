<?php
/**
 * Handle Team shortcode.
 *
 * @param
 * @return
 */
 function themescode_hex2rgba($color, $opacity = false) {

   $default = 'rgb(0,0,0)';

   //Return default if no color provided
   if(empty($color))
           return $default;
   //Sanitize $color if "#" is provided
         if ($color[0] == '#' ) {
           $color = substr( $color, 1 );
         }

         //Check if color has 6 or 3 characters and get values
         if (strlen($color) == 6) {
                 $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
         } elseif ( strlen( $color ) == 3 ) {
                 $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
         } else {
                 return $default;
         }

         //Convert hexadec to rgb
         $rgb =  array_map('hexdec', $hex);

         //Check if opacity is set(rgba or rgb)
         if($opacity){
           if(abs($opacity) > 1)
             $opacity = 1.0;
           $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
         } else {
           $output = 'rgb('.implode(",",$rgb).')';
         }

         //Return rgb(a) color string
         return $output;
 }

function maintainn_team_shortcode( $attr = array() ) {

  $teamid=$attr['teamid'];
  $post = get_post();
  $bg_color= get_post_meta($teamid , '_tcode_bgcolor','#000000' );
  $rgba_bg_color= themescode_hex2rgba($bg_color,0.7);
  $dscharnum=get_post_meta($teamid , '_tcode_dschrnum',110);
  //column height 
  $mc_height=get_post_meta($teamid , '_tcode_mcolumnheight',390);

?>
<style media="screen">
.tc_overlay {
  background-color: <?php echo $rgba_bg_color; ?>;
}
.tc_member-col-single{
  height:<?php echo $mc_height; ?>px;
}
</style>
<?php

// Get team members attached to this page.
$members = get_post_meta($teamid , '_tcode_teammeta', true );


$output = '';

// Return empty string, if we don't have members.
if ( empty( $members ) ) {
return $output;
}

// We have team members and now we can output them.
$output .= '<div class="tc_team-members">';

foreach ( $members as $member ) {
  $output .= '<div class="tc_team-member tc_member-col-single tc_text-center">';
      $output .= '<div class="tc_member-thumb">';
       $output .= '<img src="' . esc_attr( $member['member_image'] ) . '" alt="' . esc_attr( $member['full_name'] ) . '" />';
        $output .= '<div class="tc_overlay">';
         $output .= '<h3>'. esc_attr( $member['full_name'] ).'</h3>';
          $output .= '<h4 class="tc_job_role">'.esc_attr( $member['job_role'] ).'</h4>';
          if(!empty($member['description'])){
            $output .= '<p class="tc_member-p">'.substr($member['description'],0,$dscharnum).'</p>';
          }

          $output .= '<ul class="tc_social-links tc_text-center">';
          if(!empty($member['facebook_url'])){
            $output .= '<li><a class="facebook round-corner fill" href="' . esc_attr( $member['facebook_url'] ).'"><i class="fa fa-facebook fa-lg "></i></a></li>';
          }
          if(!empty($member['twitter_url'])){
          $output .= '<li><a class="twitter round-corner fill" href="' . esc_attr( $member['twitter_url'] ).'"><i class="fa fa-twitter fa-lg"></i></a></li>';
            }

          if(!empty($member['linkedin_url'])){

         $output .= '<li><a class="linkedin round-corner fill" href="' . esc_attr( $member['linkedin_url'] ).'"><i class="fa fa-linkedin fa-lg"></i></a></li>';

          }
         if(!empty($member['google-plus_url'])){

        $output .= '<li><a class="google-plus round-corner fill" href="' . esc_attr( $member['google-plus_url'] ).'"><i class="fa fa-google-plus fa-lg"></i></a></li>';
       }
       $output .= '</ul>';
      $output .= '</div>';
    $output .= '</div>';
  $output .= '<h3>'. esc_attr( $member['full_name'] ).'</h3>';
  $output .= '<p>'.esc_attr( $member['job_role'] ).'</p>';
  $output .= '</div>';
}

$output .= '</div>';
$output .= '<div style="clear:both;"></div>';
return $output;
}
add_shortcode( 'tc-team-members', 'maintainn_team_shortcode' );
