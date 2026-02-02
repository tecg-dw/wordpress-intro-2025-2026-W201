<?php

// Gutenberg est le nouvel éditeur de contenu propre à Wordpress
// il ne nous intéresse pas pour l'utilisation du thème que nous
// allons créer. On va donc le désactiver :

// Disable Gutenberg on the back end.
add_filter( 'use_block_editor_for_post', '__return_false' );
// Disable Gutenberg for widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );
// Disable default front-end styles.
add_action( 'wp_enqueue_scripts', function() {
  // Remove CSS on the front end.
  wp_dequeue_style( 'wp-block-library' );
  // Remove Gutenberg theme.
  wp_dequeue_style( 'wp-block-library-theme' );
  // Remove inline global CSS on the front end.
  wp_dequeue_style( 'global-styles' );
}, 20 );

add_action('init', 'init_remove_support', 100);

function init_remove_support(): void
{
  remove_post_type_support('post', 'editor');
  remove_post_type_support('page', 'editor');
  remove_post_type_support('product', 'editor');
}

