<?php

namespace Drupal\examsample\EventSubscriber;

use Drupal\examsample\Event\ExamEvent;
use Drupal\examsample\Event\ExamFirstEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ExamSubscriber implements EventSubscriberInterface{
  public static function getSubscribedEvents(){
    return[
      ExamEvent::FIRST_EVNET=>'onExamFirstEvent',
    ];
  }

  public function onExamFirstEvent(ExamFirstEvent $event){
    $account =$event->getAccount();
    \Drupal::messenger()->addStatus('ログインしました'.$account->getAccountName());
  }
}