<?php
$title = get_field('tm_title');
$text = get_field('tm_text');
$link = get_field('tm_link');
$image = get_field('tm_image');
$image_position = get_field('tm_image-position') ?: 'left';
?>

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
