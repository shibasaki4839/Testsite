<?php
namespace Drupal\examsample;

use Drupal\examsample\ExamPluginInterface;
use Drupal\Component\Plugin\PluginBase;

class ExamBase extends PluginBase implements ExamPluginInterface{
  /**
   * {@inheritDoc}
   */
  public function getOrder() {
    $label = $this->pluginDefinition['label'];
    return 'Yout ordered an'.$label.'.Enjoy!';
  }
}