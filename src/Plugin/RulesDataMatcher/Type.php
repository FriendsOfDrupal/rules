<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\Object\Type.
 */

namespace Drupal\rules\Plugin\RulesDataMatcher;

use Drupal\rules\DataMatcher\TypeDataMatcher;

/**
 * Defines a type matcher.
 *
 * @RulesDataMatcher(
 *   id = "rules_data_matcher_type",
 *   label = @Translation("A type matcher."),
 *   subject_type = "string",
 *   object_type = "string"
 * )
 */
class Type extends RulesDataMatcherBase {

  /**
   * {@inheritdoc}
   */
  public function createDelegateInstance(array $configuration = array()) {
    return TypeDataMatcher::create();
  }

}
