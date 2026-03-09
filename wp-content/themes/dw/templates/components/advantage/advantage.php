<?php
$title = get_field('advantage_title');
$text = get_field('advantage_text');
$cards = get_field('advantage_array');
?>

<section class="advantages">
  <div class="advantages__container">
    <?php if (!empty($title)): ?>
      <h2 class="advantages__title">
        <?= $title; ?>
      </h2>
    <?php endif; ?>

    <?php if (!empty($text)): ?>
      <div class="advantages__text">
        <p><?= $text; ?></p>
      </div>
    <?php endif; ?>

    <?php if (!empty($cards)): ?>
      <div class="advantages__grid">
        <?php foreach ($cards as $card): ?>
          <article class="advantages__card">
            <?php if (!empty($card['ad_image'])): ?>
              <div class="advantages__card-media">
                <img
                        class="advantages__card-image"
                        src="<?= esc_url($card['ad_image']['url']); ?>"
                        alt="<?= esc_attr($card['ad_image']['alt']); ?>"
                        width="<?= esc_attr($card['ad_image']['width']); ?>"
                        height="<?= esc_attr($card['ad_image']['height']); ?>"
                        loading="lazy"
                >
              </div>
            <?php endif; ?>

            <?php if (!empty($card['ad_title'])): ?>
              <h3 class="advantages__card-title">
                <?= esc_html($card['ad_title']); ?>
              </h3>
            <?php endif; ?>

            <?php if (!empty($card['ad_text'])): ?>
              <p class="advantages__card-text">
                <?= esc_html($card['ad_text']); ?>
              </p>
            <?php endif; ?>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
