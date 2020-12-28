<?php


use PHPUnit\Framework\TestCase;

class AssignmentListTest extends TestCase
{
  public function testGet()
  {
    $assignmentList = new AssignmentList();

    $assignment = new Assignment('key', new Value('value'));

    $assignmentList->add($assignment);

    $this->assertEquals(
      $assignment,
      $assignmentList->get('key')
    );

    $this->expectException(
      Exception::class
    );

    $this->assertEquals(
      $assignment,
      $assignmentList->get('undefined_key')
    );
  }
}
