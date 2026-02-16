<?php
$title = get_field('cf_title');
$text = get_field('cf_text');
$link = get_field('cf_link');
?>

<section>
  <h2><?= $title ?></h2>
  <div>
    <?= $text ?>
  </div>

  <?php
  $args = [
          'post_type' => 'training',
          'post_status' => 'publish',
          'posts_per_page' => 4,
          ];
  $query = new WP_Query($args);
  ?>

  <div>
    <?php if ($query->have_posts()): while($query->have_posts()): $query->the_post(); // ID du post ?>
      <section>
        <h2><?= get_the_title() ?></h2>
        <p><?= get_the_excerpt() ?></p>
        <a href="<?= get_the_permalink() ?>" title="Lien vers ma page de formation : <?= get_the_title() ?>"
           target="_blank">Découvrir cette formation !</a>
      </section>
    <?php endwhile; else: ?>
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif;?>
    <?php wp_reset_postdata(); ?>
  </div>

  <a title="<?= $link['title'] ?>" href="<?= $link['url'] ?>">
    <?= $link['title'] ?>
  </a>
</section>
