<?php
$title = get_field('tm_title');
$text = get_field('tm_text');
$link = get_field('tm_link');
$image = get_field('tm_image');
$image_position = get_field('tm_image-position');
?>

<section>
  <div>
    <?php if (!empty($title)): ?>
      <h2><?= $title ?></h2>
    <?php endif; ?>
    <?php if (!empty($text)): ?>
      <div><?= $text ?></div>
    <?php endif; ?>
    <?php if (!empty($link)): ?>
      <a title="<?= $link['title'] ?>"
         target="<?= $link['target'] ?>"
         href="<?= $link['url'] ?>">
        <?= $link['title'] ?>
      </a>
    <?php endif; ?>
  </div>
  <?php if (!empty($image)): ?>
    <img class="text-media__image text-media__image--<?= $image_position ?>"
         src="<?= $image['url'] ?>"
         alt="<?= $image['alt'] ?>"
         width="<?= $image['width'] ?>"
         height="<?= $image['height'] ?>"
  >
  <?php endif; ?>
</section>
