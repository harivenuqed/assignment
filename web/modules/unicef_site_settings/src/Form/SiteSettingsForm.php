<?php

declare(strict_types=1);

namespace Drupal\unicef_site_settings\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Unicef site settings settings for this site.
 */
final class SiteSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'unicef_site_settings_site_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames(): array {
    return ['unicef_site_settings.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $form['instagram_handle'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Instagram Handle'),
      '#default_value' => $this->config('unicef_site_settings.settings')->get('instagram_handle'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $this->config('unicef_site_settings.settings')
      ->set('instagram_handle', $form_state->getValue('instagram_handle'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
