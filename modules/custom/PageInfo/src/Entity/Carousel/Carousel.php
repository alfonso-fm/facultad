<?php

namespace Drupal\PageInfo\Entity\Carousel;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\PageInfo\Entity\PageInfo\PageInfoInterface;

/**
* Defines the Carousel entity.
* @ContentEntityType(
*   id = "Carousel",
*   label = @Translation("Carousel entity"),
*   handlers = {
*     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
*     "list_builder" = "Drupal\PageInfo\Entity\Carousel\CarouselListBuilder",
*     "views_data" = "Drupal\PageInfo\Entity\Carousel\CarouselViewsData",
*     "form" = {
*       "add"    = "Drupal\PageInfo\Entity\Carousel\Form\CarouselForm",
*       "edit"   = "Drupal\PageInfo\Entity\Carousel\Form\CarouselForm",
*       "delete" = "Drupal\PageInfo\Entity\Carousel\Form\CarouselDeleteForm",
*     },
*     "access" = "Drupal\PageInfo\Entity\Carousel\CarouselAccessControlHandler",
*   },
*   list_cache_contexts = { "user" },
*   base_table = "Carousel",
*   admin_permission = "administer PageInfo entity",
*   entity_keys = {
*     "id" = "id",
*     "keyname" = "keyname",
*     "fieldvalue" = "fieldvalue",
*   },
*   links = {
*     "canonical" = "/Carousel/{Carousel}",
*     "edit-form" = "/Carousel/{Carousel}/edit",
*     "collection" = "/Carousel/list",
*     "delete-form" = "/Carousel/{Carousel}/delete",
*   },
* )
*/
class Carousel extends ContentEntityBase implements CarouselInterface {
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
      ->setDescription(t('La imagen a mostrar en el carrusel.'))
      ->setSettings(array('title_field' => 1, 'title_field_required' => 1,))
      ->setDisplayOptions('form', array('type' => 'string_textarea','weight' => 0,'settings' => array('rows' => 1, ),))
      ->setDisplayOptions('view', array('label' => 'above','type' => 'default', 'weight'  => 0,))
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
      ->setSettings(['allowed_values' => ['1' => 'CARRUSEL', '2' => 'NOTICIAS']])
      ->setLabel(t('Tipo'))
      ->setDescription(t('Tipo'))
      ->setRequired(TRUE)
      ->setDisplayOptions('form', array('type' => 'select','weight' => 0,'settings' => array('rows' => 1, ),))
      ->setDisplayOptions('view', array('label' => 'above','type' => 'string','weight' => 0,))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['url'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Url a Enviar'))
      ->setDescription(t('Url a Enviar'))
      ->setDisplayOptions('form', array('type' => 'string','weight' => 0,'settings' => array('rows' => 1, ),))
      ->setDisplayOptions('view', array('label' => 'above','type' => 'string','weight' => 0,))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);
    return $fields;
  }
}