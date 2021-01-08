<?php


namespace SQLBuilder;

use SQLBuilder\Query\CreateDatabase;
use SQLBuilder\Query\DropDatabase;
use SQLBuilder\Query\InsertInto;
use SQLBuilder\Query\Select;
use SQLBuilder\Query\Union;
use SQLBuilder\Query\Update;
use SQLBuilder\Query\Delete;

class SQLBuilder
{
  public function insertInto(string $tableName): InsertInto
  {
    return new InsertInto($tableName);
  }

  public function select(array $fields = ['*'], string $mode = null): Select
  {
    return new Select($fields, $mode);
  }

  public function union(Stringable_ $select = null, Stringable_ $select2 = null): Union
  {
    return new Union($select, $select2);
  }

  public function update(string $tableName): Update
  {
    return new Update($tableName);
  }

  public function delete(): Delete
  {
    return new Delete();
  }

  public function createDatabase(string $dbName): CreateDatabase
  {
    return new CreateDatabase($dbName);
  }

  public function dropDatabase(string $dbName): DropDatabase
  {
    return new DropDatabase($dbName);
  }
}