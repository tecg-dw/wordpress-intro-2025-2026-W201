<?php
$title = get_field('advantage_title');
$text = get_field('advantage_text');
$cards = get_field('advantage_array');
?>

<section>
  <h2>
    <?= $title ?>
  </h2>
  <p>
    <?= $text ?>
  </p>
  <div>
    <?php foreach ($cards as $card): ?>
      <section>
        <img src="<?= $card['ad_image']['url']; ?>" alt="<?= $card['ad_image']['alt']; ?>"
             width="<?= $card['ad_image']['width']; ?>" height="<?= $card['ad_image']['height']; ?>">
        <h3>
          <?= $card['ad_title']; ?>
        </h3>
        <p>
          <?= $card['ad_text']; ?>
        </p>
      </section>
    <?php endforeach; ?>
  </div>
</section>
