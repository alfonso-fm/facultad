<?php

namespace Drupal\PageInfo\Entity\PageInfo;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\PageInfo\Entity\PageInfo\PageInfoInterface;

/**
* Defines the PageInfo entity.
* @ContentEntityType(
*   id = "PageInfo",
*   label = @Translation("PageInfo entity"),
*   handlers = {
*     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
*     "list_builder" = "Drupal\PageInfo\Entity\PageInfo\PageInfoListBuilder",
*     "views_data" = "Drupal\PageInfo\Entity\PageInfo\PageInfoViewsData",
*     "form" = {
*       "edit" = "Drupal\PageInfo\Entity\PageInfo\Form\PageInfoForm",
*     },
*     "access" = "Drupal\PageInfo\Entity\PageInfo\PageInfoAccessControlHandler",
*   },
*   list_cache_contexts = { "user" },
*   base_table = "PageInfo",
*   admin_permission = "administer PageInfo entity",
*   entity_keys = {
*     "id" = "id",
*     "uuid" = "uuid",
*     "pagename" = "pagename",
*     "header" = "header",
*     "description" = "description",
*     "comment" = "comment",
*   },
*   links = {
*     "canonical" = "/PageInfo/{PageInfo}",
*     "edit-form" = "/PageInfo/{PageInfo}/edit",
*     "collection" = "/PageInfo/list"
*   },
* )
*/
class PageInfo extends ContentEntityBase implements PageInfoInterface {
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
  }
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the PageInfo entity.'))
      ->setReadOnly(TRUE);

    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the PageInfo entity.'))
      ->setReadOnly(TRUE);

    $fields['pagename'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Nombre'))
      ->setDescription(t('El Nombre de la Página.'))
      ->setDisplayConfigurable('view', TRUE)
      ->setReadOnly(TRUE);

    $fields['header'] = BaseFieldDefinition::create('string_long')
      ->setLabel(t('Encabezado'))
      ->setDescription(t('El Encabezado'))
      ->setSettings(array('default_value' => '', 'max_length' => 1000, 'text_processing' => 0,))
      ->setDisplayOptions('form', array('type' => 'string_textarea','weight' => 0,'settings' => array( 'rows' => 2,),))
      ->setDisplayOptions('view', array('label' => 'above','type' => 'string','weight' => -6,))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['description'] = BaseFieldDefinition::create('string_long')
      ->setLabel(t('Descripción'))
      ->setDescription(t('La Descripción'))
      ->setDisplayOptions('form', array('type' => 'string_textarea','weight' => 0,'settings' => array('rows' => 2, ),))
      ->setDisplayOptions('view', array('label' => 'above','type' => 'string','weight' => -6,))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['comments'] = BaseFieldDefinition::create('string_long')
      ->setLabel(t('Comentarios'))
      ->setDescription(t('Los Comentarios'))
      ->setDisplayOptions('form', array('type' => 'string_textarea','weight' => 0,'settings' => array('rows' => 2,),))
      ->setDisplayOptions('view', array('label' => 'above','type' => 'string','weight' => -6,))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);
    return $fields;
  }
}