<?php
$title = get_field('stage_title');
$text = get_field('stage_text');
$link = get_field('stage_link');
$image = get_field('stage_image');

?>

<div>
  <div>
    <h1><?= $title ?></h1>
    <div>
      <?= $text ?>
    </div>
    <a href="<?= $link['url'] ?>" title="<?= $link['title'] ?>">
      <?= $link['title'] ?>
    </a>
  </div>
  <img src="<?= $image['url'] ?>"
       alt="<?= $image['alt'] ?>"
       width="<?= $image['width'] ?>"
       height="<?= $image['height'] ?>">
</div>
