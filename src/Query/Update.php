<?php


namespace Query;


use Block\Set;
use Block\Where;
use Value;

class Update extends Query
{

  const STATEMENT = 'UPDATE';

  protected ?Set $values;

  public function __construct(string $tableName)
  {
    $this->tableName = $tableName;
  }

  public function set(array $data): self
  {
    $this->values = new Set($data);
    return $this;
  }

  public function __toString(): string
  {
    return $this->buildSql();
  }

  protected function buildSql(): string
  {
    $sql = self::STATEMENT . " `{$this->tableName}`";

    if ($this->values) {
      $sql .= " " . $this->values;
    }

    return $sql;
  }
}