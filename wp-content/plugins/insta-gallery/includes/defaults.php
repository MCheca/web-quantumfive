<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('QLIGG_Options')) {

  class QLIGG_Options {

    protected static $instance;
    public $instagram_feed = array(
        'insta_source' => 'username',
        'insta_tag' => '',
        'insta_username' => '',
        'insta_layout' => 'gallery',
        // Box
        // ---------------------------------------------------------------------
        'insta_box' => false,
        'insta_box-padding' => 0,
        'insta_box-radius' => 0,
        'insta_box-background' => false,
        'insta_box-profile' => false,
        'insta_box-desc' => false,
        // Masonry
        // ---------------------------------------------------------------------
        'insta_highlight-tag' => '',
        'insta_highlight-id' => '',
        'insta_highlight-position' => '',
        // Carousel
        // ---------------------------------------------------------------------
        'insta_car-slidespv' => 5,
        'insta_car-autoplay' => true,
        'insta_car-autoplay-interval' => '3000',
        'insta_car-navarrows' => true,
        'insta_car-navarrows-color' => '',
        'insta_car-pagination' => true,
        'insta_car-pagination-color' => '',
        // Gallery
        // ---------------------------------------------------------------------
        'insta_gal-cols' => 3,
        // General
        // ---------------------------------------------------------------------
        'insta_limit' => 12,
        'insta_spacing' => 10,
        'insta_size' => 'standard',
        // Mask
        // ---------------------------------------------------------------------
        'insta_hover' => true,
        'insta_hover-color' => '',
        'insta_likes' => true,
        'insta_comments' => true,
        // Button
        // ---------------------------------------------------------------------        
        'insta_button' => true,
        'insta_button-text' => 'View on Instagram',
        'insta_button-background' => '',
        'insta_button-background-hover' => '',
        // Popup
        // ---------------------------------------------------------------------
        'insta_popup' => true,
        // Premium
        // ---------------------------------------------------------------------
        // ---------------------------------------------------------------------
        'insta_popup-profile' => false,
        'insta_popup-caption' => false,
        'insta_popup-likes' => false,
        'insta_popup-align' => 'bottom',
        // Button
        // ---------------------------------------------------------------------
        'insta_button_load' => false,
        'insta_button_load-text' => 'Load more...',
        'insta_button_load-background' => '',
        'insta_button_load-background-hover' => '',
        // Card
        // ---------------------------------------------------------------------
        'insta_card' => false,
        'insta_card-radius' => '',
        'insta_card-font-size' => '',
        'insta_card-background' => '',
        'insta_card-padding' => '',
        'insta_card-info' => '',
        'insta_card-length' => 10,
        'insta_card-caption' => '',
    );

    /* function defaults() {

      $this->defaults = array(
      '3617511663' => '3617511663.6e628e6.b9ce4730be83482f84943bc2cbfdd077',
      );

      return $this->defaults;
      } */

    function options() {

      global $qligg, $qligg_token;

      $qligg = get_option('insta_gallery_settings', array(
          'insta_license' => 0,
          'insta_flush' => 0,
          'insta_reset' => 1,
          'insta_spinner_image_id' => 0
      ));

      $qligg_token = get_option('insta_gallery_token', get_option('insta_gallery_iac', array()));
    }

    function rename_insta_gallery_token($qligg_token = array()) {

      if (isset($qligg_token['access_token'])) {

        $access_token = base64_decode($qligg_token['access_token']);

        $access_token_id = explode('.', $access_token);

        $qligg_token = array(
            $access_token_id[0] => $access_token
        );
      }

      return $qligg_token;
    }

    function rename_insta_gallery_items($instagram_feeds = array()) {

      global $qligg_token;

      // Backward compatibility v2.2.3
      // -----------------------------------------------------------------------

      foreach ($instagram_feeds as $id => $instagram_feed) {

        if (!isset($instagram_feed['insta_username']) && !empty($instagram_feed['insta_user'])) {
          $instagram_feeds[$id]['insta_username'] = key($qligg_token);
        }

        if (!isset($instagram_feed['insta_source']) && !empty($instagram_feed['ig_select_from'])) {
          $instagram_feeds[$id]['insta_source'] = $instagram_feed['ig_select_from'];
        }

        if (!isset($instagram_feed['insta_layout']) && !empty($instagram_feed['ig_display_type'])) {
          $instagram_feeds[$id]['insta_layout'] = $instagram_feed['ig_display_type'];
        }

        if (empty($instagram_feed['insta_button-text'])) {
          $instagram_feeds[$id]['insta_button-text'] = 'View on Instagram';
        }
        if (empty($instagram_feed['insta_thumb']) && !empty($instagram_feed['insta_thumb-size'])) {
          $instagram_feeds[$id]['insta_size'] = $instagram_feed['insta_thumb-size'];
        }
        if (empty($instagram_feed['insta_button']) && !empty($instagram_feed['insta_instalink'])) {
          $instagram_feeds[$id]['insta_button'] = $instagram_feed['insta_instalink'];
        }
        if (empty($instagram_feed['insta_button-text']) && !empty($instagram_feed['insta_instalink-text'])) {
          $instagram_feeds[$id]['insta_button-text'] = $instagram_feed['insta_instalink-text'];
        }
        if (empty($instagram_feed['insta_button-background']) && !empty($instagram_feed['insta_instalink-bgcolor'])) {
          $instagram_feeds[$id]['insta_button-background'] = $instagram_feed['insta_instalink-bgcolor'];
        }
        if (empty($instagram_feed['insta_button-background-hover']) && !empty($instagram_feed['insta_instalink-hvrcolor'])) {
          $instagram_feeds[$id]['insta_button-background-hover'] = $instagram_feed['insta_instalink-hvrcolor'];
        }

        if (!isset($instagram_feed['insta_limit'])) {

          $instagram_feeds[$id]['insta_limit'] = 12;

          if (isset($instagram_feed['insta_source']) && $instagram_feed['insta_source'] == 'username') {
            $instagram_feeds[$id]['insta_limit'] = absint($instagram_feed['insta_user-limit']);
          }

          if (isset($instagram_feed['insta_source']) && $instagram_feed['insta_source'] == 'tag') {
            $instagram_feeds[$id]['insta_limit'] = absint($instagram_feed['insta_tag-limit']);
          }
        }

        if (!isset($instagram_feed['insta_spacing'])) {

          $instagram_feeds[$id]['insta_spacing'] = 0;

          if (!empty($instagram_feed['insta_gal-spacing']) && $instagram_feed['insta_layout'] == 'gallery') {
            $instagram_feeds[$id]['insta_spacing'] = 10;
          }

          if (!empty($instagram_feed['insta_car-spacing']) && $instagram_feed['insta_layout'] == 'carousel') {
            $instagram_feeds[$id]['insta_spacing'] = 10;
          }
        }

        if (!isset($instagram_feed['insta_hover'])) {

          $instagram_feeds[$id]['insta_hover'] = true;

          if (isset($instagram_feed['insta_gal-hover']) && $instagram_feed['insta_layout'] == 'gallery') {
            $instagram_feeds[$id]['insta_hover'] = $instagram_feed['insta_gal-hover'];
          }

          if (isset($instagram_feed['insta_car-hover']) && $instagram_feed['insta_layout'] == 'carousel') {
            $instagram_feeds[$id]['insta_hover'] = $instagram_feed['insta_car-hover'];
          }
        }

        if (!isset($instagram_feed['insta_popup'])) {

          $instagram_feeds[$id]['insta_popup'] = true;

          if (isset($instagram_feed['insta_gal-popup']) && $instagram_feed['insta_layout'] == 'gallery') {
            $instagram_feeds[$id]['insta_popup'] = $instagram_feed['insta_gal-popup'];
          }

          if (isset($instagram_feed['insta_car-popup']) && $instagram_feed['insta_layout'] == 'carousel') {
            $instagram_feeds[$id]['insta_popup'] = $instagram_feed['insta_car-popup'];
          }
        }
      }

      return $instagram_feeds;
    }

    function init() {
      add_filter('option_insta_gallery_iac', array($this, 'rename_insta_gallery_token'), 10);
      add_filter('option_insta_gallery_token', array($this, 'rename_insta_gallery_token'), 10);
      add_filter('option_insta_gallery_items', array($this, 'rename_insta_gallery_items'), 10);
      add_action('init', array($this, 'options'));
    }

    public static function instance() {
      if (!isset(self::$instance)) {
        self::$instance = new self();
        //self::$instance->defaults();
        self::$instance->init();
      }
      return self::$instance;
    }

  }

  QLIGG_Options::instance();
}
