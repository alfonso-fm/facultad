<?php

namespace Drupal\PageInfo\Entity\Events;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Routing\UrlGeneratorInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class EventsListBuilder extends EntityListBuilder {
  protected $urlGenerator;

  public static function createInstance(ContainerInterface $container, EntityTypeInterface $entity_type) {
    return new static(
      $entity_type,
      $container->get('entity.manager')->getStorage($entity_type->id()),
      $container->get('url_generator')
    );
  }

  public function __construct(EntityTypeInterface $entity_type, EntityStorageInterface $storage, UrlGeneratorInterface $url_generator) {
    parent::__construct($entity_type, $storage);
    $this->urlGenerator = $url_generator;
  }

  public function render() {
    $build['description'] = array('#markup' => t('Datos del portal de la feria del Empleo'),);
    $build['table'] = parent::render();
    return $build;
  }

  public function buildHeader() {
    $header['title'] = $this->t('Titúlo');
    $header['place'] = $this->t('Lugar');
    return $header + parent::buildHeader();
  }

  public function buildRow(EntityInterface $entity) {
    //print_r($entity->get('date')->getString());
    $row['title'] = $entity->get('title')->getString();
    $row['place'] = $entity->get('place')->getString();
    return $row + parent::buildRow($entity);
  }
}