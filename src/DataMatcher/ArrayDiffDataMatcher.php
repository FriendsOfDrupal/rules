<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\ArrayDiffDataMatcher.
 */

namespace Drupal\rules\DataMatcher;

use Drupal\rules\DataMatcher\Argument\DataMatcherArgument;
use InvalidArgumentException;

final class ArrayDiffDataMatcher extends DataMatcher {

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

    $diff = array_diff($subject->getValue()[0], $subject->getValue()[1]);

    return $diff == $object->getValue();
  }

}
