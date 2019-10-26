<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('QLIGG_AJAX')) {

  class QLIGG_AJAX {

    protected static $instance;

    function sanitize_feed($feed) {

      global $qligg_api;

      // Removing @, # and trimming input
      // ---------------------------------------------------------------------

      $feed = sanitize_text_field($feed);

      $feed = trim($feed);
      $feed = str_replace('@', '', $feed);
      $feed = str_replace('#', '', $feed);
      $feed = str_replace($qligg_api->instagram_url, '', $feed);
      $feed = str_replace('/explore/tags/', '', $feed);
      $feed = str_replace('/', '', $feed);

      return $feed;
    }

    function save_settings() {

      global $qligg;

      if (current_user_can('manage_options')) {

        if (!empty($_REQUEST) && check_admin_referer('qligg_save_settings', 'ig_nonce')) {

          $keys = array(
              'insta_license' => 0,
              'insta_flush' => 0,
              'insta_reset' => 1,
              'insta_spinner_image_id' => 0
          );

          $qligg = wp_parse_args(array_intersect_key($_REQUEST, $keys), $qligg);

          update_option('insta_gallery_settings', $qligg, false);

          wp_send_json_success(esc_html__('Settings updated successfully', 'insta-gallery'));
        }
      }

      wp_send_json_error(esc_html__('Invalid Request', 'insta-gallery'));
    }

    function generate_token() {

      global $qligg_token, $qligg_api;

      if (current_user_can('manage_options')) {

        if (!empty($_REQUEST) && check_admin_referer('qligg_generate_token', 'ig_nonce')) {

          if (empty($_REQUEST['ig_access_token'])) {
            wp_send_json_error(esc_html__('Empty access token', 'insta-gallery'));
          }

          $access_token = sanitize_text_field($_REQUEST['ig_access_token']);

          if (count($access_token_id = explode('.', $access_token)) == 1) {
            wp_send_json_error(esc_html__('Invalid access token', 'insta-gallery'));
          }

          if (!$qligg_api->validate_token($access_token)) {
            wp_send_json_error($qligg_api->get_message());
          }

          if (isset($qligg_token[$access_token_id[0]]) && $qligg_token[$access_token_id[0]] == $access_token) {

            if ($profile_info = qligg_get_user_profile($access_token_id[0])) {
              wp_send_json_error(sprintf(esc_html__('The %s account is already connected. To connect a new account logout from Instagram in this browser.', 'insta-gallery'), @$profile_info['user']));
            }

            wp_send_json_error(esc_html__('Account already connected. To connect a new account logout from Instagram in this browser.', 'insta-gallery'));
          }

          $new_token = array(
              $access_token_id[0] => $access_token
          );

          update_option('insta_gallery_token', apply_filters('qligg_update_insta_gallery_token', $new_token), false);
          delete_transient('insta_gallery_user_profile');

          wp_send_json_success(esc_html__('Access token created', 'insta-gallery'));
        }
      }

      wp_send_json_error(esc_html__('Invalid Request', 'insta-gallery'));
    }

    function remove_token() {

      global $qligg_token;

      if (current_user_can('manage_options')) {

        if (!empty($_REQUEST) && check_admin_referer('qligg_generate_token', 'ig_nonce')) {

          if (!isset($_REQUEST['item_id'])) {
            wp_send_json_error(esc_html__('Invalid item id', 'insta-gallery'));
          }

          $item_id = sanitize_text_field($_REQUEST['item_id']);

          unset($qligg_token[$item_id]);

          update_option('insta_gallery_token', $qligg_token, false);
          delete_transient('insta_gallery_user_profile');

          wp_send_json_success(esc_html__('Token removed successfully', 'insta-gallery'));
        }
      }

      wp_send_json_error(esc_html__('Invalid Request', 'insta-gallery'));
    }

    function update_form() {

      global $qligg_token, $qligg_api;

      if (current_user_can('manage_options')) {

        if (!empty($_REQUEST) && check_admin_referer('qligg_update_form', 'ig_nonce')) {

          if (empty($item_type = $_REQUEST['insta_source'])) {
            wp_send_json_error(esc_html__('Select gallery item type', 'insta-gallery'));
          }
          if ($item_type == 'username' && empty($_REQUEST['insta_username'])) {
            wp_send_json_error(esc_html__('Username is empty', 'insta-gallery'));
          }
          if ($item_type == 'tag' && empty($_REQUEST['insta_tag'])) {
            wp_send_json_error(esc_html__('Tag is empty', 'insta-gallery'));
          }

          $instagram_feed = array();

          $instagram_feed['insta_source'] = sanitize_key(@$_REQUEST['insta_source']);
          $instagram_feed['insta_layout'] = sanitize_key(@$_REQUEST['insta_layout']);
          $instagram_feed['insta_username'] = $this->sanitize_feed(@$_REQUEST['insta_username']);
          $instagram_feed['insta_tag'] = $this->sanitize_feed(@$_REQUEST['insta_tag']);
          $instagram_feed['insta_limit'] = absint(@$_REQUEST['insta_limit']);
          $instagram_feed['insta_gal-cols'] = absint(@$_REQUEST['insta_gal-cols']);
          $instagram_feed['insta_spacing'] = absint(@$_REQUEST['insta_spacing']);
          $instagram_feed['insta_button'] = absint(@$_REQUEST['insta_button']);
          $instagram_feed['insta_button-text'] = trim(esc_html(@$_REQUEST['insta_button-text']));
          $instagram_feed['insta_button-background'] = sanitize_text_field(@$_REQUEST['insta_button-background']);
          $instagram_feed['insta_button-background-hover'] = sanitize_text_field(@$_REQUEST['insta_button-background-hover']);
          $instagram_feed['insta_car-slidespv'] = absint(@$_REQUEST['insta_car-slidespv']);
          $instagram_feed['insta_car-autoplay'] = absint(@$_REQUEST['insta_car-autoplay']);
          $instagram_feed['insta_car-autoplay-interval'] = absint(@$_REQUEST['insta_car-autoplay-interval']);
          $instagram_feed['insta_car-navarrows'] = absint(@$_REQUEST['insta_car-navarrows']);
          $instagram_feed['insta_car-navarrows-color'] = sanitize_text_field(@$_REQUEST['insta_car-navarrows-color']);
          $instagram_feed['insta_car-pagination'] = absint(@$_REQUEST['insta_car-pagination']);
          $instagram_feed['insta_car-pagination-color'] = sanitize_text_field(@$_REQUEST['insta_car-pagination-color']);
          $instagram_feed['insta_size'] = sanitize_key(@$_REQUEST['insta_size']);
          $instagram_feed['insta_hover'] = absint(@$_REQUEST['insta_hover']);
          $instagram_feed['insta_hover-color'] = sanitize_text_field(@$_REQUEST['insta_hover-color']);
          $instagram_feed['insta_popup'] = absint(@$_REQUEST['insta_popup']);
          $instagram_feed['insta_likes'] = absint(@$_REQUEST['insta_likes']);
          $instagram_feed['insta_comments'] = absint(@$_REQUEST['insta_comments']);

          // Removing @, # and trimming input
          /* ---------------------------------------------------------------------
            $instagram_feed['insta_username'] = trim($instagram_feed['insta_username']);
            $instagram_feed['insta_username'] = str_replace('@', '', $instagram_feed['insta_username']);
            $instagram_feed['insta_username'] = str_replace('#', '', $instagram_feed['insta_username']);
            $instagram_feed['insta_username'] = str_replace($qligg_api->instagram_url, '', $instagram_feed['insta_username']);
            $instagram_feed['insta_username'] = str_replace('/', '', $instagram_feed['insta_username']);

            $instagram_feed['insta_tag'] = trim($instagram_feed['insta_tag']);
            $instagram_feed['insta_tag'] = str_replace('@', '', $instagram_feed['insta_tag']);
            $instagram_feed['insta_tag'] = str_replace('#', '', $instagram_feed['insta_tag']);
            $instagram_feed['insta_tag'] = str_replace("{$qligg_api->instagram_url}/explore/tags/", '', $instagram_feed['insta_tag']);
            $instagram_feed['insta_tag'] = str_replace('/', '', $instagram_feed['insta_tag']); */

          $instagram_feeds = get_option('insta_gallery_items', array());

          $item_id = isset($_REQUEST['item_id']) ? absint($_REQUEST['item_id']) : count($instagram_feeds) + 1;

          $instagram_feeds[$item_id] = $instagram_feed;

          update_option('insta_gallery_items', apply_filters('qligg_update_insta_gallery_items', $instagram_feeds, $item_id));

          wp_send_json_success(admin_url("admin.php?page=qligg_feeds&tab=edit&item_id={$item_id}"));
        }
      }
      wp_send_json_error(esc_html__('Invalid Request', 'insta-gallery'));
    }

    function form_item_delete() {

      if (current_user_can('manage_options')) {

        if (!empty($_REQUEST) && check_admin_referer('qligg_form_item', 'ig_nonce')) {

          if (isset($_REQUEST['item_id'])) {

            $instagram_feeds = get_option('insta_gallery_items');

            $item_id = absint($_REQUEST['item_id']);

            if (isset($instagram_feeds[$item_id])) {

              unset($instagram_feeds[$item_id]);

              update_option('insta_gallery_items', $instagram_feeds, false);
            }

            wp_send_json_success(admin_url("admin.php?page=qligg_feeds"));
          }
        }
      }

      wp_send_json_error(esc_html__('Invalid Request', 'insta-gallery'));
    }

    function form_item_cache() {

      global $wpdb;

      if (current_user_can('manage_options')) {

        if (!empty($_REQUEST) && check_admin_referer('qligg_form_item', 'ig_nonce')) {

          if (isset($_REQUEST['item_id'])) {

            $instagram_feeds = get_option('insta_gallery_items');

            $item_id = absint($_REQUEST['item_id']);

            if (isset($instagram_feeds[$item_id]) && $instagram_feed = $instagram_feeds[$item_id]) {

              if ($instagram_feed['insta_source'] == 'username') {
                $tk = "%%insta_gallery_user_items_{$instagram_feed['insta_username']}_%%";
              } else {
                $tk = "%%insta_gallery_tag_items_{$instagram_feed['insta_tag']}_%%";
              }

              if ($tks = $wpdb->get_row($wpdb->prepare("SELECT option_name FROM {$wpdb->options} WHERE option_name LIKE %s", $tk))) {
                foreach ($tks as $key => $name) {
                  delete_transient(str_replace('_transient_', '', $name));
                }

                wp_send_json_success(esc_html__('Feed caches cleared', 'insta-gallery'));
              }
            }
          }
        }
      }

      wp_send_json_error(esc_html__('Invalid Request', 'insta-gallery'));
    }

    function init() {
      // Settings
      add_action('wp_ajax_qligg_save_settings', array($this, 'save_settings'));

      // Token
      // -----------------------------------------------------------------------
      add_action('wp_ajax_qligg_generate_token', array($this, 'generate_token'));
      add_action('wp_ajax_qligg_remove_token', array($this, 'remove_token'));

      // Settings
      // -----------------------------------------------------------------------
      add_action('wp_ajax_qligg_update_form', array($this, 'update_form'));
      add_action('wp_ajax_qligg_form_item_delete', array($this, 'form_item_delete'));
      add_action('wp_ajax_qligg_form_item_cache', array($this, 'form_item_cache'));


      //add_action('admin_init', array($this, 'admin_init'));
    }

    public static function instance() {
      if (!isset(self::$instance)) {
        self::$instance = new self();
        self::$instance->init();
      }
      return self::$instance;
    }

  }

  QLIGG_AJAX::instance();
}
