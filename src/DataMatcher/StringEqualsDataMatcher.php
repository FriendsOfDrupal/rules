<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\StringEqualsDataMatcher.
 */

namespace Drupal\rules\DataMatcher;

use Drupal\rules\DataMatcher\Argument\DataMatcherArgument;

final class StringEqualsDataMatcher extends StringDataMatcher {

  /**
   * {@inheritdoc}
   */
  protected function doMatch(DataMatcherArgument $subject, DataMatcherArgument $object) {
    return $object->getValue() === $subject->getValue();
  }

}