<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\ObjectTypeDataMatcher.
 */

namespace Drupal\rules\DataMatcher;

final class TypeDataMatcher extends DataMatcher {

  /**
   * @param object|string $subject
   * @param string $object
   *
   * @return boolean
   */
  protected function doMatch($subject, $object) {
    if (is_object($subject) && $subject instanceof $object) {
      return TRUE;
    }

    if ($object === gettype($subject)) {
      return TRUE;
    }

    return FALSE;
  }

}
