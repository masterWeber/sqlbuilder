<?php

namespace Clause;

use PHPUnit\Framework\TestCase;
use SQLBuilder\Clause\From;

class FromTest extends TestCase
{
  public function testToString()
  {
    $from = new From('table_name');

    $this->assertEquals(
      'FROM `table_name`',
      $from->__toString()
    );

    $from = new From(['table_name_1' => 'alias_1', 'table_name_2' => 'alias_2']);

    $this->assertEquals(
      'FROM `table_name_1` AS `alias_1`, `table_name_2` AS `alias_2`',
      $from->__toString()
    );
  }
}
