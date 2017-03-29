<?php

/*
* @file
* Contains \Drupal\compro_custom\Form\ComproCustomForm.
*/

namespace Drupal\feria\Form;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfigFormBase;

/**
* Configure custom settings for this site.
*/
class FeriaAdminForm extends ConfigFormBase {
  /**
  * Constructor for ComproCustomForm.
  *
  * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
  * The factory for configuration objects.
  */
  public function __construct(ConfigFactoryInterface $config_factory) {
    parent::__construct($config_factory);
  }

  /**
  * Returns a unique string identifying the form.
  *
  * @return string
  * The unique string identifying the form.
  */
  public function getFormId() {
    return 'feria_admin_form';
  }

  /**
  * Gets the configuration names that will be editable.
  *
  * @return array
  * An array of configuration object names that are editable if called in
  * conjunction with the trait's config() method.
  */
  protected function getEditableConfigNames() {
    return ['config.feria'];
  }

  /**
  * Form constructor.
  *
  * @param array $form
  * An associative array containing the structure of the form.
  * @param \Drupal\Core\Form\FormStateInterface $form_state
  * The current state of the form.
  *
  * @return array
  * The form structure.
  */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $compro_custom = $this->config('config.feria');
    $site_name = $this->config('system.site')->get('name');

    // Logo settings for theme override.
    $form['feria']['logo'] = array(
        'title' => array(
            '#type' => 'textfield',
            '#title' => t('Title text'),
            '#maxlength' => 255,
            '#default_value' => $compro_custom->get('logo_title') ? $compro_custom->get('logo_title') : $site_name . ' home',
            '#description' => t('What the tooltip should say when you hover on the logo.'),
        ),
    );
    return parent::buildForm($form, $form_state);
  }

  /**
  * Form submission handler.
  *
  * @param array $form
  * An associative array containing the structure of the form.
  * @param \Drupal\Core\Form\FormStateInterface $form_state
  * The current state of the form.
  */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('config.feria')
    ->set('logo_title', $form_state->getValue(array('feria', 'logo', 'title')))
    ->save();
    parent::submitForm($form, $form_state);
  }
}