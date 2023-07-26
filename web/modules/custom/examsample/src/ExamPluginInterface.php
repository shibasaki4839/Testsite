<?php

namespace Drupal\examsample;

interface ExamPluginInterface {
  /**
   * @return string
   */
  public function getOrder();
}