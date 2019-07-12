<?php


namespace Drupal\gleb_module\Form;


use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class MapSettingsForm extends ConfigFormBase
{

  const SETTINGS = 'gleb_module.settings';

  public function getFormId() {
    return 'gleb_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
        static::SETTINGS,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(static::SETTINGS);

    $form['api'] = [
        '#type' => 'textarea',
        '#title' => $this->t('API'),
        '#default_value' => $config->get('api'),
    ];


    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration
    $this->configFactory->getEditable(static::SETTINGS)
        // Set the submitted configuration setting
        ->set('api', $form_state->getValue('api'))
        ->save();

    parent::submitForm($form, $form_state);
  }


}