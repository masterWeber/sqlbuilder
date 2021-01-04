<?php


use Block\WhereConditions;
use Expression\Raw;
use PHPUnit\Framework\TestCase;

class ConditionTest extends TestCase
{
  public function testEquals(): void
  {
    $condition = new WhereConditions();
    $condition->equal('a', 25);

    $this->assertEquals(
      "WHERE a = 25",
      $condition->__toString()
    );

    $condition = new WhereConditions();
    $condition->equal('a', 'str_val');

    $this->assertEquals(
      "WHERE a = 'str_val'",
      $condition->__toString()
    );
  }

  public function testNotEquals(): void
  {
    $condition = new WhereConditions();
    $condition->notEqual('a', 25);

    $this->assertEquals(
      "WHERE a <> 25",
      $condition->__toString()
    );

    $condition = new WhereConditions();
    $condition->notEqual('a', 'str_val');

    $this->assertEquals(
      "WHERE a <> 'str_val'",
      $condition->__toString()
    );
  }

  public function testGreaterThan(): void
  {
    $condition = new WhereConditions();
    $condition->greaterThan('a', 25);

    $this->assertEquals(
      "WHERE a > 25",
      $condition->__toString()
    );
  }

  public function testGreaterThanOrEqual(): void
  {
    $condition = new WhereConditions();
    $condition->greaterThanOrEqual('a', 25);

    $this->assertEquals(
      "WHERE a >= 25",
      $condition->__toString()
    );
  }

  public function testLessThan(): void
  {
    $condition = new WhereConditions();
    $condition->lessThan('a', 25);

    $this->assertEquals(
      "WHERE a < 25",
      $condition->__toString()
    );
  }

  public function testLessThanOrEqual(): void
  {
    $condition = new WhereConditions();
    $condition->lessThanOrEqual('a', 25);

    $this->assertEquals(
      "WHERE a <= 25",
      $condition->__toString()
    );
  }

  public function testIn(): void
  {
    $condition = new WhereConditions();
    $condition->in('a', [2,45,'23']);

    $this->assertEquals(
      "WHERE a IN (2, 45, '23')",
      $condition->__toString()
    );
  }

  public function testNotIn(): void
  {
    $condition = new WhereConditions();
    $condition->notIn('a', [2,45,'23']);

    $this->assertEquals(
      "WHERE a NOT IN (2, 45, '23')",
      $condition->__toString()
    );
  }

  public function testLike(): void
  {
    $condition = new WhereConditions();
    $condition->like('a', '%str_');

    $this->assertEquals(
      "WHERE a LIKE '%str_'",
      $condition->__toString()
    );
  }

  public function testNotLike(): void
  {
    $condition = new WhereConditions();
    $condition->notLike('a', '%str_');

    $this->assertEquals(
      "WHERE a NOT LIKE '%str_'",
      $condition->__toString()
    );
  }

  public function testIs(): void
  {
    $condition = new WhereConditions();
    $condition->is('a', true);

    $this->assertEquals(
      "WHERE a IS true",
      $condition->__toString()
    );
  }

  public function testIsNot(): void
  {
    $condition = new WhereConditions();
    $condition->isNot('a', true);

    $this->assertEquals(
      "WHERE a IS NOT true",
      $condition->__toString()
    );
  }

  public function testIsNull(): void
  {
    $condition = new WhereConditions();
    $condition->isNull('a');

    $this->assertEquals(
      "WHERE a IS NULL",
      $condition->__toString()
    );
  }

  public function testIsNotNull(): void
  {
    $condition = new WhereConditions();
    $condition->isNotNull('a');

    $this->assertEquals(
      "WHERE a IS NOT NULL",
      $condition->__toString()
    );
  }

  public function testBetween(): void
  {
    $condition = new WhereConditions();
    $condition->between('a', 5, 7);

    $this->assertEquals(
      "WHERE a BETWEEN 5 AND 7",
      $condition->__toString()
    );

    $condition = new WhereConditions();
    $condition->between('a', '1990-01-01', '2000-01-01');

    $this->assertEquals(
      "WHERE a BETWEEN '1990-01-01' AND '2000-01-01'",
      $condition->__toString()
    );
  }

  public function testNotBetween(): void
  {
    $condition = new WhereConditions();
    $condition->notBetween('a', 5, 7);

    $this->assertEquals(
      "WHERE a NOT BETWEEN 5 AND 7",
      $condition->__toString()
    );

    $condition = new WhereConditions();
    $condition->notBetween('a', '1990-01-01', '2000-01-01');

    $this->assertEquals(
      "WHERE a NOT BETWEEN '1990-01-01' AND '2000-01-01'",
      $condition->__toString()
    );
  }

  public function testRegexp(): void
  {
    $condition = new WhereConditions();
    $condition->regexp('a', '^\S');

    $this->assertEquals(
      "WHERE a REGEXP '^\\\S'",
      $condition->__toString()
    );
  }

  public function testNotRegexp(): void
  {
    $condition = new WhereConditions();
    $condition->notRegexp('a', '^\S');

    $this->assertEquals(
      "WHERE a NOT REGEXP '^\\\S'",
      $condition->__toString()
    );
  }

  public function testLogicalOperators(): void
  {
    $condition = new WhereConditions();
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
      "WHERE a = 25 AND a = 25 OR a = 25 NOT a = 25 XOR a = 25",
      $condition->__toString()
    );
  }

  public function testGroup(): void
  {
    $condition = new WhereConditions();
    $condition->group(function ($condition) {
      $condition->equal('id', 1);
    });

    $this->assertEquals(
      "WHERE (id = 1)",
      $condition->__toString()
    );
  }
}
