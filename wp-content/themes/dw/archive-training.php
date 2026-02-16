<?php get_header(); ?>

<h1>Nos formations !</h1>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
  <section>
    <h2><?= get_the_title() ?></h2>
    <p><?= get_the_excerpt() ?></p>
    <a href="<?= get_the_permalink() ?>" title="Lien vers ma page de formation : <?= get_the_title() ?>"
       target="_blank">Découvrir cette formation !</a>
  </section>
<?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>
