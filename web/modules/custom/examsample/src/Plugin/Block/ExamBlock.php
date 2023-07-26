<?php

namespace Drupal\examsample\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Implementing block.
 * 
 * @Block(
 *   id = "examblock",
 *   admin_label = "試験ブロック",  
 * )
 */
class ExamBlock extends BlockBase {

  public function build() {
    return \Drupal::formBuilder()->getForm('Drupal\examsample\Form\ExamSampleForm');
  }

}