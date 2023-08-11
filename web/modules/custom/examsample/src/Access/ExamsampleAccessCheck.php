<?php

namespace Drupal\examsample\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ExamsampleAccessCheck
 * @package Drupal\examsample\Access
 */
class ExamsampleAccessCheck implements AccessInterface
{
  /**
   * @return string
   */
  public function appliesTo()
  {
    return '_mycustom_access_check';
  }

  /**
   * @param Route $route
   * @param Request $request
   * @param AccountInterface $account
   * @return AccessResult|\Drupal\Core\Access\AccessResultAllowed
   */
  public function access(Route $route, AccountInterface $account, Request $request = NULL)
  {
    // an example
    if ($account->isAnonymous()) {
      return AccessResult::allowed();
    } else {
      return AccessResult::forbidden();
    }
  }

}