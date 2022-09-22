<?php

namespace Drupal\cities_migration_entity\Form;

use Drupal\Core\Entity\BundleEntityFormBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form handler for cities migration entity type forms.
 */
class CitiesMigrationEntityTypeForm extends BundleEntityFormBase
{

    /**
     * {@inheritdoc}
     */
    public function form(array $form, FormStateInterface $form_state)
    {
        $form = parent::form($form, $form_state);

        $entity_type = $this->entity;
        if ($this->operation == 'edit') {
            $form['#title'] = $this->t('Edit %label cities migration entity type', ['%label' => $entity_type->label()]);
        }

        $form['title'] = [
            '#title' => $this->t('City Name'),
            '#type' => 'textfield',
            '#default_value' => $entity_type->label(),
            '#description' => $this->t('The human-readable name of this cities migration entity type.'),
            '#required' => true,
            '#size' => 30,
        ];

        $form['id'] = [
            '#type' => 'machine_name',
            '#default_value' => $entity_type->id(),
            '#maxlength' => EntityTypeInterface::BUNDLE_MAX_LENGTH,
            '#machine_name' => [
                'exists' => ['Drupal\cities_migration_entity\Entity\CitiesMigrationEntityType', 'load'],
                'source' => ['label'],
            ],
            '#description' => $this->t(
                'A unique machine-readable name for this cities migration entity type. It must only contain lowercase letters, numbers, and underscores.'
            ),
        ];

        $form['city_id'] = [
            '#title' => $this->t('City ID'),
            '#type' => 'textfield',
            '#attributes' => array(
                ' type' => 'number',
            ),
            '#default_value' => 0,
            '#description' => $this->t('The ID of this cities migration entity type.'),
            '#required' => false,
            '#size' => 30,
        ];

        $form['location'] = [
            '#title' => $this->t('City Location'),
            '#type' => 'textfield',
            '#cardinality' => 2,
            '#default_value' => 0, 0,
            '#description' => $this->t('The location of this cities migration entity type.'),
            '#required' => false,
            '#size' => 50,
        ];

        $form['pop'] = [
            '#title' => $this->t('City Population'),
            '#type' => 'textfield',
            '#attributes' => array(
                ' type' => 'number',
            ),
            '#default_value' => 0,
            '#description' => $this->t('The population of this cities migration entity type.'),
            '#required' => false,
            '#size' => 30,
        ];

        $form['state'] = [
            '#title' => $this->t('State of the City'),
            '#type' => 'textfield',
            '#default_value' => 'None',
            '#description' => $this->t('The state of this cities migration entity type.'),
            '#required' => false,
            '#size' => 30,
        ];

        return $this->protectBundleIdElement($form);
    }

    /**
     * {@inheritdoc}
     */
    protected function actions(array $form, FormStateInterface $form_state)
    {
        $actions = parent::actions($form, $form_state);
        $actions['submit']['#value'] = $this->t('Save cities migration entity type');
        $actions['delete']['#value'] = $this->t('Delete cities migration entity type');

        return $actions;
    }

    /**
     * {@inheritdoc}
     */
    public function save(array $form, FormStateInterface $form_state)
    {
        $entity_type = $this->entity;

        $entity_type->set('id', trim($entity_type->id()));
        $entity_type->set('label', trim($entity_type->label()));

        $status = $entity_type->save();

        $t_args = ['%name' => $entity_type->label()];
        if ($status == SAVED_UPDATED) {
            $message = $this->t('The cities migration entity type %name has been updated.', $t_args);
        } elseif ($status == SAVED_NEW) {
            $message = $this->t('The cities migration entity type %name has been added.', $t_args);
        }
        $this->messenger()->addStatus($message);

        $form_state->setRedirectUrl($entity_type->toUrl('collection'));
    }

}
