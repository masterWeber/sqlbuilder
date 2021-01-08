<?php

namespace Query;

use SQLBuilder\Query\CreateDatabase;
use PHPUnit\Framework\TestCase;

class CreateDatabaseTest extends TestCase
{
  public function testToString()
  {
    $create = new CreateDatabase('db_name');

    $sql = $create->ifNoExists()
      ->characterSet('utf8')
      ->collate('utf8_general_ci')
      ->encryption(true);

    $this->assertEquals(
      "CREATE DATABASE IF NOT EXISTS `db_name` CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' ENCRYPTION 'Y'",
      $sql->__toString()
    );
  }
}
