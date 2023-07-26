<?php
namespace Drupal\examsample\Event;

use Drupal\Component\EventDispatcher\Event;
use Drupal\user\UserInterface;
class ExamFirstEvent extends Event{
  protected $account;

  public function __construct(UserInterface $account){
    $this->account=$account;
  }

  public function getAccount() {
    return $this->account;
  }
}