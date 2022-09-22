<?php

namespace Drupal\cities_migration_entity\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the cities migration entity entity edit forms.
 */
class CitiesMigrationEntityForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    $entity = $this->getEntity();

    $message_arguments = ['%label' => $entity->toLink()->toString()];
    $logger_arguments = [
      '%label' => $entity->label(),
      'link' => $entity->toLink($this->t('View'))->toString(),
    ];

    switch ($result) {
      case SAVED_NEW:
        $this->messenger()->addStatus($this->t('New cities migration entity %label has been created.', $message_arguments));
        $this->logger('cities_migration_entity')->notice('Created new cities migration entity %label', $logger_arguments);
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The cities migration entity %label has been updated.', $message_arguments));
        $this->logger('cities_migration_entity')->notice('Updated cities migration entity %label.', $logger_arguments);
        break;
    }

    $form_state->setRedirect('entity.cities_migration_entity.canonical', ['cities_migration_entity' => $entity->id()]);

    return $result;
  }

}
