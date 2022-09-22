<?php

namespace Drupal\cities_migration_entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a cities migration entity entity type.
 */
interface CitiesMigrationEntityInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
