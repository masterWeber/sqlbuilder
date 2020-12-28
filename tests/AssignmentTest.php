<?php


use PHPUnit\Framework\TestCase;

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
