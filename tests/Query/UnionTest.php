<?php

namespace Query;

use SQLBuilder\Clause\OrderBy;
use SQLBuilder\Query\Select;
use SQLBuilder\Query\Union;
use PHPUnit\Framework\TestCase;

class UnionTest extends TestCase
{
  public function testToString(): void
  {
    $select1 = (new Select())->from('table_name');
    $select2 = (new Select())->from('table_name');
    $select3 = (new Select())->from('table_name');

    $union = new Union($select1, $select2);
    $sql = $union->union($select3)
      ->orderBy('alias', OrderBy::DESC)
      ->limit(1)
      ->offset(1);

    $this->assertEquals(
      "(SELECT * FROM `table_name`) "
      . "UNION (SELECT * FROM `table_name`) "
      . "UNION (SELECT * FROM `table_name`) "
      . "ORDER BY `alias` DESC LIMIT 1 OFFSET 1",
      $sql->__toString()
    );
  }
}
