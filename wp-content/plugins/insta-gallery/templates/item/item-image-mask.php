<div class="insta-gallery-image-mask">
</div>
<div class="insta-gallery-image-mask-content">
  <?php if ($instagram_feed['likes']): ?>
    <span class="ig-likes-likes">
      <i class="qligg-icon-heart-o"></i>
      <?php echo esc_attr($item['likes']); ?>
    </span>
  <?php endif; ?>
  <?php if ($instagram_feed['comments']): ?>
    <span class="ig-likes-comments">
      <i class="qligg-icon-comment-o"></i>
      <?php echo esc_attr($item['comments']); ?>
    </span>
  <?php endif; ?>
</div>