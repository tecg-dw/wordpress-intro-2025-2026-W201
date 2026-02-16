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

// Fonction qui retourne l'URL d'un asset (css ou js) compilé par Vite
function dw_asset(string $file): string {

  // Chemin absolu vers le fichier manifest.json généré par Vite
  // get_theme_file_path() retourne le chemin serveur vers le thème WordPress
  $manifest_path = get_theme_file_path('public/.vite/manifest.json');

  // Vérifie si le fichier manifest.json existe
  if (file_exists($manifest_path)) {

    // Lit le contenu du fichier manifest.json
    // file_get_contents = récupère le contenu brut du fichier
    // json_decode(..., true) = convertit le JSON en tableau PHP associatif
    $manifest = json_decode(file_get_contents($manifest_path), true);

    // Vérifie si l'entrée CSS existe dans le manifest ET si on demande un fichier de type "css"
    if (isset($manifest['wp-content/themes/dw/assets/css/styles.scss']) && $file === 'css') {

      // Retourne l'URL publique vers le fichier CSS compilé
      // ['file'] contient le nom final généré par Vite (avec hash)
      return get_theme_file_uri('public/' . $manifest['wp-content/themes/dw/assets/css/styles.scss']['file']);
    }

    // Vérifie si l'entrée JS existe dans le manifest ET si on demande un fichier de type "js"
    if (isset($manifest['wp-content/themes/dw/assets/js/main.js']) && $file === 'js') {

      // Retourne l'URL publique vers le fichier JS compilé
      return get_theme_file_uri('public/' . $manifest['wp-content/themes/dw/assets/js/main.js']['file']);
    }
  }

  // Si manifest introuvable ou asset non trouvé, on retourne une chaîne vide
  return '';
}
// Activer l'utilisation des vignettes (image de couverture) sur nos posts "Formations"
add_theme_support('post-thumbnails', ['training']);

// Déclaration d'un CPT (Custom Post Type) "Training" pour les formations
register_post_type('training', [
  'label' => 'Formations',
  'description' => 'Les formations présentes sur mon site web',
  'menu_position' => 2,
  'menu_icon' => 'dashicons-welcome-learn-more',
  'public' => true,
  'has_archive' => true,
  'rewrite' => [
    'slug' => 'formations',
  ],
  'supports' => ['title', 'excerpt', 'thumbnail'],
]);
