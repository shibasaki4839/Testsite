<?php

namespace Drupal\examsample\Form;

use Drupal\Component\Utility\EmailValidator;
use Drupal\examsample\Service\ExamService;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
class ExamSampleForm extends FormBase {
  protected $emailValidator;
  protected $drink;
  public function __construct(EmailValidator $email_validator,ExamService $exam_service){
    $this->emailValidator=$email_validator;
    $this->drink=$exam_service;

  }
  public static function create(ContainerInterface $container){
    return new static(
      $container->get('email.validator'),
      $container->get('examsample.drink'),
    );
  }
  public function getFormId() {
    return 'examsample';
  }

  public function buildForm(array $form, FormStateInterface $form_state){
    //dpm(\Drupal::getContainer()->get('csrf_token')->get("examsample/form1"));
    //$form['#theme'] = 'examsample_form';
    $form['name'] =[
      '#type' => 'textfield',
      '#title' => $this->t('名前'),
    ];

    $form['submit']=[
      '#type' => 'submit',
      '#value' => '送信',
    ];
    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state){
    $email=$form_state->getValue('name');
    //$flag=\Drupal::service('email.validator')->isValid($email);
    $flag=$this->emailValidator->isValid($email);
    $this->messenger()->addMessage($this->drink->getDrink());
    if(!$flag){
      $form_state->setErrorByName('name', 'ミス');

    }
  }
  public function submitForm(array &$form, FormStateInterface $form_state){
    $this->messenger()->addMessage('送信済み');

  }
}