<?php /* Template Name: Contact */ ?>
<?= get_header(); ?>

<section class="form__container">
  <h2 class="form__title">
    Mon formulaire de contact
  </h2>
  <!-- L'action redirige vers le fichier de base de Wordpress qui dit qui fait quoi. -->
  <form class="form" method="post" action="<?= admin_url('admin-post.php'); ?>">
    <div class="form__group">
      <label class="form__label" for="name">Nom complet *</label>
      <input class="form__input" type="text" id="name" name="name" value=""/>
    </div>

    <div class="form__group">
      <label class="form__label" for="mail">Adresse mail *</label>
      <input class="form__input" type="text" id="mail" name="mail" value=""/>
    </div>

    <div class="form__group">
      <label class="form__label" for="object">Objet *</label>
      <input class="form__input" type="text" id="object" name="object" value=""/>
    </div>

    <div class="form__group">
      <label class="form__label" for="message">Message *</label>
      <textarea class="form__textarea" id="message" name="message"></textarea>
    </div>

    <!-- Je lui dis quelle fonction il doit lancer -->
    <input type="hidden" name="action" value="hepl_contact_form"/>
    <!-- On s'assure que notre requête vient bien de notre site -->
    <input type="hidden" name="contact_nonce" value="<?= wp_create_nonce('hepl_contact_form'); ?>" />

    <!-- Bouton qui va soumettre le formulaire -->
    <button class="form__button" type="submit">Soumettre le formulaire</button>
  </form>
</section>

<?= get_footer(); ?>
