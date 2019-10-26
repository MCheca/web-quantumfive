<?php
wp_nonce_field( 'sfbap1_ui_meta_box_nonce', 'sfbap1_meta_box_nonce' );

global $post;
$sfbap1_show_photos_from = get_post_meta($post->ID, '_sfbap1_show_photos_from', true);
$sfbap1_user_id = get_post_meta($post->ID, '_sfbap1_user_id', true);
$sfbap1_hashtag = get_post_meta($post->ID, '_sfbap1_hashtag', true);
$sfbap1_location = get_post_meta($post->ID, '_sfbap1_location', true);
$sfbap1_container_width = get_post_meta($post->ID, '_sfbap1_container_width', true);
$sfbap1_date_posted = get_post_meta($post->ID, '_sfbap1_date_posted', true);
$sfbap1_profile_picture = get_post_meta($post->ID, '_sfbap1_profile_picture', true);
$sfbap1_caption_text = get_post_meta($post->ID, '_sfbap1_caption_text', true);
$sfbap1_link_photos_to_instagram = get_post_meta($post->ID, '_sfbap1_link_photos_to_social_feed', true);
$sfbap1_show_photos_only = get_post_meta($post->ID, '_sfbap1_show_photos_only', true);
$sfbap1_number_of_photos = get_post_meta($post->ID, '_sfbap1_number_of_photos', true);
$sfbap1_feed_style = get_post_meta($post->ID, '_sfbap1_feed_style', true);
$sfbap1_limit_post_characters = get_post_meta($post->ID, '_sfbap1_limit_post_characters', true);
$sfbap1_thumbnail_size = get_post_meta($post->ID, '_sfbap1_thumbnail_size', true);
$sfbap1_column_count = get_post_meta($post->ID, '_sfbap1_column_count', true);
$sfbap1_feed_post_size = get_post_meta($post->ID, '_sfbap1_feed_post_size', true);
$sfbap1_theme_selection = get_post_meta($post->ID, '_sfbap1_theme_selection', true);
$sfbap1_private_access_token = get_post_meta($post->ID, '_sfbap1_private_access_token', true);

$sfbap1_enable_facebook_feed = get_post_meta($post->ID, '_sfbap1_enable_facebook_feed', true);
$sfbap1_enable_twitter_feed = get_post_meta($post->ID, '_sfbap1_enable_twitter_feed', true);
$sfbap1_enable_instagram_feed = get_post_meta($post->ID, '_sfbap1_enable_instagram_feed', true);
$sfbap1_enable_pinterest_feed = get_post_meta($post->ID, '_sfbap1_enable_pinterest_feed', true);
$sfbap1_enable_google_feed = get_post_meta($post->ID, '_sfbap1_enable_google_feed', true);
$sfbap1_enable_vk_feed = get_post_meta($post->ID, '_sfbap1_enable_vk_feed', true);
$sfbap1_enable_rss_feed = get_post_meta($post->ID, '_sfbap1_enable_rss_feed', true);


$sfbap1_facebook_page_id = get_post_meta($post->ID, '_sfbap1_facebook_page_id', true);
$sfbap1_facebook_access_token = get_post_meta($post->ID, '_sfbap1_facebook_access_token', true);

$sfbap1_show_photos_from_twitter = get_post_meta($post->ID, '_sfbap1_show_photos_from_twitter', true);
$sfbap1_user_id_twitter = get_post_meta($post->ID, '_sfbap1_user_id_twitter', true);
$sfbap1_hashtag_twitter = get_post_meta($post->ID, '_sfbap1_hashtag_twitter', true);


$sfbap1_show_photos_from_instagram = get_post_meta($post->ID, '_sfbap1_show_photos_from_instagram', true);
$sfbap1_user_id_instagram = get_post_meta($post->ID, '_sfbap1_user_id_instagram', true);
$sfbap1_hashtag_instagram = get_post_meta($post->ID, '_sfbap1_hashtag_instagram', true);

$sfbap1_pinterest_board = get_post_meta($post->ID, '_sfbap1_pinterest_board', true);
$sfbap1_vk_hashtag = get_post_meta($post->ID, '_sfbap1_vk_hashtag', true);

$sfbap1_number_twitter = get_post_meta($post->ID, '_sfbap1_number_twitter', true);

$sfbap1_number_facebook = get_post_meta($post->ID, '_sfbap1_number_facebook', true);
$sfbap1_number_twitter = get_post_meta($post->ID, '_sfbap1_number_twitter', true);
$sfbap1_number_instagram = get_post_meta($post->ID, '_sfbap1_number_instagram', true);
$sfbap1_number_pinterest = get_post_meta($post->ID, '_sfbap1_number_pinterest', true);
$sfbap1_number_vk = get_post_meta($post->ID, '_sfbap1_number_vk', true);
$sfbap1_date_posted_lang = get_post_meta($post->ID, '_sfbap1_date_posted_lang', true);
$sfbap1_social_icon = get_post_meta($post->ID, '_sfbap1_social_icon', true);

$sfbap1_social_card_width = get_post_meta($post->ID, '_sfbap1_social_card_width', true);
$sfbap1_social_card_background_color = get_post_meta($post->ID, '_sfbap1_social_card_background_color', true);
$sfbap1_heading_font_size = get_post_meta($post->ID, '_sfbap1_heading_font_size', true);
$sfbap1_caption_font_size = get_post_meta($post->ID, '_sfbap1_caption_font_size', true);
$sfbap1_social_card_heading_color = get_post_meta($post->ID, '_sfbap1_social_card_heading_color', true);
$sfbap1_social_card_content_color = get_post_meta($post->ID, '_sfbap1_social_card_content_color', true);
$sfbap1_social_card_date_color = get_post_meta($post->ID, '_sfbap1_social_card_date_color', true);
$sfbap1_feed_profile_style = get_post_meta($post->ID, '_sfbap1_feed_profile_style', true);
$sfbap1_hide_media = get_post_meta($post->ID, '_sfbap1_hide_media', true);







?>
<script type="text/javascript">
      if(typeof jQuery == 'undefined'){
        document.write('<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></'+'script>');
  }
  jQuery(document).ready( function($) {

    var selected_feed_style = $('input[name=sfbap1_feed_style]:checked', '#sfbap1_style_selection_option').val();
    if(selected_feed_style == 'thumbnails'){
      $('#sfbap1_thumbnail_style_options').show();
      $('#sfbap1_column_count_settings').hide();
      $('#sfbap1_thumbnails_image').css('border','2px inset #858585');
      $('#sfbap1_masonry_image').css('border','none');
      $('#sfbap1_blog_image').css('border','none');
    }
    if(selected_feed_style == 'blog_style' ){
      $('#sfbap1_blog_masonry_style_options').show();
      $('#sfbap1_column_count_settings').hide();
      $('#sfbap1_blog_image').css('border','2px inset #858585');
      $('#sfbap1_thumbnails_image').css('border','none');
      $('#sfbap1_masonry_image').css('border','none');

    }
    if(selected_feed_style == 'masonry'){
      $('#sfbap1_blog_masonry_style_options').show();
      $('#sfbap1_column_count_settings').show();
      $('#sfbap1_masonry_image').css('border','2px inset #858585');
      $('#sfbap1_blog_image').css('border','none');
      $('#sfbap1_thumbnails_image').css('border','none');


    }
    if(selected_feed_style == 'vertical' ){
      $('#sfbap1_blog_masonry_style_options').show();
      $('#sfbap1_column_count_settings').hide();
      $('#sfbap1_vertical_image').css('border','2px inset #858585');
      $('#sfbap1_blog_image').css('border','none');
      $('#sfbap1_thumbnails_image').css('border','none');
      $('#sfbap1_masonry_image').css('border','none');

    }
    $('#sfbap1_style_selection_option input').on('change', function() {
      var feed_style_selection = $('input[name=sfbap1_feed_style]:checked', '#sfbap1_style_selection_option').val(); 
      if(feed_style_selection == 'thumbnails'){
        $('#sfbap1_thumbnail_style_options').show();
        $('#sfbap1_blog_masonry_style_options').hide();
      $('#sfbap1_column_count_settings').hide();
        $('#sfbap1_thumbnails_image').css('border','2px inset #858585');
        $('#sfbap1_vertical_image').css('border','none');
        $('#sfbap1_masonry_image').css('border','none');
        $('#sfbap1_blog_image').css('border','none');
      }
      if(feed_style_selection == 'blog_style' ){
        $('#sfbap1_thumbnail_style_options').hide();
        $('#sfbap1_blog_masonry_style_options').show();
      $('#sfbap1_column_count_settings').hide();
        $('#sfbap1_blog_image').css('border','2px inset #858585');
         $('#sfbap1_vertical_image').css('border','none');
        $('#sfbap1_thumbnails_image').css('border','none');
        $('#sfbap1_masonry_image').css('border','none');
      }
      if(feed_style_selection == 'vertical' ){
        $('#sfbap1_thumbnail_style_options').hide();
        $('#sfbap1_blog_masonry_style_options').show();
      $('#sfbap1_column_count_settings').hide();
        $('#sfbap1_vertical_image').css('border','2px inset #858585');
        $('#sfbap1_blog_image').css('border','none');
        $('#sfbap1_thumbnails_image').css('border','none');
        $('#sfbap1_masonry_image').css('border','none');
      }
      if(feed_style_selection == 'masonry'){
        $('#sfbap1_thumbnail_style_options').hide();
        $('#sfbap1_blog_masonry_style_options').show();
      $('#sfbap1_column_count_settings').show();
       $('#sfbap1_vertical_image').css('border','none');
        $('#sfbap1_masonry_image').css('border','2px inset #858585');
        $('#sfbap1_blog_image').css('border','none');
        $('#sfbap1_thumbnails_image').css('border','none');
      }
    });
  });
</script>
<style type="text/css">

  main {
    background: #FFF;
    width: 98%;
    padding: 1%;
    margin-top: 1%;
    box-shadow: 0 3px 5px rgba(0,0,0,0.2);
  }
  main p {
    font-size: 13px;
  }
  main #sfbap1-tab1, main #sfbap1-tab2, main #sfbap1-tab3, main #sfbap1-tab4, main section {
    clear: both;
    padding-top: 30px;
    display: none;
  }
  #sfbap1-tab1-label, #sfbap1-tab2-label,  #sfbap1-tab3-label,  #sfbap1-tab4-label {
    font-weight: bold;
    font-size: 14px;
    display: block;
    float: left;
    padding: 10px 30px;
    border-top: 2px solid transparent;
    border-right: 1px solid transparent;
    border-left: 1px solid transparent;
    border-bottom: 1px solid #DDD;
  }
  main label:hover {
    cursor: pointer;
    text-decoration: underline;
  }
  #sfbap1-tab1:checked ~ #sfbap1-content1, #sfbap1-tab2:checked ~ #sfbap1-content2, #sfbap1-tab3:checked ~ #sfbap1-content3, #sfbap1-tab4:checked ~ #sfbap1-content4 {
    display: block;
  }
  main input:checked + #sfbap1-tab1-label, main input:checked + #sfbap1-tab2-label, main input:checked +  #sfbap1-tab3-label, main input:checked +  #sfbap1-tab4-label {
    border-top-color: #FFB03D;
    border-right-color: #DDD;
    border-left-color: #DDD;
    border-bottom-color: transparent;
    text-decoration: none;
  }
  #sfbap1_show_photos_from_id , #sfbap1_show_photos_from_location , #sfbap1_show_photos_from_hashtag{
    margin-top: 2px;
  }
  .sfbap1_checkbox{
    width: 25px !important;
    height: 25px !important;
    border: 1px solid lightgrey !important;
    border-radius: 5px !important;
    margin-left: 10px !important;
  }
  .sfbap1_checkbox:checked:before{
    font-size: 30px !important;
  }
  #sfbap1_theme_selection_table tr td{
    vertical-align: top;
    display: inline-block;
  }
  #sfbap1-form { 
    background: -webkit-linear-gradient(bottom,#eaeaea, #fafafa);
    padding: 10px;
    display: inline-block;
    box-shadow: 0 1px 1px rgba(0,0,0,.65);
    border-radius: 3px;
    border: solid 1px #ddd;
    width: 98%; 
}
#sfbap1-fb input { display: none; }
#sfbap1-fb input:checked + label { 
    background: -webkit-linear-gradient(top,#4D90FE,#4787ED);
    border: solid 1px rgba(0,0,0,.15);
    color: white; 
    box-shadow: 0 1px 1px rgba(0,0,0,.65), 0 1px 0 rgba(255,255,255,.1) inset;
    text-shadow: 0 -1px 0 rgba(0,0,0,.6);
}

#sfbap1-twitter input { display: none; }
#sfbap1-twitter input:checked + label { 
    background: -webkit-linear-gradient(top,#4D90FE,#4787ED);
    border: solid 1px rgba(0,0,0,.15);
    color: white; 
    box-shadow: 0 1px 1px rgba(0,0,0,.65), 0 1px 0 rgba(255,255,255,.1) inset;
    text-shadow: 0 -1px 0 rgba(0,0,0,.6);
}

#sfbap1-instagram input { display: none; }
#sfbap1-instagram input:checked + label { 
    background: -webkit-linear-gradient(top,#4D90FE,#4787ED);
    border: solid 1px rgba(0,0,0,.15);
    color: white; 
    box-shadow: 0 1px 1px rgba(0,0,0,.65), 0 1px 0 rgba(255,255,255,.1) inset;
    text-shadow: 0 -1px 0 rgba(0,0,0,.6);
}

#sfbap1-gp input { display: none; }
#sfbap1-gp input:checked + label { 
    background: -webkit-linear-gradient(top,#4D90FE,#4787ED);
    border: solid 1px rgba(0,0,0,.15);
    color: white; 
    box-shadow: 0 1px 1px rgba(0,0,0,.65), 0 1px 0 rgba(255,255,255,.1) inset;
    text-shadow: 0 -1px 0 rgba(0,0,0,.6);
}

#sfbap1-pinterest input { display: none; }
#sfbap1-pinterest input:checked + label { 
    background: -webkit-linear-gradient(top,#4D90FE,#4787ED);
    border: solid 1px rgba(0,0,0,.15);
    color: white; 
    box-shadow: 0 1px 1px rgba(0,0,0,.65), 0 1px 0 rgba(255,255,255,.1) inset;
    text-shadow: 0 -1px 0 rgba(0,0,0,.6);
}

#sfbap1-vk input { display: none; }
#sfbap1-vk input:checked + label { 
    background: -webkit-linear-gradient(top,#4D90FE,#4787ED);
    border: solid 1px rgba(0,0,0,.15);
    color: white; 
    box-shadow: 0 1px 1px rgba(0,0,0,.65), 0 1px 0 rgba(255,255,255,.1) inset;
    text-shadow: 0 -1px 0 rgba(0,0,0,.6);
}

#sfbap1-rss input { display: none; }
#sfbap1-rss input:checked + label { 
    background: -webkit-linear-gradient(top,#4D90FE,#4787ED);
    border: solid 1px rgba(0,0,0,.15);
    color: white; 
    box-shadow: 0 1px 1px rgba(0,0,0,.65), 0 1px 0 rgba(255,255,255,.1) inset;
    text-shadow: 0 -1px 0 rgba(0,0,0,.6);
}
#sfbap1-fb label { 
    font-family: helvetica;
    cursor: pointer; 
    display: block; 
    border: solid 1px transparent;
    width: 100%; 
    height: 40px; 
    text-align: center; 
    line-height: 40px; 001
    border-radius: 3px; 
    margin-bottom: 10px;
    border: solid 1px rgba(0,0,0,.15); 
}

#sfbap1-twitter label { 
    font-family: helvetica;
    cursor: pointer; 
    display: block; 
    border: solid 1px transparent;
    width: 100%; 
    height: 40px; 
    text-align: center; 
    line-height: 40px; 001
    border-radius: 3px; 
    margin-bottom: 10px;
    border: solid 1px rgba(0,0,0,.15); 
}

#sfbap1-instagram label { 
    font-family: helvetica;
    cursor: pointer; 
    display: block; 
    border: solid 1px transparent;
    width: 100%; 
    height: 40px; 
    text-align: center; 
    line-height: 40px; 001
    border-radius: 3px; 
    margin-bottom: 10px;
    border: solid 1px rgba(0,0,0,.15); 
}

#sfbap1-gp label { 
    font-family: helvetica;
    cursor: pointer; 
    display: block; 
    border: solid 1px transparent;
    width: 100%; 
    height: 40px; 
    text-align: center; 
    line-height: 40px; 001
    border-radius: 3px; 
    margin-bottom: 10px;
    border: solid 1px rgba(0,0,0,.15); 
}

#sfbap1-pinterest label { 
    font-family: helvetica;
    cursor: pointer; 
    display: block; 
    border: solid 1px transparent;
    width: 100%; 
    height: 40px; 
    text-align: center; 
    line-height: 40px; 001
    border-radius: 3px; 
    margin-bottom: 10px;
    border: solid 1px rgba(0,0,0,.15); 
}

#sfbap1-vk label { 
    font-family: helvetica;
    cursor: pointer; 
    display: block; 
    border: solid 1px transparent;
    width: 100%; 
    height: 40px; 
    text-align: center; 
    line-height: 40px; 001
    border-radius: 3px; 
    margin-bottom: 10px;
    border: solid 1px rgba(0,0,0,.15); 
}

#sfbap1-rss label { 
    font-family: helvetica;
    cursor: pointer; 
    display: block; 
    border: solid 1px transparent;
    width: 100%; 
    height: 40px; 
    text-align: center; 
    line-height: 40px; 001
    border-radius: 3px; 
    margin-bottom: 10px;
    border: solid 1px rgba(0,0,0,.15); 
}

#sfbap1-fb label:last-child { margin-right: 0; }
#sfbap1-fb label:hover {     
    background: rgba(77, 144, 254, .5); 
    border: solid 1px rgba(0,0,0,.15); 
}

#sfbap1-twitter label:last-child { margin-right: 0; }
#sfbap1-twitter label:hover {     
    background: rgba(77, 144, 254, .5); 
    border: solid 1px rgba(0,0,0,.15); 
}

#sfbap1-instagram label:last-child { margin-right: 0; }
#sfbap1-instagram label:hover {     
    background: rgba(77, 144, 254, .5); 
    border: solid 1px rgba(0,0,0,.15); 
}

#sfbap1-gp label:last-child { margin-right: 0; }
#sfbap1-gp label:hover {     
    background: rgba(77, 144, 254, .5); 
    border: solid 1px rgba(0,0,0,.15); 
}

#sfbap1-pinterest label:last-child { margin-right: 0; }
#sfbap1-pinterest label:hover {     
    background: rgba(77, 144, 254, .5); 
    border: solid 1px rgba(0,0,0,.15); 
}

#sfbap1-vk label:last-child { margin-right: 0; }
#sfbap1-vk label:hover {     
    background: rgba(77, 144, 254, .5); 
    border: solid 1px rgba(0,0,0,.15); 
}

#sfbap1-rss label:last-child { margin-right: 0; }
#sfbap1-rss label:hover {     
    background: rgba(77, 144, 254, .5); 
    border: solid 1px rgba(0,0,0,.15); 
}

#sfbap1-fb article { 
    height: 0; 
    overflow: hidden; 
    -webkit-transition: height .25s linear, opacity .15s linear; 
    position: relative; 
    top: -5px;
    margin-bottom: 0;
    padding: 0 10px;
    color: #333;
    font-family: helvetica;
    font-size: 12px;
    line-height: 18px;
    opacity: 0;
    border: 1px solid lightgrey;
}

#sfbap1-twitter article { 
    height: 0; 
    overflow: hidden; 
    -webkit-transition: height .25s linear, opacity .15s linear; 
    position: relative; 
    top: -5px;
    margin-bottom: 0;
    padding: 0 10px;
    color: #333;
    font-family: helvetica;
    font-size: 12px;
    line-height: 18px;
    opacity: 0;
    border: 1px solid lightgrey;
}

#sfbap1-instagram article { 
    height: 0; 
    overflow: hidden; 
    -webkit-transition: height .25s linear, opacity .15s linear; 
    position: relative; 
    top: -5px;
    margin-bottom: 0;
    padding: 0 10px;
    color: #333;
    font-family: helvetica;
    font-size: 12px;
    line-height: 18px;
    opacity: 0;
    border: 1px solid lightgrey;
}

#sfbap1-gp article { 
    height: 0; 
    overflow: hidden; 
    -webkit-transition: height .25s linear, opacity .15s linear; 
    position: relative; 
    top: -5px;
    margin-bottom: 0;
    padding: 0 10px;
    color: #333;
    font-family: helvetica;
    font-size: 12px;
    line-height: 18px;
    opacity: 0;
    border: 1px solid lightgrey;
}

#sfbap1-pinterest article { 
    height: 0; 
    overflow: hidden; 
    -webkit-transition: height .25s linear, opacity .15s linear; 
    position: relative; 
    top: -5px;
    margin-bottom: 0;
    padding: 0 10px;
    color: #333;
    font-family: helvetica;
    font-size: 12px;
    line-height: 18px;
    opacity: 0;
    border: 1px solid lightgrey;
}

#sfbap1-vk article { 
    height: 0; 
    overflow: hidden; 
    -webkit-transition: height .25s linear, opacity .15s linear; 
    position: relative; 
    top: -5px;
    margin-bottom: 0;
    padding: 0 10px;
    color: #333;
    font-family: helvetica;
    font-size: 12px;
    line-height: 18px;
    opacity: 0;
    border: 1px solid lightgrey;
}

#sfbap1-rss article { 
    height: 0; 
    overflow: hidden; 
    -webkit-transition: height .25s linear, opacity .15s linear; 
    position: relative; 
    top: -5px;
    margin-bottom: 0;
    padding: 0 10px;
    color: #333;
    font-family: helvetica;
    font-size: 12px;
    line-height: 18px;
    opacity: 0;
    border: 1px solid lightgrey;
}

#sfbap1-fb > input:checked ~ article { height: auto; opacity: 1; }

#sfbap1-twitter > input:checked ~ article { height: 210px; opacity: 1; }

#sfbap1-instagram > input:checked ~ article { height: 300px; opacity: 1; }

#sfbap1-gp > input:checked ~ article { height: 210px; opacity: 1; }

#sfbap1-pinterest > input:checked ~ article { height: 210px; opacity: 1; }

#sfbap1-vk > input:checked ~ article { height: 210px; opacity: 1; }

#sfbap1-rss > input:checked ~ article { height: 210px; opacity: 1; }


​/**
 * iOS 6 style switch checkboxes
 * by Lea Verou http://lea.verou.me
 */

:root input[type="checkbox"] { /* :root here acting as a filter for older browsers */
  position: absolute;
  opacity: 0;
}

:root input[type="checkbox"].ios-switch + div {
  display: inline-block;
  vertical-align: middle;
  width: 3em; height: 1em;
  border: 1px solid rgba(0,0,0,.3);
  border-radius: 999px;
  margin: 0 .5em;
  background: white;
  background-image: linear-gradient(rgba(0,0,0,.1), transparent),
                    linear-gradient(90deg, hsl(210, 90%, 60%) 50%, transparent 50%);
  background-size: 200% 100%;
  background-position: 100% 0;
  background-origin: border-box;
  background-clip: border-box;
  overflow: hidden;
  transition-duration: .4s;
  transition-property: padding, width, background-position, text-indent;
  box-shadow: 0 .1em .1em rgba(0,0,0,.2) inset,
              0 .45em 0 .1em rgba(0,0,0,.05) inset;
  font-size: 150%; /* change this and see how they adjust! */
  margin-top: -5px;
}

:root input[type="checkbox"].ios-switch:checked + div {
  padding-left: 2em;  width: 1em;
  background-position: 0 0;
}

:root input[type="checkbox"].ios-switch + div:before {
  content: 'On';
  float: left;
  width: 1.65em; height: 1.65em;
  margin: -.1em;
  border: 1px solid rgba(0,0,0,.35);
  border-radius: inherit;
  background: white;
  background-image: linear-gradient(rgba(0,0,0,.2), transparent);
  box-shadow: 0 .1em .1em .1em hsla(0,0%,100%,.8) inset,
              0 0 .5em rgba(0,0,0,.3);
  color: white;
  text-shadow: 0 -1px 1px rgba(0,0,0,.3);
  text-indent: -2.0em;
}

:root input[type="checkbox"].ios-switch:active + div:before {
  background-color: #eee;
}

:root input[type="checkbox"].ios-switch:focus + div {
  box-shadow: 0 .1em .1em rgba(0,0,0,.2) inset,
              0 .45em 0 .1em rgba(0,0,0,.05) inset,
              0 0 .4em 1px rgba(255,0,0,.5);
}

:root input[type="checkbox"].ios-switch + div:before,
:root input[type="checkbox"].ios-switch + div:after {
  font: bold 60%/1.9 sans-serif;
  text-transform: uppercase;
}

:root input[type="checkbox"].ios-switch + div:after {
  content: 'Off';
  float: left;
  text-indent: .5em;
  color: rgba(0,0,0,.45);
  text-shadow: none;

}

.insta-default {
text-align: center;
    margin: 20px;
}
.insta-default a {
  padding: 15px 30px;
  display: block;
  background-color: #E33E5C;
  box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.1);
  color: #FFF;
  font-size: 16px;
  border-radius: 4px;
  font-weight: bold;
  text-decoration: none;
  transition: all 0.3s;
}
.insta-default a:hover {
  box-shadow: 0 0 4px 3px rgba(0, 0, 0, 0.15);
  transition: all 0.3s;
}
.insta-default a i {
  color: #FFF;
  font-size: 18px;
}
/* Switch code ends here, from now on it’s just bling for the demo page */

#sfbap1-label label {
  position: relative;
  display: block;
  padding: .8em;
  border: 1px solid silver;
  border-top-width: 0;
  background: white;
  font: bold 110% sans-serif;
}

#sfbap1-label label:first-of-type {
  border-top-width: 1px;
  border-radius: .6em .6em 0 0;
}

#sfbap1-label label:last-of-type {
  border-radius: 0 0 .6em .6em;
  box-shadow: 0 1px hsla(0,0%,100%,.8);
}


</style>
<p style="text-align: center;
    background: white;
    border: 2px solid #ffce87;
    padding: 5px;
    font-size: 17px;">Copy this shortcode & paste into your Post or Page to show Social Feed<br/> <strong>[arrow_sf id='<?php echo $post->ID; ?>']</strong></p>

<main style="position: relative;">
  <div id="fbwait" style="display: none;"><img src='https://www.arrowplugins.com/1.gif' width="64" height="64" /><br>Getting Your Facebook Pages...</div>
  <input id="sfbap1-tab1" type="radio" name="sfbap1-tabs" checked>
  <label id="sfbap1-tab1-label" for="sfbap1-tab1">General Settings</label>
  <input id="sfbap1-tab3" type="radio" name="sfbap1-tabs">
  <label id="sfbap1-tab3-label" for="sfbap1-tab3">Appearance</label>
  <input id="sfbap1-tab2" type="radio" name="sfbap1-tabs">
  <label id="sfbap1-tab2-label" for="sfbap1-tab2">Social Account Settings</label>

  <section id="sfbap1-content1">
    <h2 style="font-size: 17px;">Select Feed Style:</h2>
    <table id="sfbap1_style_selection_option">
      <tr>
       <td>
          <p style="text-align: center;margin: 0;">
            <input id="sfbap1_feed_style_vertical" type="radio" name="sfbap1_feed_style" value="vertical" <?php echo ($sfbap1_feed_style == 'vertical')? 'checked="checked"':''; ?> <?php if($sfbap1_feed_style == ''){ echo 'checked="checked"';} ?> /> 
            <label for="sfbap1_feed_style_vertical"><strong>Vertical</strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
            <label for="sfbap1_feed_style_vertical">
              <img id="sfbap1_vertical_image" src="<?php echo plugins_url('images/vertical.png',__FILE__); ?>" />
            </label>
          </p>
        </td>
        <td>
          <p style="text-align: center;margin: 0;">
            <input id="sfbap1_feed_style_thumbnails" type="radio" name="sfbap1_feed_style" value="thumbnails" <?php echo ($sfbap1_feed_style == 'thumbnails')? 'checked="checked"':''; ?> /> 
            <label for="sfbap1_feed_style_thumbnails"><strong>Thumbnails</strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
            <label for="sfbap1_feed_style_thumbnails">
              <img id="sfbap1_thumbnails_image" src="<?php echo plugins_url('images/thumbnails.png',__FILE__); ?>" />
            </label>
          </p>
        </td>
        <td>
          <p style="text-align: center;margin: 0;">
            <input disabled id="sfbap1_feed_style_blog_style" type="radio" name="" value=""  /> 
            <label for="sfbap1_feed_style_blog_style"><strong>Blog Style <a href="https://www.arrowplugins.com/social-feed" target="_blank">Locked</a></strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
            <label for="sfbap1_feed_style_blog_style">
              <img id="sfbap1_blog_image" class="sfbap1_style_image" src="<?php echo plugins_url('images/blog_style.png',__FILE__); ?>" />
            </label>
          </p>
        </td>
        <td>
          <p style="text-align: center;margin: 0;">
            <input disabled id="sfbap1_feed_style_masonry" type="radio" name="" value=""  /> 
            <label for="sfbap1_feed_style_masonry"><strong>Masonry <a href="https://www.arrowplugins.com/social-feed" target="_blank">Locked</a></strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
            <label for="sfbap1_feed_style_masonry">
              <img id="sfbap1_masonry_image" class="sfbap1_style_image" src="<?php echo plugins_url('images/masonry.png',__FILE__); ?>" />
            </label>
          </p>
        </td>
      </tr>
    </table>


    <table id="sfbap1_general_options">
    
     
    </table>

    <table id="sfbap1_thumbnail_style_options" style="display: none;">
    <tr>
        <td colspan="2">
            <strong style="color: red;"><span style="font-size: 18px;">Note:</span> Thumbnail View is best suited for Instagram & Pinterest 
            <br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; It will only show pictures if any feed have no pictures in it it will not show that specific feed.</strong>
        </td>
      </tr>
      <tr>
        <td>
          <h3>Thumbnail Size: </h3> 
        </td>
        <td>
          <input style="width: 70px;margin-left: 106px;" type="number"  id="sfbap1_thumbnail_size" name="sfbap1_thumbnail_size" value="<?php if($sfbap1_thumbnail_size == ''){ echo '250' ;}else{ echo $sfbap1_thumbnail_size; } ?>" /> px 
        </td>
      </tr>
    </table>

<table id="sfbap1_column_count_settings" style="display: none;">
      <tr>
        <td>
          <h3>Number of Columns in a Row: </h3> 
        </td>
        <td>
          <input style="width: 70px;margin-left: ;" type="number"  id="sfbap1_column_count" name="sfbap1_column_count" value="<?php if($sfbap1_column_count == ''){ echo '2' ;}else{ echo $sfbap1_column_count; } ?>" /> 
        </td>
      </tr>
    </table>

    <table id="sfbap1_blog_masonry_style_options" style="display: none;">
      <tr>
        <td>
          <h3>Limit Post Caption Text: </h3> 
        </td>
        <td>
          <input type="number" min="50" max="600" id="sfbap1_limit_post_characters" name="sfbap1_limit_post_characters" value="<?php if($sfbap1_limit_post_characters == ''){ echo '300' ;}else{ echo $sfbap1_limit_post_characters; } ?>" /> Characters <span>Minimum value is 50 & Maximum value is 600</span>
        </td>
      </tr>
      <tr>
        <td>
          <h3>Show Photos Only: </h3> 
        </td>
        <td>
          <input type="checkbox" class="sfbap1_checkbox" name="sfbap1_show_photos_only" id="sfbap1_show_photos_only"  value='1'<?php checked(1, $sfbap1_show_photos_only); ?> /> <span style="font-size: 13px;"><strong>(This will hide Post Caption Text, Profile Picture & Date Posted from your feed card)</strong></span>
        </td>
      </tr>
      <tr>
        <td>
          <h3>Change Date Posted Language: </h3> 
        </td>
        <td>
        <select name="sfbap1_date_posted_lang" id="sfbap1_date_posted_lang" value='1'<?php checked(1, $sfbap1_date_posted_lang); ?> >
            <option value="en" <?php if ( $sfbap1_date_posted_lang == "en" ) echo 'selected="selected"'; ?> >English (Default)</option>
            <option value="ar" <?php if ( $sfbap1_date_posted_lang == "ar" ) echo 'selected="selected"'; ?> >Arabic</option>
            <option value="bn" <?php if ( $sfbap1_date_posted_lang == "bn" ) echo 'selected="selected"'; ?> >Bangali</option>
            <option value="cs" <?php if ( $sfbap1_date_posted_lang == "cs" ) echo 'selected="selected"'; ?> >Czech</option>
            <option value="da" <?php if ( $sfbap1_date_posted_lang == "da" ) echo 'selected="selected"'; ?> >Danish</option>
            <option value="nl" <?php if ( $sfbap1_date_posted_lang == "nl" ) echo 'selected="selected"'; ?> >Dutch</option>
            <option value="fr" <?php if ( $sfbap1_date_posted_lang == "fr" ) echo 'selected="selected"'; ?> >French</option>
            <option value="de" <?php if ( $sfbap1_date_posted_lang == "de" ) echo 'selected="selected"'; ?> >German</option>
            <option value="it" <?php if ( $sfbap1_date_posted_lang == "it" ) echo 'selected="selected"'; ?> >Italian</option>
            <option value="ja" <?php if ( $sfbap1_date_posted_lang == "ja" ) echo 'selected="selected"'; ?> >Japanese</option>
            <option value="ko" <?php if ( $sfbap1_date_posted_lang == "ko" ) echo 'selected="selected"'; ?> >Korean</option>
            <option value="pt" <?php if ( $sfbap1_date_posted_lang == "pt" ) echo 'selected="selected"'; ?> >Portuguese</option>
            <option value="ru" <?php if ( $sfbap1_date_posted_lang == "ru" ) echo 'selected="selected"'; ?> >Russian</option>
            <option value="es" <?php if ( $sfbap1_date_posted_lang == "es" ) echo 'selected="selected"'; ?> >Spanish</option>
            <option value="tr" <?php if ( $sfbap1_date_posted_lang == "tr" ) echo 'selected="selected"'; ?> >Turkish</option>
            <option value="uk" <?php if ( $sfbap1_date_posted_lang == "uk" ) echo 'selected="selected"'; ?> >Ukranian</option>
        </select>
        </td>
      </tr>
      <tr>
        <td>
          <h3>Hide Date Posted: </h3> 
        </td>
        <td>
          <input type="checkbox" class="sfbap1_checkbox" name="sfbap1_date_posted" id="sfbap1_date_posted" value='1'<?php checked(1, $sfbap1_date_posted); ?>   />
        </td>
      </tr>
      <tr>
        <td>
          <h3>Hide Profile Picture: </h3> 
        </td>
        <td>
          <input type="checkbox" class="sfbap1_checkbox" name="sfbap1_profile_picture" id="sfbap1_profile_picture" value='1'<?php checked('1', $sfbap1_profile_picture); ?> />
        </td>
      </tr>
      <tr>
        <td>
          <h3>Hide Post Caption Text: </h3> 
        </td>
        <td>
          <input type="checkbox" class="sfbap1_checkbox" name="sfbap1_caption_text" id="sfbap1_caption_text" value='1'<?php checked('1', $sfbap1_caption_text); ?> />
        </td>
      </tr>
      <tr>
        <td>
          <h3>Hide Social Icon From Feed Card: </h3> 
        </td>
        <td>
          <input type="checkbox" class="sfbap1_checkbox" name="sfbap1_social_icon" id="sfbap1_caption_text" value='1'<?php checked('1', $sfbap1_social_icon); ?> />
        </td>
      </tr>
           
    </table>
<br/>

<h2 style="    font-size: 18px; margin: 0;padding: 3px;">Select Feed Template:</h2>
<br/>
    
    <table id="sfbap1_theme_selection_table">
      <tr>
        <td>
          <p style="text-align: center;margin: 0;">
            <input type="radio" id="sfbap1_theme_selection_default" name="sfbap1_theme_selection" value="default" <?php echo ($sfbap1_theme_selection == 'default')? 'checked="checked"':''; ?> <?php if($sfbap1_theme_selection == ''){ echo 'checked="checked"';} ?>/>
            <label for="sfbap1_theme_selection_default"><strong>Default</strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
          <label for="sfbap1_theme_selection_default">
            <img style="    box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important; width: 200px;" src="<?php echo plugins_url('images/default.png',__FILE__); ?>">
            </label>
          </p>
        </td>
        <td>
          <p style="text-align: center;margin: 0;">
            <input disabled type="radio" id="sfbap1_theme_selection_template0" name="" value=""  />
            <label for="sfbap1_theme_selection_template0"><strong>Dark <a href="https://www.arrowplugins.com/social-feed" target="_blank">Locked</a></strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
          <label for="sfbap1_theme_selection_template0">
            <img style="width: 200px;" src="<?php echo plugins_url('images/template0.png',__FILE__); ?>">
            </label>
          </p>
        </td>
        <td>
          <p style="text-align: center;margin: 0;">
            <input disabled type="radio" id="sfbap1_theme_selection_template1" name="" value=""  />
            <label for="sfbap1_theme_selection_template1"><strong>Pinterest Like Layout <a href="https://www.arrowplugins.com/social-feed" target="_blank">Locked</a></strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
          <label for="sfbap1_theme_selection_template1">
            <img style="width: 200px;" src="<?php echo plugins_url('images/template1.png',__FILE__); ?>">
            </label>
          </p>
        </td>
        <td>
          <p style="text-align: center;margin: 0;">
            <input disabled type="radio" id="sfbap1_theme_selection_template2" name="" value=""  />
            <label for="sfbap1_theme_selection_template2"><strong>Modern Light <a href="https://www.arrowplugins.com/social-feed" target="_blank">Locked</a></strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
          <label for="sfbap1_theme_selection_template2">
            <img style="    box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important; width: 200px;" src="<?php echo plugins_url('images/template2.png',__FILE__); ?>">
            </label>
          </p>
        </td>
        <td>
          <p style="text-align: center;margin: 0;">
            <input disabled type="radio" id="sfbap1_theme_selection_template3" name="" value=""  />
            <label for="sfbap1_theme_selection_template3"><strong>Modern Dark <a href="https://www.arrowplugins.com/social-feed" target="_blank">Locked</a></strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
          <label for="sfbap1_theme_selection_template3">
            <img style="    box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important; width: 200px;" src="<?php echo plugins_url('images/template3.png',__FILE__); ?>">
            </label>
          </p>
        </td>
        <td>
          <p style="text-align: center;margin: 0;">
            <input disabled type="radio" id="sfbap1_theme_selection_template4" name="" value=""  />
            <label for="sfbap1_theme_selection_template4"><strong>Space White <a href="https://www.arrowplugins.com/social-feed" target="_blank">Locked</a></strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
          <label for="sfbap1_theme_selection_template4">
            <img style="    box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important; width: 200px;" src="<?php echo plugins_url('images/template4.png',__FILE__); ?>">
            </label>
          </p>
        </td>







      </tr>
    </table>
  </section>
  <section id="sfbap1-content2">
    <form id="sfbap1-form">

        <div id="sfbap1-fb">
            <input type="radio" name="size" id="small" value="small" checked="checked" /> 
            <label style="    background: #4867aa;" for="small"><img style="width: 129px;
    margin-top: 4px;" src="<?php echo plugins_url('images/facebook.png',__FILE__); ?>"></label>
            <article>
  <label style="text-align: left;
    border: none;
    margin-top: 25px;" id="sfbap1-label"><strong style="font-size: 20px;">Enable Facebook Feed:</strong> 
  <input type="checkbox" class="ios-switch" name="sfbap1_enable_facebook_feed" id="sfbap1_enable_facebook_feed"  value='1'<?php checked(1, $sfbap1_enable_facebook_feed); ?>>
  <div class="switch">
      
  </div></label>
<script>
jQuery(document).ready(function(){
    jQuery("#tooltipAT").click(function(){
        jQuery("#tooltipATShowHide").slideToggle( "slow" );
    });
});
</script>
<?php
    
    $postId = $_REQUEST['post'];
    $actionId = $_REQUEST['action'];
    //$url = "";

   //$url .= '/wordpress';// comment this line before upload the production server.

   /* if(strlen($postId) > 0 && strlen($actionId) > 0 && $actionId == "edit"){
        $url = "/sfbap1-landing-page.php";
        $_SESSION['post_id'] = $postId;
    }
    else
        $url = "/wp-admin/post-new.php?post_type=sfbap1_social_feed";*/

    $protocol = site_url();
    $_SESSION['post_id'] = $postId;
   /* if( !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on") $protocol = "https://";
    else $protocol = "http://";*/

?>

<a id="fbaccesstokenbutton" href="https://www.facebook.com/dialog/oauth?client_id=2152024168367031&response_type=token&scope=manage_pages&redirect_uri=https://www.arrowplugins.com/sfbap1-landing-page.php&state=<?php echo $postId . '!@@!' . $protocol ?>" />LOGIN & GET ACCESS TOKEN</a><a id="notworking" href="https://www.arrowplugins.com/generate-facebook-page-access-token/" target="_blank" style="font-size: 16px;">Button not working?</a>

            <p style="font-size: 1.3em;"><strong>Enter your own Access Token: </strong> <input type="text" placeholder="Access Token" style="display: inline-block; width: 350px;" id="sfbap1_facebook_access_token" name="sfbap1_facebook_access_token" value="<?php echo $sfbap1_facebook_access_token; ?>" ><a id="tooltipAT" style="    cursor: pointer;
    margin-left: 10px;
    font-size: 13px;">What is this?</a>
                <div style="display: none;
    padding: 10px 15px;
    margin: 10px 0;
    font-size: 13px;
    background: #fffbcc;
    background: #fffbcc;
    -moz-border-radius: 8px;
    -webkit-border-radius: 8px;
   
    border-radius: 8px;" id="tooltipATShowHide">To show your Facebook "Page" posts you have to be it's <strong>"Admin"</strong> it is highly recommended that you retrieve your own Access Token for that page to avoid any API rate limit errors. Simply follow these <a href="https://www.arrowplugins.com/generate-facebook-page-access-token/" target="_blank">step-by-step</a> instructions or Click on the <strong>LOGIN & GET ACCESS TOKEN</strong> Button above to obtain one.</div>
            </p>




              <p style="font-size: 1.3em;"><strong>Enter Facebook Page: </strong> www.facebook.com/<input type="text" placeholder="facebook-page-name" style="display: inline-block;" id="sfbap1_facebook_page_id"  name="sfbap1_facebook_page_id" value="<?php echo $sfbap1_facebook_page_id; ?>" > 
                <span style="font-size:11px;">Only Alphabets are allowed, e.g google, wparrowplugins</span></p>
<div style="height: auto; display: block;" id="sfbap_access_token_pages"></div>

              <table style="display: block;">
                   <tr>
        <td>
          <h3>Number of Facebook Posts to Show: </h3> 
        </td>
        <td>
          <input style="margin-left: 15px;display: inline-block;" type="number" min="1" max="20" id="sfbap1_number_of_photos" name="sfbap1_number_facebook" value="<?php if($sfbap1_number_facebook == ''){ echo '20' ;}else{ echo $sfbap1_number_facebook; } ?>" /> max 20 allowed in Free Version
        </td>
      </tr>
              </table>
            </article>
        </div>

        <div id="sfbap1-twitter">
            <input type="radio" class="sfbap1-inputs" name="size" id="medium" value="medium" />     
            <label style="background: #33ccff;" for="medium"><img src="<?php echo plugins_url('images/twitter.gif',__FILE__); ?>" style="    width: 143px;
    margin-top: 0px;"></label>
            <article style="">
<label style="text-align: left;
    border: none;
    margin-top: 25px;" id="sfbap1-label"><strong style="font-size: 20px;">Enable Twitter Feed:</strong> 
<input  type="checkbox" class="ios-switch" name="sfbap1_enable_twitter_feed" id="sfbap1_enable_twitter_feed"  value='1'<?php checked(1, $sfbap1_enable_twitter_feed); ?>>
<div class="switch"></div></label>
             
<table>
      <tr>
        <td style="vertical-align: top;">
          <h3 style="margin: 6px;">Show Tweets From:</h3>
        </td>
        <td>
          <table id="sfbap1_selection_table">
            <tr>
              <td>
                <input style="display: inline-block;" type="radio" id="sfbap1_show_photos_from_id" name="sfbap1_show_photos_from_twitter" value='userid'<?php checked( "userid", $sfbap1_show_photos_from_twitter); ?> <?php if($sfbap1_show_photos_from_twitter == ''){ echo 'checked="checked"';} ?> />
                <label style="    background: none;
    color: black;
    box-shadow: none;
    text-shadow: none;
    text-decoration: none;
    border: none;
    width: 70px;
    height: 27px;
    text-align: left;
    line-height: 40px;
    margin-bottom: 0px;
    display: inline-block;
    padding: 0;
    margin-top: -9px;" for="sfbap1_show_photos_from_id"><strong>Username:</strong></label> 
              </td>
              <td>
                <input style="display:  inline-block;;" type="text" id="sfbap1_show_photos_from_id_value" name="sfbap1_user_id_twitter" placeholder="@twitter_username" value="<?php echo $sfbap1_user_id_twitter; ?>" /> <strong>Example: @audi</strong>
              </td>
            </tr>
            <tr>
              <td>
                <input disabled style="display: inline-block;" type="radio" id="sfbap1_show_photos_from_hashtag"   name="" value=''  /> 
                <label style="    background: none;
    color: black;
    box-shadow: none;
    text-shadow: none;
    text-decoration: none;
    border: none;
    width: 70px;
    height: 27px;
    text-align: left;
    line-height: 40px;
    margin-bottom: 0px;
    display: inline-block;
    padding: 0;
    margin-top: -9px;" for="sfbap1_show_photos_from_hashtag"><strong>Hashtag:</strong></label> 
              </td>
              <td>
                <input disabled style="display:  inline-block;;" type="text" id="sfbap1_show_photos_from_hashtag_value" placeholder="#hashtag" name="sfbap1_hashtag_twitter" value="<?php echo $sfbap1_hashtag_twitter; ?>" /> <strong><a href="https://www.arrowplugins.com/social-feed" target="_blank">Premium Feature</a></strong>
              </td>
            </tr>
          </table>
        </td>
      </tr>

     
</table>
 <table style="display: block;">
                   <tr>
        <td>
          <h3>Number of Tweets to Show: </h3> 
        </td>
        <td>
          <input style="margin-left: 15px;display: inline-block;" type="number" min="1" max="20" id="sfbap1_number_of_photos" name="sfbap1_number_twitter" value="<?php if($sfbap1_number_twitter == ''){ echo '20' ;}else{ echo $sfbap1_number_twitter; } ?>" /> max 20 allowed in Free Version
        </td>
      </tr>
              </table>

            </article>    
        </div>

        <div id="sfbap1-instagram">
            <input type="radio" class="sfbap1-inputs" name="size" id="large" value="large" />     
            <label style="    background: #125688;" for="large"><img src="<?php echo plugins_url('images/instagram.png',__FILE__); ?>" style="    width: 99px;
    margin-top: 8px;"></label>
            <article>

<label style="text-align: left;
    border: none;
    margin-top: 25px;" id="sfbap1-label"><strong style="font-size: 20px;">Enable Instagram Feed:</strong> 

<input type="checkbox" class="ios-switch" name="sfbap1_enable_instagram_feed" id="sfbap1_enable_instagram_feed"  value='1'<?php checked(1, $sfbap1_enable_instagram_feed); ?>>
<div class="switch"></div></label>
                      <div class="insta-default">
    <a href="http://instagram.pixelunion.net/" target="_blank" class="insta-default"><i class="fa fa-instagram"></i> Click here to get your Access Token and User ID </a>
</div>
<span style="font-size: 17px;
    margin-left: 9px;"><strong>Enter Generated Access Token: </strong></span>
 <input style="display:  inline-block;width: 400px;" type="text" id="sfbap1_private_access_token" name="sfbap1_private_access_token" placeholder="Paste Access Token Here" value="<?php echo $sfbap1_private_access_token; ?>" /> 
              <table>
      <tr>
        <td style="vertical-align: top;">
          <h3 style="margin: 6px;">Show Photos From:</h3>
        </td>
        <td>
          <table id="sfbap1_selection_table">
            <tr>
              <td>
                <input style="display: inline-block;" type="radio" id="sfbap1_show_photos_from_id_instagram" name="sfbap1_show_photos_from_instagram" value='userid'<?php checked( "userid", $sfbap1_show_photos_from_instagram); ?> <?php if($sfbap1_show_photos_from_twitter == ''){ echo 'checked="checked"';} ?> />
                <label style="    background: none;
    color: black;
    box-shadow: none;
    text-shadow: none;
    text-decoration: none;
    border: none;
    width: 70px;
    height: 27px;
    text-align: left;
    line-height: 40px;
    margin-bottom: 0px;
    display: inline-block;
    padding: 0;
    margin-top: -9px;" for="sfbap1_show_photos_from_id_instagram"><strong>User ID:</strong></label> 
              </td>
              <td>
                <input style="display:  inline-block;" type="text" id="sfbap1_show_photos_from_id_value" name="sfbap1_user_id_instagram" placeholder="355477699" value="<?php echo $sfbap1_user_id_instagram; ?>" /> <strong><a href="https://codeofaninja.com/tools/find-instagram-user-id" target="_blank">Click here to get your user id</a></strong>
              </td>
            </tr>
           <!--  <tr>
              <td>
                <input disabled style="display: inline-block;" type="radio" id="sfbap1_show_photos_from_hashtag_instagram"   name="" value='' /> 
                <label style="    background: none;
    color: black;
    box-shadow: none;
    text-shadow: none;
    text-decoration: none;
    border: none;
    width: 70px;
    height: 27px;
    text-align: left;
    line-height: 40px;
    margin-bottom: 0px;
    display: inline-block;
    padding: 0;
    margin-top: -9px;" for="sfbap1_show_photos_from_hashtag_instagram"><strong>Hashtag:</strong></label> 
              </td>
              <td>
                <input disabled style="display:  inline-block;;" type="text" id="sfbap1_show_photos_from_hashtag_value" placeholder="hashtag" name="" value="" /> <strong><a href="https://www.arrowplugins.com/social-feed" target="_blank">Premium Feature</a></strong>
              </td>
            </tr> -->
          </table>
        </td>
      </tr>
</table>
 <table style="display: block;">
                   <tr>
        <td>
          <h3>Number of Instagram Photos to Show: </h3> 
        </td>
        <td>
          <input style="margin-left: 15px;display: inline-block;" type="number" min="1" max="20" id="sfbap1_number_of_photos" name="sfbap1_number_instagram" value="<?php if($sfbap1_number_instagram == ''){ echo '20' ;}else{ echo $sfbap1_number_instagram; } ?>" /> max 20 allowed in Free Version
        </td>
      </tr>
              </table>
            </article>
        </div>

        <div id="sfbap1-pinterest">
            <input type="radio" class="sfbap1-inputs" name="size" id="xxxlarge" value="xxxlarge" />     
            <label style="background: #d42127;" for="xxxlarge"><img src="<?php echo plugins_url('images/pinterest.jpg',__FILE__); ?>" style="    width: 119px;
    margin-top: 2px;"></label>
            <article>

<label style="text-align: left;
    border: none;
    margin-top: 25px;" id="sfbap1-label"><strong style="font-size: 20px;">Enable Pinterest Feed:</strong> 
<input type="checkbox" class="ios-switch" name="sfbap1_enable_pinterest_feed" id="sfbap1_enable_pinterest_feed"  value='1'<?php checked(1, $sfbap1_enable_pinterest_feed); ?>>
<div class="switch"></div></label>
              <p  style="font-size: 1.3em;"><strong>Enter Your Pinterest Borad: </strong> www.pinterest.com/<input type="text" placeholder="username/bord-name" style="display: inline-block;width: 50%;" name="sfbap1_pinterest_board" value="<?php echo $sfbap1_pinterest_board; ?>" ></p>

               <table style="display: block;">
                   <tr>
        <td>
          <h3>Number of Board Pins to Show: </h3> 
        </td>
        <td>
          <input style="margin-left: 15px;display: inline-block;" type="number" min="1" max="20" id="sfbap1_number_of_photos" name="sfbap1_number_pinterest" value="<?php if($sfbap1_number_pinterest == ''){ echo '20' ;}else{ echo $sfbap1_number_pinterest; } ?>" /> max 20 allowed in Free Version
        </td>
      </tr>
              </table>

            </article>
        </div>

        <div id="sfbap1-vk">    
            <input type="radio" class="sfbap1-inputs" name="size" id="xxxxlarge" value="xxxxlarge" />     
            <label style="background: #507299;" for="xxxxlarge"><img src="<?php echo plugins_url('images/vk.png',__FILE__); ?>" style="width: 119px;"></label>
            <article>

<label style="text-align: left;
    border: none;
    margin-top: 25px;" id="sfbap1-label"><strong style="font-size: 20px;">Enable VK Feed:</strong> 
<input type="checkbox" class="ios-switch" name="sfbap1_enable_vk_feed" id="sfbap1_enable_vk_feed"  value='1'<?php checked(1, $sfbap1_enable_vk_feed); ?>>
<div class="switch"></div></label>
              <p  style="font-size: 1.3em;"><strong>Enter Your VK Account ID: </strong> <input type="text" name="sfbap1_vk_hashtag" value="<?php echo $sfbap1_vk_hashtag; ?>"  placeholder="5874905" style="display: inline-block;"></p>


                <table style="display: block;">
                   <tr>
        <td>
          <h3>Number of VK Posts to Show: </h3> 
        </td>
        <td>
          <input style="margin-left: 15px;display: inline-block;" type="number" min="1" max="20" id="sfbap1_number_of_photos" name="sfbap1_number_vk" value="<?php if($sfbap1_number_vk == ''){ echo '20' ;}else{ echo $sfbap1_number_vk; } ?>" /> max 20 allowed in Free Version
        </td>
      </tr>
              </table>

            </article>
        </div>

    </form>
  </section>
  <section id="sfbap1-content3">
    <table>
    
    <tr>
        <td><h3>Social Feed Card Width:</h3></td>
        <td> <input style="width: 70px;" type="number"  id="sfbap1_social_card_width" name="sfbap1_social_card_width" value="<?php if($sfbap1_social_card_width == ''){ echo '400' ;}else{ echo $sfbap1_social_card_width; } ?>" /> px
        </td>
    </tr>
    <tr>
        <td><h3 style="margin: 0;margin-top: 6px;margin-bottom: -15px;">Heading Font Size:</h3>
            </br>
            <h4 style="margin: 0;font-weight: normal;">Your Profile Account Name Font Size</h4>
        </td>
        <td>
            <input style="width: 70px;" type="number"  id="sfbap1_heading_font_size" name="sfbap1_heading_font_size" value="<?php if($sfbap1_heading_font_size == ''){ echo '' ;}else{ echo $sfbap1_heading_font_size; } ?>" /> px <span style="font-weight: bold;color:red;">(Leave empty for default theme font size)</span>
        </td>
    </tr>
    <tr>
        <td><h3  style="margin: 0;margin-top: 6px;margin-bottom: -15px;">Post Content Font Size:</h3>
            </br>
            <h4 style="margin: 0;font-weight: normal;">Single Post Caption Text Font Size</h4>
        </td>
        <td>
            <input style="width: 70px;" type="number"  id="sfbap1_caption_font_size" name="sfbap1_caption_font_size" value="<?php if($sfbap1_caption_font_size == ''){ echo '' ;}else{ echo $sfbap1_caption_font_size; } ?>" /> px <span style="font-weight: bold;color:red;">(Leave empty for default theme font size)</span>
        </td>
    </tr>
    <tr>
        <td><h3>Heading Color:</h3></td>
        <td><input type="text" id="sfbap1_social_card_heading_color" name="sfbap1_social_card_heading_color" class="color_picker" value="<?php if($sfbap1_social_card_heading_color == '') { echo '';}else { echo $sfbap1_social_card_heading_color;} ?>"> </td>
    </tr>
    <tr>
        <td><h3>Post Content Color:</h3></td>
        <td><input type="text" id="sfbap1_social_card_content_color" name="sfbap1_social_card_content_color" class="color_picker" value="<?php if($sfbap1_social_card_content_color == '') { echo '';}else { echo $sfbap1_social_card_content_color;} ?>"> </td>
    </tr>
    <tr>
        <td><h3>Date Text Color:</h3></td>
        <td><input type="text" id="sfbap1_social_card_date_color" name="sfbap1_social_card_date_color" class="color_picker" value="<?php if($sfbap1_social_card_date_color == '') { echo '';}else { echo $sfbap1_social_card_date_color;} ?>"> </td>
    </tr>
    <tr>
        <td><h3>Profile Picture Style:</h3></td>
        <td>
           <table id="sfbap1_profile_style_selection_option">
      <tr>
       <td>
          <p style="text-align: center;margin: 0;">
            <input id="sfbap1_feed_profile_style_square" type="radio" name="sfbap1_feed_profile_style" value="square" <?php echo ($sfbap1_feed_profile_style == 'square')? 'checked="checked"':''; ?> <?php if($sfbap1_feed_profile_style == ''){ echo 'checked="checked"';} ?> /> 
            <label for="sfbap1_feed_profile_style_square"><strong>Square</strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
            <label for="sfbap1_feed_profile_style_square">
              <img id="sfbap1_vertical_image" src="<?php echo plugins_url('images/square.png',__FILE__); ?>" />
            </label>
          </p>
        </td>
        <td>
          <p style="text-align: center;margin: 0;">
            <input id="sfbap1_feed_profile_style_rounded" type="radio" name="sfbap1_feed_profile_style" value="rounded" <?php echo ($sfbap1_feed_profile_style == 'rounded')? 'checked="checked"':''; ?> /> 
            <label for="sfbap1_feed_profile_style_rounded"><strong>Rounded</strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
            <label for="sfbap1_feed_profile_style_rounded">
              <img id="sfbap1_thumbnails_image" src="<?php echo plugins_url('images/rounded.png',__FILE__); ?>" />
            </label>
          </p>
        </td>
           <td>
          <p style="text-align: center;margin: 0;">
            <input id="sfbap1_feed_profile_style_curved" type="radio" name="sfbap1_feed_profile_style" value="curved" <?php echo ($sfbap1_feed_profile_style == 'curved')? 'checked="checked"':''; ?> /> 
            <label for="sfbap1_feed_profile_style_curved"><strong>Curved</strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
            <label for="sfbap1_feed_profile_style_curved">
              <img id="sfbap1_thumbnails_image" src="<?php echo plugins_url('images/curved.png',__FILE__); ?>" />
            </label>
          </p>
        </td>
      </tr>
    </table>
        </td>
    </tr>
    </table>

  </section>
  <div class="">
            <h3>Like the plugin? Share with friends & family!</h3>
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="https://wordpress.org/plugins/wp-social-feed/" data-text="Display your Facebook, Twitter, Instagram, Pinterest & VK posts on your site your way using the Social Feed WordPress plugin!" data-via="arrowplugins" data-dnt="true">Tweet</a>
            <a href="https://twitter.com/arrowplugins?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @arrowplugins</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            <div id="fb-root" style="display: none;"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=2152024168367031&autoLogAppEvents=1";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div style="vertical-align: top;" class="fb-share-button" data-href="https://wordpress.org/plugins/wp-social-feed" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share Social Feed Plugin</a></div>
            <div class="fb-like" data-href="https://www.facebook.com/wparrowplugins" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" style="display: block; float: left; margin-right: 4px;"></div>
            <script src="//platform.linkedin.com/in.js" type="text/javascript">
              lang: en_US
            </script>
            <script type="IN/Share" data-url="https://wordpress.org/plugins/wp-social-feed/"></script>
            <script src="https://apis.google.com/js/platform.js" async defer></script>
            <div class="g-plusone" data-size="medium" data-href="https://wordpress.org/plugins/wp-social-feed/"></div>


        </div>
</main>


<script type="text/javascript">

     var fragment = window.location.hash;

    if(fragment.length>0)
    {
                  $("#fbwait").css("display", "block");

        var tokenArray = fragment.split("&");
        var accessTokenArray = tokenArray[0].split("=");
        var accessToken = accessTokenArray[1];

        if(accessToken.length>0)
        {
                                

            jQuery.ajax({
                type: "GET",
                dataType: "JSON",
                url: "https://graph.facebook.com/v3.0/me?access_token="+accessToken, 
                data: "",
                success: function(data) {

                    var userId = data['id'];

                    if(userId.length > 0)
                    {

                        jQuery.ajax({
                            type: "GET",
                            dataType: "JSON",
                            url: "https://graph.facebook.com/v3.0/" + userId + "/accounts?fields=access_token,name,username,picture&access_token="+accessToken, 
                            data: "",
                            success: function(data) {
                                var NeverAccessToken = data['data'];

                                var html = "";
                                var longLifeAccessToken = "";
                                for(var i=0; i<NeverAccessToken.length; i++)
                                {

                                    longLifeAccessToken = data['data'][i]['access_token'];
                                    jQuery.ajax({
                                        type: "GET",
                                        dataType: "JSON",
                                        async: false,
                                        url: "https://graph.facebook.com/oauth/access_token?client_id=2152024168367031&client_secret=9a6eb1b084f0e036b39d5142902820f6&grant_type=fb_exchange_token&fb_exchange_token=" + longLifeAccessToken, 
                                        data: "",
                                        success: function(data) {

                                            if(null != data['access_token'] && data['access_token'].length > 0)
                                                longLifeAccessToken = data['access_token'];
                                            
                                            html += "<div class='fbpagetoken' style='cursor: pointer;' onclick='set_never_expire_token(this);' name='" + NeverAccessToken[i]['username'] + "' id='" + longLifeAccessToken + "'> <img id='fbpp' src=\"" + NeverAccessToken[i]['picture']['data']['url'] + "\" alt=\"" + NeverAccessToken[i]['name'] + "\" height=\"" + NeverAccessToken[i]['picture']['data']['height']  + "\" width=\"" + NeverAccessToken[i]['picture']['data']['width']  + "\"> <span id='fbpn'> " + NeverAccessToken[i]['name'] + "</span> </div>"

                                        }
                                    });
                                     
                                    $("#sfbap_access_token_pages").html('<p id="tokeninfo">Click on a page in the list below and it will add the <strong>Page ID</strong> and <strong>Access Token</strong> automatically, then click Publish or Update button to save settings.</p>'+html); 
                                    $('#sfbap_access_token_pages').css({"border-color": "#dadada", 
                                                                       "border-width":"1px", 
                                                                       "border-style":"solid"});
                                    $("input[type='radio'][id='sfbap1-tab2']").attr("checked", true);
                                    var y = $(window).scrollTop();  //your current y position on the page
                                    $(window).scrollTop(y+60);  
                                    $("#fbwait").css("display", "none");

                                  }
                              }
                        });
                    }

                  
                    
                }
            });

        }
    }

    function set_never_expire_token(element){

        var username = $(element).attr("name");

        if(username == "undefined") username = "";;
        $("#sfbap1_facebook_access_token").val($(element).attr("id"));
        $("#sfbap1_facebook_page_id").val(username);
        $('#sfbap_access_token_pages .fbpagetoken').removeClass('fbpagetokenactive');
        $(element).addClass('fbpagetokenactive');
        $('#sfbap1_facebook_access_token').addClass('tokengeneratedappearance');
        $('#sfbap1_facebook_page_id').addClass('tokengeneratedappearance');
        
    }

</script>

<style type="text/css">
.tokengeneratedappearance{
border: 2px dashed #5b7dc5 !important;
}
.fbpagetokenactive{
    background: #eaeaea;
}
div#sfbap_access_token_pages div {
    display: inline-block;
    margin: 10px;
    text-align: center;
    padding: 10px;
    border-radius: 5px;

}
img#fbpp {
    display: block;
    margin: 0 auto;
    border-radius: 5px;
    margin-bottom: 10px;
}
span#fbpn {
    font-size: 14px;
    font-weight: bold;
    color: #585858;
}
div#sfbap_access_token_pages div:hover {
    background: #dedede;
    
}
#tokeninfo{
    font-size: 15px;
    text-align: center;
    background: #5b7dc5;
    color: white;
    padding-top: 6px;
    padding-bottom: 5px;
    margin-top: 0;
    width: 100%;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
#sfbap_access_token_pages{
    padding: 0px;
    padding-top: 0;
    border-radius: 5px;
    text-align: center;
}
#fbaccesstokenbutton{
    /* width: 350px; */
    /* height: 51px; */
    background: #4867aa;
    display: inline-block;
    border-radius: 5px;
    color: white;
    padding: 17px;
    font-size: 16px;
    text-decoration: none;
}
#notworking{
  margin-left: 20px;
  font-size: 14px !important;
  text-decoration: none;
}
#fbaccesstokenbutton {
    display: inline-block;
    font-size: 14px;
    padding: 17px 30px 15px 44px;
    background-color: #2b4170; /* fallback color */
  background: -moz-linear-gradient(top, #3b5998, #2b4170);
  background: -ms-linear-gradient(top, #3b5998, #2b4170);
  background: -webkit-linear-gradient(top, #3b5998, #2b4170);
  border: 1px solid #2b4170;
    color: #fff;
    text-shadow: 0 -1px 0 rgba(0,0,20,.4);
    text-decoration: none;
    line-height: 1;
    position: relative;
    border-radius: 5px;
        font-family: sans-serif;
    font-weight: bold;
}
#fbwait{
    width: 18%;
    height: 94px;
    border: 1px solid #444444;
    position: fixed;
    top: 40%;
    left: 40%;
    padding: 2px;
    background: white;
    text-align: center;
    border-radius: 5px;
    box-shadow: 0 5px 38px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.4);
    padding-right: 5px;
    background: white;
    font-weight: bold;
    font-size: 15px;
    z-index: 9999;
    line-height: 1.5;
}
#fbaccesstokenbutton:before {
    display: inline-block;
    position: relative;
    background-image: url(data:image/png;base64,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);
    height: 23px;
    background-repeat: no-repeat;
    background-position: 0px 0px;
    text-indent: -9999px;
    text-align: center;
    width: 29px;
    line-height: 23px;
    margin: -8px 7px -7px -30px;
    padding: 2 25px 0 0;
    content: "f";

}
#fbaccesstokenbutton:hover {
  background-color: #3b5998; /* fallback color */
  background: -moz-linear-gradient(top, #2b4170, #3b5998);
  background: -ms-linear-gradient(top, #2b4170, #3b5998);
  background: -webkit-linear-gradient(top, #2b4170, #3b5998);
}
</style>