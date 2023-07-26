<?php

namespace Drupal\examsample\EventSubscriber;

use Drupal\Core\Config\ConfigEvents;
use Drupal\Core\Config\ConfigCrudEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ConfigSubscriber implements EventSubscriberInterface
{

  public static function getSubscribedEvents()
  {
    return [
      ConfigEvents::SAVE => 'onConfigSave',
    ];
  }

  public function onConfigSave(ConfigCrudEvent $event) {
    $config = $event->getConfig();
    \Drupal::messenger()->addMessage('設定が保存されました：' . $config->getName());
  }


}