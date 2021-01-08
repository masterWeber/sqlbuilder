<?php

namespace Query;

use SQLBuilder\Query\DropDatabase;
use PHPUnit\Framework\TestCase;

class DropDatabaseTest extends TestCase
{
  public function testToString()
  {
    $drop = new DropDatabase('db_name');
    $sql = $drop->ifExists();

    $this->assertEquals(
      'DROP DATABASE IF EXISTS `db_name`',
      $sql->__toString()
    );
  }
}
