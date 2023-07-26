<?php

namespace Drupal\examsample;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

class ExamPluginManager extends DefaultPluginManager{
  /**
   * @param \Tranversable $namespaces
   * 
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend;
   * 
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler){
    //第1引数でどこにプラグインを置けばいいか定義、
    parent::__construct('Plugin/Exam', $namespaces,$module_handler,'Drupal\examsample\ExamPluginInterface','Drupal\examsample\Annotation\Exam');

    $this->alterInfo('exam_info');
    $this->setCacheBackend($cache_backend, 'exam_plugins');
  }
}