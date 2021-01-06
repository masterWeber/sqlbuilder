<?php


namespace Clause;


use PHPUnit\Framework\TestCase;
use SQLBuilder\Clause\Assignment;
use SQLBuilder\Clause\AssignmentList;
use SQLBuilder\Value;

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

    $this->assertEquals(
      null,
      $assignmentList->get('undefined_key')
    );
  }
}
