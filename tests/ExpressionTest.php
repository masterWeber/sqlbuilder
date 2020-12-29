<?php


use PHPUnit\Framework\TestCase;

class ExpressionTest extends TestCase
{
  public function testExpression(): void
  {
    $expString = 'col1 + 1';

    $exp = new Expression($expString);

    $this->assertEquals(
      $expString,
      $exp->__toString()
    );
  }
}
