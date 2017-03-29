<?php

namespace Drupal\PageInfo\Entity\StaticContent;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\PageInfo\Entity\PageInfo\PageInfoInterface;

/**
* Defines the StaticContent entity.
* @ContentEntityType(
*   id = "StaticContent",
*   label = @Translation("StaticContent entity"),
*   handlers = {
*     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
*     "list_builder" = "Drupal\PageInfo\Entity\StaticContent\StaticContentListBuilder",
*     "views_data" = "Drupal\PageInfo\Entity\StaticContent\StaticContentViewsData",
*     "form" = {
*       "edit" = "Drupal\PageInfo\Entity\StaticContent\Form\StaticContentForm",
*     },
*     "access" = "Drupal\PageInfo\Entity\StaticContent\StaticContentAccessControlHandler",
*   },
*   list_cache_contexts = { "user" },
*   base_table = "StaticContent",
*   admin_permission = "administer PageInfo entity",
*   entity_keys = {
*     "id" = "id",
*     "keyname" = "keyname",
*     "fieldvalue" = "fieldvalue",
*   },
*   links = {
*     "canonical" = "/StaticContent/{StaticContent}",
*     "edit-form" = "/StaticContent/{StaticContent}/edit",
*     "collection" = "/StaticContent/list"
*   },
* )
*/
class StaticContent extends ContentEntityBase implements StaticContentInterface {
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
  }
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the PageInfo entity.'))
      ->setReadOnly(TRUE);

    $fields['keyname'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Nombre'))
      ->setDescription(t('El Nombre de la Página.'))
      ->setDisplayConfigurable('view', TRUE)
      ->setReadOnly(TRUE);

    $fields['fieldvalue'] = BaseFieldDefinition::create('string_long')
      ->setLabel(t('Descripción'))
      ->setDescription(t('La Descripción'))
      ->setDisplayOptions('form', array('type' => 'item','weight' => 0,'settings' => array('rows' => 10, ),))
      ->setDisplayOptions('view', array('label' => 'above','type' => 'html','weight' => -6,))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }
}