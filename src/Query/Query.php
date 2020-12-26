<?php


namespace Query;


use Block\Where;

class Query
{

  protected string $tableName;
  protected array $where = [];

  public function where(array $condition = []): self
  {
    $this->where[] = new Where($condition);
    return $this;
  }
}