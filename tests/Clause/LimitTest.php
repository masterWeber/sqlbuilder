<?php

namespace Clause;

use PHPUnit\Framework\TestCase;
use SQLBuilder\Clause\Limit;

class LimitTest extends TestCase
{
  public function testToString()
  {
    $limit = new Limit(5);

    $this->assertEquals(
      'LIMIT 5',
      $limit->__toString()
    );
  }
}
