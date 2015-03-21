<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\ArrayUnionDataMatcher.
 */

namespace Drupal\rules\DataMatcher;

use Drupal\rules\DataMatcher\Argument\DataMatcherArgument;
use InvalidArgumentException;

final class ArrayUnionDataMatcher extends DataMatcher {

  /**
   * {@inheritdoc}
   */
  protected function doMatch(DataMatcherArgument $subject, DataMatcherArgument $object) {
    if (!is_array($subject->getValue())) {
      throw new InvalidArgumentException(sprintf(
        "Subject shoud be an array. '%s' given.",
        var_export($subject->getValue(), TRUE)
      ));
    }

    $union = array_merge(
      array_intersect($subject->getValue()[0], $subject->getValue()[1]),
      array_diff($subject->getValue()[0], $subject->getValue()[1]),
      array_diff($subject->getValue()[1], $subject->getValue()[0])
    );

    return $union == $object->getValue();
  }

}
