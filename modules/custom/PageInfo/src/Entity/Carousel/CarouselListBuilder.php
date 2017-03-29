<?php

namespace Drupal\PageInfo\Entity\Carousel;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Routing\UrlGeneratorInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CarouselListBuilder extends EntityListBuilder {
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
    $header['imageurl__title'] = $this->t('Titúlo');
    $header['type'] = $this->t('Tipo');
    return $header + parent::buildHeader();
  }

  public function buildRow(EntityInterface $entity) {
    $types = array('1' => 'CARRUSEL', '2' => 'NOTICIAS');
    $row['imageurl__title'] = $entity->get('imageurl')->getValue()[0]['title'];
    $row['type'] = $types[$entity->get('type')->getString()];
    return $row + parent::buildRow($entity);
  }
}