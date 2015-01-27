<?php

/**
 * @file
 * Contains \Drupal\Tests\rules\Unit\Plugin\RulesDataProcessor\LowercaseTest.
 */

namespace Drupal\Tests\rules\Unit\DataProcessor;

use Drupal\Tests\rules\Unit\RulesUnitTestBase;
use Drupal\rules\DataProcessor\LowercaseDataProcessor;

/**
 * @coversDefaultClass \Drupal\rules\RulesDataProcessor\Lowercase
 * @group rules
 */
class LowercaseTest extends RulesUnitTestBase {
  /**
   * @dataProvider stringsProvider
   */
  public function testTrim($expectedMatchResult, $string) {
    $processor = new LowercaseDataProcessor();

    $this->assertSame($expectedMatchResult, $processor->process($string));
  }

  public function stringsProvider() {
    return array(
      array('foo', 'foo'),
      array('foo', 'FOO'),
      array('foo ', 'fOo '),
    );
  }
}
