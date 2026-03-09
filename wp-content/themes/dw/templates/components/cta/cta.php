<?php
$cta_title = get_field('cta_title');
$cta_text = get_field('cta_text');
$cta_link = get_field('cta_link');
$cta_image = get_field('cta_image');
?>

<section class="cta">
  <div class="cta__container">

    <div class="cta__content">
      <?php if (!empty($cta_title)): ?>
        <h2 class="cta__title">
          <?= esc_html($cta_title); ?>
        </h2>
      <?php endif; ?>

      <?php if (!empty($cta_text)): ?>
        <p class="cta__text">
          <?= esc_html($cta_text); ?>
        </p>
      <?php endif; ?>

      <?php if (!empty($cta_link)): ?>
        <a
                class="cta__button"
                href="<?= esc_url($cta_link['url']); ?>"
                target="<?= esc_attr($cta_link['target']); ?>"
                title="<?= esc_attr($cta_link['title']); ?>"
        >
          <?= esc_html($cta_link['title']); ?>
        </a>
      <?php endif; ?>
    </div>

    <?php if (!empty($cta_image)): ?>
      <div class="cta__media">
        <img
                class="cta__image"
                src="<?= esc_url($cta_image['sizes']['large']); ?>"
                alt="<?= esc_attr($cta_image['alt']); ?>"
                width="<?= esc_attr($cta_image['sizes']['large-width']); ?>"
                height="<?= esc_attr($cta_image['sizes']['large-height']); ?>"
                loading="lazy"
        >
      </div>
    <?php endif; ?>

  </div>
</section>
