<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\StringContainsDataMatcher.
 */

namespace Drupal\rules\DataMatcher;

use Drupal\rules\DataMatcher\Argument\DataMatcherArgument;

final class StringContainsDataMatcher extends StringDataMatcher {

  /**
   * @var int
   */
  private $offset = 0;

  /**
   *
   * @param int $offset
   */
  public function setOffset($offset) {
    $this->offset = $offset;
  }

  /**
   * {@inheritdoc}
   */
  protected function doMatch(DataMatcherArgument $subject, DataMatcherArgument $object) {
    return FALSE !== strpos($subject->getValue(), $object->getValue(), $this->offset);
  }

}
