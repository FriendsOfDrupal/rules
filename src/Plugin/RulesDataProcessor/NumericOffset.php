<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataProcessor\NumericOffset.
 */

namespace Drupal\rules\Plugin\RulesDataProcessor;

use Drupal\rules\DataProcessor\NumericOffsetDataProcessor;

/**
 * A data processor for applying numerical offsets.
 *
 * The plugin configuration must contain the following entry:
 * - offset: the value that should be added.
 *
 * @RulesDataProcessor(
 *   id = "rules_numeric_offset",
 *   label = @Translation("Apply numeric offset")
 * )
 */
class NumericOffset extends RulesDataProcessorBase {

  /**
   * {@inheritdoc}
   */
  public function createDelegateInstance() {
    return new NumericOffsetDataProcessor();
  }

}
