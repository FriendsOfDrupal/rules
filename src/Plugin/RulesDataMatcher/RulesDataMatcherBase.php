<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\RulesDataMatcherBase.
 */

namespace Drupal\rules\Plugin\RulesDataMatcher;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Plugin\PluginBase;
use Drupal\rules\DelegatorInterface;
use Drupal\rules\DataMatcher\DataMatcherBuilder;
use Drupal\rules\DataMatcher\DataMatcherInterface;
use Drupal\rules\Context\DataProcessorManager as RulesDataProcessorManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Base class for rules data matchers.
 */
abstract class RulesDataMatcherBase extends PluginBase implements ContainerFactoryPluginInterface, DataMatcherInterface, DelegatorInterface {

  /**
   * The alias manager service.
   *
   * @var \Drupal\rules\Plugin\RulesDataProcessorManager
   */
  protected $dataProcessorManager;

  /**
   * The DataMatcher delegate.
   *
   * @var \Drupal\rules\DataManager\DataManagerInterface
   */
  protected $dataMatcherDelegate;

  /**
   * Constructs a RulesDataMatcher object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin ID for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\rules\Plugin\RulesDataProcessorManager $data_processor_manager
   *   The alias manager service.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, RulesDataProcessorManager $data_processor_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->dataProcessorManager = $data_processor_manager;

    $this->dataMatcherDelegate = $this->createDelegateInstance($configuration);
  }

  /**
   * Proxy all the calls not defined in an interface.
   *
   * @throws RuntimeException
   *   If called method does not exist.
   *
   * @return mixed
   */
  public function __call($name, $arguments) {
    if (method_exists($this->dataMatcherDelegate, $name)) {
        return call_user_func_array(array($this->dataMatcherDelegate, $name), $arguments);
    }

    throw new \RuntimeException("Method '$name' does not exist.");
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('plugin.manager.rules_data_processor')
    );
  }

  /**
   * Forwards matching to the delegate DataMatcher.
   */
  public function match($subject, $object) {
    return $this->dataMatcherDelegate->match($subject, $object);
  }

}
