<?php


namespace SQLBuilder;

use SQLBuilder\Query\InsertInto;
use SQLBuilder\Query\Select;
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

  public function update(string $tableName): Update
  {
    return new Update($tableName);
  }

  public function delete(): Delete
  {
    return new Delete();
  }
}