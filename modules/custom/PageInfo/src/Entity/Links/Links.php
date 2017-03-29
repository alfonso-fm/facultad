<?php

namespace Drupal\PageInfo\Entity\Links;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\PageInfo\Entity\PageInfo\PageInfoInterface;

/**
* Defines the Links entity.
* @ContentEntityType(
*   id = "Links",
*   label = @Translation("Links entity"),
*   handlers = {
*     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
*     "list_builder" = "Drupal\PageInfo\Entity\Links\LinksListBuilder",
*     "views_data" = "Drupal\PageInfo\Entity\Links\LinksViewsData",
*     "form" = {
*       "add"    = "Drupal\PageInfo\Entity\Links\Form\LinksForm",
*       "edit"   = "Drupal\PageInfo\Entity\Links\Form\LinksForm",
*       "delete" = "Drupal\PageInfo\Entity\Links\Form\LinksDeleteForm",
*     },
*     "access" = "Drupal\PageInfo\Entity\Links\LinksAccessControlHandler",
*   },
*   list_cache_contexts = { "user" },
*   base_table = "Links",
*   admin_permission = "administer PageInfo entity",
*   entity_keys = {
*     "id" = "id",
*     "keyname" = "keyname",
*     "fieldvalue" = "fieldvalue",
*   },
*   links = {
*     "canonical" = "/Links/{Links}",
*     "edit-form" = "/Links/{Links}/edit",
*     "collection" = "/Links/list",
*     "delete-form" = "/Links/{Links}/delete",
*   },
* )
*/
class Links extends ContentEntityBase implements LinksInterface {
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
  }

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the PageInfo entity.'))
      ->setReadOnly(TRUE);

    $fields['url'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Url a Enviar'))
      ->setDescription(t('Url a Enviar'))
      ->setDisplayOptions('form', array('type' => 'string_textarea','weight' => 0,'settings' => array('rows' => 1, ),))
      ->setDisplayOptions('view', array('label' => 'above','type' => 'string','weight' => 0,))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['text'] = BaseFieldDefinition::create('string_long')
      ->setLabel(t('Texto a Mostrar'))
      ->setDescription(t('Texto'))
      ->setRequired(TRUE)
      ->setDisplayOptions('form', array('type' => 'string_textarea','weight' => 0,'settings' => array('rows' => 3,),))
      ->setDisplayOptions('view', array('label' => 'above','type' => 'string','weight' => 0,))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['type'] = BaseFieldDefinition::create('list_string')
      ->setSettings(['allowed_values' => ['1' => 'ENCABEZADO', '2' => 'LATERAL']])
      ->setLabel(t('Tipo'))
      ->setDescription(t('Tipo'))
      ->setRequired(TRUE)
      ->setDisplayOptions('form', array('type' => 'select','weight' => 0,'settings' => array('rows' => 1, ),))
      ->setDisplayOptions('view', array('label' => 'above','type' => 'string','weight' => 0,))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);


    return $fields;
  }
}