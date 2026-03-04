<?php get_header(); ?>
<?php
$terms = get_terms('training_level');
$taxonomy = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';

$args = [
        'post_type' => 'training',
        'post_status' => 'publish',
        'posts_per_page' => 12,
];

if ($taxonomy !== '') {
  $args['tax_query'] = [
          [
                  'taxonomy' => 'training_level',
                  'field' => 'slug',
                  'terms' => $taxonomy,
          ]
  ];
}
$query = new WP_Query($args);

?>


<h1>Nos formations <?= $taxonomy ?>!</h1>

<div>
  <ul>
    <li>
      <a href="/formations">
        Tout
      </a>
      <?php foreach ($terms as $term): ?>
      <a href="/formations?filter=<?= $term->slug ?>">
        <?= $term->name; ?>
      </a>
      <?php endforeach; ?>
      <a href="/formations?filter=intermediaire">
        Intermediaire
      </a>
      <a href="/formations?filter=expert">
        Expert
      </a>
    </li>
  </ul>
</div>

<?php if ($query->have_posts()): while ($query->have_posts()): $query->the_post(); ?>
  <section>
    <h2><?= get_the_title() ?></h2>
    <p><?= get_the_excerpt() ?></p>
    <a href="<?= get_the_permalink() ?>" title="Lien vers ma page de formation : <?= get_the_title() ?>"
       target="_blank">Découvrir cette formation !</a>
  </section>
<?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif;
wp_reset_postdata();
?>
<?php get_footer(); ?>
