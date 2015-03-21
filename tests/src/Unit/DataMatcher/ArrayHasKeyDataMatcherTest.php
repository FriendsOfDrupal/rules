<?php

/**
 * @file
 * Contains \Drupal\Tests\rules\Unit\DataMatcher\ArrayContainsDataMatcherTest.
 */

namespace Drupal\Tests\rules\Unit\DataMatcher;

use Drupal\rules\DataMatcher\ArrayHasKeyDataMatcher;
use Drupal\Tests\rules\Unit\RulesUnitTestBase;

/**
 * @coversDefaultClass \Drupal\rules\DataMatcher\ArrayHasKeyDataMatcher
 * @group rules
 */
class ArrayHasKeyDataMatcherTest extends RulesUnitTestBase {
  /**
   * @dataProvider arrayValuesProvider
   */
  public function testMatch($expectedMatchResult, $subject, $object) {
    $matcher = ArrayHasKeyDataMatcher::create();

    $this->assertSame($expectedMatchResult, $matcher->match($subject, $object));
  }

  public function arrayValuesProvider() {
    return array(
      array(TRUE, [1],        0),
      array(TRUE, [1, 2],     1),
      array(TRUE, ['a' => 1], 'a'),

      array(FALSE, [2],        1),
      array(FALSE, [2, 3],     2),
      array(FALSE, [1 => 'a'], 'a'),
    );
  }
}