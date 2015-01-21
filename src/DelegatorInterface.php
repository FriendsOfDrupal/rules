<?php

/**
 * @file
 * Contains \Drupal\rules\RulesExpressionTrait.
 */

namespace Drupal\rules;

interface DelegatorInterface {
  /**
   * Return a new instance of an object's delegate.
   *
   * @return mixed
   */
  public function createDelegateInstance();
}
