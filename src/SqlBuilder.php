<?php


use Statement\Insert;
use Statement\Select;
use Statement\Update;
use Statement\Delete;

class SqlBuilder
{

  public function insert(string $tableName): Insert
  {
    return new Insert($tableName);
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