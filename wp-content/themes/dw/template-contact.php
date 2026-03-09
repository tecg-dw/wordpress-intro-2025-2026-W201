<?php /* Template Name: Contact */ ?>
<?= get_header(); ?>

<?= do_shortcode('[contact-form-7 id="4683918" title="Contact form 1"]'); ?>

<section class="form__container">
  <?php
  $feedback = hepl_session_get('hepl_contact_form_feedback') ?? false;
  $errors = hepl_session_get('hepl_contact_form_errors') ?? [];
  ?>

  <h2 class="form__title">
    Mon formulaire de contact
  </h2>

  <?php if ($feedback): ?>
    <div>
      <p>Merci ! Votre message a bien été envoyé.</p>
    </div>
  <?php endif; ?>
  <?php if ($errors): ?>
    <div>
      <p>Attention ! Merci de corriger les erreurs du formulaire.</p>
    </div>
  <?php endif; ?>


  <!-- L'action redirige vers le fichier de base de Wordpress qui dit qui fait quoi. -->
  <form class="form" action="<?= admin_url('admin-post.php'); ?>" method="POST">
    <div class="form__group">
      <label class="form__label" for="name">Nom complet *</label>
      <input class="form__input" type="text" id="name" name="name" value=""/>
      <?php if ($errors['name'] ?? null): ?>
        <p class="form__error-message"><?= $errors['name']; ?></p>
      <?php endif; ?>
    </div>

    <div class="form__group">
      <label class="form__label" for="email">Adresse mail *</label>
      <input class="form__input" type="text" id="email" name="email" value=""/>
      <?php if ($errors['email'] ?? null): ?>
        <p class="form__error-message"><?= $errors['email']; ?></p>
      <?php endif; ?>
    </div>

    <div class="form__group">
      <label class="form__label" for="object">Objet *</label>
      <input class="form__input" type="text" id="object" name="object" value=""/>
      <?php if ($errors['object'] ?? null): ?>
        <p class="form__error-message"><?= $errors['object']; ?></p>
      <?php endif; ?>
    </div>

    <div class="form__group">
      <label class="form__label" for="message">Message *</label>
      <textarea class="form__textarea" id="message" name="message"></textarea>
      <?php if ($errors['message'] ?? null): ?>
        <p class="form__error-message"><?= $errors['message']; ?></p>
      <?php endif; ?>
    </div>

    <!-- Je lui dis quelle fonction il doit lancer -->
    <input type="hidden" name="action" value="hepl_contact_form"/>
    <!-- On s'assure que notre requête vient bien de notre site -->
    <input type="hidden" name="contact_nonce" value="<?= wp_create_nonce('hepl_contact_form'); ?>"/>

    <!-- Bouton qui va soumettre le formulaire -->
    <button class="form__button" type="submit">Soumettre le formulaire</button>
  </form>
</section>

<?= get_footer(); ?>
