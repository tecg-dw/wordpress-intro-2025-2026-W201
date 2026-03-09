<?php
$title = get_field('stage_title');
$text = get_field('stage_text');
$link = get_field('stage_link');
$image = get_field('stage_image');
?>

<section class="stage">
  <div class="stage__container">
    <div class="stage__content">
      <h2 class="stage__title">
        <?= $title ?>
      </h2>
      <div class="stage__text">
        <?= $text ?>
      </div>
      <?php if ($link): ?>
        <a class="stage__button" href="<?= $link['url'] ?>" title="<?= $link['title'] ?>">
          <?= $link['title'] ?>
        </a>
      <?php endif; ?>
    </div>
    <?php if ($image): ?>
      <div class="stage__media">
        <img class="stage__image"
             src="<?= $image['url'] ?>"
             alt="<?= $image['alt'] ?>"
             width="<?= $image['width'] ?>"
             height="<?= $image['height'] ?>"
             loading="lazy">
      </div>
    <?php endif; ?>
  </div>
</section>
