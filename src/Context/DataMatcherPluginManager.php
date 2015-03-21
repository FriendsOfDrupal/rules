<?php

/**
 * @file
 * Contains \Drupal\rules\Context\RulesExpressionPluginManager.
 */

namespace Drupal\rules\Context;

use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * Plugin manager for all Rules' DataMatchers.
 *
 * @see \Drupal\rules\DataMatcher\DataMatcherInterface
 */
class DataMatcherPluginManager extends DefaultPluginManager {

  /**
   * {@inheritdoc}
   */
  public function __construct(\Traversable $namespaces, ModuleHandlerInterface $module_handler, $plugin_definition_annotation_name = 'Drupal\rules\Annotation\RulesDataMatcher') {
    $this->alterInfo('rules_data_matcher');
    parent::__construct('Plugin/RulesDataMatcher', $namespaces, $module_handler, 'Drupal\rules\DataMatcher\DataMatcherInterface', $plugin_definition_annotation_name);
  }

}
