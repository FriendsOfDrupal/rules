<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\ObjectTypeDataMatcher.
 */

namespace Drupal\rules\DataMatcher;

use Drupal\rules\DataMatcher\Argument\DataMatcherArgument;

final class TypeDataMatcher extends DataMatcher {

  /**
   * @param object|string $subject
   * @param string $object
   *
   * @return boolean
   */
  protected function doMatch(DataMatcherArgument $subject, DataMatcherArgument $object) {
    if (is_object($subject->getValue()) && ltrim(get_class($subject->getValue()), '\\') === ltrim($object->getValue(), '\\')) {
      return TRUE;
    }

    if ($object->getValue() === gettype($subject->getValue())) {
      return TRUE;
    }

    return FALSE;
  }

}
