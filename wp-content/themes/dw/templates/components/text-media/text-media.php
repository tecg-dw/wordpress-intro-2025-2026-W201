<?php
$falc = isset($_GET['falc']) ? sanitize_text_field($_GET['falc']) : '';

$title = $falc ? get_field('tm_title_falc') : get_field('tm_title');
$text = $falc ? get_field('tm_text_falc') : get_field('tm_text');
$link = $falc ? get_field('tm_link_falc') : get_field('tm_link');
$image = $falc ? get_field('tm_image_falc') : get_field('tm_image');
if ($falc) {
  $image_position = get_field('tm_image-position_falc') ?: 'left';
} else {
  $image_position = get_field('tm_image-position') ?: 'left';
}
?>

<?php if (!$falc): ?>
  <section class="text-media text-media--image-<?= esc_attr($image_position); ?>">
    <div class="text-media__container">
      <?php if (!empty($image)): ?>
        <div class="text-media__media">
          <img
                  class="text-media__image"
                  src="<?= esc_url($image['url']); ?>"
                  alt="<?= esc_attr($image['alt']); ?>"
                  width="<?= esc_attr($image['width']); ?>"
                  height="<?= esc_attr($image['height']); ?>"
                  loading="lazy"
          >

          <?php
          if ($image) {
            echo wp_get_attachment_image($image['ID'], 'large', false, [
                    'class' => 'text-media__image',
                    'loading' => 'lazy'
            ]);
          }
          ?>
        </div>
      <?php endif; ?>

      <div class="text-media__content">
        <?php if (!empty($title)): ?>
          <h2 class="text-media__title"><?= $title; ?></h2>
        <?php endif; ?>

        <?php if (!empty($text)): ?>
          <div class="text-media__text">
            <?= $text; ?>
          </div>
        <?php endif; ?>

        <?php if (!empty($link)): ?>
          <a
                  class="text-media__button"
                  title="<?= esc_attr($link['title']); ?>"
                  target="<?= esc_attr($link['target']); ?>"
                  href="<?= esc_url($link['url']); ?>"
          >
            <?= esc_html($link['title']); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php else: ?>
  <section class="text-media text-media--image-<?= esc_attr($image_position); ?>">
    <div class="text-media__container">
      <div class="text-media__content">
        <?php if (!empty($title)): ?>
          <h2 class="text-media__title"><?= $title; ?></h2>
        <?php endif; ?>

        <?php if (!empty($text)): ?>
          <div class="text-media__text">
            <?= $text; ?>
          </div>
        <?php endif; ?>

        <?php if (!empty($link)): ?>
          <a
                  class="text-media__button"
                  title="<?= esc_attr($link['title']); ?>"
                  target="<?= esc_attr($link['target']); ?>"
                  href="<?= esc_url($link['url']); ?>"
          >
            <?= esc_html($link['title']); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php endif; ?>
