<?php

namespace Clause;

use SQLBuilder\Clause\Having;
use PHPUnit\Framework\TestCase;

class HavingTest extends TestCase
{

  public function testToString()
  {
    $having = new Having();
    $having->equal('col',5);

    $this->assertEquals(
      'HAVING `col` = 5',
      $having->__toString()
    );
  }
}
