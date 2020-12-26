<?php


use Query\Insert;
use Query\Select;
use Query\Update;
use Query\Delete;

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