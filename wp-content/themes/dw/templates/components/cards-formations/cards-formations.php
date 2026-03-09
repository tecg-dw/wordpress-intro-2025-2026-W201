<?php
$title = get_field('cf_title');
$text = get_field('cf_text');
$link = get_field('cf_link');
?>

<section class="courses">
  <div class="courses__container">
    <header class="courses__header">
      <?php if ($title): ?>
        <h2 class="courses__title"><?= $title; ?></h2>
      <?php endif; ?>

      <?php if ($text): ?>
        <div class="courses__text">
          <?= $text; ?>
        </div>
      <?php endif; ?>
    </header>

    <?php
    $args = [
            'post_type' => 'training',
            'post_status' => 'publish',
            'posts_per_page' => 4,
    ];
    $query = new WP_Query($args);
    ?>

    <div class="courses__grid">
      <?php if ($query->have_posts()): ?>
        <?php while ($query->have_posts()): $query->the_post(); ?>
          <?php
          $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
          $duration = get_field('training_duration', get_the_ID());
          $level = get_field('training_level', get_the_ID());
          ?>

          <article class="courses__card">
            <div class="courses__card-media">
              <a
                      class="courses__card-link-image"
                      href="<?= get_the_permalink(); ?>"
                      title="Lien vers la page de formation : <?= esc_attr(get_the_title()); ?>"
              >
                <?php if ($thumbnail): ?>
                  <img
                          class="courses__card-image"
                          src="<?= esc_url($thumbnail); ?>"
                          alt="<?= esc_attr(get_the_title()); ?>"
                          loading="lazy"
                  >
                <?php else: ?>
                  <div class="courses__card-placeholder" aria-hidden="true"></div>
                <?php endif; ?>
              </a>

              <a
                      class="courses__card-badge"
                      href="<?= get_the_permalink(); ?>"
                      title="Lien vers la page de formation : <?= esc_attr(get_the_title()); ?>"
              >
                Découvrir cette formation !
              </a>
            </div>

            <div class="courses__card-body">
              <h3 class="courses__card-title">
                <a
                        class="courses__card-title-link"
                        href="<?= get_the_permalink(); ?>"
                        title="Lien vers la page de formation : <?= esc_attr(get_the_title()); ?>"
                >
                  <?= get_the_title(); ?>
                </a>
              </h3>

              <p class="courses__card-excerpt">
                <?= get_the_excerpt(); ?>
              </p>

              <div class="courses__card-meta">
                <?php if ($duration): ?>
                  <span class="courses__card-meta-item"><?= esc_html($duration); ?></span>
                <?php else: ?>
                  <span class="courses__card-meta-item">8 semaines</span>
                <?php endif; ?>

                <span class="courses__card-meta-dot" aria-hidden="true"></span>

                <?php if ($level): ?>
                  <span class="courses__card-meta-item"><?= esc_html($level); ?></span>
                <?php else: ?>
                  <span class="courses__card-meta-item">Intermédiaire</span>
                <?php endif; ?>
              </div>
            </div>
          </article>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="courses__empty">
          <?php _e('Sorry, no posts matched your criteria.'); ?>
        </p>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>

    <?php if (!empty($link)): ?>
      <div class="courses__footer">
        <a
                class="courses__button"
                title="<?= esc_attr($link['title']); ?>"
                href="<?= esc_url($link['url']); ?>"
        >
          <?= esc_html($link['title']); ?>
        </a>
      </div>
    <?php endif; ?>
  </div>
</section>
