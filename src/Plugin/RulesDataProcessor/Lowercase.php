<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataProcessor\Lowercase.
 */

namespace Drupal\rules\Plugin\RulesDataProcessor;

use Drupal\rules\DataProcessor\LowercaseDataProcessor;

/**
 * Defines a string lowercase processor.
 *
 * @RulesDataProcessor(
 *   id = "rules_data_processor_lowercase",
 *   label = @Translation("A string lowercase processor.")
 * )
 */
class Lowercase extends RulesDataProcessorBase {

  /**
   * {@inheritdoc}
   */
  public function createDelegateInstance(array $configuration = array()) {
    return new LowercaseDataProcessor();
  }

}
