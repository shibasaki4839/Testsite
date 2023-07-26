<?php

namespace Drupal\examsample\Controller;

use Drupal\Core\Controller\ControllerBase;

class ExamController extends ControllerBase {
  
  public function index() {
    $myText = 'This is not just a default text!';
    $myNumber = 'This is @hogehoge !';
    $myArray = [1, 2, 3];

    return [
      // Your theme hook name.
      '#theme' => 'examsample_controller',
      // Your variables.
      '#variable1' => $myText,
      '#variable2' => $myNumber,
      '#variable3' => $myArray,
    ];
  }
}