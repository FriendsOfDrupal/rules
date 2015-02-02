<?php

/**
 * @file
 * Contains \Drupal\rules\DataMatcher\String\LevenshteinDataMatcher.
 */

namespace Drupal\rules\DataMatcher;

final class StringLevenshteinDataMatcher extends StringDataMatcher {

  /**
   * @var int
   */
  private $threshold;

  /**
   * Threshold for levenstein function.
   *
   * @param int $threshold
   */
  public function setThreshold($threshold) {
    $this->threshold = $threshold;
  }

  /**
   * Return the threshold value for the levenshtein function.
   *
   * @return int
   */
  protected function getThreshold() {
    return isset($this->threshold) ? $this->threshold : 1;
  }

  /**
   * {@inheritdoc}
   */
  protected function doMatch($subject, $object) {
    return $this->getThreshold() >= levenshtein($subject, $object);
  }

}
