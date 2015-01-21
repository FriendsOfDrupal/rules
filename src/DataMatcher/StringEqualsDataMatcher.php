<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\StringEqualsDataMatcher.
 */

namespace Drupal\rules\DataMatcher;

class StringEqualsDataMatcher extends StringDataMatcher {

  /**
   * {@inheritdoc}
   */
  protected function doMatch($subject, $object) {
    return $object === $subject;
  }

}
