<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\String\Contains.
 */

namespace Drupal\rules\Plugin\RulesDataMatcher\String;

use Drupal\rules\DataMatcher\StringContainsDataMatcher;

/**
 * Defines a 'string contains' matcher.
 *
 * @RulesDataMatcher(
 *   id = "rules_data_matcher_string_contains",
 *   label = @Translation("A 'string contains' matcher."),
 *   subject_type = "string",
 *   object_type = "string"
 * )
 */
class Contains extends RulesStringDataMatcherBase {

  /**
   * {@inheritdoc}
   */
  public function createDelegateInstance() {
    return StringContainsDataMatcher::create();
  }

}
