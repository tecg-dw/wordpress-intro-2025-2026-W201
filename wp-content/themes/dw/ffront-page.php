<?php get_header(); ?>
<?php
$title = get_field('title');
$text = get_field('text');
$image = get_field('image');
?>

<div class="accueil-div">
  <?php if ($title !== ""): ?>
    <h1 class="title-page"><?= $title ?></h1>
  <?php endif; ?>
  <?php if ($text !== ""): ?>
    <p class="text"><?= $text ?></p>
  <?php endif; ?>

  <?php if ($image): ?>
    <img src="<?= $image['url'] ?>"
         alt="<?= $image['alt'] ?>"
         width="<?= $image['width'] ?>"
         height="<?= $image['height'] ?>">
  <?php endif; ?>
</div>

<?php include('templates/components/text-media/text-media.php'); ?>
<?php get_template_part('templates/components/text-media/text-media'); ?>

<?php get_footer(); ?>
