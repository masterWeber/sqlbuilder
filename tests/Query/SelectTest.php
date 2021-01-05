<?php

namespace Query;

use PHPUnit\Framework\TestCase;

class SelectTest extends TestCase
{

  public function testToString()
  {
    $select = new Select();

    $this->assertEquals(
      'SELECT *',
      $select->__toString()
    );

    $select = new Select([
      'table_name' => 'alias',
      'table_1_name' => 't1_alias',
    ]);

    $this->assertEquals(
      'SELECT table_name AS alias, table_1_name AS t1_alias',
      $select->__toString()
    );

    $select = new Select(['table_name' => 'alias']);
    $select->distinct();

    $this->assertEquals(
      'SELECT DISTINCT table_name AS alias',
      $select->__toString()
    );
  }
}
