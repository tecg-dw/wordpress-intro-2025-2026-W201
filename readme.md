# Design Web 201 - Cours de Wordpress

Les synthèses détaillées, ressources et documents complémentaires sont disponibles dans l'équipe **Microsoft Teams du cours**.

---

# Séance 1

## Introduction à WordPress

- Expliquer ce qu’est WordPress (CMS vs site statique)
- Installer WordPress en local
- Création d’une base de données locale pour WordPress
- Comprendre l’architecture des fichiers WordPress
- Différence entre un **thème custom classique** et un **thème block**
- Explication de l’évolution et de la naissance des thèmes blocks

## Prise en main

- Connexion à l’interface d’administration
- Création d’un thème custom visible

### Structure minimale d’un thème

- Base de `header.php`
- Base de `footer.php`
- Base de `index.php`

### Introduction à ACF

- Présentation du plugin
- Introduction à `get_field()`

### Exercice

Créer un **mini CV sur `index.php`** en utilisant des champs **ACF**.

### Démonstration de fonctions WordPress

- `get_the_title()` vs `the_title()`
- `get_the_content()` vs `the_content()`
- `get_header()`
- `get_footer()`

### ACF et SCF

- Présentation des champs personnalisés
- Apparition et évolution de ces outils dans WordPress

---

# Séance 2

## Révision

- Revoir la structure du `header.php`
- Revoir la structure du `footer.php`

## Organisation du thème

- Appeler un composant dans une page (`include`)
- Comprendre les **templates de pages**
- Organisation et architecture d’un thème WordPress

## Mise en place de l’environnement front-end

- Configuration de la compilation CSS et JS
- Utilisation d’un outil de build (ex : Vite)
- Ajout automatique des préfixes CSS

### Exercice

- Fournir **trois templates de pages**
- Demander aux étudiants :
    - de configurer les champs **ACF**
    - de créer les templates correspondants

### Accompagnement

- Aide et suivi des étudiants

---

# Séance 3

## Structure de la page d’accueil

- Création d’une `front-page.php`
- Refactorisation du code en **composants**

## WordPress Loop

- Comprendre la **boucle principale WordPress**

## Custom Post Type

- Création du premier **Custom Post Type**
- Ajouter le support des **thumbnails**

## Intégration

- Intégrer une page complète dans le thème
- Utilisation de `WP_Query`

---

# Séance 4

## Gestion des champs ACF

- Export des champs ACF

## Templates de contenu

- Création d’une **archive page**
- Création d’une **single page**

### Fonctionnalités avancées

- Pagination
- Filtres de contenu

## Navigation

- Menu de navigation custom
- Menu de navigation WordPress

## Footer

- Création d’un footer complet

## Recherche et pages spéciales

- Page **404**
- Page **search**

### Recherche avancée

- Modifier la recherche pour les **Custom Post Types**

## Taxonomies

- Explication des taxonomies
- Utilisation pour le filtrage de contenu

## Page d’options

- Création d’une **page d’options WordPress**

---

# Séance 5

## Formulaire de contact

### Formulaire custom

- Création d’un formulaire de contact personnalisé

### Plugin

- Utilisation de **Contact Form 7**

---

# Séance 6

## Multilingue

- Installation et configuration de **Polylang**
- Création d’un **language switcher**

## Traduction

- Utilisation de **POEDIT**
- Gestion des **locales**

---

# Séance 7

## Récapitulatif du projet

- Retour global sur les notions vues
- Préparation du projet

## Protection d’une page (middleware simulé)

Mise en place d’un système simulant une authentification basée sur une **whitelist d’emails**.

### Fonctionnalités

- Création d’un **Custom Post Type "demandes"**
    - stocker les demandes
    - gérer leur statut

- Création d’un **fichier JSON ou PHP**
    - contenant les mails autorisés
    - contenant les domaines acceptés

- Mise en place d’un **middleware simulé**

### Système de whitelist

- Vérification de l’email utilisateur
- Comparaison avec une liste d’emails autorisés
- Simulation d’une connexion utilisateur

---

# BONUS

## Flexible Content

- Création d’un **Flexible Content avec ACF**
- Utilisation de la boucle flexible pour générer les sections

## Refactorisation du code

- Organisation du code dans les templates
- Optimisation de l’affichage des images

### Gestion des images

- Utilisation de la fonction **`srcset` de WordPress**

## Galerie

- Ajouter une galerie avec **lightbox (Fancybox)**

## Cartes

- Ajouter une carte **Google Maps**
- Ajouter une carte **OpenStreetMap**

## Référencement (SEO)

- Introduction aux microdonnées
- Utilisation de plugins SEO (RankMath / YoastSEO)

## Tests

- Tester son site web
- Suivre des guidelines de qualité web

## Mise en ligne d’un site WordPress

- Déploiement via **SSH**
- Utilisation de plugins de migration
- Sauvegardes et restauration

## Recherche avancée

- Création d’une barre de recherche en **JavaScript**
