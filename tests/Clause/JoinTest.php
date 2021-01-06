<?php

namespace Clause;

use PHPUnit\Framework\TestCase;

class JoinTest extends TestCase
{
  public function testToString()
  {
    $join = new Join(['table_name' => 'alias']);
    $sql = $join->on()
      ->equal('t1.col', 't2.col');

    $this->assertEquals(
      "JOIN `table_name` AS `alias` ON (`t1`.`col` = 't2.col')",
      $sql->__toString()
    );

    $join = new Join(['table_name' => 'alias']);
    $sql = $join->left()->on()
      ->equal('t1.col', 't2.col');

    $this->assertEquals(
      "LEFT JOIN `table_name` AS `alias` ON (`t1`.`col` = 't2.col')",
      $sql->__toString()
    );
  }
}
