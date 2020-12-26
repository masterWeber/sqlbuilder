<?php


namespace Statement\Query;


class InsertInto extends Query
{

  public function __construct(string $tableName)
  {
    $this->tableName = $tableName;
  }

  public function values(array $data): InsertInto
  {
    return $this;
  }
}