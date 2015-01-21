<?php

/**
 * @file
 * Contains \Drupal\rules\DataMatcher\DataMatcherInterface.
 */

namespace Drupal\rules\DataMatcher;

use Drupal\rules\DataProcessor\LowercaseDataProcessor;
use Drupal\rules\DataProcessor\TrimDataProcessor;

abstract class StringDataMatcher extends DataMatcher implements StringDataMatcherInterface {

  const MATCHER_ID_CASE_SENSITIVE = 'matcher_string_case_sensitive';
  const MATCHER_ID_TRIM = 'matcher_string_trim';

  /**
   * Set the fields that should be matched in a case sensitive fashion.
   *
   * @param int $fields
   */
  public function setCaseSensitive($fields = DataMatcherInterface::FIELD_BOTH)
  {
    $this->addFieldsProcessor(self::MATCHER_ID_CASE_SENSITIVE, $fields, new LowercaseDataProcessor());
  }

  /**
   * Unset the fields that should be matched in a case sensitive fashion.
   *
   * @param int $fields
   */
  public function unsetCaseSensitive($fields = DataMatcherInterface::FIELD_BOTH)
  {
    $this->removeFieldsProcessor(self::MATCHER_ID_CASE_SENSITIVE, $fields);
  }

  /**
   * Set the fields that should be trimmed before matching.
   *
   * @param int $fields
   */
  public function setTrimmed($fields = DataMatcherInterface::FIELD_BOTH)
  {
    $this->addFieldsProcessor(self::MATCHER_ID_TRIM, $fields, new TrimDataProcessor());
  }

  /**
   * Unset the fields that should be trimmed before matching.
   *
   * @param int $fields
   */
  public function unsetTrimmed($fields = DataMatcherInterface::FIELD_BOTH)
  {
    $this->removeFieldsProcessor(self::MATCHER_ID_TRIM, $fields);
  }

}
