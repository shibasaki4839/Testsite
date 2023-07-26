<?php
namespace Drupal\examsample\Plugin\Exam;

use Drupal\examsample\ExamBase;

/**
 * @Exam(
 *   id = "exam1",
 *   label = "Exam1",
 *   description = "This is best practice"
 * )
 */
class Exam1 extends ExamBase {
  /**
   * @inheritDoc
   */
  public function getOrder(){
    $label = $this->pluginDefinition['label'];
    return 'You are '. $label;
  }
}