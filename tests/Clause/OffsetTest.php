<?php

namespace Clause;

use PHPUnit\Framework\TestCase;
use SQLBuilder\Clause\Offset;

class OffsetTest extends TestCase
{
  public function testToString()
  {
    $offset = new Offset(45);

    $this->assertEquals(
      'OFFSET 45',
      $offset->__toString()
    );
  }
}
