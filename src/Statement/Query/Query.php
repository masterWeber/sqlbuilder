<?php


namespace Statement\Query;


use Statement\Statement;

class Query extends Statement
{

  protected string $tableName;

  public function __toString(): string
  {
    return self::class;
  }
}