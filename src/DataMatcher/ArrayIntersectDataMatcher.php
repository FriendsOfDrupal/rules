<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\ArrayIntersectDataMatcher.
 */

namespace Drupal\rules\DataMatcher;

use Drupal\rules\DataMatcher\Argument\DataMatcherArgument;
use InvalidArgumentException;

final class ArrayIntersectDataMatcher extends DataMatcher {

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

    $intersect = array_intersect($subject->getValue()[0], $subject->getValue()[1]);

    return $intersect == $object->getValue();
  }

}
