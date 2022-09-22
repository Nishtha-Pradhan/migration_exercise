<?php

namespace Drupal\cities_migration_entity;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of cities migration entity type entities.
 *
 * @see \Drupal\cities_migration_entity\Entity\CitiesMigrationEntityType
 */
class CitiesMigrationEntityTypeListBuilder extends ConfigEntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['title'] = $this->t('Label');

    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['title'] = [
      'data' => $entity->label(),
      'class' => ['menu-label'],
    ];

    return $row + parent::buildRow($entity);
  }

  /**
   * {@inheritdoc}
   */
  public function render() {
    $build = parent::render();

    $build['table']['#empty'] = $this->t(
      'No cities migration entity types available. <a href=":link">Add cities migration entity type</a>.',
      [':link' => Url::fromRoute('entity.cities_migration_entity_type.add_form')->toString()]
    );

    return $build;
  }

}
