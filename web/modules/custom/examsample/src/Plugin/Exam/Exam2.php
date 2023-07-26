<?php
namespace Drupal\examsample\Plugin\Exam;

use Drupal\examsample\ExamBase;

/**
 * @Exam(
 *   id = "exam2",
 *   label = "Exam2",
 *   description = "This is best practice"
 * )
 */
class Exam2 extends ExamBase {
  /**
   * @inheritDoc
   */
  public function getOrder(){
    $label = $this->pluginDefinition['label'];
    return 'You are '. $label;
  }
}