<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
  <h1><?= get_the_title() ?></h1>
  <p><?= get_the_excerpt() ?></p>
  <a href="<?= get_the_permalink() ?>" title="Lien vers ma page de formation : <?= get_the_title() ?>" target="_blank">Découvrir
    cette formation !</a>
<?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
