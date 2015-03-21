<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\ArrayCountDataMatcher.
 */

namespace Drupal\rules\DataMatcher;

use Drupal\rules\DataMatcher\Argument\DataMatcherArgument;

final class ArrayCountDataMatcher extends DataMatcher {

  /**
   * {@inheritdoc}
   */
  protected function doMatch(DataMatcherArgument $subject, DataMatcherArgument $object) {
    return count($subject->getValue()) === $object->getValue();
  }

}
