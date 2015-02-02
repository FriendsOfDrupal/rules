<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\StringEqualsDataMatcher.
 */

namespace Drupal\rules\DataMatcher;

final class StringEqualsDataMatcher extends StringDataMatcher {

  /**
   * {@inheritdoc}
   */
  protected function doMatch($subject, $object) {
    return $object === $subject;
  }

}
