<?php

/**
 * @file
 * Contains \Drupal\Tests\rules\Unit\DataMatcher\RegexpDataMatcherTest.
 */

namespace Drupal\Tests\rules\Unit\DataMatcher;

use Drupal\rules\DataMatcher\StringRegexpDataMatcher;
use Drupal\Tests\rules\Unit\RulesUnitTestBase;

/**
 * @coversDefaultClass \Drupal\rules\DataMatcher\StringRegexpDataMatcher
 * @group rules
 */
class StringRegexpDataMatcherTest extends RulesUnitTestBase {

  /**
   * The condition to be tested.
   *
   * @var \Drupal\rules\DataMatcher\DataMatcherInterface
   */
  protected $matcher;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
    $this->matcher = StringRegexpDataMatcher::create();
  }

  /**
   * @dataProvider matchesProvider
   */
  public function testMatch($expectedMatchResult, $subject, $object) {
    $this->assertSame($expectedMatchResult, $this->matcher->match($subject, $object));
  }

  public function matchesProvider() {
    return array(
      array(TRUE, 'foo', '/^foo$/'),
      array(TRUE, 'FOO', '/foo/i'),
      array(TRUE, 'BAR FOO BAZ', '/foo/i'),

      array(FALSE, 'foobar', '/^bar/'),
      array(FALSE, 'BARBAZ', '/bar$/i'),
      array(FALSE, 'foobar', '/^bar$/i'),
    );
  }
}
