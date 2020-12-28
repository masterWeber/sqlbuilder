<?php


use Query\InsertInto;
use Query\Select;
use Query\Update;
use Query\Delete;

class SqlBuilder
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