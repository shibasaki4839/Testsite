<?php

namespace Drupal\Tests\examsample\Unit\Controller;
use Drupal\examsample\Controller\ExamController;
use Drupal\Tests\UnitTestCase;

/**
 * @coversDefaultClass \Drupal\examsample\Controller\ExamController
 * @group Exam
 */

 class ExamControllerTest extends UnitTestCase {
  /**
   * @covers ::index
   */
  public function testIndex() {
    $controller = new ExamController();
    $this->assertEquals(['#markup' => 'Hello, world'], $controller->index());
  }
 }