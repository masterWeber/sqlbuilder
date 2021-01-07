<?php

namespace DataType;

use SQLBuilder\DataType\Unknown;
use PHPUnit\Framework\TestCase;

class UnknownTest extends TestCase
{
  public function testToString()
  {
    $unknown = new Unknown();

    $this->assertEquals(
      'UNKNOWN',
      $unknown->__toString()
    );
  }
}
