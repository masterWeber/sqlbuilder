<?php

namespace Clause;

use SQLBuilder\Clause\GroupBy;
use PHPUnit\Framework\TestCase;
use SQLBuilder\Clause\OrderBy;

class GroupByTest extends TestCase
{
  public function testToString()
  {
    $groupBy = new GroupBy('year');

    $this->assertEquals(
      'GROUP BY `year`',
      $groupBy->__toString()
    );

    $groupBy = new GroupBy('year',GroupBy::WITH_ROLLUP);

    $this->assertEquals(
      'GROUP BY `year` WITH ROLLUP',
      $groupBy->__toString()
    );

    $groupBy = new GroupBy([
      'day',
      'year' => GroupBy::WITH_ROLLUP,
    ]);

    $this->assertEquals(
      'GROUP BY `day`, `year` WITH ROLLUP',
      $groupBy->__toString()
    );
  }
}
