<?php

/**
 * @file
 * Contains \Drupal\rules\DataMatcher\DataMatcherInterface.
 */

namespace Drupal\rules\DataMatcher;

use Drupal\rules\DataProcessor\DataProcessorInterface;

/**
 * DataMatcherInterface is an interface for strategies to match a value.
 */
interface DataMatcherInterface {

  const FIELD_NONE    = 0;
  const FIELD_SUBJECT = 1;
  const FIELD_OBJECT  = 2;
  const FIELD_BOTH    = 3;

  /**
   * Decides whether the rule(s) implemented by the strategy matches the supplied value.
   *
   * @param mixed $subject The subject to be matched
   * @param mixed $object The object to use for the match
   *
   * @return boolean true if the values match, false otherwise
   */
  public function match($subject, $object);

}
