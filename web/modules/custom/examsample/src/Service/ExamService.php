<?php

namespace Drupal\examsample\Service;

class ExamService {
  private $drinks=['coffe','orange juice','apple juice'];

  public function getDrink(){
    return $this->drinks[array_rand($this->drinks)];
  }
}