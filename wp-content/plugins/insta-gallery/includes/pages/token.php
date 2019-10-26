<?php
if (!defined('ABSPATH'))
  exit;
?>
<div id="ig-generate-token" class="<?php echo!empty($qligg_token) ? 'premium' : ''; ?>">
  <p>
    <a class="btn-instagram-account" target="_self" href="<?php echo esc_url($qligg_api->get_create_account_link()); ?>" title="<?php esc_html_e('Add New Account', 'insta-gallery'); ?>">
      <?php esc_html_e('Add New Account', 'insta-gallery'); ?>
    </a>
    <span style="float: none; margin-top: 0;" class="spinner"></span>
    <a data-qligg-toggle="#ig-update-token" href="#"><?php esc_html_e('Button not working?', 'insta-gallery'); ?></a>
  </p>
  <form id="ig-update-token" class=" hidden" method="post">
    <table class="widefat ig-table">
      <tbody>
        <tr>
          <td>
            <h4><?php esc_html_e('Manually connect an account', 'insta-gallery'); ?></h4>
            <p class="field-item">
              <input class="widefat" name="ig_access_token" type="text" maxlength="200" placeholder="<?php esc_html_e('Enter a valid Access Token', 'insta-gallery'); ?>" required />
            </p>
            <button type="submit" class="btn-instagram secondary"><?php esc_html_e('Update', 'insta-gallery'); ?></button>    
            <span style="float: none; margin-top: 0;" class="spinner"></span>
            <a target="_blank" href="https://quadlayers.com/insta-token/"><?php esc_html_e('Get access token', 'insta-gallery'); ?></a>
            <?php wp_nonce_field('qligg_update_token', 'ig_nonce'); ?>
            </form>
          </td>
        </tr>
      </tbody>
    </table>
    <?php wp_nonce_field('qligg_update_token', 'ig_nonce'); ?>
  </form>
</div>
<?php if (is_array($qligg_token) && count($qligg_token)) : ?>
  <table class="widefat ig-table">
    <thead>
      <tr>
        <th><?php esc_html_e('Image', 'insta-gallery'); ?></th>
        <th><?php esc_html_e('ID', 'insta-gallery'); ?></th>
        <th><?php esc_html_e('User', 'insta-gallery'); ?></th>
        <th><?php esc_html_e('Name', 'insta-gallery'); ?></th>
        <th><?php esc_html_e('Token', 'insta-gallery'); ?></th>
        <th><?php esc_html_e('Action', 'insta-gallery'); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php
      //if (count($qligg_token)) {
      foreach ($qligg_token as $id => $access_token) {
        $profile_info = qligg_get_user_profile($id);
        ?>
        <tr>
          <td class="profile-picture"><img src="<?php echo esc_url($profile_info['picture']); ?>" width="30" /></td>
          <td><?php echo esc_attr($id); ?></td>
          <td><?php echo esc_html($profile_info['user']); ?></td>
          <td><?php echo esc_html($profile_info['name']); ?></td>
          <td>
            <input id="<?php echo esc_attr($id); ?>-access-token" type="text" value="<?php echo esc_attr($access_token); ?>" readonly />
          </td>
          <td>
            <a data-qligg-copy="#<?php echo esc_attr($id); ?>-access-token" href="#" class="btn-instagram">
              <span class="dashicons dashicons-edit"></span><?php esc_html_e('Copy', 'insta-gallery'); ?>
            </a>
            <a href="#" data-item_id="<?php echo esc_attr($id); ?>" class="btn-instagram ig-remove-token">
              <span class="dashicons dashicons-trash"></span><?php esc_html_e('Delete', 'insta-gallery'); ?>
            </a>
            <span class="spinner"></span>
          </td>
        </tr>
        <?php
      }
      //}
      ?>
    </tbody>
  </table>  
<?php endif; ?>
<form id="ig-save-settings" method="post">
  <table class="widefat form-table ig-table">
    <tbody>
      <tr>
        <td colspan="100%">
          <table>
            <tbody>
              <tr>
                <th scope="row"><?php esc_html_e('Feeds cache', 'insta-gallery'); ?></th>
                <td>
                  <input name="insta_reset" type="number" min="1" max="168" value="<?php echo esc_attr($qligg['insta_reset']); ?>" />
                  <span class="description">
                    <?php esc_html_e('Reset your Instagram feeds cache every x hours.', 'insta-gallery'); ?>
                  </span>
                </td>
              </tr>
              <tr>
                <th><?php esc_html_e('Remove data', 'insta-gallery'); ?></th>
                <td>
                  <input id="ig-remove-data" type="checkbox" name="insta_flush" value="1" <?php checked(1, $qligg['insta_flush']); ?> />
                  <span class="description">
                    <?php esc_html_e('Check this box to remove all data related to this plugin on uninstall.', 'insta-gallery'); ?>
                  </span>
                </td>
              </tr>
              <tr>
                <th><?php esc_html_e('Replace loader', 'insta-gallery'); ?></th>
                <td>
                  <?php
                  $mid = '';
                  $misrc = '';
                  if (isset($qligg['insta_spinner_image_id'])) {
                    $mid = $qligg['insta_spinner_image_id'];
                    $image = wp_get_attachment_image_src($mid, 'full');
                    if ($image) {
                      $misrc = $image[0];
                    }
                  }
                  ?>
                  <input type="hidden" name="insta_spinner_image_id" value="<?php echo esc_attr($mid); ?>" data-misrc="<?php echo esc_attr($misrc); ?>" />
                  <a class="btn-instagram" id="ig-spinner-upload" /><?php esc_html_e('Upload', 'insta-gallery'); ?></a>
                  <a class="btn-instagram" id="ig-spinner-reset" /><?php esc_html_e('Reset Spinner', 'insta-gallery'); ?></a> 
                  <p class="description">
                    <?php esc_html_e('Select an image from media library to replace the default loader icon.', 'insta-gallery'); ?>
                  </p>
                </td>
                <td rowspan="2">
                  <div class="insta-gallery-spinner">
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3">
          <span class="spinner"></span>
          <button  type="submit" class="btn-instagram secondary"><?php esc_html_e('Update', 'insta-gallery'); ?></button>
          <span class="description">
            <?php //printf(esc_html__('Update settings and copy/paste generated shortcode in your post/pages or go to Widgets and use %s widget', 'insta-gallery'), QLIGG_PLUGIN_NAME);   ?>
          </span>
        </td>
      </tr>
    </tfoot>
  </table>
  <?php wp_nonce_field('qligg_save_settings', 'ig_nonce'); ?>
</form>