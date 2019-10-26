<div id="<?php echo esc_attr($item_selector); ?>" class="insta-gallery-feed insta-gallery-square" data-feed="<?php echo htmlentities(json_encode($options), ENT_QUOTES, 'UTF-8'); ?>" data-feed_layout="<?php echo esc_attr($instagram_feed['insta_layout']); ?>">
  <?php
  if ($instagram_feed['insta_box-profile'] && ($template_file = $this->template_path('parts/profile.php'))) {
    include($template_file);
  }
  ?>
  <div class = "swiper-container">
    <div class = "insta-gallery-list swiper-wrapper">
    </div>
    <?php if ($instagram_feed['insta_car-pagination']) :
      ?>
      <div class="swiper-pagination"></div>
    <?php endif; ?>
    <?php if ($instagram_feed['insta_car-navarrows']) : ?>
      <div class="swiper-button-prev">
        <i class="qligg-icon-prev"></i>
      </div>
      <div class="swiper-button-next">
        <i class="qligg-icon-next"></i>
      </div>
    <?php endif; ?>
    <?php include($this->template_path('parts/spinner.php')); ?>
  </div>
  <?php include($this->template_path('parts/actions.php')); ?>
</div>