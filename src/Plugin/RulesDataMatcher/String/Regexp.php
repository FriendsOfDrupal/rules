<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\Regexp.
 */

namespace Drupal\rules\Plugin\RulesDataMatcher\String;

use Drupal\rules\DataMatcher\StringRegexpDataMatcher;

/**
 * Defines a string regular expression matcher.
 *
 * @RulesDataMatcher(
 *   id = "rules_data_matcher_string_regexp",
 *   label = @Translation("A regular expression matcher."),
 *   subject_type = "string",
 *   object_type = "string"
 * )
 */
class Regexp extends RulesStringDataMatcherBase {

  /**
   * {@inheritdoc}
   */
  public function createDelegateInstance(array $configuration = array()) {
    return StringRegexpDataMatcher::create();
  }

}
