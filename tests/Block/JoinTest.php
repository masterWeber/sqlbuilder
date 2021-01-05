<?php

namespace Block;

use PHPUnit\Framework\TestCase;

class JoinTest extends TestCase
{
  public function testToString()
  {
    $join = new Join(['table_name' => 'alias']);
    $sql = $join->on()->equal('t1.col', 't2.col');

    $this->assertEquals(
      '',
      $sql->__toString()
    );
  }
}
