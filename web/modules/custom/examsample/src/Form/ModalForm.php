<?php

namespace Drupal\examsample\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\CloseModalDialogCommand;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\ReplaceCommand;

/**
 * SendToDestinationsForm class.
 */
class ModalForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'modal_form_example_modal_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $options = NULL) {
    $form['#prefix'] = '<div id="modal_example_form">';
    $form['#suffix'] = '</div>';

    $query=\Drupal::request()->query->get('hoge');
    dpm($query);

    // The status messages that will contain any form errors.
    $form['status_messages'] = [
      '#type' => 'status_messages',
      '#weight' => -10,
    ];

    // A required checkboxes field.
    $form['select'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Select Destination(s)'),
      '#options' => ['random_value' => 'Some random value'],
      '#required' => TRUE,
    ];
    $form['name'] = [
      '#type' => 'item',
      '#title' => $this->t('名前'),
      '#markup' => 'hoge',
      '#prefix' => '<div class="detail">',
      '#suffix' => '</div>',
    ];
    $form['radio'] = [
      '#type' => 'radios',
      '#options' => [1 => $this->t('受け取る'), 0 => $this->t('受け取らない')],
      '#ajax' => [
        //'callback' => '::projectCallback',
        // don't forget :: when calling a class method.
        'callback' => [$this, 'radioChange'],
        //alternative notation
        'disable-refocus' => FALSE,
        // Or TRUE to prevent re-focusing on the triggering element.
        'event' => 'change',
        //'wrapper' => 'edit-output,edit-output2', // This element is updated with this AJAX callback.
        'progress' => [
          'type' => 'throbber',
          'message' => $this->t('Verifying entry...'),
        ],
      ]
    ];

    $form['actions'] = array('#type' => 'actions');
    $form['actions']['send'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit modal form'),
      '#attributes' => [
        'class' => [
          'use-ajax',
        ],
      ],
      '#ajax' => [
        'callback' => [$this, 'submitModalFormAjax'],
        'event' => 'click',
      ],
    ];

    $form['#attached']['library'][] = 'core/drupal.dialog.ajax';

    return $form;
  }

  
  function radioChange(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    $form['name'] = [
      '#type' => 'item',
      '#markup' => $form_state->getValue('radio'),
      '#prefix' => '<div class="detail">',
      '#suffix' => '</div>',
    ];
    $response->addCommand(new ReplaceCommand(".modal-form-example-modal-form .detail", $form['name']));
    return $response;
  }
  /**
   * AJAX callback handler that displays any errors or a success message.
   */
  public function submitModalFormAjax(array $form, FormStateInterface $form_state) {
    $response = new AjaxResponse();

    // If there are any form errors, AJAX replace the form.
    if ($form_state->hasAnyErrors()) {
      $response->addCommand(new ReplaceCommand('#modal_example_form', $form));
    }
    else {
      $response->addCommand(new OpenModalDialogCommand("Success!", 'The modal form has been submitted.', ['width' => 700]));
      $form['name'] = [
        '#type' => 'item',
        '#markup' => 'name',
        '#prefix' => '<div class="detail">',
        '#suffix' => '</div>',
      ];
      //$response->addCommand(new CloseModalDialogCommand);

      //$response->addCommand(new ReplaceCommand(".form-item-name", $form['name']));
    }

    return $response;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {}

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {}


}