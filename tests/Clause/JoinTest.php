<?php

namespace Clause;

use PHPUnit\Framework\TestCase;
use SQLBuilder\Clause\Join;

class JoinTest extends TestCase
{
  public function testToString()
  {
    $join = new Join('table_name');
    $sql = $join->as('alias')
      ->on()
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

    $join = new Join(['table_name' => 't2']);
    $sql = $join->inner()
      ->on('`t1`.`col` = `t2`.`col`');

    $this->assertEquals(
      "INNER JOIN `table_name` AS `t2` ON (`t1`.`col` = `t2`.`col`)",
      $sql->__toString()
    );
  }
}
