<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\String\Equals.
 */

namespace Drupal\rules\Plugin\RulesDataMatcher\String;

use Drupal\rules\DataMatcher\StringEqualsDataMatcher;

/**
 * Defines a strings equality matcher.
 *
 * @RulesDataMatcher(
 *   id = "rules_data_matcher_string_equals",
 *   label = @Translation("A string equality matcher."),
 *   subject_type = "string",
 *   object_type = "string"
 * )
 */
class Equals extends RulesStringDataMatcherBase {

  /**
   * {@inheritdoc}
   */
  public function createDelegateInstance(array $configuration = array()) {
    return StringEqualsDataMatcher::create();
  }

}
