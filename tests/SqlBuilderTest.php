<?php


use Clause\OrderBy;
use PHPUnit\Framework\TestCase;

class SqlBuilderTest extends TestCase
{
  public function testInsertInto(): void
  {
    $sqlBuilder = new SqlBuilder();

    $sql = $sqlBuilder->insertInto('Cactus')
      ->columns(['first', 'second'])
      ->values([5, 2]);

    $this->assertEquals(
      'INSERT INTO `Cactus` (`first`, `second`) VALUES (5, 2)',
      $sql->__toString()
    );

    $sql = $sqlBuilder->insertInto('Cactus')
      ->default();

    $this->assertEquals(
      'INSERT INTO `Cactus` DEFAULT VALUES',
      $sql->__toString()
    );
  }

  public function testSelect(): void
  {
    $sqlBuilder = new SqlBuilder();

    $sql = $sqlBuilder->select()
      ->from('zinger')
      ->where()
      ->equal('thunder', 5)
      ->limit(17)
      ->offset(10);

    $this->assertEquals(
      'SELECT * FROM `zinger` WHERE `thunder` = 5 LIMIT 17 OFFSET 10',
      $sql->__toString()
    );

    $sql = $sqlBuilder->select(['banana' => 'cocos'])
      ->distinct()
      ->from(['russia' => 'germany'])
      ->join(['bounty' => 'snickers'])
      ->right()
      ->on()
      ->equal('banana', 'mendeleev')
      ->where()
      ->isNotNull('banana')
      ->orderBy('cocos', OrderBy::DESC)
      ->limit(12745);

    $this->assertEquals(
      "SELECT DISTINCT `banana` AS `cocos` FROM `russia` AS `germany` " .
      "RIGHT JOIN `bounty` AS `snickers` ON (`banana` = 'mendeleev')"
      . " WHERE `banana` IS NOT NULL ORDER BY `cocos` DESC LIMIT 12745",
      $sql->__toString()
    );
  }

  public function testUpdate(): void
  {
    $sqlBuilder = new SqlBuilder();

    $sql = $sqlBuilder->update('table_name')
      ->set(['col1' => 1, 'date' => '2000-01-01'])
      ->where(['id' => 5])
      ->limit(1);

    $this->assertEquals(
      "UPDATE `table_name` SET `col1` = 1,"
      . " `date` = '2000-01-01' WHERE `id` = 5 LIMIT 1",
      $sql->__toString()
    );
  }

  public function testDelete(): void
  {
    $sqlBuilder = new SqlBuilder();

    $sql = $sqlBuilder->delete()
      ->from('table_name')
      ->where()
      ->equal('col1', 2)
      ->and()
      ->equal('col2', 23)
      ->limit(3);

    $this->assertEquals(
      "DELETE FROM `table_name`"
      . " WHERE `col1` = 2 AND `col2` = 23 LIMIT 3",
      $sql->__toString()
    );
  }
}
