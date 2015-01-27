<?php

/**
 * @file
 * Contains \Drupal\rules\Plugin\RulesDataMatcher\String\RulesStringDataMatcherTrait.
 */

namespace Drupal\rules\Plugin\RulesDataMatcher\String;

use Drupal\rules\Plugin\RulesDataMatcher\RulesDataMatcherBase;
use Drupal\rules\DataMatcher\DataMatcherInterface;
use Drupal\rules\DataMatcher\StringDataMatcherInterface;
use InvalidArgumentException;

abstract class RulesStringDataMatcherBase extends RulesDataMatcherBase implements StringDataMatcherInterface {

  /**
   * Set the fields that should be matched in a case sensitive fashion.
   *
   * @param int $fields
   */
  public function setCaseSensitive($fields = DataMatcherInterface::FIELD_BOTH)
  {
    if (!is_int($fields)) {
      throw new InvalidArgumentException('Argument "$fields" should be of type int.');
    }

    $this->dataMatcherDelegate->setCaseSensitive($fields);
  }

  /**
   * Unset the fields that should be matched in a case sensitive fashion.
   *
   * @param int $fields
   */
  public function setCaseInsensitive($fields = DataMatcherInterface::FIELD_BOTH)
  {
    if (!is_int($fields)) {
      throw new InvalidArgumentException('Argument "$fields" should be of type int.');
    }

    $this->dataMatcherDelegate->setCaseInsensitive($fields);
  }

  /**
   * Set the fields that should be trimmed before matching.
   *
   * @param int $fields
   */
  public function setTrimmed($fields = DataMatcherInterface::FIELD_BOTH)
  {
    if (!is_int($fields)) {
      throw new InvalidArgumentException('Argument "$fields" should be of type int.');
    }

    $this->dataMatcherDelegate->setTrimmed($fields);
  }

  /**
   * Unset the fields that should be trimmed before matching.
   *
   * @param int $fields
   */
  public function unsetTrimmed($fields = DataMatcherInterface::FIELD_BOTH)
  {
    if (!is_int($fields)) {
      throw new InvalidArgumentException('Argument "$fields" should be of type int.');
    }

    $this->dataMatcherDelegate->unsetTrimmed($fields);
  }

}
