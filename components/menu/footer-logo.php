<?php if(!empty($logo = get_theme_mod('footer_logo', 0))): ?>
  <div class="pa-brand">
    <a href="/" class="d-flex flex-column justify-content-center">
      <?= wp_get_attachment_image($logo, 'full') ?>  
    </a>
  </div>

  <hr class="mt-4 mb-4">
<?php endif; ?>