<?php

namespace Drupal\cities_migration_entity\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Cities migration entity type configuration entity.
 *
 * @ConfigEntityType(
 *   id = "cities_migration_entity_type",
 *   label = @Translation("Cities migration entity type"),
 *   label_collection = @Translation("Cities migration entity types"),
 *   label_singular = @Translation("cities migration entity type"),
 *   label_plural = @Translation("cities migration entities types"),
 *   label_count = @PluralTranslation(
 *     singular = "@count cities migration entities type",
 *     plural = "@count cities migration entities types",
 *   ),
 *   handlers = {
 *     "form" = {
 *       "add" = "Drupal\cities_migration_entity\Form\CitiesMigrationEntityTypeForm",
 *       "edit" = "Drupal\cities_migration_entity\Form\CitiesMigrationEntityTypeForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *     "list_builder" = "Drupal\cities_migration_entity\CitiesMigrationEntityTypeListBuilder",
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   admin_permission = "administer cities migration entity types",
 *   bundle_of = "cities_migration_entity",
 *   config_prefix = "cities_migration_entity_type",
 *   entity_keys = {
 *     "city_id" = "city_id",
 *     "id" = "id",
 *     "title" = "title",
 *     "loc" = "loc",
 *     "pop" = "pop",
 *     "state" = "state",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/admin/structure/cities_migration_entity_types/add",
 *     "edit-form" = "/admin/structure/cities_migration_entity_types/manage/{cities_migration_entity_type}",
 *     "delete-form" = "/admin/structure/cities_migration_entity_types/manage/{cities_migration_entity_type}/delete",
 *     "collection" = "/admin/structure/cities_migration_entity_types"
 *   },
 *   config_export = {
 *     "city_id",
 *     "id",
 *     "title",
 *     "loc",
 *     "pop",
 *     "state",
 *     "uuid",
 *   }
 * )
 */
class CitiesMigrationEntityType extends ConfigEntityBundleBase {

  /**
   * The machine name of this cities migration entity type.
   *
   * @var string
   */
  protected $id;

  /**
   * The human-readable name of the cities migration entity type.
   *
   * @var string
   */
  protected $title;

    /**
     * The human-readable name of the cities migration entity type.
     *
     * @var integer
     */
    protected $city_id;

    /**
     * The human-readable name of the cities migration entity type.
     *
     * @var string
     */
    protected $loc;

    /**
     * The human-readable name of the cities migration entity type.
     *
     * @var integer
     */
    protected $pop;

    /**
     * The human-readable name of the cities migration entity type.
     *
     * @var string
     */
    protected $state;



}
