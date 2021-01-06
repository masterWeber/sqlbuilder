<?php

namespace Expression;

use PHPUnit\Framework\TestCase;
use SQLBuilder\Expression\Column;

class ColumnTest extends TestCase
{

  public function testToString()
  {
    $column = new Column('t.col');

    $this->assertEquals(
      '`t`.`col`',
      $column->__toString()
    );

    $column = new Column('col', 't');

    $this->assertEquals(
      '`t`.`col`',
      $column->__toString()
    );

    $column = new Column('col');

    $this->assertEquals(
      '`col`',
      $column->__toString()
    );
  }
}
