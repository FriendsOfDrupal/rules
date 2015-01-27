<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataProcessor\RulesDataProcessorBase.
 */

namespace Drupal\rules\Plugin\RulesDataProcessor;

use Drupal\Core\Plugin\PluginBase;
use Drupal\rules\DataProcessor\DataProcessorInterface;
use Drupal\rules\DelegatorInterface;

/**
 * Base class for rules data processors.
 */
abstract class RulesDataProcessorBase extends PluginBase implements DataProcessorInterface, DelegatorInterface {
  /**
   * The DataProcessor delegate.
   *
   * @var \Drupal\rules\DataProcessor\DataProcessorInterface
   */
  protected $dataProcessorDelegate;

  /**
   * Constructs a RulesDataProcessor object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin ID for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->dataProcessorDelegate = $this->createDelegateInstance($configuration);
  }

  /**
   * Forwards matching to the delegate DataProcessor.
   */
  public function process($value) {
    return $this->dataProcessorDelegate->process($value);
  }

}
