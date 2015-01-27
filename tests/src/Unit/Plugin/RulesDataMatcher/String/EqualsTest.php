<?php

/**
 * @file
 * Contains \Drupal\Tests\rules\Unit\Plugin\RulesDataMatcher\StringEqualsTest.
 */

namespace Drupal\Tests\rules\Unit\Plugin\RulesDataMatcher\String;

use Drupal\Tests\rules\Unit\Plugin\RulesDataMatcher\RulesDataMatcherTestBase;
use Drupal\rules\Plugin\RulesDataMatcher\String\Equals;

/**
 * @coversDefaultClass \Drupal\rules\Plugin\RulesDataMatcher\String\Equals
 * @group rules
 */
class StringEqualsTest extends RulesDataMatcherTestBase {
  /**
   * @dataProvider matchesProvider
   */
  public function testMatch($expectedMatchResult, $trim, $case_sensitive, $subject, $object) {
    $matcher = new Equals([], 'foo_bar', [], $this->dataProcessorManager);

    if ($case_sensitive) {
      $matcher->setCaseSensitive();
    } else {
      $matcher->setCaseInsensitive();
    }

    if ($trim) {
      $matcher->setTrimmed();
    } else {
      $matcher->unsetTrimmed();
    }

    $this->assertSame($expectedMatchResult, $matcher->match($subject, $object));
  }

  public function matchesProvider() {
    return array(
      array(TRUE, TRUE, TRUE, 'foo ', ' foo'),
      array(TRUE, FALSE, TRUE, 'foo', 'foo'),
      array(TRUE, TRUE, FALSE, 'foo ', ' FOO'),
      array(TRUE, FALSE, FALSE, 'foo', 'foo'),

      array(FALSE, TRUE, TRUE, 'foo ', ' fo'),
      array(FALSE, FALSE, TRUE, 'foo', 'FOO'),
      array(FALSE, TRUE, FALSE, 'foo ', ' FO'),
      array(FALSE, FALSE, FALSE, 'foo', 'fo'),
    );
  }
}
