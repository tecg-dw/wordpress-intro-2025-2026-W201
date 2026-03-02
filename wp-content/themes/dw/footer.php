<?php
$social_media = dw_get_navigation_links('social-media');
$footer = dw_get_navigation_links('footer');
$utils = dw_get_navigation_links('utils');
$phone_number = get_field('phone_number', 'option');
$contact_mail = get_field('contact_mail', 'option');
?>

<footer>
  <div>
    <ul>
      <?php foreach ($social_media as $link) : ?>
        <li>
          <a href="<?= $link->href ?>"><?= $link->label ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <nav>
    <h2>Menu de navigation footer</h2>
    <ul>
      <?php foreach ($footer as $link) : ?>
        <li>
          <a href="<?= $link->href ?>"><?= $link->label ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>

  <div>
    <p>Coordonnées</p>
    <?php if (!empty($phone_number)): ?>
      <?= $phone_number['title']; ?>
    <?php endif; ?>
    <?php if (!empty($contact_mail)): ?>
      <?= $contact_mail ?>
    <?php endif; ?>
    <p>
      Belgique
    </p>
  </div>

  <div>
    <p>Ressources utiles</p>
    <ul>
      <?php foreach ($utils as $link) : ?>
        <li>
          <a href="<?= $link->href ?>"><?= $link->label ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</footer>
</body>
</html>
