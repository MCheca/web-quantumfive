<?php
if (!defined('ABSPATH'))
  exit;
?>
<div id="ig-create-gallery">
  <p>
    <a class="btn-instagram" href="<?php echo admin_url('admin.php?page=qligg_feeds&tab=edit'); ?>" title="<?php esc_html_e('Add New Gallery', 'insta-gallery'); ?>">
      <span class="dashicons dashicons-plus"></span>
      <?php esc_html_e('Add New Gallery', 'insta-gallery'); ?>
    </a>
  </p>
</div>
<?php if (count($instagram_feeds)) : //var_dump($instagram_feeds);?>
  <table class="widefat ig-table">
    <thead>
      <tr>
        <th><?php esc_html_e('Image', 'insta-gallery'); ?></th>
        <th><?php esc_html_e('Source', 'insta-gallery'); ?></th>
        <th><?php esc_html_e('Type', 'insta-gallery'); ?></th>
        <th><?php esc_html_e('Shortcode', 'insta-gallery'); ?></th>
        <th><?php esc_html_e('Action', 'insta-gallery'); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      foreach ($instagram_feeds as $id => $instagram_feed) {

        if (!isset($instagram_feed['insta_source']))
          continue;

        if ($instagram_feed['insta_source'] == 'username') {
          $profile_info = qligg_get_user_profile($instagram_feed['insta_username']);
        } else {
          $profile_info = qligg_get_tag_profile($instagram_feed['insta_tag']);
        }
        ?>
        <tr data-item_nonce="<?php echo wp_create_nonce('qligg_form_item'); ?>" data-item_id="<?php echo esc_attr($id); ?>">
          <td class="profile-picture"><img src="<?php echo esc_url($profile_info['picture']); ?>" width="30" /></td>
          <td>
            <?php echo esc_html($profile_info['user']); ?>
          </td>
          <td>
            <?php echo esc_html(ucfirst($instagram_feed['insta_layout'])); ?>
          </td>
          <td>
            <input id="<?php echo esc_attr($id); ?>-gallery-item" type="text" data-qligg-copy="#<?php echo esc_attr($id); ?>-gallery-item" value='[insta-gallery id="<?php echo esc_attr($id); ?>"]' readonly />
          </td>
          <td>
            <a href="<?php echo admin_url("admin.php?page=qligg_feeds&tab=edit&item_id={$id}"); ?>" class="btn-instagram">
              <span class="dashicons dashicons-edit"></span><?php esc_html_e('Edit', 'insta-gallery'); ?>
            </a>
            <a href="#" class="btn-instagram ig-form-item-delete">
              <span class="dashicons dashicons-trash"></span><?php esc_html_e('Delete', 'insta-gallery'); ?>
            </a>
            <a href="#" class="btn-instagram secondary ig-form-item-cache">
              <span class="dashicons dashicons dashicons-update"></span><?php esc_html_e('Cache', 'insta-gallery'); ?>
            </a>
            <span class="spinner"></span>
          </td>
        </tr>
      <?php } unset($i); ?>
    </tbody>
  </table>  
<?php endif; ?>