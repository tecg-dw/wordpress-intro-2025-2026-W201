<?php
$social_media = dw_get_navigation_links('social-media');
$footer = dw_get_navigation_links('footer');
$utils = dw_get_navigation_links('utils');
$phone_number = get_field('phone_number', 'option');
$contact_mail = get_field('contact_mail', 'option');
?>

<footer class="footer">
  <div class="footer__container">
    <div class="footer__top">
      <div class="footer__brand">
        <a href="<?= home_url('/') ?>" class="footer__logo-link" title="Retour à l'accueil">
          <span class="footer__logo">EDUHEPL</span>
        </a>

        <?php if (!empty($social_media)) : ?>
          <ul class="footer__socials" role="list">
            <?php foreach ($social_media as $link) : ?>
              <li class="footer__social-item">
                <a class="footer__social-link" href="<?= $link->href ?>" title="<?= $link->label ?>">
                  <?= $link->label ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>

      <nav class="footer__nav" aria-labelledby="footer-nav-title">
        <h2 class="footer__title" id="footer-nav-title">Navigation</h2>
        <ul class="footer__list" role="list">
          <?php foreach ($footer as $link) : ?>
            <li class="footer__item">
              <a class="footer__link" href="<?= $link->href ?>"><?= $link->label ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>

      <div class="footer__infos">
        <h2 class="footer__title">Coordonnées</h2>

        <address class="footer__address">
          <?php if (!empty($phone_number)): ?>
            <a class="footer__link footer__link--contact" href="<?= $phone_number['url']; ?>">
              <?= $phone_number['title']; ?>
            </a>
          <?php else: ?>
            <span class="footer__text">+32 123 45 67 89</span>
          <?php endif; ?>

          <?php if (!empty($contact_mail)): ?>
            <a class="footer__link footer__link--contact" href="mailto:<?= antispambot($contact_mail); ?>">
              <?= antispambot($contact_mail); ?>
            </a>
          <?php else: ?>
            <span class="footer__text">contact@eduhepl.be</span>
          <?php endif; ?>

          <p class="footer__text">67 Gruuss-Strooss,</p>
          <p class="footer__text">9991 Weiswampach</p>
          <p class="footer__text">Luxembourg</p>
        </address>
      </div>

      <div class="footer__utils">
        <h2 class="footer__title">Ressources utiles</h2>
        <ul class="footer__list" role="list">
          <?php foreach ($utils as $link) : ?>
            <li class="footer__item">
              <a class="footer__link" href="<?= $link->href ?>"><?= $link->label ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <div class="footer__bottom">
      <ul class="footer__legal" role="list">
        <li class="footer__legal-item">
          <a class="footer__legal-link" href="#">Conditions générales</a>
        </li>
        <li class="footer__legal-separator">–</li>
        <li class="footer__legal-item">
          <a class="footer__legal-link" href="#">Confidentialité</a>
        </li>
      </ul>

      <p class="footer__copyright">
        <strong>©2026</strong> Site internet réalisé par HEPL
      </p>
    </div>
  </div>
</footer>
</body>
</html>
