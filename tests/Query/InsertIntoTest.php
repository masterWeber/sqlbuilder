<?php

namespace Query;

use SQLBuilder\DataType\Default_;
use PHPUnit\Framework\TestCase;
use SQLBuilder\SQLBuilder;

class InsertIntoTest extends TestCase
{
  public function testToString()
  {
    $sqlBuilder = new SqlBuilder();
    $insertInto = $sqlBuilder->insertInto('table-name');

    $insertInto->columns([
      'column_name_1',
      'column_name_2',
      'column_name_3',
      'column_name_4',
    ])->values([
      'value_1',
      2,
      null,
      false,
    ]);

    $this->assertEquals(
      "INSERT INTO `table-name` "
      . "(`column_name_1`, `column_name_2`, `column_name_3`, `column_name_4`) "
      . "VALUES ('value_1', 2, NULL, false)",
      $insertInto->__toString()
    );

    $insertInto->columns([
      'column_name_1',
      'column_name_2',
    ])->values([
      'value_1',
      new Default_(),
    ]);

    $this->assertEquals(
      "INSERT INTO `table-name` "
      . "(`column_name_1`, `column_name_2`) VALUES ('value_1', DEFAULT)",
      $insertInto->__toString()
    );

    $insertInto->columns([
      'column_name_1',
      'column_name_2',
    ])->default();

    $this->assertEquals(
      "INSERT INTO `table-name` "
      . "(`column_name_1`, `column_name_2`) DEFAULT VALUES",
      $insertInto->__toString()
    );

    $insertInto->columns([])->default()->values([1, 2]);

    $this->assertEquals(
      "INSERT INTO `table-name` DEFAULT VALUES",
      $insertInto->__toString()
    );
  }
}
