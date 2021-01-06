<?php


namespace Clause;


use PHPUnit\Framework\TestCase;
use SQLBuilder\Clause\Condition;

class ConditionTest extends TestCase
{
  public function testEquals(): void
  {
    $condition = new Condition();
    $condition->equal('a', 25);

    $this->assertEquals(
      "`a` = 25",
      $condition->__toString()
    );

    $condition = new Condition();
    $condition->equal('a', 'str_val');

    $this->assertEquals(
      "`a` = 'str_val'",
      $condition->__toString()
    );
  }

  public function testNotEquals(): void
  {
    $condition = new Condition();
    $condition->notEqual('a', 25);

    $this->assertEquals(
      "`a` <> 25",
      $condition->__toString()
    );

    $condition = new Condition();
    $condition->notEqual('a', 'str_val');

    $this->assertEquals(
      "`a` <> 'str_val'",
      $condition->__toString()
    );
  }

  public function testGreaterThan(): void
  {
    $condition = new Condition();
    $condition->greaterThan('a', 25);

    $this->assertEquals(
      "`a` > 25",
      $condition->__toString()
    );
  }

  public function testGreaterThanOrEqual(): void
  {
    $condition = new Condition();
    $condition->greaterThanOrEqual('a', 25);

    $this->assertEquals(
      "`a` >= 25",
      $condition->__toString()
    );
  }

  public function testLessThan(): void
  {
    $condition = new Condition();
    $condition->lessThan('a', 25);

    $this->assertEquals(
      "`a` < 25",
      $condition->__toString()
    );
  }

  public function testLessThanOrEqual(): void
  {
    $condition = new Condition();
    $condition->lessThanOrEqual('a', 25);

    $this->assertEquals(
      "`a` <= 25",
      $condition->__toString()
    );
  }

  public function testIn(): void
  {
    $condition = new Condition();
    $condition->in('a', [2, 45, '23']);

    $this->assertEquals(
      "`a` IN (2, 45, '23')",
      $condition->__toString()
    );
  }

  public function testNotIn(): void
  {
    $condition = new Condition();
    $condition->notIn('a', [2, 45, '23']);

    $this->assertEquals(
      "`a` NOT IN (2, 45, '23')",
      $condition->__toString()
    );
  }

  public function testLike(): void
  {
    $condition = new Condition();
    $condition->like('a', '%str_');

    $this->assertEquals(
      "`a` LIKE '%str_'",
      $condition->__toString()
    );
  }

  public function testNotLike(): void
  {
    $condition = new Condition();
    $condition->notLike('a', '%str_');

    $this->assertEquals(
      "`a` NOT LIKE '%str_'",
      $condition->__toString()
    );
  }

  public function testIs(): void
  {
    $condition = new Condition();
    $condition->is('a', true);

    $this->assertEquals(
      "`a` IS true",
      $condition->__toString()
    );
  }

  public function testIsNot(): void
  {
    $condition = new Condition();
    $condition->isNot('a', true);

    $this->assertEquals(
      "`a` IS NOT true",
      $condition->__toString()
    );
  }

  public function testIsNull(): void
  {
    $condition = new Condition();
    $condition->isNull('a');

    $this->assertEquals(
      "`a` IS NULL",
      $condition->__toString()
    );
  }

  public function testIsNotNull(): void
  {
    $condition = new Condition();
    $condition->isNotNull('a');

    $this->assertEquals(
      "`a` IS NOT NULL",
      $condition->__toString()
    );
  }

  public function testBetween(): void
  {
    $condition = new Condition();
    $condition->between('a', 5, 7);

    $this->assertEquals(
      "`a` BETWEEN 5 AND 7",
      $condition->__toString()
    );

    $condition = new Condition();
    $condition->between('a', '1990-01-01', '2000-01-01');

    $this->assertEquals(
      "`a` BETWEEN '1990-01-01' AND '2000-01-01'",
      $condition->__toString()
    );
  }

  public function testNotBetween(): void
  {
    $condition = new Condition();
    $condition->notBetween('a', 5, 7);

    $this->assertEquals(
      "`a` NOT BETWEEN 5 AND 7",
      $condition->__toString()
    );

    $condition = new Condition();
    $condition->notBetween('a', '1990-01-01', '2000-01-01');

    $this->assertEquals(
      "`a` NOT BETWEEN '1990-01-01' AND '2000-01-01'",
      $condition->__toString()
    );
  }

  public function testRegexp(): void
  {
    $condition = new Condition();
    $condition->regexp('a', '^\S');

    $this->assertEquals(
      "`a` REGEXP '^\\\S'",
      $condition->__toString()
    );
  }

  public function testNotRegexp(): void
  {
    $condition = new Condition();
    $condition->notRegexp('a', '^\S');

    $this->assertEquals(
      "`a` NOT REGEXP '^\\\S'",
      $condition->__toString()
    );
  }

  public function testLogicalOperators(): void
  {
    $condition = new Condition();
    $condition
      ->equal('a', 25)
      ->and()
      ->equal('a', 25)
      ->or()
      ->equal('a', 25)
      ->not()
      ->equal('a', 25)
      ->xor()
      ->equal('a', 25);

    $this->assertEquals(
      "`a` = 25 AND `a` = 25 OR `a` = 25 NOT `a` = 25 XOR `a` = 25",
      $condition->__toString()
    );
  }

  public function testGroup(): void
  {
    $condition = new Condition();
    $condition->group(function ($condition) {
      $condition->equal('id', 1);
    });

    $this->assertEquals(
      "(`id` = 1)",
      $condition->__toString()
    );
  }
}
