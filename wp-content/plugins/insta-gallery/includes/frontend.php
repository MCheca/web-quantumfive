<?php
if (!defined('ABSPATH'))
  exit;

if (!class_exists('QLIGG_Frontend')) {

  class QLIGG_Frontend {

    protected static $instance;

    function add_frontend_js() {

      wp_register_style('insta-gallery', plugins_url('/assets/css/qligg.min.css', QLIGG_PLUGIN_FILE), null, QLIGG_PLUGIN_VERSION);
      wp_register_script('insta-gallery', plugins_url('/assets/js/qligg.min.js', QLIGG_PLUGIN_FILE), array('jquery'), QLIGG_PLUGIN_VERSION, true);

      wp_localize_script('insta-gallery', 'qligg', array(
          'ajax_url' => admin_url('admin-ajax.php')
      ));

      // Masonry
      // -----------------------------------------------------------------------
      wp_register_script('desandro', plugins_url('/assets/masonry/masonry.pkgd.min.js', QLIGG_PLUGIN_FILE), null, QLIGG_PLUGIN_VERSION, true);

      // Swiper
      // -----------------------------------------------------------------------
      wp_register_style('swiper', plugins_url('/assets/swiper/swiper.min.css', QLIGG_PLUGIN_FILE), null, QLIGG_PLUGIN_VERSION);
      wp_register_script('swiper', plugins_url('/assets/swiper/swiper.min.js', QLIGG_PLUGIN_FILE), array('jquery'), QLIGG_PLUGIN_VERSION, true);

      // Popup
      // -----------------------------------------------------------------------
      wp_register_style('magnific-popup', plugins_url('/assets/magnific-popup/magnific-popup.min.css', QLIGG_PLUGIN_FILE), null, QLIGG_PLUGIN_VERSION);
      wp_register_script('magnific-popup', plugins_url('/assets/magnific-popup/jquery.magnific-popup.min.js', QLIGG_PLUGIN_FILE), array('jquery'), QLIGG_PLUGIN_VERSION, true);
    }

    function get_items($instagram_feed = false, $next_max_id = false) {

      if (isset($instagram_feed['type'])) {

        if ($instagram_feed['type'] == 'username') {
          return qligg_get_user_items($instagram_feed['username'], $instagram_feed['limit'], $next_max_id);
        }

        if ($instagram_feed['type'] == 'tag') {
          return qligg_get_tag_items($instagram_feed['tag'], $instagram_feed['limit'], $next_max_id);
        }
      }

      return array();
    }

    function load_item_images() {

      global $qligg_token, $qligg_api;

      if (!isset($_REQUEST['feed']['id'])) {
        wp_send_json_error(esc_html__('Invalid item id', 'insta-gallery'));
      }

      $instagram_feed = $_REQUEST['feed'];

      $next_max_id = isset($_REQUEST['next_max_id']) ? $_REQUEST['next_max_id'] : null;

      ob_start();

      if (is_array($instagram_items = $this->get_items($instagram_feed, $next_max_id))) {

        // Template
        // ---------------------------------------------------------------------

        $i = 1;

        foreach ($instagram_items as $item) {

          $image = @$item['images'][$instagram_feed['size']];

          include($this->template_path('item/item.php'));

          $i++;

          if (($instagram_feed['limit'] != 0) && ($i > $instagram_feed['limit'])) {
            break;
          }
        }

        wp_send_json_success(ob_get_clean());
      }

      $messages = array(
          $qligg_api->get_message()
      );

      include($this->template_path('alert.php'));

      wp_send_json_error(ob_get_clean());
    }

    function template_path($template_name, $template_file = false) {

      if (file_exists(trailingslashit(get_stylesheet_directory()) . "insta-gallery/{$template_name}")) {
        $template_file = trailingslashit(get_stylesheet_directory()) . "insta-gallery/{$template_name}";
      }

      if (file_exists(QLIGG_PLUGIN_DIR . "templates/{$template_name}")) {
        $template_file = QLIGG_PLUGIN_DIR . "templates/{$template_name}";
      }

      return apply_filters('qligg_template_file', $template_file, $template_name);
    }

    function do_shortcode($atts, $content = null) {

      global $qligg, $qligg_token, $qligg_api;

      $atts = shortcode_atts(array(
          'id' => 0), $atts);

      // Start loading
      // -----------------------------------------------------------------------

      if ($id = absint($atts['id'])) {

        if (count($instagram_feeds = get_option('insta_gallery_items'))) {

          if (isset($instagram_feeds[$id])) {

            $instagram_feed = wp_parse_args($instagram_feeds[$id], QLIGG_Options::instance()->instagram_feed);

            wp_enqueue_style('insta-gallery');
            wp_enqueue_script('insta-gallery');

            if ($instagram_feed['insta_popup']) {
              wp_enqueue_style('magnific-popup');
              wp_enqueue_script('magnific-popup');
            }

            if ($instagram_feed['insta_layout'] == 'carousel') {
              wp_enqueue_style('swiper');
              wp_enqueue_script('swiper');
            }

            if (in_array($instagram_feed['insta_layout'], array('masonry', 'highlight'))) {
              wp_enqueue_script('desandro');
            }

            $item_selector = "insta-gallery-feed-{$id}";

            if (isset($instagram_feed['insta_source'])) {

              if ($instagram_feed['insta_source'] == 'username') {

                $profile_info = qligg_get_user_profile($instagram_feed['insta_username']);
              } else {
                $profile_info = qligg_get_tag_profile($instagram_feed['insta_tag']);
              }
            }

            $instagram_feed['insta_spacing'] = $instagram_feed['insta_spacing'] / 2;

            $options = array(
                'id' => $id,
                'profile' => array(
                    'id' => $profile_info['id'],
                    'user' => $profile_info['user'],
                    'name' => $profile_info['name'],
                    'picture' => $profile_info['picture'],
                    'link' => $profile_info['link'],
                ),
                'type' => $instagram_feed['insta_source'],
                'username' => $instagram_feed['insta_username'],
                'tag' => $instagram_feed['insta_tag'],
                'layout' => $instagram_feed['insta_layout'],
                'limit' => $instagram_feed['insta_limit'],
                'spacing' => $instagram_feed['insta_spacing'],
                'size' => $instagram_feed['insta_size'],
                'hover' => $instagram_feed['insta_hover'],
                'comments' => $instagram_feed['insta_comments'],
                'likes' => $instagram_feed['insta_likes'],
                'columns' => $instagram_feed['insta_gal-cols'],
                'highlight' => (array) explode(',', str_replace(' ', '', "{$instagram_feed['insta_highlight-tag']},{$instagram_feed['insta_highlight-id']},{$instagram_feed['insta_highlight-position']}")),
                'carousel' => array(
                    'autoplay' => $instagram_feed['insta_car-autoplay'],
                    'interval' => $instagram_feed['insta_car-autoplay-interval'],
                    'slides' => $instagram_feed['insta_car-slidespv'],
                ),
                'popup' => array(
                    'display' => $instagram_feed['insta_popup'],
                    'profile' => $instagram_feed['insta_popup-profile'],
                    'caption' => $instagram_feed['insta_popup-caption'],
                    'likes' => $instagram_feed['insta_popup-likes'],
                    'align' => $instagram_feed['insta_popup-align'],
                ),
                'card' => array(
                    'display' => $instagram_feed['insta_card'],
                    'info' => $instagram_feed['insta_card-info'],
                    'caption' => $instagram_feed['insta_card-caption'],
                    'length' => $instagram_feed['insta_card-length'],
                )
            );

            ob_start();
            ?>
            <style>
            <?php
            if ($instagram_feed['insta_layout'] != 'carousel') {
              if (!empty($instagram_feed['insta_spacing'])) {
                echo "#{$item_selector} .insta-gallery-list {margin: 0 -{$instagram_feed['insta_spacing']}px;}";
              }
              if (!empty($instagram_feed['insta_spacing'])) {
                echo "#{$item_selector} .insta-gallery-list .insta-gallery-item {padding: {$instagram_feed['insta_spacing']}px;}";
              }
            }
            if ($instagram_feed['insta_layout'] == 'carousel') {
              if (!empty($instagram_feed['insta_car-pagination-color'])) {
                echo "#{$item_selector} .swiper-pagination-bullet-active {background-color: {$instagram_feed['insta_car-pagination-color']};}";
              }
              if (!empty($instagram_feed['insta_car-navarrows-color'])) {
                echo "#{$item_selector} .swiper-button-next > i, #{$item_selector} .swiper-button-prev > i {color: {$instagram_feed['insta_car-navarrows-color']};}";
              }
            }
            if (!empty($instagram_feed['insta_hover-color'])) {
              echo "#{$item_selector} .insta-gallery-list .insta-gallery-item .insta-gallery-image-wrap .insta-gallery-image-mask {background-color: {$instagram_feed['insta_hover-color']};}";
            }
            if (!empty($instagram_feed['insta_button-background'])) {
              echo "#{$item_selector} .insta-gallery-actions .insta-gallery-button {background-color: {$instagram_feed['insta_button-background']};}";
            }
            if (!empty($instagram_feed['insta_button-background-hover'])) {
              echo "#{$item_selector} .insta-gallery-actions .insta-gallery-button:hover {background-color: {$instagram_feed['insta_button-background-hover']};}";
            }

            if (!empty($qligg['insta_spinner_image_id'])) {

              $spinner = wp_get_attachment_image_src($qligg['insta_spinner_image_id'], 'full');

              if (!empty($spinner[0])) {
                echo "#{$item_selector} .insta-gallery-spinner {background-image:url($spinner[0])}";
              }
            }
            do_action('qligg_template_style', $item_selector, $instagram_feed);
            ?>
            </style>
            <?php
            if ($template_file = $this->template_path("{$instagram_feed['insta_layout']}.php")) {
              include($template_file);
              return ob_get_clean();
            }

            $messages = array(
                sprintf(esc_html__('The layout %s is not a available.', 'insta-gallery'), $instagram_feed['insta_layout'])
            );

            include($this->template_path('alert.php'));

            return ob_get_clean();
          }
        }
      }
    }

    function init() {
      add_action('wp_ajax_nopriv_qligg_load_item_images', array($this, 'load_item_images'));
      add_action('wp_ajax_qligg_load_item_images', array($this, 'load_item_images'));
      add_action('wp_enqueue_scripts', array($this, 'add_frontend_js'));
      add_shortcode('insta-gallery', array($this, 'do_shortcode'));
    }

    public static function instance() {
      if (!isset(self::$instance)) {
        self::$instance = new self();
        self::$instance->init();
      }
      return self::$instance;
    }

  }

  QLIGG_Frontend::instance();
}
