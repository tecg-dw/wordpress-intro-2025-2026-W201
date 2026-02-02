<?php get_header(); ?>

<h1><?php the_title() ?></h1>
<p><?= get_the_content() ?></p>
<a href="<?= get_the_permalink() ?>" title="Lien vers ma page actuelle" target="_blank">Lien</a>

<?php
$section_title = get_field('project_title');
$section_content = get_field('project_text');
$section_image = get_field('project_image');
?>

<section>
  <h2>
    <?= $section_title ?>
  </h2>
  <div>
    <?= $section_content ?>
  </div>
  <img src="<?= $section_image['url'] ?>"
       alt="<?= $section_image['alt'] ?>"
       height="<?= $section_image['height'] ?>"
       width="<?= $section_image['width'] ?>"
       class="">
</section>

<?php get_footer(); ?>
