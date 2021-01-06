<?php

namespace Clause;

use PHPUnit\Framework\TestCase;

class OrderByTest extends TestCase
{
  public function testToString()
  {
    $orderBy = new OrderBy('col_name', OrderBy::DESC);

    $this->assertEquals(
      'ORDER BY `col_name` DESC',
      $orderBy->__toString()
    );

    $orderBy = new OrderBy([
      'col_name' => OrderBy::DESC,
      'col_name_1' => OrderBy::ASC,
    ]);

    $this->assertEquals(
      'ORDER BY `col_name` DESC, `col_name_1` ASC',
      $orderBy->__toString()
    );
  }
}
