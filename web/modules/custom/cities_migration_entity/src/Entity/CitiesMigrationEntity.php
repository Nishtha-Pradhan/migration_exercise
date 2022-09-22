<?php

namespace Drupal\cities_migration_entity\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\cities_migration_entity\CitiesMigrationEntityInterface;
use Drupal\user\EntityOwnerTrait;

/**
 * Defines the cities migration entity entity class.
 *
 * @ContentEntityType(
 *   id = "cities_migration_entity",
 *   label = @Translation("Cities migration entity"),
 *   label_collection = @Translation("Cities migration entities"),
 *   label_singular = @Translation("cities migration entity"),
 *   label_plural = @Translation("cities migration entities"),
 *   label_count = @PluralTranslation(
 *     singular = "@count cities migration entities",
 *     plural = "@count cities migration entities",
 *   ),
 *   bundle_label = @Translation("Cities migration entity type"),
 *   handlers = {
 *     "list_builder" = "Drupal\cities_migration_entity\CitiesMigrationEntityListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *     "access" = "Drupal\cities_migration_entity\CitiesMigrationEntityAccessControlHandler",
 *     "form" = {
 *       "add" = "Drupal\cities_migration_entity\Form\CitiesMigrationEntityForm",
 *       "edit" = "Drupal\cities_migration_entity\Form\CitiesMigrationEntityForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   base_table = "cities_migration_entity",
 *   admin_permission = "administer cities migration entity types",
 *   entity_keys = {
 *     "id" = "id",
 *     "bundle" = "bundle",
 *     "label" = "label",
 *     "uuid" = "uuid",
 *     "owner" = "uid",
 *   },
 *   links = {
 *     "collection" = "/admin/content/cities-migration-entity",
 *     "add-form" = "/admin/content/cities-entity/add/{cities_migration_entity_type}",
 *     "add-page" = "/admin/content/cities-entity/add",
 *     "canonical" = "/admin/content/cities-entity/{cities_migration_entity}",
 *     "edit-form" = "/admin/content/cities-entity/{cities_migration_entity}/edit",
 *     "delete-form" = "/admin/content/cities-entity/{cities_migration_entity}/delete",
 *   },
 *   bundle_entity_type = "cities_migration_entity_type",
 *   field_ui_base_route = "entity.cities_migration_entity_type.edit_form",
 * )
 */
class CitiesMigrationEntity extends ContentEntityBase implements CitiesMigrationEntityInterface
{

    use EntityChangedTrait;
    use EntityOwnerTrait;

    /**
     * {@inheritdoc}
     */
    public function preSave(EntityStorageInterface $storage)
    {
        parent::preSave($storage);
        if (!$this->getOwnerId()) {
            // If no owner has been set explicitly, make the anonymous user the owner.
            $this->setOwnerId(0);
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function baseFieldDefinitions(EntityTypeInterface $entity_type)
    {

        $fields = parent::baseFieldDefinitions($entity_type);

        $fields += static::ownerBaseFieldDefinitions($entity_type);

        $fields['city_id'] = BaseFieldDefinition::create('integer')
            ->setLabel(t('City ID'))
            ->setDescription(t('The ID of the City entity.'))
            ->setSettings([
                'max_length' => 255,
                'text_processing' => 0,
            ])
            // Set no default value.
            ->setDefaultValue(null)
            ->setDisplayOptions('view', [
                'label' => 'above',
                'type' => 'number',
                'weight' => -7,
            ])
            ->setDisplayOptions('form', [
                'type' => 'number',
                'weight' => -7,
            ])
            ->setDisplayConfigurable('form', true)
            ->setDisplayConfigurable('view', true);

        $fields['title'] = BaseFieldDefinition::create('string')
            ->setLabel(t('City Name'))
            ->setDescription(t('The name of the City entity.'))
            ->setSettings([
                'max_length' => 255,
                'text_processing' => 0,
            ])
            // Set no default value.
            ->setDefaultValue(null)
            ->setDisplayOptions('view', [
                'label' => 'above',
                'type' => 'string',
                'weight' => -6,
            ])
            ->setDisplayOptions('form', [
                'type' => 'string_textfield',
                'weight' => -6,
            ])
            ->setDisplayConfigurable('form', true)
            ->setDisplayConfigurable('view', true);

        $fields['location'] = BaseFieldDefinition::create('string')
            ->setLabel(t('City Location'))
            ->setDescription(t('The location of the City entity.'))
            ->setSettings([
                'max_length' => 255,
                'text_processing' => 0,
            ])
            // Set no default value.
            ->setDefaultValue(null)
            ->setDisplayOptions('view', [
                'label' => 'above',
                'type' => 'string',
                'weight' => -5,
            ])
            ->setDisplayOptions('form', [
                'type' => 'string_textfield',
                'weight' => -5,
            ])
            ->setDisplayConfigurable('form', true)
            ->setDisplayConfigurable('view', true)
            ->setCardinality(2);

        $fields['pop'] = BaseFieldDefinition::create('integer')
            ->setLabel(t('City population'))
            ->setDescription(t('The population of the City entity.'))
            ->setSettings([
                'max_length' => 255,
                'text_processing' => 0,
            ])
            // Set no default value.
            ->setDefaultValue(null)
            ->setDisplayOptions('view', [
                'label' => 'above',
                'type' => 'number',
                'weight' => -4,
            ])
            ->setDisplayOptions('form', [
                'type' => 'number',
                'weight' => -4,
            ])
            ->setDisplayConfigurable('form', true)
            ->setDisplayConfigurable('view', true);

        $fields['state'] = BaseFieldDefinition::create('string')
            ->setLabel(t('State of the City'))
            ->setDescription(t('The state of the City entity.'))
            ->setSettings([
                'max_length' => 255,
                'text_processing' => 0,
            ])
            // Set no default value.
            ->setDefaultValue(null)
            ->setDisplayOptions('view', [
                'label' => 'above',
                'type' => 'string',
                'weight' => -3,
            ])
            ->setDisplayOptions('form', [
                'type' => 'string_textfield',
                'weight' => -3,
            ])
            ->setDisplayConfigurable('form', true)
            ->setDisplayConfigurable('view', true);

        $fields['status'] = BaseFieldDefinition::create('boolean')
            ->setLabel(t('Status'))
            ->setDefaultValue(true)
            ->setSetting('on_label', 'Enabled')
            ->setDisplayOptions('form', [
                'type' => 'boolean_checkbox',
                'settings' => [
                    'display_label' => false,
                ],
                'weight' => 0,
            ])
            ->setDisplayConfigurable('form', true)
            ->setDisplayOptions('view', [
                'type' => 'boolean',
                'label' => 'above',
                'weight' => 0,
                'settings' => [
                    'format' => 'enabled-disabled',
                ],
            ])
            ->setDisplayConfigurable('view', true);

        $fields['description'] = BaseFieldDefinition::create('text_long')
            ->setLabel(t('Description'))
            ->setDisplayOptions('form', [
                'type' => 'text_textarea',
                'weight' => 10,
            ])
            ->setDisplayConfigurable('form', true)
            ->setDisplayOptions('view', [
                'type' => 'text_default',
                'label' => 'above',
                'weight' => 10,
            ])
            ->setDisplayConfigurable('view', true);

        $fields['uid'] = BaseFieldDefinition::create('entity_reference')
            ->setLabel(t('Author'))
            ->setSetting('target_type', 'user')
            ->setDefaultValueCallback(static::class.'::getDefaultEntityOwner')
            ->setDisplayOptions('form', [
                'type' => 'entity_reference_autocomplete',
                'settings' => [
                    'match_operator' => 'CONTAINS',
                    'size' => 60,
                    'placeholder' => '',
                ],
                'weight' => 15,
            ])
            ->setDisplayConfigurable('form', true)
            ->setDisplayOptions('view', [
                'label' => 'above',
                'type' => 'author',
                'weight' => 15,
            ])
            ->setDisplayConfigurable('view', true);

        $fields['created'] = BaseFieldDefinition::create('created')
            ->setLabel(t('Authored on'))
            ->setDescription(t('The time that the cities migration entity was created.'))
            ->setDisplayOptions('view', [
                'label' => 'above',
                'type' => 'timestamp',
                'weight' => 20,
            ])
            ->setDisplayConfigurable('form', true)
            ->setDisplayOptions('form', [
                'type' => 'datetime_timestamp',
                'weight' => 20,
            ])
            ->setDisplayConfigurable('view', true);

        $fields['changed'] = BaseFieldDefinition::create('changed')
            ->setLabel(t('Changed'))
            ->setDescription(t('The time that the cities migration entity was last edited.'));

        return $fields;
    }

}
