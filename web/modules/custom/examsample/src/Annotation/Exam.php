<?php 

namespace Drupal\examsample\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * @Annotation
 */

 class Exam extends Plugin {
  /**
   * @var string
   */
  public $id;

  /**
   * @var \Drupal\Compoennt\Annotation\Translation
   * 
   * @ingroup plugin_translatable
   */
  public $label;

  /**
   * @var \Drupal\Compoennt\Annotation\Translation
   * 
   * @ingroup plugin_translatable
   */
  public $description;
 }