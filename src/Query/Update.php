<?php


namespace Query;


use Block\Set;

class Update extends Query
{
  const STATEMENT = 'UPDATE';

  public function __construct(string $tableReference)
  {
    $this->tableReference = $tableReference;
  }

  public function set(array $data): Set
  {
    return new Set($data);
  }

  public function __toString(): string
  {
    return self::STATEMENT;
  }
}