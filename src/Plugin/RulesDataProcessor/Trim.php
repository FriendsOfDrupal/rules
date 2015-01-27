<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataProcessor\Trim.
 */

namespace Drupal\rules\Plugin\RulesDataProcessor;

use Drupal\rules\DataProcessor\TrimDataProcessor;
use Drupal\rules\DelegatorInterface;

/**
 * Defines a string trim processor.
 *
 * @RulesDataProcessor(
 *   id = "rules_data_processor_trim",
 *   label = @Translation("A string trimming processor.")
 * )
 */
class Trim extends RulesDataProcessorBase {

  /**
   * {@inheritdoc}
   */
  public function createDelegateInstance(array $configuration = array()) {
    return new TrimDataProcessor();
  }

}
