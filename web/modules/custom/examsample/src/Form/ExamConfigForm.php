<?php

namespace Drupal\examsample\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * This is
 */
class ExamConfigForm extends ConfigFormBase {
  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'exam_config_form';
  }
  /**
   * {@inheritDoc}
   */
  protected function getEditableConfigNames() {
    //ここに構成オブジェクトの名前を指定して、下のbuildFormでEditableなオブジェクトとして返す
    return ['examsample.settings'];
  }

  public function buildForm(array $form,FormStateInterface $form_state) {
    $config=$this->config('examsample.settings');
    $abc="hogehoge";
    $math="bath";
    $form['bool'] = [
      '#type'=>'checkbox',
      '#title'=>$this->t('Bool Value'),
      '#default_value'=>$config->get('bool'),
    ];

    $form['message'] = [
      '#type'=>'textfield',
      '#title'=>$this->t('Your message'),
      '#default_value'=>$config->get('message'),
    ];

    return parent::buildForm($form,$form_state);

  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state){
    $this->config('examsample.settings')
      ->set('bool', $form_state->getValue('bool'))
      ->set('message', $form_state->getValue('message'))
      ->save();
    parent::submitForm($form, $form_state);
  }
}