<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\ArrayContainsDataMatcher.
 */

namespace Drupal\rules\DataMatcher;

use Drupal\rules\DataMatcher\Argument\DataMatcherArgument;

final class ArrayContainsDataMatcher extends DataMatcher {

  /**
   * {@inheritdoc}
   */
  protected function doMatch(DataMatcherArgument $subject, DataMatcherArgument $object) {
    return is_array($subject->getValue()) && in_array($object->getValue(), $subject->getValue());
  }

}
