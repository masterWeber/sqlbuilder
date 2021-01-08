<?php


use PHPUnit\Framework\TestCase;
use SQLBuilder\Clause\OrderBy;
use SQLBuilder\Expression\Column;
use SQLBuilder\SQLBuilder;

class SQLBuilderTest extends TestCase
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

    $sql = $sqlBuilder->select()
      ->from('table_name')
      ->groupBy('col')
      ->having()
      ->lessThan('col', 5);

    $this->assertEquals(
      'SELECT * FROM `table_name` GROUP BY `col` HAVING `col` < 5',
      $sql->__toString()
    );

    $sql = $sqlBuilder->select(['t1.column' => 'col1', 't2.column' => 'col2'])
      ->distinct()
      ->from(['table1' => 't1'])
      ->join(['table2' => 't2'])
      ->right()
      ->on()
      ->equal('col1', Column::from('t2.col3'))
      ->where()
      ->isNotNull('col1')
      ->orderBy('col2', OrderBy::DESC)
      ->limit(12745);

    $this->assertEquals(
      "SELECT DISTINCT `t1`.`column` AS `col1`, `t2`.`column` AS `col2`"
      . " FROM `table1` AS `t1` " .
      "RIGHT JOIN `table2` AS `t2` ON (`col1` = `t2`.`col3`)"
      . " WHERE `col1` IS NOT NULL ORDER BY `col2` DESC LIMIT 12745",
      $sql->__toString()
    );
  }

  public function testUnion(): void
  {
    $sqlBuilder = new SqlBuilder();

    $select1 = $sqlBuilder->select(['col_name' => 'c'])
      ->distinct()
      ->from(['table_name' => 't'])
      ->limit(5);

    $select2 = $sqlBuilder->select()
      ->from('table_name');

    $select3 = $sqlBuilder->select()
      ->from('table_name');

    $union = $sqlBuilder->union($select1, $select2)
      ->union($select3)
      ->orderBy('c');

    $this->assertEquals(
      "(SELECT DISTINCT `col_name` AS `c` FROM `table_name` AS `t` LIMIT 5) "
      . "UNION (SELECT * FROM `table_name`) "
      . "UNION (SELECT * FROM `table_name`) ORDER BY `c`",
      $union->__toString()
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
      ->equal('col2', 23)
      ->limit(3);

    $this->assertEquals(
      "DELETE FROM `table_name`"
      . " WHERE `col1` = 2 AND `col2` = 23 LIMIT 3",
      $sql->__toString()
    );
  }

  public function testCreateDatabase(): void
  {
    $sqlBuilder = new SqlBuilder();

    $sql = $sqlBuilder->createDatabase('db_name')
      ->ifNoExists()
      ->characterSet('utf8')
      ->collate('utf8_general_ci')
      ->encryption(false);

    $this->assertEquals(
      "CREATE DATABASE IF NOT EXISTS `db_name` CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' ENCRYPTION 'N'",
      $sql->__toString()
    );
  }

  public function testDropDatabase(): void
  {
    $sqlBuilder = new SqlBuilder();

    $sql = $sqlBuilder->dropDatabase('db_name')
      ->ifExists();

    $this->assertEquals(
      "DROP DATABASE IF EXISTS `db_name`",
      $sql->__toString()
    );
  }
}
