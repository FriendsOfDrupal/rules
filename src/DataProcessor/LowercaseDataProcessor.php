<?php

/**
 * @file
 * Contains \Drupal\rules\DataProcessor\LowercaseDataProcessor.
 */

namespace Drupal\rules\DataProcessor;

use Drupal\rules\DataProcessor\DataProcessorInterface;

class LowercaseDataProcessor implements DataProcessorInterface {

  /**
   * {@inheritdoc}
   */
  public function process($value) {
    return strtolower($value);
  }

}
