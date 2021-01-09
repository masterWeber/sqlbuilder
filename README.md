# SQLBuilder

[![Build Status](https://travis-ci.org/masterWeber/sqlbuilder.svg?branch=master)](https://travis-ci.org/masterWeber/sqlbuilder)
[![Coverage Status](https://coveralls.io/repos/github/masterWeber/sqlbuilder/badge.svg?branch=master)](https://coveralls.io/github/masterWeber/sqlbuilder?branch=master)
[![Latest Stable Version](https://poser.pugx.org/masterweber/sqlbuilder/v)](https://packagist.org/packages/masterweber/sqlbuilder)
[![Total Downloads](https://poser.pugx.org/masterweber/sqlbuilder/downloads)](https://packagist.org/packages/masterweber/sqlbuilder)
[![Latest Unstable Version](https://poser.pugx.org/masterweber/sqlbuilder/v/unstable)](https://packagist.org/packages/masterweber/sqlbuilder)
[![License](https://poser.pugx.org/masterweber/sqlbuilder/license)](https://packagist.org/packages/masterweber/sqlbuilder)

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
```
```sql
  SELECT `t1`.`column` AS `col1`, `t2`.`column` AS `col2` 
  FROM `table1` AS `t1` RIGHT JOIN `table2` AS `t2` ON (`col1` = `t2`.`col3`) 
  WHERE `col1` IS NOT NULL ORDER BY `col2` DESC LIMIT 10 OFFSET 10
```

## CRUD Query Examples

### Insert

```php
use SQLBuilder\SQLBuilder;

$sqlBuilder = new SqlBuilder();

$sql = $sqlBuilder->insertInto('table_name')->values([5, 2]);
```
```sql
INSERT INTO `table_name` VALUES (5, 2)
```

Insert Data Only in Specified Columns

```php
use SQLBuilder\SQLBuilder;

$sqlBuilder = new SqlBuilder();

$sql = $sqlBuilder->insertInto('table_name')
  ->columns(['first', 'second'])
  ->values([5, 2]);
```
```sql
INSERT INTO `table_name` (`first`, `second`) VALUES (5, 2)
```

Insert default data

```php
use SQLBuilder\SQLBuilder;

$sqlBuilder = new SqlBuilder();

$sql = $sqlBuilder->insertInto('table_name')->default();
```
```sql
INSERT INTO `table_name` DEFAULT VALUES
```

### Select

```php
use SQLBuilder\SQLBuilder;

$sqlBuilder = new SqlBuilder();

$sql = $sqlBuilder->select()
  ->from('table_name')
  ->where()
  ->equal('column', 5)
  ->limit(17)
  ->offset(10);
```
```sql
SELECT * FROM `table_name` WHERE `column` = 5 LIMIT 10 OFFSET 10
```
With JOIN

```php
use SQLBuilder\SQLBuilder;
use SQLBuilder\Expression\Column;
use SQLBuilder\Clause\OrderBy;

$sqlBuilder = new SqlBuilder();

$sql = $sqlBuilder->select(['t1.column' => 'col1','t2.column' => 'col2'])
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
```
```sql
SELECT DISTINCT `t1`.`column` AS `col1`, `t2`.`column` AS `col2` 
FROM `table1` AS `t1` RIGHT JOIN `table2` AS `t2` ON (`col1` = `t2`.`col3`) 
WHERE `col1` IS NOT NULL ORDER BY `col2` DESC LIMIT 12745
```

### Update

```php
use SQLBuilder\SQLBuilder;

$sqlBuilder = new SqlBuilder();

$sql = $sqlBuilder->update('table_name')
  ->set(['col1' => 1, 'date' => '2000-01-01'])
  ->where(['id' => 5])
  ->limit(1);
```
```sql
UPDATE `table_name` SET `col1` = 1, `date` = '2000-01-01' WHERE `id` = 5 LIMIT 1
```

### Delete

```php
use SQLBuilder\SQLBuilder;

$sqlBuilder = new SqlBuilder();

$sql = $sqlBuilder->delete()
  ->from('table_name')
  ->where()
  ->equal('col1', 2)
  ->and()
  ->equal('col2', 23)
  ->limit(3);
```
```sql
DELETE FROM `table_name` WHERE `col1` = 2 AND `col2` = 23 LIMIT 3
```

## Installation

### Install through Composer

    composer require masterweber/sqlbuilder
    
## Author

masterWeber  <master.weber@outlook.com>    
