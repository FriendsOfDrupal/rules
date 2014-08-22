<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\DataMatcher\Type.
 */

namespace Drupal\rules\Plugin\DataMatcher;

/**
 * Defines a type matcher.
 *
 * @RulesDataMatcher(
 *   id = "rules_datamatcher_type",
 *   label = @Translation("A type matcher.")
 * )
 */
class Type extends DataMatcherBase {

  public function match($subject, $object) {
    $this->validateMatchArgument('object', $object, 'string');

    return $this->doMatch($subject, $object);
  }

  public function doMatch($subject, $object) {
    if ($object === gettype($subject)) {
      return TRUE;
    }

    if (is_object($subject) && $subject instanceof $object) {
      return TRUE;
    }

    return FALSE;
  }

}
