<?php

/**
 * @file
 * Contains \Drupal\Tests\rules\Unit\DataMatcher\StringEqualsDataMatcherTest.
 */

namespace Drupal\Tests\rules\Unit\DataMatcher;

use Drupal\rules\DataMatcher\StringEqualsDataMatcher;
use Drupal\Tests\rules\Unit\RulesUnitTestBase;

/**
 * @coversDefaultClass \Drupal\rules\DataMatcher\StringEqualsDataMatcher
 * @group rules
 */
class StringEqualsDataMatcherTest extends RulesUnitTestBase {
  /**
   * @dataProvider matchesProvider
   */
  public function testMatch($expectedMatchResult, $trim, $case_sensitive, $subject, $object) {
    $matcher = StringEqualsDataMatcher::create();

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
