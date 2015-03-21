<?php

/**
 * @file
 * Contains \Drupal\Tests\rules\Unit\DataMatcher\ArrayCountDataMatcherTest.
 */

namespace Drupal\Tests\rules\Unit\DataMatcher;

use Drupal\rules\DataMatcher\ArrayCountDataMatcher;
use Drupal\Tests\rules\Unit\RulesUnitTestBase;

/**
 * @coversDefaultClass \Drupal\rules\DataMatcher\ArrayCountDataMatcher
 * @group rules
 */
class ArrayCountDataMatcherTest extends RulesUnitTestBase {
  /**
   * @dataProvider arrayValuesProvider
   */
  public function testMatch($expectedMatchResult, $subject, $object) {
    $matcher = ArrayCountDataMatcher::create();

    $this->assertSame($expectedMatchResult, $matcher->match($subject, $object));
  }

  public function arrayValuesProvider() {
    return array(
      array(TRUE, [1],        1),
      array(TRUE, [1, 2],     2),
      array(TRUE, ['a' => 1], 1),

      array(FALSE, [2],        2),
      array(FALSE, [2, 3],     1),
      array(FALSE, [1 => 'a'], 2),
    );
  }
}
