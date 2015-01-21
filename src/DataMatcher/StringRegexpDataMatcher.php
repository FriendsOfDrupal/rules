<?php

/**
 * @file
 * Contains \Drupal\rules\DataMatcher\RegexpDataMatcher.
 */

namespace Drupal\rules\DataMatcher;

class StringRegexpDataMatcher extends StringDataMatcher {

  /**
   * @var int
   */
  private $flags = 0;

  /**
   * @var int
   */
  private $offset = 0;

  /**
   *
   * @param int $flags
   */
  public function setFlags($flags) {
    $this->flags = $flags;
  }

  /**
   *
   * @param int $offset
   */
  public function setOffest($offset) {
    $this->offset = $offset;
  }

  /**
   * {@inheritdoc}
   */
  protected function doMatch($subject, $object) {
    $matches = array();

    return 1 === preg_match($object, $subject, $matches, $this->flags, $this->offset);
  }

}
