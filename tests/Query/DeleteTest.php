<?php

namespace Query;

use PHPUnit\Framework\TestCase;
use SQLBuilder\SQLBuilder;

class DeleteTest extends TestCase
{
  public function testToString()
  {
    $sqlBuilder = new SqlBuilder();
    $sql = $sqlBuilder->delete()->from('table_name')
      ->where()
      ->equal('id', 14)
      ->orderBy('id')
      ->limit(1);

    $this->assertEquals(
      "DELETE FROM `table_name` "
      . "WHERE `id` = 14 ORDER BY `id` LIMIT 1",
      $sql->__toString()
    );
  }
}
