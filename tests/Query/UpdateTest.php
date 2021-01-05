<?php

namespace Query;

use Clause\OrderBy;
use PHPUnit\Framework\TestCase;
use SqlBuilder;

class UpdateTest extends TestCase
{
  public function testToString()
  {
    $sqlBuilder = new SqlBuilder();

    $update = $sqlBuilder->update('table_reference');
    $sql = $update->set([
      'count' => 5,
      'date' => '2000-01-01'
    ])->where(['id' => 5])
      ->orderBy('id', OrderBy::DESC)
      ->limit(1);

    $this->assertEquals(
      "UPDATE table_reference "
      . "SET count = 5, date = '2000-01-01'"
      . " WHERE id = 5 ORDER BY id DESC LIMIT 1",
      $sql->__toString()
    );
  }
}
