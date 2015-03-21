<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\ArrayKeyExistsDataMatcher.
 */

namespace Drupal\rules\DataMatcher;

use Drupal\rules\DataMatcher\Argument\DataMatcherArgument;

final class ArrayHasKeyDataMatcher extends DataMatcher {

  /**
   * {@inheritdoc}
   */
  protected function doMatch(DataMatcherArgument $subject, DataMatcherArgument $object) {
    return isset($subject->getValue()[$object->getValue()]);
  }

}
