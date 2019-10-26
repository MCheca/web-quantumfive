<?php
if (!defined('ABSPATH'))
  exit;
?>
<form method="post" id="ig-update-form" class="<?php //echo!isset($ig_item_id) ? 'hidden' : '';                                                                                                 ?>">
  <table class="widefat form-table ig-table">
    <tbody>
      <tr>
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Type', 'insta-gallery'); ?></th>
              <td>
                <ul class="ig-list-buttons">
                  <li>
                    <input type="radio" id="insta_source-username" name="insta_source" value="username" <?php checked('username', $instagram_feed['insta_source']); ?>  />
                    <label for="insta_source-username"><?php esc_html_e('User', 'insta-gallery'); ?></label>
                    <div class="check"></div>
                  </li>
                  <li>
                    <input type="radio" id="insta_source-tag" name="insta_source" value="tag" <?php checked('tag', $instagram_feed['insta_source']); ?>  />
                    <label for="insta_source-tag"><?php esc_html_e('Tag', 'insta-gallery'); ?></label>
                    <div class="check"></div>
                  </li>
                </ul> 
                <p class="description">
                  <?php esc_html_e('Please select option to display images from Instagram @username or #tag', 'insta-gallery'); ?>
                </p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr id="ig-select-username-wrap" class="ig-tab-content-row <?php if ($instagram_feed['insta_source'] == 'username') echo 'active'; ?>">
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('User', 'insta-gallery'); ?></th>
              <td> 
                <?php if (!count($qligg_token)): ?>
                  <p class="description">
                    <strong><?php printf(__('No Instagram account connected. Please connect your account <a href="%s">here</a>.', 'insta-gallery'), $qligg_api->get_create_account_link()); ?></strong></strong>
                  </p>
                  <?php
                else :
                  ?>
                  <select name="insta_username">
                    <?php foreach ($qligg_token as $id => $access_token) : ?>
                      <?php $profile_info = qligg_get_user_profile($id); ?>
                      <option value="<?php echo esc_attr($id) ?>" <?php selected($id, $instagram_feed['insta_username']); ?>><?php echo esc_html($profile_info['user']); ?></option>
                    <?php endforeach; ?>
                  </select>
                  <p class="description">
                    <?php esc_html_e('Please enter Instagram username', 'insta-gallery'); ?>
                  </p>
                <?php endif; ?>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr id="ig-select-tag-wrap" class="ig-tab-content-row <?php if ($instagram_feed['insta_source'] == 'tag') echo 'active'; ?>">
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Tag', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_tag" type="text" placeholder="beautiful" value="<?php echo esc_attr($instagram_feed['insta_tag']); ?>" />
                <p class="description"><?php esc_html_e('Please enter Instagram tag', 'insta-gallery'); ?></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr class="ig-tab-content-row active">
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Layout', 'insta-gallery'); ?></th>
              <td>
                <ul class="ig-list-images">
                  <li class="<?php if ($instagram_feed['insta_layout'] == 'gallery') echo 'active'; ?>">
                    <input type="radio" id="insta_layout-gallery" name="insta_layout" value="gallery" <?php checked('gallery', $instagram_feed['insta_layout']); ?> />
                    <label for="insta_layout-gallery"><?php esc_html_e('Gallery', 'insta-gallery'); ?></label>
                    <img src="<?php echo plugins_url('/assets/img/gallery.png', QLIGG_PLUGIN_FILE); ?>"/>
                  </li>
                  <li class="<?php if ($instagram_feed['insta_layout'] == 'carousel') echo 'active'; ?>">
                    <input type="radio" id="insta_layout-carousel" name="insta_layout" value="carousel" <?php checked('carousel', $instagram_feed['insta_layout']); ?> />
                    <label for="insta_layout-carousel"><?php esc_html_e('Carousel', 'insta-gallery'); ?></label>
                    <img src="<?php echo plugins_url('/assets/img/carousel.png', QLIGG_PLUGIN_FILE); ?>"/>
                  </li>
                  <li class="<?php if ($instagram_feed['insta_layout'] == 'masonry') echo 'active'; ?> premium">
                    <input type="radio" id="insta_layout-masonry" name="insta_layout" value="masonry" <?php checked('masonry', $instagram_feed['insta_layout']); ?> />
                    <label for="insta_layout-masonry"><?php esc_html_e('Masonry', 'insta-gallery'); ?><span class="premium"> (<?php esc_html_e('Premium', 'insta-gallery'); ?>)</span></label>
                    <img src="<?php echo plugins_url('/assets/img/masonry.png', QLIGG_PLUGIN_FILE); ?>"/>
                  </li>
                  <li class="<?php if ($instagram_feed['insta_layout'] == 'highlight') echo 'active'; ?> premium">
                    <input type="radio" id="insta_layout-highlight" name="insta_layout" value="highlight" <?php checked('highlight', $instagram_feed['insta_layout']); ?> />
                    <label for="insta_layout-highlight"><?php esc_html_e('Highlight', 'insta-gallery'); ?><span class="premium"> (<?php esc_html_e('Premium', 'insta-gallery'); ?>)</span></label>
                    <img src="<?php echo plugins_url('/assets/img/highlight.png', QLIGG_PLUGIN_FILE); ?>"/>
                  </li>
                </ul>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr class="premium">
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Box', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_box" type="checkbox" value="1" <?php checked(1, $instagram_feed['insta_box']); ?>/>
                <p class="description">
                  <?php esc_html_e('Display the Instagram Feed inside a customizable box', 'insta-gallery'); ?>
                </p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr id="ig-section-box" class="ig-tab-content-row premium <?php if (!empty($instagram_feed['insta_box'])) echo 'active'; ?>">
        <td colspan="100%">
          <table>	
            <tr>
              <th scope="row"><?php esc_html_e('Box padding', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_box-padding" type="number" value="<?php echo esc_attr($instagram_feed['insta_box-padding']); ?>" />
                <p class="description">
                  <?php esc_html_e('Add padding to the Instagram Feed', 'insta-gallery'); ?>
                </p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>            
            <tr>
              <th scope="row"><?php esc_html_e('Box radius', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_box-radius" type="number" value="<?php echo esc_attr($instagram_feed['insta_box-radius']); ?>" />
                <p class="description">
                  <?php esc_html_e('Add radius to the Instagram Feed', 'insta-gallery'); ?>
                </p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Box background', 'insta-gallery'); ?></th>
              <td>
                <input class="color-picker" data-alpha="true" name="insta_box-background" type="text" placeholder="#c32a67" value="<?php echo esc_html($instagram_feed['insta_box-background']); ?>" />
                <p class="description">
                  <?php esc_html_e('Color which is displayed on box background', 'insta-gallery'); ?>
                </p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr> 
          </table>
        </td>
      </tr>
      <tr id="ig-section-profile" class="ig-tab-content-row active premium">
        <td colspan="100%">
          <table>	            
            <tr>
              <th scope="row"><?php esc_html_e('Profile', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_box-profile" type="checkbox" value="1" <?php checked(1, $instagram_feed['insta_box-profile']); ?>/>
                <p class="description">
                  <?php esc_html_e('Display user profile or tag info', 'insta-gallery'); ?>
                </p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Profile description', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_box-desc" type="text" placeholder="Instagram" value="<?php echo esc_html($instagram_feed['insta_box-desc']); ?>" />
                <p class="description">
                  <?php esc_html_e('Box description here', 'insta-gallery'); ?>
                </p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Limit', 'insta-gallery'); ?></th>
              <td><input name="insta_limit" type="number" min="1" max="33" value="<?php echo esc_attr($instagram_feed['insta_limit']); ?>" />
                <p class="description"><?php esc_html_e('Number of images to display', 'insta-gallery'); ?></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr id="ig-section-gallery" class="ig-tab-content-row <?php if (in_array($instagram_feed['insta_layout'], array('gallery', 'masonry', 'highlight'))) echo 'active'; ?>">
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Columns', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_gal-cols" type="number" min="1" max="20" value="<?php echo esc_attr($instagram_feed['insta_gal-cols']); ?>" /> 
                <p class="description">
                  <?php esc_html_e('Number of images in a row', 'insta-gallery'); ?>
                </p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr id="ig-section-masonry" class="ig-tab-content-row premium <?php if (in_array($instagram_feed['insta_layout'], array('highlight', 'masonry'))) echo 'active'; ?>">
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Highlight by tag', 'insta-gallery'); ?></th>
              <td>
                <textarea name="insta_highlight-tag" placeholder="tag1, tag2, tag3"><?php echo esc_html($instagram_feed['insta_highlight-tag']); ?></textarea>
                <p class="description"><?php esc_html_e('Highlight feeds items with this tags', 'insta-gallery'); ?></p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Highlight by id', 'insta-gallery'); ?></th>
              <td>
                <textarea name="insta_highlight-id" placeholder="101010110101010"><?php echo esc_html($instagram_feed['insta_highlight-id']); ?></textarea>
                <p class="description"><?php esc_html_e('Highlight feeds items with this ids', 'insta-gallery'); ?></p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Highlight by position', 'insta-gallery'); ?></th>
              <td>
                <textarea name="insta_highlight-position" placeholder="1, 5, 7"><?php echo esc_html($instagram_feed['insta_highlight-position']); ?></textarea>
                <p class="description"><?php esc_html_e('Highlight feeds items in this positions', 'insta-gallery'); ?></p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr id="ig-section-carousel" class="ig-tab-content-row <?php if ($instagram_feed['insta_layout'] == 'carousel') echo 'active'; ?>">
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Slides per view', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_car-slidespv" type="number" min="1" max="10" value="<?php echo esc_html($instagram_feed['insta_car-slidespv']); ?>" />
                <p class="description"><?php esc_html_e('Number of images per slide', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Autoplay', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_car-autoplay" type="checkbox" value="1" <?php checked(1, $instagram_feed['insta_car-autoplay']); ?> />
                <p class="description"><?php esc_html_e('Autoplay carousel items', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Autoplay Interval', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_car-autoplay-interval" type="number" min="1000" max="300000" step="100" value="<?php echo esc_attr(max(1000, absint($instagram_feed['insta_car-autoplay-interval']))); ?>" />
                <p class="description">
                  <?php esc_html_e('Moves to next picture after specified time interval', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Navigation', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_car-navarrows" type="checkbox" value="1" <?php checked(1, $instagram_feed['insta_car-navarrows']); ?>/>
                <p class="description"><?php esc_html_e('Display navigation arrows', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Navigation color', 'insta-gallery'); ?></th>
              <td>
                <input class="color-picker" data-alpha="true" name="insta_car-navarrows-color" type="text" placeholder="#c32a67" value="<?php echo esc_html($instagram_feed['insta_car-navarrows-color']); ?>" /> 
                <p class="description"><?php esc_html_e('Change navigation arrows color', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Pagination', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_car-pagination" type="checkbox" value="1" <?php checked(1, $instagram_feed['insta_car-pagination']); ?>/>
                <p class="description"><?php esc_html_e('Display pagination dots', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Pagination color', 'insta-gallery'); ?></th>
              <td>
                <input class="color-picker" data-alpha="true" name="insta_car-pagination-color" type="text" placeholder="#c32a67" value="<?php echo esc_html($instagram_feed['insta_car-pagination-color']); ?>" /> 
                <p class="description"><?php esc_html_e('Change pagination dotts color', 'insta-gallery'); ?></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr class="ig-tab-content-row active">
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Images size', 'insta-gallery'); ?></th>
              <td>
                <select name="insta_size">
                  <option value="standard"><?php esc_html_e('Standard', 'insta-gallery'); ?> (640 x auto)</option>
                  <option value="medium" <?php echo (isset($instagram_feed['insta_size']) && ($instagram_feed['insta_size'] == 'medium')) ? 'selected' : ''; ?>><?php esc_html_e('Medium', 'insta-gallery'); ?> (320 x auto)</option>
                  <option value="small" <?php echo (isset($instagram_feed['insta_size']) && ($instagram_feed['insta_size'] == 'small')) ? 'selected' : ''; ?>><?php esc_html_e('Small', 'insta-gallery'); ?> (150 x 150)</option>
                </select>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Images spacing', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_spacing" type="number" value="<?php echo esc_attr($instagram_feed['insta_spacing']); ?>" />
                <p class="description">
                  <?php esc_html_e('Add blank space between images', 'insta-gallery'); ?>
                </p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr class="premium">
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Images card', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_card" type="checkbox" value="1" <?php checked(1, $instagram_feed['insta_card']); ?>/>
                <p class="description">
                  <?php esc_html_e('Display card gallery by clicking on image', 'insta-gallery'); ?>
                </p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr id="ig-section-card" class="ig-tab-content-row premium <?php if (!empty($instagram_feed['insta_card'])) echo 'active'; ?>">
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Card radius', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_card-radius" type="number" min="0" max="1000" value="<?php echo esc_attr($instagram_feed['insta_card-radius']); ?>" />
                <p class="description">
                  <?php esc_html_e('Add radius to the Instagram Feed', 'insta-gallery'); ?>
                </p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Card font size', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_card-font-size" type="number" min="8" max="36" value="<?php echo esc_attr($instagram_feed['insta_card-font-size']); ?>" />
                <p class="description">
                  <?php esc_html_e('Add font-size to the Instagram Feed', 'insta-gallery'); ?>
                </p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Card background', 'insta-gallery'); ?></th>
              <td>
                <input class="color-picker" data-alpha="true" name="insta_card-background" type="link" placeholder="#007aff" value="<?php echo esc_html($instagram_feed['insta_card-background']); ?>" />
                <p class="description">
                  <?php esc_html_e('Color which is displayed when carded over images', 'insta-gallery'); ?>
                </p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Card padding', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_card-padding" type="number" min="0" max="50" value="<?php echo esc_attr($instagram_feed['insta_card-padding']); ?>" />
                <p class="description">
                  <?php esc_html_e('Add blank space between images', 'insta-gallery'); ?>
                </p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Card info', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_card-info" type="checkbox" value="1" <?php checked(1, $instagram_feed['insta_card-info']); ?>/>
                <p class="description">
                  <?php esc_html_e('Display likes count of images', 'insta-gallery'); ?>
                </p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Card caption', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_card-caption" type="checkbox" value="1" <?php checked(1, $instagram_feed['insta_card-caption']); ?>/>
                <p class="description">
                  <?php esc_html_e('Display caption count of images', 'insta-gallery'); ?>
                </p>				
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Card length', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_card-length" type="number" min="5" max="1000" value="<?php echo esc_attr($instagram_feed['insta_card-length']); ?>" />
                <p class="description">
                  <?php esc_html_e('Add blank space between images', 'insta-gallery'); ?>
                </p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Images popup', 'insta-gallery'); ?></th>
              <td><input name="insta_popup" type="checkbox" value="1" <?php checked(1, $instagram_feed['insta_popup']); ?>/>
                <p class="description">
                  <?php esc_html_e('Display popup gallery by clicking on image', 'insta-gallery'); ?>
                </p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr id="ig-section-popup" class="ig-tab-content-row premium <?php if (!empty($instagram_feed['insta_popup'])) echo 'active'; ?>">
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Images popup profile', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_popup-profile" type="checkbox" value="1" <?php checked(1, $instagram_feed['insta_popup-profile']); ?>/>
                <p class="description">
                  <?php esc_html_e('Display user profile or tag info', 'insta-gallery'); ?>
                </p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Images popup caption', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_popup-caption" type="checkbox" value="1" <?php checked(1, $instagram_feed['insta_popup-caption']); ?>/> 
                <p class="description"><?php esc_html_e('Display caption in the popup', 'insta-gallery'); ?></p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Images popup likes', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_popup-likes" type="checkbox" value="1" <?php checked(1, $instagram_feed['insta_popup-likes']); ?>/>
                <p class="description">
                  <?php esc_html_e('Display likes count of images', 'insta-gallery'); ?>
                </p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Images popup align', 'insta-gallery'); ?></th>
              <td>
                <select name="insta_popup-align">
                  <option value="top" <?php selected('top', $instagram_feed['insta_popup-align']); ?>><?php esc_html_e('Top', 'insta-gallery'); ?></option>
                  <option value="left" <?php selected('left', $instagram_feed['insta_popup-align']); ?>><?php esc_html_e('Left', 'insta-gallery'); ?></option>
                  <option value="right" <?php selected('right', $instagram_feed['insta_popup-align']); ?>><?php esc_html_e('Right', 'insta-gallery'); ?></option>
                  <option value="bottom" <?php selected('bottom', $instagram_feed['insta_popup-align']); ?>><?php esc_html_e('Bottom', 'insta-gallery'); ?></option>
                </select>
                <p class="description"><?php esc_html_e('Display likes count of images', 'insta-gallery'); ?></p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Images mask', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_hover" type="checkbox" value="1" <?php checked(1, $instagram_feed['insta_hover']); ?>/>
                <p class="description">
                  <?php esc_html_e('Image mouseover effect', 'insta-gallery'); ?>
                </p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr id="ig-section-hover" class="ig-tab-content-row <?php if (!empty($instagram_feed['insta_hover'])) echo 'active'; ?>">
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Images mask color', 'insta-gallery'); ?></th>
              <td>
                <input class="color-picker" data-alpha="true" name="insta_hover-color" type="link" placeholder="#007aff" value="<?php echo esc_html($instagram_feed['insta_hover-color']); ?>" />
                <p class="description">
                  <?php esc_html_e('Color which is displayed when hovered over images', 'insta-gallery'); ?>
                </p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Images mask likes', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_likes" type="checkbox" value="1" <?php checked(1, $instagram_feed['insta_likes']); ?>/>
                <p class="description">
                  <?php esc_html_e('Display likes count of images', 'insta-gallery'); ?>
                </p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Images mask comments', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_comments" type="checkbox" value="1" <?php checked(1, $instagram_feed['insta_comments']); ?>/>
                <p class="description">
                  <?php esc_html_e('Display comments count of images', 'insta-gallery'); ?>
                </p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr class="premium">
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Instagram load more', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_button_load" type="checkbox" value="1" <?php checked(1, $instagram_feed['insta_button_load']); ?>/>
                <p class="description">
                  <?php esc_html_e('Display the load more button', 'insta-gallery'); ?>
                </p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr id="ig-section-button_load" class="ig-tab-content-row premium <?php if (!empty($instagram_feed['insta_button_load'])) echo 'active'; ?>">
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Instagram load more text', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_button_load-text" type="text" placeholder="Instagram" value="<?php echo esc_html($instagram_feed['insta_button_load-text']); ?>" />
                <p class="description">
                  <?php esc_html_e('Instagram load more text here', 'insta-gallery'); ?>
                </p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Instagram load more background', 'insta-gallery'); ?></th>
              <td>
                <input class="color-picker" data-alpha="true" name="insta_button_load-background" type="text" placeholder="#c32a67" value="<?php echo esc_html($instagram_feed['insta_button_load-background']); ?>" />
                <p class="description">
                  <?php esc_html_e('Color which is displayed on button load background', 'insta-gallery'); ?>
                </p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Instagram load more hover background', 'insta-gallery'); ?></th>
              <td>
                <input class="color-picker" data-alpha="true" name="insta_button_load-background-hover" type="text" placeholder="#da894a" value="<?php echo esc_html($instagram_feed['insta_button_load-background-hover']); ?>" />
                <p class="description">
                  <?php esc_html_e('Color which is displayed when hovered over button load more', 'insta-gallery'); ?>
                </p>
                <p class="premium"><?php esc_html_e('This is a premium feature.', 'insta-gallery'); ?></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Instagram button', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_button" type="checkbox" value="1" <?php checked(1, $instagram_feed['insta_button']); ?>/>
                <p class="description">
                  <?php esc_html_e('Display the button to open Instagram site link', 'insta-gallery'); ?>
                </p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr id="ig-section-button" class="ig-tab-content-row <?php if (!empty($instagram_feed['insta_button'])) echo 'active'; ?>">
        <td colspan="100%">
          <table>
            <tr>
              <th scope="row"><?php esc_html_e('Instagram button text', 'insta-gallery'); ?></th>
              <td>
                <input name="insta_button-text" type="text" placeholder="Instagram" value="<?php echo esc_html($instagram_feed['insta_button-text']); ?>" />
                <p class="description">
                  <?php esc_html_e('Instagram button text here', 'insta-gallery'); ?>
                </p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Instagram button background', 'insta-gallery'); ?></th>
              <td>
                <input class="color-picker" data-alpha="true" name="insta_button-background" type="text" placeholder="#c32a67" value="<?php echo esc_html($instagram_feed['insta_button-background']); ?>" />
                <p class="description"><?php esc_html_e('Color which is displayed on button background', 'insta-gallery'); ?></p>
              </td>
            </tr>
            <tr>
              <th scope="row"><?php esc_html_e('Instagram button hover background', 'insta-gallery'); ?></th>
              <td>
                <input class="color-picker" data-alpha="true" name="insta_button-background-hover" type="text" placeholder="#da894a" value="<?php echo esc_html($instagram_feed['insta_button-background-hover']); ?>" />
                <p class="description"><?php esc_html_e('Color which is displayed when hovered over button', 'insta-gallery'); ?></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>      
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3">
          <span class="spinner"></span>
          <button  type="submit" class="btn-instagram secondary"><?php esc_html_e('Update', 'insta-gallery'); ?></button>
          <span>
            <?php printf(esc_html__('Update settings and copy/paste generated shortcode in your post/pages or go to Widgets and use %s widget', 'insta-gallery'), QLIGG_PLUGIN_NAME); ?>
          </span>
        </td>
      </tr>
    </tfoot>
  </table>
  <?php if (!empty($ig_item_id)) : ?>
    <input type="hidden" name="item_id" value="<?php echo esc_attr($ig_item_id); ?>" />
  <?php endif; ?>
  <?php wp_nonce_field('qligg_update_form', 'ig_nonce'); ?>
</form>