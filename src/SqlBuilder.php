<?php


use Statement\InsertInto;
use Statement\Select;
use Statement\Update;
use Statement\Delete;

class SqlBuilder
{

  public function insertInto(string $tableName): InsertInto
  {
    return new InsertInto($tableName);
  }

  public function select(array $fields = ['*']): Select
  {
    return new Select($fields);
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