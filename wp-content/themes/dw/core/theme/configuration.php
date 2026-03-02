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

// Fonction qui permet de supprimer les Text-area de base sur les pages
function init_remove_support(): void
{
  remove_post_type_support('post', 'editor');
  remove_post_type_support('page', 'editor');
  remove_post_type_support('product', 'editor');
}


/**
 * Désactive Posts (Articles) + Comments (Commentaires) dans l'admin
 * et bloque l'accès direct aux pages correspondantes.
 */
add_action('admin_menu', function () {
  remove_menu_page('edit.php');
  remove_menu_page('edit-comments.php');
}, 999);

add_action('wp_before_admin_bar_render', function () {
  global $wp_admin_bar;
  if (!is_object($wp_admin_bar)) {
    return;
  }

  $wp_admin_bar->remove_menu('comments');
  $wp_admin_bar->remove_menu('new-post');
}, 999);

add_action('init', function () {
  add_filter('comments_open', '__return_false', 20, 2);
  add_filter('pings_open', '__return_false', 20, 2);
  add_filter('comments_array', '__return_empty_array', 20, 2);
  remove_post_type_support('post', 'comments');
  remove_post_type_support('page', 'comments');
  remove_post_type_support('attachment', 'comments');
}, 100);

add_action('admin_init', function () {
  global $pagenow;

  $blocked_pages = [
    'edit.php',
    'post-new.php',
    'post.php',
    'edit-comments.php',
    'comment.php',
  ];

  if (in_array($pagenow, $blocked_pages, true)) {
    $post_type = $_GET['post_type'] ?? null;

    if ($pagenow === 'edit.php' && empty($post_type)) {
      wp_die('Accès désactivé : Articles.', 'Accès refusé', ['response' => 403]);
    }

    if ($pagenow === 'edit.php' && $post_type === 'post') {
      wp_die('Accès désactivé : Articles.', 'Accès refusé', ['response' => 403]);
    }

    if ($pagenow === 'post-new.php') {
      $pt = $_GET['post_type'] ?? 'post';
      if ($pt === 'post') {
        wp_die('Création d’articles désactivée.', 'Accès refusé', ['response' => 403]);
      }
    }

    if ($pagenow === 'post.php' && isset($_GET['post'])) {
      $post_id = (int)$_GET['post'];
      if ($post_id > 0 && get_post_type($post_id) === 'post') {
        wp_die('Édition d’articles désactivée.', 'Accès refusé', ['response' => 403]);
      }
    }

    if ($pagenow === 'edit-comments.php' || $pagenow === 'comment.php') {
      wp_die('Commentaires désactivés.', 'Accès refusé', ['response' => 403]);
    }
  }
}, 1);
