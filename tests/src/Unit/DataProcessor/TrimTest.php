<?php

/**
 * @file
 * Contains \Drupal\Tests\rules\Unit\Plugin\RulesDataProcessor\TrimTest.
 */

namespace Drupal\Tests\rules\Unit\DataProcessor;

use Drupal\Tests\rules\Unit\RulesUnitTestBase;
use Drupal\rules\DataProcessor\TrimDataProcessor;

/**
 * @coversDefaultClass \Drupal\rules\DataProcessor\TrimDataProcessor
 * @group rules
 */
class TrimTest extends RulesUnitTestBase {
  /**
   * @dataProvider stringsProvider
   */
  public function testTrim($expectedMatchResult, $string) {
    $processor = new TrimDataProcessor();

    $this->assertSame($expectedMatchResult, $processor->process($string));
  }

  public function stringsProvider() {
    return array(
      array('foo', 'foo'),
      array('foo', ' foo'),
      array('foo', 'foo '),
      array('foo', ' foo '),
      array('foo bar', ' foo bar '),
    );
  }
}
