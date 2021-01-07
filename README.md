# SQLBuilder

[![Build Status](https://travis-ci.org/masterWeber/sqlbuilder.svg?branch=master)](https://travis-ci.org/masterWeber/sqlbuilder)
[![Coverage Status](https://coveralls.io/repos/github/masterWeber/sqlbuilder/badge.svg?branch=master)](https://coveralls.io/github/masterWeber/sqlbuilder?branch=master)

If you're looking for something that is not an ORM but can generate SQL for you, you just found the right one.

SQLBuilder is not an ORM system, but a toolset that helps you generate SQL queries in PHP.

## Features

* Simple API, easy to remember.
* Fast.
* Zero dependency.

## Synopsis

Here is a short example of using

```php
use SQLBuilder\SQLBuilder;
use SQLBuilder\Expression\Column;
use SQLBuilder\Clause\OrderBy;

$builder = new SQLBuilder();

$sql = $builder->select(['t1.column' => 'col1','t2.column' => 'col2'])
  ->from(['table1' => 't1'])
  ->join(['table2' => 't2'])
  ->right()
  ->on()
  ->equal('col1', Column::from('t2.col3'))
  ->where()
  ->isNotNull('col1')
  ->orderBy('col2', OrderBy::DESC)
  ->limit(10)
  ->offset(10);

echo $sql; // "SELECT `t1`.`column` AS `col1`, `t2`.`column` AS `col2` FROM `table1` AS `t1` RIGHT JOIN `table2` AS `t2` ON (`col1` = `t2`.`col3`) WHERE `col1` IS NOT NULL ORDER BY `col2` DESC LIMIT 10 OFFSET 10"
```
