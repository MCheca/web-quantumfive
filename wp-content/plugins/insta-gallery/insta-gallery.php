<?php
/**
 * Plugin Name:       Instagram Feed Gallery
 * Plugin URI:        https://quadlayers.com/portfolio/instagram-gallery/
 * Description:       Display beautifull and responsive galleries on your website from your Instagram feed account.
 * Version:           2.5.8
 * Author:            Quadlayers
 * Author URI:        https://quadlayers.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       insta-gallery
 * Domain Path:       /languages
 */
if (!defined('ABSPATH'))
  exit;

if (!defined('QLIGG_PLUGIN_NAME')) {
  define('QLIGG_PLUGIN_NAME', 'Instagram Feed Gallery');
}
if (!defined('QLIGG_PLUGIN_VERSION')) {
  define('QLIGG_PLUGIN_VERSION', '2.5.8');
}
if (!defined('QLIGG_PLUGIN_FILE')) {
  define('QLIGG_PLUGIN_FILE', __FILE__);
}
if (!defined('QLIGG_PLUGIN_DIR')) {
  define('QLIGG_PLUGIN_DIR', __DIR__ . DIRECTORY_SEPARATOR);
}
if (!defined('QLIGG_DOMAIN')) {
  define('QLIGG_DOMAIN', 'qligg');
}
if (!defined('QLIGG_WORDPRESS_URL')) {
  define('QLIGG_WORDPRESS_URL', 'https://wordpress.org/plugins/insta-gallery/');
}
if (!defined('QLIGG_REVIEW_URL')) {
  define('QLIGG_REVIEW_URL', 'https://wordpress.org/support/plugin/insta-gallery/reviews/?filter=5#new-post');
}
if (!defined('QLIGG_DEMO_URL')) {
  define('QLIGG_DEMO_URL', 'https://quadlayers.com/instagram-feed/?utm_source=qligg_admin');
}
if (!defined('QLIGG_PURCHASE_URL')) {
  define('QLIGG_PURCHASE_URL', QLIGG_DEMO_URL);
}
if (!defined('QLIGG_SUPPORT_URL')) {
  define('QLIGG_SUPPORT_URL', 'https://quadlayers.com/account/support/?utm_source=qligg_admin');
}
if (!defined('QLIGG_GROUP_URL')) {
  define('QLIGG_GROUP_URL', 'https://www.facebook.com/groups/quadlayers');
}
if (!defined('QLIGG_DEVELOPER')) {
  define('QLIGG_DEVELOPER', false);
}

if (!class_exists('QLIGG')) {

  class QLIGG {

    protected static $instance;

    function ajax_dismiss_notice() {

      if (check_admin_referer('qligg_dismiss_notice', 'nonce') && isset($_REQUEST['notice_id'])) {

        $notice_id = sanitize_key($_REQUEST['notice_id']);

        update_user_meta(get_current_user_id(), $notice_id, true);

        wp_send_json($notice_id);
      }

      wp_die();
    }

    function add_notices() {

      if (!get_transient('qligg-first-rating') && !get_user_meta(get_current_user_id(), 'qligg-user-rating', true)) {
        ?>
        <div id="qligg-admin-rating" class="qligg-notice notice is-dismissible" data-notice_id="qligg-user-rating">
          <div class="notice-container" style="padding-top: 10px; padding-bottom: 10px; display: flex; justify-content: left; align-items: center;">
            <div class="notice-image">
              <img style="border-radius:50%;max-width: 90px;" src="<?php echo plugins_url('/assets/img/logo.jpg', QLIGG_PLUGIN_FILE); ?>" alt="<?php echo esc_html(QLIGG_PLUGIN_NAME); ?>>">
            </div>
            <div class="notice-content" style="margin-left: 15px;">
              <p>
                <?php printf(esc_html__('Hello! Thank you for choosing the %s plugin!', 'insta-gallery'), QLIGG_PLUGIN_NAME); ?>
                <br/>
                <?php esc_html_e('Could you please give it a 5-star rating on WordPress? We know its a big favor, but we\'ve worked very much and very hard to release this great product. Your feedback will boost our motivation and help us promote and continue to improve this product.', 'insta-gallery'); ?>
              </p>
              <a href="<?php echo esc_url(QLIGG_REVIEW_URL); ?>" class="button-primary" target="_blank">
                <?php esc_html_e('Yes, of course!', 'insta-gallery'); ?>
              </a>
              <a href="<?php echo esc_url(QLIGG_SUPPORT_URL); ?>" class="button-secondary" target="_blank">
                <?php esc_html_e('Report a bug', 'insta-gallery'); ?>
              </a>
            </div>				
          </div>
        </div>
        <script>
          (function ($) {
            $('.qligg-notice').on('click', '.notice-dismiss', function (e) {
              e.preventDefault();
              var notice_id = $(e.delegateTarget).data('notice_id');
              $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                  notice_id: notice_id,
                  action: 'qligg_dismiss_notice',
                  nonce: '<?php echo wp_create_nonce('qligg_dismiss_notice'); ?>'
                },
                success: function (response) {
                  console.log(response);
                },
              });
            });
          })(jQuery);
        </script>
        <?php
      }
    }

    function register_widget() {
      register_widget('QLIGG_Widget');
    }

    function api() {

      global $qligg_api;

      if (!class_exists('QLIGG_API')) {

        include_once ('includes/api.php');
        include_once ('includes/ajax.php');

        $qligg_api = new QLIGG_API();
      }
    }

    function includes() {
      include_once ('includes/utis.php');
      include_once ('includes/widget.php');
      include_once ('includes/defaults.php');
      include_once ('includes/settings.php');
      include_once ('includes/frontend.php');
    }

    function i18n() {
      load_plugin_textdomain('insta-gallery', false, QLIGG_PLUGIN_DIR . '/languages/');
    }

    function init() {
      add_action('widgets_init', array($this, 'register_widget'));
      add_action('plugins_loaded', array($this, 'i18n'));
      add_action('wp_ajax_qligg_dismiss_notice', array($this, 'ajax_dismiss_notice'));
      add_action('admin_notices', array($this, 'add_notices'));
    }

    public static function instance() {
      if (!isset(self::$instance)) {
        self::$instance = new self();
        self::$instance->api();
        self::$instance->includes();
        self::$instance->init();
      }
      return self::$instance;
    }

    public static function do_activation() {
      set_transient('qligg-first-rating', true, MONTH_IN_SECONDS);
    }

  }

  QLIGG::instance();

  register_activation_hook(QLIGG_PLUGIN_FILE, array('QLIGG', 'do_activation'));
}