<?php

/**
 * @file
 * Contains \Drupal\Tests\rules\Unit\DataMatcher\LevenshteinDataMatcherTest.
 */

namespace Drupal\Tests\rules\Unit\DataMatcher;

use Drupal\rules\DataMatcher\StringLevenshteinDataMatcher;
use Drupal\Tests\rules\Unit\RulesUnitTestBase;

/**
 * @coversDefaultClass \Drupal\rules\DataMatcher\StringLevenshteinDataMatcher
 * @group rules
 */
class StringLevenshteinDataMatcherTest extends RulesUnitTestBase {

  /**
   * @dataProvider caseSensitiveMatchesProvider
   */
  public function testCaseSensitiveMatch($expectedMatchResult, $threshold, $subject, $object) {
    $matcher = StringLevenshteinDataMatcher::create();

    $matcher->setThreshold($threshold);
    $matcher->setCaseSensitive();

    $this->assertSame($expectedMatchResult, $matcher->match($subject, $object));
  }

  /**
   * @dataProvider caseInsensitiveMatchesProvider
   */
  public function testCaseInsensitiveMatch($expectedMatchResult, $threshold, $subject, $object) {
    $matcher = StringLevenshteinDataMatcher::create();

    $matcher->setThreshold($threshold);
    $matcher->setCaseInsensitive();

    $this->assertSame($expectedMatchResult, $matcher->match($subject, $object));
  }

  public function caseSensitiveMatchesProvider() {
    return array(
      array(TRUE, 1, 'foo', 'foo'),
      array(TRUE, 1, 'bar', 'baz'),
      array(FALSE, 1, 'foo', 'bar'),

      array(TRUE, 3, 'foo', 'foo'),
      array(TRUE, 3, 'bar', 'baz'),
      array(TRUE, 3, 'foo', 'bar'),
    );
  }

  public function caseInsensitiveMatchesProvider() {
    return array(
      array(TRUE, 1, 'foo', 'FOO'),
      array(TRUE, 1, 'bar', 'BAZ'),
      array(FALSE, 1, 'foo', 'BAR'),

      array(TRUE, 3, 'foo', 'FOO'),
      array(TRUE, 3, 'bar', 'BAZ'),
      array(TRUE, 3, 'foo', 'BAR'),
    );
  }
}
