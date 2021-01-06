<?php


namespace Clause;


use PHPUnit\Framework\TestCase;
use SQLBuilder\Clause\Assignment;
use SQLBuilder\Value;

class AssignmentTest extends TestCase
{
  public function testToString()
  {
    $value = new Value(32);

    $assignment = new Assignment('key', $value);

    $this->assertEquals(
      "`key` = 32",
      $assignment->__toString()
    );
  }
}
