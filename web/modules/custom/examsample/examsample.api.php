<?php

/**
 * ExamSample world hool.
 * 
 * This hook allows you to do something
 * when node loaded using hook_ENTITY_TYPE_view()
 */

 function hook_examsample_hello_world(){
  \Drupal::messenger()->addStatus('Hello world');
 }