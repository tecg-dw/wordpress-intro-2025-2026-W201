<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= get_the_title() ?> - Wordpress Demo 201></title>
  <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
  <script src="<?= dw_asset('js') ?>" defer></script>
</head>
<body>
<h1 class="sro"><?= get_the_title() ?></h1>
<nav> <!-- Menu de navigation par Wordpress -->
  <h2 class="sro">Menu de navigation</h2>
  <?php
  wp_nav_menu([
          'theme_location' => 'header',
          'container' => false,
          'menu_class' => 'ul-container',
          'container_class' => 'div-container',
  ]);
  ?>
</nav>
<nav> <!-- Navigation homemade -->
  <h2>Menu de navigation custom</h2>
  <ul>
    <?php foreach (dw_get_navigation_links('header') as $link) : ?>
      <li>
        <a href="<?= $link->href ?>"><?= $link->label ?></a>
      </li>
    <?php endforeach; ?>
    <?php get_search_form(); ?>
  </ul>
</nav>

