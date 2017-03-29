<?php

namespace Drupal\PageInfo\Entity\StaticContent\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Language\Language;
use Drupal\Core\Form\FormStateInterface;

class StaticContentForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\PageInfo\Entity\StaticContent */
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;

    $form['langcode'] = array(
      '#title' => $this->t('Language'),
      '#type' => 'language_select',
      '#default_value' => $entity->getUntranslated()->language()->getId(),
      '#languages' => Language::STATE_ALL,
    );
    return $form;
  }

  public function save(array $form, FormStateInterface $form_state) {
    $form_state->setRedirect('entity.StaticContent.collection');
    $entity = $this->getEntity();
    $entity->save();
  }
}