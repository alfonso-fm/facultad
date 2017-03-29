<?php

namespace Drupal\PageInfo\Entity\Events;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\PageInfo\Entity\PageInfo\PageInfoInterface;

/**
* Defines the Events entity.
* @ContentEntityType(
*   id = "Events",
*   label = @Translation("Events entity"),
*   handlers = {
*     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
*     "list_builder" = "Drupal\PageInfo\Entity\Events\EventsListBuilder",
*     "views_data" = "Drupal\PageInfo\Entity\Events\EventsViewsData",
*     "form" = {
*       "add"    = "Drupal\PageInfo\Entity\Events\Form\EventsForm",
*       "edit"   = "Drupal\PageInfo\Entity\Events\Form\EventsForm",
*       "delete" = "Drupal\PageInfo\Entity\Events\Form\EventsDeleteForm",
*     },
*     "access" = "Drupal\PageInfo\Entity\Events\EventsAccessControlHandler",
*   },
*   list_cache_contexts = { "user" },
*   base_table = "Events",
*   admin_permission = "administer PageInfo entity",
*   entity_keys = {
*     "id" = "id",
*     "keyname" = "keyname",
*     "fieldvalue" = "fieldvalue",
*   },
*   links = {
*     "canonical" = "/Events/{Events}",
*     "edit-form" = "/Events/{Events}/edit",
*     "collection" = "/Events/list",
*     "delete-form" = "/Events/{Events}/delete",
*   },
* )
*/
class Events extends ContentEntityBase implements EventsInterface {
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
  }
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the PageInfo entity.'))
      ->setReadOnly(TRUE);

    $fields['imageurl'] = BaseFieldDefinition::create('image')
      ->setLabel(t('Imagen'))
      ->setDescription(t('La imagen a mostrar en el calendario.'))
      ->setSettings(array('title_field' => 1, 'title_field_required' => 0,))
      ->setDisplayOptions('form', array('type' => 'string_textarea','weight' => 0,'settings' => array('rows' => 1, ),))
      ->setDisplayOptions('view', array('label' => 'above','type' => 'default', 'weight'  => 0,))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Nombre'))
      ->setRequired(TRUE)
      ->setDescription(t('Nombre'))
      ->setDisplayOptions('form', array('type' => 'string','weight' => 0,'settings' => array('rows' => 1, ),))
      ->setDisplayOptions('view', array('label' => 'above','type' => 'string','weight' => 0,))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['detail'] = BaseFieldDefinition::create('string_long')
      ->setLabel(t('Texto del evento'))
      ->setDescription(t('Texto'))
      ->setRequired(TRUE)
      ->setDisplayOptions('form', array('type' => 'string_textarea','weight' => 0,'settings' => array('rows' => 3,),))
      ->setDisplayOptions('view', array('label' => 'above','type' => 'string','weight' => 0,))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['place'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Lugar'))
      ->setDescription(t('Lugar'))
      ->setRequired(TRUE)
      ->setDisplayOptions('form', array('type' => 'string','weight' => 0,'settings' => array('rows' => 1, ),))
      ->setDisplayOptions('view', array('label' => 'above','type' => 'string','weight' => 0,))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);
/*
    $fields['date'] = BaseFieldDefinition::create('datetime')
      ->setLabel(t('Fecha'))
      ->setDescription(t('Fecha del Evento'))
      ->setRequired(TRUE)
      ->setDisplayOptions('form', array('type' => 'date','weight' => 0,))
      ->setDisplayOptions('view', array('label' => 'above','type' => 'string','weight' => 0,))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);
*/

    $fields['date'] = BaseFieldDefinition::create('datetime')
      ->setLabel(t('Yeast DateTime'))
      ->setDescription(t('Date and time yeasting began.'))
      ->setSettings(array(
        'datetime_type' => 'datetime_default',
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);
      
    
      $fields['duration'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Duración'))
      ->setDescription(t('Duración del Evento en horas'))
      ->setRequired(TRUE)
      ->setDisplayOptions('form', array('type' => 'string','weight' => 0,))
      ->setDisplayOptions('view', array('label' => 'above','type' => 'string','weight' => 0,))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

      //print($fields[0]->getDisplayOptions('datetime'));
    return $fields;
  }
}