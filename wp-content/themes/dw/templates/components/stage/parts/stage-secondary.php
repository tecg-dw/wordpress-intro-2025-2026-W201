<?php
$title = get_field('stage_title');
$text = get_field('stage_text');
$link = get_field('stage_link');
$image = get_field('stage_image');
?>

<section class="stage--small">
  <div class="stage--small__container">
    <div class="stage--small__content">
      <h2 class="stage--small__title">
        <?= $title ?>
      </h2>
      <div class="stage--small__text">
        <?= $text ?>
      </div>
      <?php if ($link): ?>
        <a class="stage--small__button" href="<?= $link['url'] ?>" title="<?= $link['title'] ?>">
          <?= $link['title'] ?>
        </a>
      <?php endif; ?>
    </div>
    <?php if ($image): ?>
      <div class="stage--small__media">
        <img class="stage--small__image"
             src="<?= $image['url'] ?>"
             alt="<?= $image['alt'] ?>"
             width="<?= $image['width'] ?>"
             height="<?= $image['height'] ?>"
             loading="lazy">
      </div>
    <?php endif; ?>
  </div>
</section>
