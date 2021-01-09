<?php

namespace Query;

use SQLBuilder\DataType\Default_;
use SQLBuilder\Query\AlterDatabase;
use PHPUnit\Framework\TestCase;

class AlterDatabaseTest extends TestCase
{
  public function testToString()
  {
    $alter = new AlterDatabase('db_name');
    $sql = $alter->characterSet('utf8', true)
      ->collate('general_ci', true)
      ->encryption(true, true)
      ->readOnly(new Default_());

    $this->assertEquals(
      "ALTER DATABASE `db_name` DEFAULT CHARACTER SET 'utf8' " .
      "DEFAULT COLLATE 'general_ci' DEFAULT ENCRYPTION 'Y' READ ONLY DEFAULT",
      $sql->__toString()
    );

    $alter = new AlterDatabase('db_name');
    $sql = $alter->characterSet('utf8')
      ->collate('general_ci')
      ->encryption(false)
      ->readOnly(false);

    $this->assertEquals(
      "ALTER DATABASE `db_name` CHARACTER SET 'utf8' COLLATE 'general_ci' ENCRYPTION 'N' READ ONLY 0",
      $sql->__toString()
    );

    $alter = new AlterDatabase('db_name');
    $this->assertEquals(
      "ALTER DATABASE `db_name`",
      $alter->__toString()
    );
  }
}
