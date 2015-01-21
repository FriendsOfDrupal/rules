<?php

/**
 * @file
 * Contains \Drupal\rules\DataProcessor\TrimDataProcessor.
 */

namespace Drupal\rules\DataProcessor;

use Drupal\rules\DataProcessor\DataProcessorInterface;

class TrimDataProcessor implements DataProcessorInterface {

  /**
   * {@inheritdoc}
   */
  public function process($value) {
    return trim($value);
  }

}
