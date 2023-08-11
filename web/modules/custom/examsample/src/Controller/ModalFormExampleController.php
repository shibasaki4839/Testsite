<?php

namespace Drupal\examsample\Controller;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Form\FormBuilder;

/**
 * ModalFormExampleController class
 */
class ModalFormExampleController extends ControllerBase {
  /**
   * The form builder.
   * 
   * @var \Drupal\Core\Form\FormBuilder
   */
  protected $formBuilder;

  /**
   * The ModalFormExampleController constructor
   * 
   * @param \Drupal\Core\Form\FormBuilder $formBuilder
   */
  public function __construct(FormBuilder $formBuilder) {
    $this->formBuilder=$formBuilder;
  }

  /**
   * {@inheritDoc}
   * 
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The Drupal service container
   * 
   * @return static
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container -> get('form_builder')
    );
  }

  /**
   * Callback for opening the modal form
   */
  public function OpenModalForm() {
    $response = new AjaxResponse();

    $modal_form = $this -> formBuilder() -> getForm('Drupal\examsample\Form\ModalForm');
    $response -> addCommand(new OpenModalDialogCommand('My Modal Form', $modal_form, ['width' => '800']));
    return $response;
  }
}