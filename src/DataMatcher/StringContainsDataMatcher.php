<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\StringContainsDataMatcher.
 */

namespace Drupal\rules\DataMatcher;

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
  protected function doMatch($subject, $object) {
    return FALSE !== strpos($subject, $object, $this->offset);
  }

}
