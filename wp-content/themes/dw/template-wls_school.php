<?php
/*
 * Template Name: //School template
 */
?>

<?= get_header(); ?>

<?php
if (!\wtl\Authentication::is_logged_in()) {
  wp_safe_redirect(home_url('/connexion/'));
  exit;
}

if (!\wtl\Authentication::has_school_access()) {
  wp_safe_redirect(home_url('/mon-espace/'));
  exit;
}

$school_title = \wtl\Helpers::shortcode_school_title();
$school_content = \wtl\Helpers::shortcode_school_content();
$school_address = \wtl\Helpers::get_field('school_address');
$school_phone = \wtl\Helpers::shortcode_school_field([
        'name' => 'school_phone',
        'label' => 'Téléphone',
]);
$school_mail = \wtl\Helpers::shortcode_school_field([
        'name' => 'school_email',
        'label' => 'Email',
]);

$s_link = \wtl\Helpers::get_field('link');

var_dump($s_link);
die();
?>

<section>
  <h2><?= $school_title ?></h2>
  <div>
    <?= $school_content ?>
  </div>
  <p>
    <?= $school_address ?>
  </p>
  <p>
    <?= $school_phone ?>
  </p>
  <p>
    <?= $school_mail ?>
  </p>
</section>

<?= get_footer(); ?>
