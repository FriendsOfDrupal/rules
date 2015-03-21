<?php

/**
 * @file
 * Contains \Drupal\Tests\rules\Unit\DataMatcher\ArrayIntersectDataMatcherTest.
 */

namespace Drupal\Tests\rules\Unit\DataMatcher;

use Drupal\rules\DataMatcher\ArrayIntersectDataMatcher;
use Drupal\Tests\rules\Unit\RulesUnitTestBase;

/**
 * @coversDefaultClass \Drupal\rules\DataMatcher\ArrayIntersectDataMatcher
 * @group rules
 */
class ArrayIntersectDataMatcherTest extends RulesUnitTestBase {
  /**
   * @dataProvider arrayMatchingValuesProvider
   */
  public function testMatch($subject, $object) {
    $matcher = ArrayIntersectDataMatcher::create();

    // The intersection between subject[0] and subject[1] matches object.
    $this->assertTrue($matcher->match($subject, $object));
  }

  /**
   * @dataProvider arrayNotMatchingValuesProvider
   */
  public function testDontMatch($subject, $object) {
    $matcher = ArrayIntersectDataMatcher::create();

    // The intersection between subject[0] and subject[1] does not match object.
    $this->assertFalse($matcher->match($subject, $object));
  }

  public function arrayMatchingValuesProvider() {
    return [
      [[[1], [1]],           [1]],
      [[[1, 2], [1]],        [1]],
      [[['a' => 1, 2], [1]], ['a' => 1]],
    ];
  }

  public function arrayNotMatchingValuesProvider() {
    return [
      [[[1], [2]],             [2]],
      [[[2, 3], [1]],          [1]],
      [[[1 => 'a', 'b'], [2]], [2]],
    ];
  }
}
