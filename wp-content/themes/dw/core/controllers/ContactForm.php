<?php

namespace controllers;

use JetBrains\PhpStorm\NoReturn;

class ContactForm
{
  // Un tableau qui contient les informations sur le jeton de sécurité du formulaire (nonce)
  protected array $config;

  // Les données que je reçois de mon formulaire.
  protected array $data;

  // L'url de la page précédente (referrer)
  protected string $previousUrl;

  public function __construct(array $config, array $data)
  {
    $this->config = $config;
    $this->data = $data;
    $this->previousUrl = wp_get_referer();
  }

  public function sanitize(array $methods): static
  {
    foreach ($methods as $field => $method) {
      $method = 'sanitize_' . $method;
      $this->data[$field] = $method($this->data[$field] ?? '');
    }

    return $this;
  }

  public function validate(array $rules): static
  {
    if (!$this->verifyNonce()) {
      die('Invalid request');
    }

    if ($errors = $this->applyValidationRules($rules)) {
      hepl_session_flash($this->config['nonce_identifier'] . '_errors', $errors);

      wp_safe_redirect($this->previousUrl);
      exit;
    }

    return $this;
  }

  public function save($title, $content): static
  {
    wp_insert_post([
      'post_type' => 'message',
      'post_status' => 'publish',
      'post_title' => $title($this->data),
      'post_content' => $content($this->data),
    ]);

    return $this;
  }

  public function send($title, $content): static
  {
    wp_mail(get_bloginfo('email'), $title($this->data), $content($this->data));

    return $this;
  }


  #[NoReturn]
  public function feedback(): static
  {
    hepl_session_flash($this->config['nonce_identifier'] . '_feedback', true);
    wp_safe_redirect($this->previousUrl);
    exit;
  }


  protected function verifyNonce(): bool
  {
    $nonce = $this->data[$this->config['nonce_field']] ?? null;
    $identifier = $this->config['nonce_identifier'] ?? null;

    return (wp_verify_nonce($nonce, $identifier) === 1);
  }

  protected function applyValidationRules(array $rules): array
  {
    $errors = [];

    foreach ($rules as $field => $checks) {
      $value = $this->data[$field] ?? null;
      $errors[$field] = $this->applyFieldValidation($field, $value, $checks);
    }

    return array_filter($errors);
  }

  protected function applyFieldValidation(string $field, $value, array $rules): ?string
  {
    foreach ($rules as $rule) {
      // Je viens construire la method check... que je vais utiliser Ex: checkRequired
      $check = 'check' . ucfirst($rule);
      // Je viens construire la method get...ErrorMessage que je vais utiliser Ex: getRequiredErrorMessage
      $errorMessage = 'get' . ucfirst($rule) . 'ErrorMessage';

      // Je viens lancer mes méthodes pour vérifier que mes règles sont respectées, sinon je renvoie un message d'erreur
      $error = $this->$check($field, $value)
        ? false
        : $this->$errorMessage($field);

      // Si j'ai des erreurs, je renvoie le tableau
      if ($error) {
        return $error;
      }
    }
    return null;
  }

  protected function checkRequired(string $value): bool
  {
    return ($this->data[$value] !== '');
  }

  protected function checkEmail(string $value): bool
  {
    return filter_var($this->data[$value], FILTER_VALIDATE_EMAIL);
  }

  protected function getEmailErrorMessage(string $field): string
  {
    return 'Veuillez fournir une adresse e-mail valide.';

  }

  protected function getRequiredErrorMessage(string $field): string
  {
    return 'Le champ ' . $field . ' est obligatoire.';
  }
}
