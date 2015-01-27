<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\Levenshtein.
 */

namespace Drupal\rules\Plugin\RulesDataMatcher\String;

use Drupal\rules\DataMatcher\StringLevenshteinDataMatcher;

/**
 * Defines a levenshtein distance matcher.
 *
 * @RulesDataMatcher(
 *   id = "rules_data_matcher_string_levenshtein",
 *   label = @Translation("A Levenshtein distance matcher."),
 *   subject_type = "string",
 *   object_type = "string"
 * )
 */
class Levenshtein extends RulesStringDataMatcherBase {

  /**
   * {@inheritdoc}
   */
  public function createDelegateInstance(array $configuration = array()) {
    return StringLevenshteinDataMatcher::create();
  }

}
